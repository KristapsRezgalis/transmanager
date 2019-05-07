<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parvadajums extends Model
{
    protected $table = 'parvadajumi';

	protected $fillable = [
    'iekrausanas_datums',
    'izkrausanas_datums',
    'iekrausanas_laiks',
    'izkrausanas_laiks',
    'iekrausanas_vieta_id',
    'izkrausanas_vieta_id',
    'klients_id',
    'parvadatajs_id',
    'ienemumi',
    'izmaksas',
    'pelna',
    'transporta_numuri',
    'kravas_apraksts'
  ];

    public function kompanija() {
    	return $this->belongsTo('App\Kompanija', 'klients_id', 'id');
    }

    public function kompanija2() {
        return $this->belongsTo('App\Kompanija', 'parvadatajs_id', 'id');
    }

    public function vieta() {
    	return $this->belongsTo('App\Vieta', 'iekrausanas_vieta_id', 'id');
    }

    public function vieta2() {
        return $this->belongsTo('App\Vieta', 'izkrausanas_vieta_id', 'id');
    }

}
