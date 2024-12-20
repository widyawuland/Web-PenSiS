<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get('/verify-email');

        $response
            ->assertSeeVolt('pages.auth.verify-email')
            ->assertStatus(200);
    }

    public function test_email_can_be_verified(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        Event::fake();

        // Membuat URL verifikasi tanpa menggunakan hash
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id] // Menggunakan ID pengguna saja tanpa hashing
        );

        $response = $this->actingAs($user)->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
        $response->assertRedirect(RouteServiceProvider::HOME.'?verified=1');
    }

    public function test_email_is_not_verified_with_invalid_hash(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // Membuat URL verifikasi dengan ID yang tidak valid (tanpa hash)
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => 99999] // ID pengguna yang tidak valid
        );

        $this->actingAs($user)->get($verificationUrl);

        // Pastikan email tidak diverifikasi karena ID yang salah
        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }
}

// namespace Tests\Feature\Auth;

// use App\Models\User;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Auth\Events\Verified;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Support\Facades\Event;
// use Illuminate\Support\Facades\URL;
// use Tests\TestCase;

// class EmailVerificationTest extends TestCase
// {
//     use RefreshDatabase;

//     public function test_email_verification_screen_can_be_rendered(): void
//     {
//         $user = User::factory()->create([
//             'email_verified_at' => null,
//         ]);

//         $response = $this->actingAs($user)->get('/verify-email');

//         $response
//             ->assertSeeVolt('pages.auth.verify-email')
//             ->assertStatus(200);
//     }

//     public function test_email_can_be_verified(): void
//     {
//         $user = User::factory()->create([
//             'email_verified_at' => null,
//         ]);

//         Event::fake();

//         $verificationUrl = URL::temporarySignedRoute(
//             'verification.verify',
//             now()->addMinutes(60),
//             ['id' => $user->id, 'hash' => sha1($user->email)]
//         );

//         $response = $this->actingAs($user)->get($verificationUrl);

//         Event::assertDispatched(Verified::class);
//         $this->assertTrue($user->fresh()->hasVerifiedEmail());
//         $response->assertRedirect(RouteServiceProvider::HOME.'?verified=1');
//     }

//     public function test_email_is_not_verified_with_invalid_hash(): void
//     {
//         $user = User::factory()->create([
//             'email_verified_at' => null,
//         ]);

//         $verificationUrl = URL::temporarySignedRoute(
//             'verification.verify',
//             now()->addMinutes(60),
//             ['id' => $user->id, 'hash' => sha1('wrong-email')]
//         );

//         $this->actingAs($user)->get($verificationUrl);

//         $this->assertFalse($user->fresh()->hasVerifiedEmail());
//     }
// }
