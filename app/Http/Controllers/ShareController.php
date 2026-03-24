<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SharedSchema;
use Illuminate\Support\Str;

class ShareController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validamos (IMPORTANTE: 'json_content' sin la regla 'json' para que acepte SQL)
        $request->validate([
            'table_name' => 'required|string',
            'json_content' => 'required|string'
        ]);

        // 2. Creamos el registro con un UUID real
        $schema = SharedSchema::create([
            'slug' => (string) Str::uuid(), 
            'table_name' => $request->table_name,
            'json_content' => $request->json_content,
        ]);

        // 3. Devolvemos el JSON para que Next.js reciba el slug
        return response()->json($schema);
    }
}