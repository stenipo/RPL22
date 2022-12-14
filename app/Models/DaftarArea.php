<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DaftarBus;


class DaftarArea extends Model
{
    public function bus(){
        return $this->hasMany(DaftarBus::class,'kode_area');
    }
}
