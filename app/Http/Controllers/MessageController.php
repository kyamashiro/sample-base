<?php

namespace App\Http\Controllers;

use App\Models\ShopMessage;
use View;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function index()
    {
        return view('messages/index')->with([
            'messages' => ShopMessage::where('user_id', \Auth::id())->paginate(),
        ]);
    }
}
