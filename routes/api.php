<?php

use Illuminate\Support\Facades\Route;
use App\Models\SharedSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

Route::post('/share', function (Request $request) {
    $schema = SharedSchema::create([
        'slug' => (string) Str::uuid(),
        'table_name' => $request->table_name,
        'table_name' => $request->table_name,
        'json_content' => is_string($request->json_content)
            ? json_decode($request->json_content, true)
            : $request->json_content
    ]);

    return response()->json(['slug' => $schema->slug]);
});

// Ruta para obtener un esquema específico por su UUID (slug)
Route::get('/schemas/{slug}', function ($slug) {
    // Buscamos el registro que coincida con el slug
    $schema = SharedSchema::where('slug', $slug)->first();

    // Si no existe, devolvemos un 404 real desde Laravel
    if (!$schema) {
        return response()->json(['error' => 'Esquema no encontrado'], 404);
    }

    // Si existe, devolvemos los datos
    return response()->json([
        'table_name' => $schema->table_name,
        'content' => $schema->json_content
    ]);
});
