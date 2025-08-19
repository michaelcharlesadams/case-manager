<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    protected $fillable = ['matter_id','user_id','started_at','duration_minutes','rate','description'];

    public function matter() { return $this->belongsTo(Matter::class); }
    public function user() { return $this->belongsTo(User::class); }

    public function getAmountAttribute(): float
    {
        return round(($this->duration_minutes / 60) * (float)$this->rate, 2);
    }
}
