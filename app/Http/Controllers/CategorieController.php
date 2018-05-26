<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CategorieRepository;

use Illuminate\Http\Request;

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

    public function store(CategorieRepository $categorie, Request $request){        
        $result = $categorie->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',    
            'status' => 'success'        
        ], 200);
    }

    public function update(CategorieRepository $categorie, Request $request, $id){
        $result = $categorie->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,            
            'status' => $status
        ], 200);
    }

    public function delete(CategorieRepository $categorie, $id){
        $result = $categorie->delete($id);
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,            
            'status' => $status
        ], 200);
    }
}
