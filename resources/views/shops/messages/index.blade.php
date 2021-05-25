@extends('layouts.app')
@php
    /* @var \App\Models\Article[]|\Illuminate\Pagination\LengthAwarePaginator $articles */
@endphp
@section('content')
    <div class="container-fluid p-5">
        <h1>記事一覧</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('flash_message'))
            <div class="alert alert-success" role="alert">
                {{ session('flash_message') }}
            </div>
        @endif
        {{ Form::open(['route' => 'articles.index', 'method' => 'GET']) }}
        <div class="border mb-5 py-4">
            <div class="d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-4 mr-2">
                            {{ Form::label('title', 'タイトル') }}
                            {{ Form::text('title', old('title', $request->title), ['class' => 'form-control']) }}
                        </div>
                        <div class="col-md">
                            {{ Form::label('body', '内容') }}
                            {{ Form::text('body', old('body', $request->body), ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            {{ Form::label('category_id', 'カテゴリ') }}
                            {{ Form::select('category_id', $categories, old('category_id', $request->category_id), ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            {{ Form::label('created_at', '作成日') }}
                            <div class="row">
                                <div class="col-md-2">
                                    {{ Form::datetimeLocal('created_at_from', old('created_at_from', $request->created_at_from), ['class' => 'form-control']) }}
                                </div>
                                <span class="d-flex align-items-center">
                                    〜
                                </span>
                                <div class="col-md-2">
                                    {{ Form::datetimeLocal('created_at_to', old('created_at_to', $request->created_at_to), ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-end">
                        {{ Form::submit('検索', ['class' => 'btn btn-success mr-4']) }}
                        <a href="{{ route('articles.index') }}" class="btn btn-danger">リセット</a>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                {{ $articles->appends(request()->query())->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>
@endsection
