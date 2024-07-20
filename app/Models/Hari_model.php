<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari_model extends Model
{
    use HasFactory;

    protected $table = "hari";
    protected $primaryKey = "hari_id";
    public $timestamps = false;
}
