<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Voucher;

class UpdateVoucherSaldo extends Command
{
    protected $signature = 'voucher:reset-saldo';
    protected $description = 'Reset voucher saldo to 15,000 daily at midnight';

    public function handle()
    {
        // Reset saldo and tanggal_berlaku for all vouchers
        $updated = Voucher::query()->update([
            'saldo' => 15000,
            'sisa_saldo' => 15000,
            'tanggal_berlaku' => now(),
        ]);

        $this->info("Successfully reset saldo for {$updated} vouchers.");
    }
}


// namespace App\Console\Commands;

// use Illuminate\Console\Command;

// class UpdateVoucherSaldo extends Command
// {
//     /**
//      * The name and signature of the console command.
//      *
//      * @var string
//      */
//     protected $signature = 'app:update-voucher-saldo';

//     /**
//      * The console command description.
//      *
//      * @var string
//      */
//     protected $description = 'Command description';

//     /**
//      * Execute the console command.
//      */
//     public function handle()
//     {
//         //
//     }
// }
