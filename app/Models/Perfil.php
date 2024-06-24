<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'rota_id'
    ];

    protected $table = 'perfis';

    public function rotas(): HasMany 
    {
        return $this->hasMany(Rota::class);
    }
}