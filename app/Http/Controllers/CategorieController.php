<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CategorieRepository;

class CategorieController extends Controller
{
    public function index()
    {
        return view('categorie.index');
    }

    public function getDatatables(CategorieRepository $categorie)
    {
        $data = $categorie->getDatatables();
        $datatables = app('datatables');
        return $datatables->eloquent($data)
            ->blacklist(['id'])
            ->make(true);
    }

    public function renderForm(CategorieRepository $categorie, $id){
        $cate = $categorie->getById($id);
        $data['title'] = !empty($cate) ? $cate['name'] : 'สร้างหมวดหมู่เอกสาร';
        $data['data'] = !empty($cate) ? $cate : $categorie->castData();
        return view('categorie.partials.form', $data);
    }
}
