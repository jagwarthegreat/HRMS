<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AssetCategory;
use App\Models\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            PermissionsTableSeeder::class,
            RoleTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UserTableSeeder::class,
            RoleUserTableSeeder::class,
            PositionTableSeeder::class,
            EmployeeStatusTableSeeder::class,
            LocationTableSeeder::class,
            DepartmentTableSeeder::class,
            PayTypeTableSeeder::class,
            EmployeeTypeTableSeeder::class,
            DocumentCategoryTableSeeder::class,
            HiringRequirementsTableSeeder::class,
            StockCategoryTableSeeder::class,
        ]);
    }
}
