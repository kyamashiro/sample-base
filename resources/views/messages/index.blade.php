@extends('layouts.app')
@php
    /* @var \App\Models\ShopMessage[]|\Illuminate\Pagination\LengthAwarePaginator $messages */
@endphp
@section('content')
    <h1>メッセージ一覧</h1>
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
    <div class="container-fluid p-5">
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                受信メッセージ
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#">送信メッセージ</a>
            </div>
        </div>
        <div>
            {{ $messages->appends(request()->query())->links("pagination::bootstrap-4") }}
            <p>{{ (($messages->currentPage() -1) * $messages->perPage() + 1) + (count($messages) -1)  }}件
                / {{ $messages->total() }}件中</p>
        </div>
        <message-list :messages='@json($messages)'></message-list>
    </div>
@endsection
