@extends('layouts.app')
@php
    /* @var \App\Models\Article[]|\Illuminate\Pagination\LengthAwarePaginator $articles */
@endphp
@section('content')
    <div class="container-fluid p-5">
        <h1>記事一覧</h1>
        @if (session('flash_message'))
            <div class="alert alert-success" role="alert">
                {{ session('flash_message') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <p>{{ $articles->count() }}件 / {{ $articles->total() }}件中</p>
                    </div>
                    <div>
                        <p class="btn btn-primary">
                            <a href="{{ route('articles.create') }}" class="text-white">新規登録</a>
                        </p>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">@sortablelink('id', 'ID')</th>
                        <th scope="col">@sortablelink('title', 'タイトル')</th>
                        <th scope="col">@sortablelink('body', '内容')</th>
                        <th scope="col">@sortablelink('category.name', 'カテゴリ名')</th>
                        <th scope="col">@sortablelink('is_public', '公開/非公開')</th>
                        <th scope="col">@sortablelink('created_at', '作成日')</th>
                        <th scope="col">@sortablelink('updated_at', '更新日')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <th scope="row">{{ $article->id }}</th>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->short_body }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>{{ $article->is_public }}</td>
                            <td>{{ $article->created_at }}</td>
                            <td>{{ $article->updated_at }}</td>
                            <td>
                                <p class="btn btn-primary">
                                    <a href="{{ route('articles.edit', $article->id) }}"
                                       class="text-white">編集</a>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $articles->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>
@endsection
