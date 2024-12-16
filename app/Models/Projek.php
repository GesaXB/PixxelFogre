<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Projek extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
        'kategori_id'
    ];
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategori::class);
    }    
}