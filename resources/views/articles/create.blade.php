@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>記事作成</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-12">
                {{ Form::open(['route' => 'articles.store']) }}
                <div class="form-group row">
                    {{ Form::label('title', 'タイトル') }}
                    {{ Form::text('title', '' , ['class' => 'form-control']) }}
                </div>
                <div class="form-group row">
                    {{ Form::label('body', '本文') }}
                    {{ Form::textarea('body', '' , ['class' => 'form-control']) }}
                </div>
                <div class="form-group row">
                    {{ Form::label('category_id', 'カテゴリ') }}
                    {{ Form::select('category_id', $categories, ['class' => 'form-control']) }}
                </div>
                <div class="form-group row">
                    {{ Form::label('is_public', '公開') }}
                    {{ Form::radio('is_public', 1, true) }}
                    {{ Form::label('is_public', '非公開') }}
                    {{ Form::radio('is_public', 0, false) }}
                </div>
                <div class="d-flex justify-content-end">
                    <div class="form-group row">
                        {{ Form::submit('登録', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
