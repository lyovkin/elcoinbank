<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(WalletsTableSeeder::class);
         $this->call(ProfileTableSeeder::class);
         $this->call(CurrencyTableSeeder::class);
         $this->call(UserRolesTableSeeder::class);
         $this->call(CourseTableSeeder::class);
         $this->call(PercentTableSeeder::class);
    }
}
