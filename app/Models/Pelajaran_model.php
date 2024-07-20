<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran_model extends Model
{
    use HasFactory;
    protected $table = "pelajaran";
    protected $primaryKey = "pelajaran_id";
}
