<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $statuses=["Штотуку креирана","Прифатена од администратор","Прифатена од ресторан","Доделена на доставувач","Подготвена","Подигната","Испорачана","Одбиена од Администратор","Одбиена од ресторан"];
        foreach ( $statuses as $key => $status) {
            DB::table('status')->insert([
                'name' => $status,
                'alias' =>  str_replace(" ","_",strtolower($status)),
            ]);
        }
    }
}
