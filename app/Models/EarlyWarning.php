<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarlyWarning extends Model
{
    use HasFactory;
        protected $fillable = ['judul', 'deskripsi', 'wilayah', 'tingkat_bahaya', 'sumber'];
}
