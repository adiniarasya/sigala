<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstAidTopic extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'slug', 'ikon', 'warna'];

    public function steps()
    {
        return $this->hasMany(FirstAidStep::class)->orderBy('urutan');
    }
}