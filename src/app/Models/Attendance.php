<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'start', 'end', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // rest情報の取得
    public function rests()
    {
        return $this->hasMany(Rest::class);
    }
}
