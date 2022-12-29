<?php

namespace App\Models;

use App\Models\User;
use App\Models\Layanan;
use App\Models\PesananItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(PesananItem::class, 'pesanan_id', 'id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function total_harga()
    {
        return 'Rp. ' . number_format($this->total, 0, ',', '.');
    }

    public function tanggal_dipesan()
    {
        return date('d F Y', strtotime($this->created_at));
    }

    public function routeNotificationForWhatsApp()
    {
        return $this->pelanggan->formatPhoneNumber();
    }
}
