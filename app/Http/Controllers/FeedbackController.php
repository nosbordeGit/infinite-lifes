<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index(): View
    {

        if (Auth::user()->cliente) {
            $cliente = Auth::user()->cliente;
            $feedbacks = $cliente->usuario->feedbacks()->get();
        }

        return view('feedback.index', compact('feedbacks'));
    }
}
