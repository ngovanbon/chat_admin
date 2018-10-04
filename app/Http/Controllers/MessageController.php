<?php

namespace App\Http\Controllers;

use App\Model\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();

        return view('admin.message.list')->with('messages', $messages);
    }

    public function create()
    {
        $cagegories = Category::all();
        return view('admin.message.form')->with('categories', $cagegories);
    }

    public function store()
    {
    }

    public function edit($id)
    {
    }

    public function update()
    {
    }

    public function destroy($id)
    {
    }
}
