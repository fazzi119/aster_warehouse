<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'gudang';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('jumlah', 'like', '%' . $search . '%')
                    ->orWhere('info', 'like', '%' . $search . '%');
            });
        });
    }

    // public $timestamps = false;

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function baris()
    {
        return $this->belongsTo(Baris::class);
    }
    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }
    public function nomor()
    {
        return $this->belongsTo(Nomor::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
