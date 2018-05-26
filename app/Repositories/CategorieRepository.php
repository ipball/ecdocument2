<?php
namespace App\Repositories;

use App\Models\Categorie;

class CategorieRepository
{

    public function castData()
    {
        $data = [
            'id' => null,
            'name' => null
        ];
        return (object) $data;
    }

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

    public function store($request)
    {
        $categorie = new Categorie;
        $categorie->name = $request->name;
        $categorie->save();
        return true;
    }

    public function update($request, $id)
    {
        $categorie = $this->getById($id);
        if(empty($categorie)) return false;

        $categorie->name = $request->name;
        $categorie->save();
        return true;
    }

    public function getDatatables()
    {
        $query = Categorie::select('id', 'name');
        return $query;
    }

    public function delete($id)
    {
        $categorie = $this->getById($id);
        if(empty($categorie)) return false;

        $categorie->delete();
        return true;
    }
}
