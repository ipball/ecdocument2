<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;

class CategorieController extends Controller
{
    public function index()
    {
        return view('categorie/index');
    }

    public function ajax()
    {
        return Datatables::eloquent(User::query())->make(true);
    }
}
