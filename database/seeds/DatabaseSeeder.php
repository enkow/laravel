<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(AdminSeeder::class);
      $this->command->info("Superadmin seeded!\nlogin:a@a.pl\npasswd:qqq");
    }
}
