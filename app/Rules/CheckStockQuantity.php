<?php

namespace App\Rules;

use Closure;
use App\Models\Gudang;
use Illuminate\Contracts\Validation\Rule;

class CheckStockQuantity implements Rule
{

    private $gudangId;
    private $qty;
    private $redirectTo = '/barangkeluar';
    private $message = 'Jumlah yang dikeluarkan melebihi stok yang tersedia di gudang.';

    public function __construct($gudangId, $qty)
    {
        $this->gudangId = $gudangId;
        $this->qty = $qty;
    }

    public function passes($attribute, $value)
    {
        $gudang = Gudang::find($this->gudangId);

        if ($gudang && $this->qty <= $gudang->jumlah) {
            return true;
        }

        return false;
    }

    public function message()
    {
        return $this->message;
    }

    public function redirectTo()
    {
        return $this->redirectTo;
    }
}
