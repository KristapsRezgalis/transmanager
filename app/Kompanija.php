<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompanija extends Model
{
    protected $fillable = [
    'nosaukums',
    'valsts',
    'pilseta',
    'iela',
    'pasta_kods',
    'reg_numurs',
    'pvn_numurs'
  ];

  public function parvadajumi(){
  	return $this->hasMany('App\Parvadajums');
  }

}
