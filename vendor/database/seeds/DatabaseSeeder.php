<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Model::unguard();
        $this->call('RolsTableSeeder');

        $this->command->info('Rols table seeded!');

        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}

class RolsTableSeeder extends Seeder {

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run() {
      DB::table('rols')->delete();
      $arrRol = array();
      $arrRol[0] = array('name' => 'Admin');
      $arrRol[1] = array('name' => 'Operator');
      $arrRol[2] = array('name' => 'Customer');
      DB::table('rols')->insert($arrRol);
      $arrUsers = array();

      $arrUsers[0] = array(
          'name' => 'manuel',
          'email' => 'macm1820@gmail.com',
          'password' => Hash::make('123456'),
          'rol_id' => 1
      );
      $arrUsers[1] = array(
          'name' => 'manuel',
          'email' => 'mcastellanotg@gmail.com',
          'password' => Hash::make('123456'),
          'rol_id' => 2
      );
      DB::table('users')->insert($arrUsers);
      
   }

}
