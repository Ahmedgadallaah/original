<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
     public function getChat()
    {
        return view('dashboard.chat');
    }
}
