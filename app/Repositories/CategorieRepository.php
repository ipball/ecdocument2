<?php
namespace App\Repositories;

use App\Models\Categorie;

class CategorieRepository
{

    public function getAll()
    {
        $categories = Categorie::all();
        return $categories;
    }

    public function getById($id)
    {
        $categorie = Categorie::find($id);
        return $categorie;
    }

    public function store(Request $request)
    {
        $categorie = new Categorie;
        $categorie->name = $request->name;
        $categorie->save();
    }

    public function update(Request $request)
    {
        $categorie = $this->getById($request->id);
        $categorie->name = $request->name;
        $categorie->save();
    }

    public function getDatatables()
    {
        $query = Categorie::select('id', 'name');
        return $query;
    }
}
