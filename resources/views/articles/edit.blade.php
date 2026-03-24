@extends('layouts.news')

@section('content')
    @include('articles._form', [
        'heading' => 'Edit News',
        'route' => route('articles.update', $article),
        'method' => 'PUT',
        'article' => $article,
    ])
@endsection