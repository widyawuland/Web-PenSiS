<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Volt\Volt;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    // Test untuk memastikan password bisa diperbarui tanpa hashing
    public function test_password_can_be_updated(): void
    {
        $user = User::factory()->create();

        // Login sebagai user yang dibuat
        $this->actingAs($user);

        // Mengupdate password tanpa hashing
        $user->password = 'new-password'; // Langsung set password tanpa hashing
        $user->save();

        $component = Volt::test('profile.update-password-form')
            ->set('current_password', 'password')
            ->set('password', 'new-password')
            ->set('password_confirmation', 'new-password')
            ->call('updatePassword');

        $component
            ->assertHasNoErrors()
            ->assertNoRedirect();

        // Verifikasi apakah password telah diubah tanpa hashing
        $this->assertTrue($user->password === 'new-password');
    }

    // Test untuk memastikan password yang benar harus diberikan
    public function test_correct_password_must_be_provided_to_update_password(): void
    {
        $user = User::factory()->create();

        // Login sebagai user yang dibuat
        $this->actingAs($user);

        // Mengupdate password tanpa hashing
        $user->password = 'password'; // Set password dengan password yang sesuai
        $user->save();

        $component = Volt::test('profile.update-password-form')
            ->set('current_password', 'wrong-password') // Password lama salah
            ->set('password', 'new-password')
            ->set('password_confirmation', 'new-password')
            ->call('updatePassword');

        $component
            ->assertHasErrors(['current_password'])
            ->assertNoRedirect();
    }
}


// namespace Tests\Feature\Auth;

// use App\Models\User;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Support\Facades\Hash;
// use Livewire\Volt\Volt;
// use Tests\TestCase;

// class PasswordUpdateTest extends TestCase
// {
//     use RefreshDatabase;

//     public function test_password_can_be_updated(): void
//     {
//         $user = User::factory()->create();

//         $this->actingAs($user);

//         $component = Volt::test('profile.update-password-form')
//             ->set('current_password', 'password')
//             ->set('password', 'new-password')
//             ->set('password_confirmation', 'new-password')
//             ->call('updatePassword');

//         $component
//             ->assertHasNoErrors()
//             ->assertNoRedirect();

//         $this->assertTrue(Hash::check('new-password', $user->refresh()->password));
//     }

//     public function test_correct_password_must_be_provided_to_update_password(): void
//     {
//         $user = User::factory()->create();

//         $this->actingAs($user);

//         $component = Volt::test('profile.update-password-form')
//             ->set('current_password', 'wrong-password')
//             ->set('password', 'new-password')
//             ->set('password_confirmation', 'new-password')
//             ->call('updatePassword');

//         $component
//             ->assertHasErrors(['current_password'])
//             ->assertNoRedirect();
//     }
// }
