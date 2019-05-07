<?php

use Illuminate\Database\Seeder;

class KompanijasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kompanijas')->insert(array(
        	array(
        		'id' => '1',
       			'nosaukums' => 'Rimi Latvia SIA',
       			'valsts' => 'LV',
       			'pilseta' => 'Rīga',
       			'iela' => 'Deglava iela 161',
       			'pasta_kods' => 'LV-1021',
       			'reg_numurs' => '40003053029',
       			'pvn_numurs' => 'LV40003053029',
     		),
     		array(
        		'id' => '2',
       			'nosaukums' => 'PATA Timber SIA',
       			'valsts' => 'LV',
       			'pilseta' => 'Saldus',
       			'iela' => 'Cēsu iela 14',
       			'pasta_kods' => 'LV-1012',
       			'reg_numurs' => '40103586919',
       			'pvn_numurs' => 'LV40103586919',
     		),
     		array(
        		'id' => '3',
       			'nosaukums' => 'Valmieras stikla šķiedra AS',
       			'valsts' => 'LV',
       			'pilseta' => 'Valmiera',
       			'iela' => 'Cempu iela 13',
       			'pasta_kods' => 'LV-4201',
       			'reg_numurs' => '40003031676',
       			'pvn_numurs' => 'LV40003031676',
     		),
        ));
    }
}
