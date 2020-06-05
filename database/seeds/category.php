<?php

use Illuminate\Database\Seeder;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->delete();
        DB::table('category')->insert([
            ['id'=>1,'name'=>'Điện tử','slug'=>'dien-tu','parent'=>0],
            ['id'=>2,'name'=>'Điện lạnh','slug'=>'dien-lanh','parent'=>0],
            ['id'=>3,'name'=>'Đồ gia dụng','slug'=>'do-gia-dung','parent'=>0],
            ['id'=>4,'name'=>'Âm thanh','slug'=>'am-thanh','parent'=>0],
            ['id'=>5,'name'=>'Các loại tivi','slug'=>'cac-loai-tivi','parent'=>1],
            ['id'=>6,'name'=>'Tủ lạnh','slug'=>'tu-lanh','parent'=>2],
            ['id'=>7,'name'=>'Hitachi','slug'=>'hitachi','parent'=>6],
            ['id'=>8,'name'=>'Dàn âm thanh','slug'=>'dan-am-thanh','parent'=>6],


        ]);
    }
}

