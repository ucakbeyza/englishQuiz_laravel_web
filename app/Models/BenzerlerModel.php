<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenzerlerModel extends Model
{
    use HasFactory;
    protected $table = "benzerler";
    public $timestamps = false;
}
