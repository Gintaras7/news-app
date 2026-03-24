@props([
    'heading' => 'Add News',
    'route' => route('articles.store'),
    'method' => null,
    'article' => null,
])

@php
    $title = old('title', $article?->title);
    $content = old('content', $article?->content);
@endphp

<div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-sm">
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">{{ $heading }}</h2>
    </div>

    <form action="{{ $route }}" method="POST">
        @csrf
        @if($method)
            @method($method)
        @endif

        <div class="mb-5">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $title ?? '') }}" required maxlength="255"
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2
                @error('title') border-red-500 @enderror">
            @error('title')
            <p class="form-input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
            <textarea name="content" id="content" rows="6" required
                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2
                @error('content') border-red-500 @enderror">{{ old('content', $content ?? '') }}</textarea>
            @error('content')
            <p class="form-input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center mt-8">
            <a href="{{ route('articles.index') }}" class="link-secondary">Back to list</a>

            <button type="submit" class="btn-primary">
                Save
            </button>
        </div>
    </form>
</div>
