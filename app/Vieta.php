<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vieta extends Model
{
    protected $fillable = [
    'nosaukums',
    'valsts',
    'pilseta',
    'iela',
    'pasta_kods',
    'latitude',
    'longitude'
  ];

public function parvadajumi(){
	return $this->hasMany('App\Parvadajums');
}

}
