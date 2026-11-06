<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstAidStep extends Model
{
    use HasFactory;
    protected $fillable = ['first_aid_topic_id', 'urutan', 'instruksi'];

    public function topic()
    {
        return $this->belongsTo(FirstAidTopic::class, 'first_aid_topic_id');
    }
}