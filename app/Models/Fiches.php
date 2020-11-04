<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiches extends Model
{
    use HasFactory;
    protected $fillable = ['hauteur','poids','sang','date','temperature','doux','odeur','gout','gorge','diarrhee','fatigue','souffle'];
}
