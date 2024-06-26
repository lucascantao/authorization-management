<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
    ];

    protected $table = 'perfis';

    public function rotas(): BelongsToMany 
    {
        return $this->belongsToMany(Rota::class, 'perfil_rotas')->withPivot(['create', 'read', 'update', 'delete']);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}