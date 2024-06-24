<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rota extends Model
{
    use HasFactory;
    protected $fillable = [
        'endpoint'
    ];

    public function perfis(): BelongsToMany
    {
        return $this->belongsToMany(Perfil::class, 'perfil_rotas');
    }
    
}
