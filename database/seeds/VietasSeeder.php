<?php

use Illuminate\Database\Seeder;

class VietasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vietas')->insert(array(
        	array(
        		'id' => '1',
       			'nosaukums' => 'Rimi Deglava',
       			'valsts' => 'LV',
       			'pilseta' => 'Rīga',
       			'iela' => 'Deglava iela 161',
       			'pasta_kods' => 'LV-1021',
       			'latitude' => '56.947719',
       			'longitude' => '24.223698',
     		),
     		array(
        		'id' => '2',
       			'nosaukums' => 'PATA Saldus',
       			'valsts' => 'LV',
       			'pilseta' => 'Saldus',
       			'iela' => 'Apvedceļš 15',
       			'pasta_kods' => 'LV-3801',
       			'latitude' => '56.682075',
       			'longitude' => '22.468718',
     		),
     		array(
        		'id' => '3',
       			'nosaukums' => 'Valmieras stikla šķiedra',
       			'valsts' => 'LV',
       			'pilseta' => 'Valmiera',
       			'iela' => 'Cempu iela 13',
       			'pasta_kods' => 'LV-4201',
       			'latitude' => '57.525833',
       			'longitude' => '25.453076',
     		),

        ));
    }
}
