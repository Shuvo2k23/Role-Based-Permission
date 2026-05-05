<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(25);
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles,title',
            'author' => 'required',
            'text' => 'required'
        ]);

        Article::create([
            'title' => $request->title,
            'author' => $request->author,
            'text' => $request->text
        ]);

        return redirect()->route('articles.index')->with('success','Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        // return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|unique:articles,title,'.$id,
            'author' => 'required',
            'text' => 'required'
        ]);

        $article = Article::findOrFail($id);
        $article->update([
            'title' => $request->title,
            'author' => $request->author,
            'text' => $request->text
        ]);

        return redirect()->route('articles.index')->with('success','Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success','Article deleted successfully');
    }
}
