<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function site(){
        $livros = Livro::join('vendedor', 'livro.vendedor_id', '=', 'vendedor.id')
                ->join('users', 'vendedor.user_id', '=', 'users.id')
                ->where('users.status', 1)
                ->select('livro.*')
                ->get();
        return view('site.welcome', compact('livros'));
    }

    public function livro($titulo = null ,$id): View {
        $livro = Livro::find($id);
        return view('site.livro', compact('livro'));
    }
}
