<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Auth::user()->articles()->get();
        return response()->json($articles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'article_title' => 'required|string|max:255',
            'article_details' => 'required|string',
        ]);

        $article = Auth::user()->articles()->create([
            'article_title' => encrypt($request->article_title),
            'article_details' => encrypt($request->article_details),
        ]);

        return response()->json($article, 201);
    }

    public function show($id)
    {
        $article = Auth::user()->articles()->findOrFail($id);
        $article->article_title = decrypt($article->article_title);
        $article->article_details = decrypt($article->article_details);
        
        return response()->json($article);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'article_title' => 'sometimes|required|string|max:255',
            'article_details' => 'sometimes|required|string',
        ]);

        $article = Auth::user()->articles()->findOrFail($id);

        if ($request->has('article_title')) {
            $article->article_title = encrypt($request->article_title);
        }

        if ($request->has('article_details')) {
            $article->article_details = encrypt($request->article_details);
        }

        $article->save();

        return response()->json($article);
    }

    public function destroy($id)
    {
        $article = Auth::user()->articles()->findOrFail($id);
        $article->delete();

        return response()->json(null, 204);
    }
}
