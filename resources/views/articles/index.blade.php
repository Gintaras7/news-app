@extends('layouts.news')

@section('content')
<div class="py-6">

    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">News</h2>
        <a href="{{ route('articles.create') }}" class="btn-primary">
            Add News
        </a>
    </div>

    @if($articles->count())

    <!-- Grid Layout -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($articles as $article)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition flex flex-col">

            <div class="p-5 flex flex-col flex-grow">

                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                    {{ $article->title }}
                </h3>

                <p class="text-sm text-gray-600 mb-4 line-clamp-4">
                    {{ $article->excerpt }}
                </p>

                <!-- Date & Actions -->
                <div class="mt-auto flex justify-between items-center text-sm text-gray-500">
                    <span>{{ $article->created_at->format('Y-m-d') }}</span>
                    <div class="flex space-x-3">
                        <a href="{{ route('articles.show', $article) }}" class="link-primary">View</a>
                        <a href="{{ route('articles.edit', $article) }}" class="link-primary">Edit</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Delete this news?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="link-danger">Delete</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $articles->links() }}
    </div>

    @else
    <div class="text-center text-gray-500 py-10">
        No news yet
    </div>
    @endif

</div>
@endsection