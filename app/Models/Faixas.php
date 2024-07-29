<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faixas extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'album_id'];

    public function album()
    {
        return $this->belongsTo(Albuns::class, 'album_id');
    }
}
