<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prenom','email','adresse','region','cin' ,'tel' ,'login' ,'password','photo'];
}
