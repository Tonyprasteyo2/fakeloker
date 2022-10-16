<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class Useradmin extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    protected $table="useradmins";
    protected $fillable = ['email','password'];

    public function aktifmember()
    {
        return $this->belongsTo(Aktifasi::class,'id');
    }
}