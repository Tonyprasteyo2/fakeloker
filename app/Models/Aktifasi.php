<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktifasi extends Model
{
    use HasFactory;
    protected $table = "aktifasis";
    protected $guarded =[];
    public function useradminmember()
    {
        return $this->hasOne(Useradmin::class,'user_id');
    }
}