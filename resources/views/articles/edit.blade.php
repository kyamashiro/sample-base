@extends('layouts.app')
@php
    /* @var \App\Models\Article $article */
@endphp
@section('content')
    <div class="container">
        <h1>記事更新</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-end">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                削除
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        本当に削除しますか？
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        {{ Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'DELETE']) }}
                        {{ Form::submit('削除する', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                {{ Form::open(['route' => ['articles.update', $article->id], 'method' => 'PUT']) }}
                {{ Form::hidden('redirect_to', old('redirect_to', URL::previous())) }}
                <div class="form-group row">
                    {{ Form::label('title', 'タイトル') }}
                    {{ Form::text('title', $article->title , ['class' => 'form-control']) }}
                </div>
                <div class="form-group row">
                    {{ Form::label('body', '本文') }}
                    {{ Form::textarea('body', $article->body , ['class' => 'form-control']) }}
                </div>
                <div class="form-group row">
                    {{ Form::label('category_id', 'カテゴリ') }}
                    {{ Form::select('category_id', $categories, $article->category_id, ['class' => 'form-control']) }}
                </div>
                <div class="form-group row">
                    {{ Form::select('is_public', [0 => '非公開', 1 => '公開'], $article->is_public, ['class' => 'form-control']) }}
                </div>
                <div class="d-flex justify-content-end">
                    <div class="form-group row">
                        {{ Form::submit('更新', ['class' => 'btn btn-primary mr-5']) }}
                        <a href="{{ old('redirect_to', URL::previous())}}" class="btn btn-default border">戻る</a>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
