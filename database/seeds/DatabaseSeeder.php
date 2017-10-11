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
      mkdir(public_path('img/blog'), 0755);
      mkdir(public_path('img/blog/thumb'), 0755);
      mkdir(public_path('img/portfolio'), 0755);
      mkdir(public_path('img/portfolio/thumb'), 0755);

      $this->call(AdminSeeder::class);
      $this->command->info("Superadmin seeded!\nlogin:a@a.pl\npasswd:qqq");
    }
}
