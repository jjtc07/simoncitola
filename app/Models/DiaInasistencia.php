<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaInasistencia extends Model{
  
  public function actasInasistencias(){
    return $this->belongsToMany(ActaInasistencia::class);
  }
}
