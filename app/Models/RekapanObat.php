<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapanObat extends Model
{
    use HasFactory;

    protected $table = 'rekapan_obats';
    protected $guarded = [];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id', 'id');
    }
}
