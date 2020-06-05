<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1,'name'=>'Nguyễn Quang Minh','email'=>'admin@gmail.com','phone'=>'0356653301','password'=>bcrypt('123456'),'address'=>'Hà Nội','level'=>0],
            ['id'=>2,'name'=>'Trần Mỹ Duyên','email'=>'duyen@gmail.com','phone'=>'0356653344','password'=>bcrypt('12345'),'address'=>'Hà Nam','level'=>1],

        ]);
    }
}
