<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'nomor';

    public $timestamps = false;

    public function gudang()
    {

        return $this->hasMany(Gudang::class);
    }

    public function barangmasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangkeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
