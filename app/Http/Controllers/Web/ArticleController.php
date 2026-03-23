<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Requests\Articles\StoreArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController
{
    public function __construct(
        private readonly ArticleService $articleService
    ) {}

    public function index(): View
    {
        $articles = $this->articleService->getPaginated(12);

        return view('articles.index', compact('articles'));
    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $article = $this->articleService->store($request->validated());

        return redirect()->route('articles.show', $article)->with('success', 'Created successfully.');
    }

    public function show(Article $article): View
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article): View
    {
        return view('articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        $this->articleService->update($article, $request->validated());

        return redirect()->route('articles.show', $article)->with('success', 'Updated successfully.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $this->articleService->delete($article);

        return redirect()->route('articles.index')->with('success', 'Deleted successfully.');
    }
}
