<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Rol;

class User extends Authenticatable
{
  protected $table = "usuarios";

  use Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'email', 'password', 'rol_id', 'empleado_id'
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function empleado(){
    return $this->belongsTo(Empleado::class);
  }

  public function rol(){
    return $this->belongsTo(Rol::class);
  }
}