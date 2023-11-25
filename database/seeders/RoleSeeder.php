<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=[
            ['name' => 'admin', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sub_admin', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        Role::insert($roles);
    }
}
