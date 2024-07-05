<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'satuan';

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });
    }

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
