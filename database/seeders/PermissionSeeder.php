<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [
            ['name' => 'can-create', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'can-edit', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'can-delete', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'can-read', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ];

        Permission::insert($permission);
    }
}
