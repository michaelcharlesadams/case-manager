<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['matter_id','assigned_to','title','notes','due_date','status'];

    public function matter() { return $this->belongsTo(Matter::class); }
    public function assignee() { return $this->belongsTo(User::class, 'assigned_to'); }
}
