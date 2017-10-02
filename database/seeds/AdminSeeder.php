<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admin')->insert([
          'email' => 'grzesiekk94@gmail.com',
          'password' => '$2y$10$3x/WqWz4l99ue8NHmov/dOSKmupFSsVL1.wrLWhp7MlgRGN.RbE1C',
          'last_login' => date('Y-m-d H:i:s'),
      ]);

      DB::table('admin')->insert([
          'email' => 'a@a.pl',
          'password' => bcrypt('qqq'),
          'last_login' => date('Y-m-d H:i:s'),
      ]);
    }
}
