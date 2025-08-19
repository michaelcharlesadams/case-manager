<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matter extends Model
{
    use SoftDeletes;

    protected $fillable = ['client_id','number','title','status','description'];

    public function client() { return $this->belongsTo(Client::class); }
    public function users() { return $this->belongsToMany(User::class)->withTimestamps()->withPivot('role_on_matter'); }
    public function tasks() { return $this->hasMany(Task::class); }
    public function documents() { return $this->hasMany(Document::class); }
    public function timeEntries() { return $this->hasMany(TimeEntry::class); }
    public function invoices() { return $this->hasMany(Invoice::class); }
}
