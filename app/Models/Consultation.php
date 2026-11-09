<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nurse_id', 'keluhan','jenis', 'status'];

    public function messages()
    {
        return $this->hasMany(ConsultationMessage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        public function nurse()
    {
        return $this->belongsTo(User::class, 'nurse_id');
    }
        public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}