<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleSearchRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ArticleSearchRequest $request
     * @return View
     */
    public function index(ArticleSearchRequest $request)
    {
        return view('articles/index')->with([
            'articles' => Article::searchQuery($request)->sortable()->paginate(),
            'categories' => array_merge([0 => '選択してください'], Category::query()->pluck('name', 'id')->toArray()),
            'request' => $request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('articles/create')->with([
            'categories' => Category::query()->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->all());

        return redirect('articles')->with('flash_message', '記事を保存しました');
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return View
     */
    public function edit(Article $article)
    {
        return view('articles/edit')->with([
            'categories' => Category::query()->pluck('name', 'id'),
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        return redirect('articles')->with('flash_message', '記事を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return RedirectResponse
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('articles')->with('flash_message', '記事を削除しました');
    }
}
