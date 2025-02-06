<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestlerModel extends Model
{
    use HasFactory;
    protected $table = "testler";
    public $timestamps = false;
    
}
