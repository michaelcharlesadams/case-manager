<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','email','phone','address'];

    public function matters()
    {
        return $this->hasMany(Matter::class);
    }
}