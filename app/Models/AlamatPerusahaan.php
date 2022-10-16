<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatPerusahaan extends Model
{
    protected $table ="alamat_perusahaans";
    use HasFactory;
    protected $guard=['id'];
}
