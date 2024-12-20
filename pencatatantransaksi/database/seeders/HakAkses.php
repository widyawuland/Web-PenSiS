<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HakAkses extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //membersihkan cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions=[
            "Membuat Siswa",
            "Melihat Siswa",
            "Mengubah Siswa",
            "Menghapus Siswa"
        ];
        foreach($permissions as $nilai){
            Permission::create(["name"=>$nilai]);
        }

        $pengguna = Role::create(["name"=>"admin"]);
        $pengguna -> givePermissionTo(Permission::all());

        $pengguna = Role::create(["name"=>"toko"]);
        $pengguna -> givePermissionTo([$permissions[1]]);
    }
}
