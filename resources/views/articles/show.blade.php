@extends('layouts.news')

@section('content')
<div class="max-w-7xl bg-white p-8 rounded-lg shadow-sm">
    <div class="mb-2">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $article->title }}</h1>
        <p class="text-sm text-gray-500">
            Published on {{ $article->created_at->format('Y-m-d') }}
        </p>
    </div>

    <div class="whitespace-pre-line max-w-none text-gray-700 mb-8">
        {{ $article->content }}
    </div>

    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
        <a href="{{ route('articles.index') }}" class="link-secondary">
            Back to list
        </a>
        <div class="flex space-x-3">
            <a href="{{ route('articles.edit', $article) }}" class="btn-secondary">
                Edit
            </a>
            <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Delete this news?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection