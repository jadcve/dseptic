<?php

class RolsTableSeeder extends Seeder {

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run() {
      DB::table('rols')->delete();
      Rol::create(['name' => 'Admin']);
      
   }

}

?>
