<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate(
            [
                'url' => 'required|url',
            ]
        );

        $originalUrl = $request->url;
        $shortCode = Str::random(6);  // Generates a more random and shorter code

        $link = Link::create(
            [
                'original_url' => $originalUrl,
                'short_code'   => $shortCode,
            ]
        );

        return response()->json(['short_url' => url("/s/{$shortCode}")], 201);
    }

    public function redirect(string $code)
    {
        $link = Link::where('short_code', $code)->firstOrFail();
        $link->increment('visit_count');

        return redirect($link->original_url);
    }
}
