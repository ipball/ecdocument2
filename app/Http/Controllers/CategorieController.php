<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return $datatables->eloquent($data)
            ->blacklist(['id'])
            ->make(true);
    }

    public function getById(CategorieRepository $categorie, $id){
        $data = $categorie->getById($id);
        return response()->json($data, 200);
    }
}
