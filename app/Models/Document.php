<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
    protected $fillable = ['matter_id','uploaded_by','original_name','path','mime_type','size'];

    public function matter() { return $this->belongsTo(Matter::class); }
    public function uploader() { return $this->belongsTo(User::class, 'uploaded_by'); }
}
