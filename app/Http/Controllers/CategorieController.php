<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\Repositories\CategorieRepository;

class CategorieController extends Controller
{
    public function index()
    {
        return view('categorie/index');
    }

    public function getDatatables(CategorieRepository $categorie)
    {
        $data = $categorie->getDatatables();
        $datatables = app('datatables');
        return $datatables->eloquent($data)->make(true);        
    }
}
