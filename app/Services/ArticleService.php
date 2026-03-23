<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    public function getPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Article::latest()->paginate($perPage);
    }

    public function store(array $data): Article
    {
        $article = new Article;
        $article->title = $data['title'];
        $article->content = $data['content'];
        $article->save();

        return $article;
    }

    public function update(Article $article, array $data): Article
    {
        $article->title = $data['title'];
        $article->content = $data['content'];
        $article->save();

        return $article;
    }

    public function delete(Article $article): ?bool
    {
        return $article->delete();
    }
}
