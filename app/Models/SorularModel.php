<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SorularModel extends Model
{
    use HasFactory;
    protected $table = "sorular";
    public $timestamps = false;
}
