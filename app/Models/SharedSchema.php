<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SharedSchema extends Model
{
    // Esto le dice a Laravel: "Confío en estos campos, deja que se guarden"
    protected $fillable = ['slug', 'table_name', 'json_content'];

    // Opcional: Si quieres que Laravel trate el JSON como un array automáticamente
    protected $casts = [
        'json_content' => 'array',
    ];
}
