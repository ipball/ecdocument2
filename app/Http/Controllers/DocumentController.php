<?php

namespace App\Http\Controllers;

use App\Repositories\DocumentRepository;
use App\Repositories\CategorieRepository;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return view('document.index');
    }

    public function getDatatables(DocumentRepository $document)
    {
        $data = $document->getDatatables();        
        $datatables = app('datatables');
        return $datatables->eloquent($data)
            ->addColumn('categorie_name', function ($value) {                                
                return $value->categorie->name;
            })
            ->make(true);
    }

    public function renderForm(DocumentRepository $document, CategorieRepository $categorie, $id){
        $cate = $document->getById($id);
        $data['title'] = !empty($cate) ? $cate['name'] : 'สร้างเอกสาร';
        $data['data'] = !empty($cate) ? $cate : $document->castData();
        $data['categories'] = $categorie->getAll();
        return view('document.partials.form', $data);
    }

    public function store(DocumentRepository $document, Request $request){        
        $result = $document->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',    
            'status' => 'success'        
        ], 200);
    }

    public function update(DocumentRepository $document, Request $request, $id){        
        $result = $document->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,            
            'status' => $status
        ], 200);
    }

    public function delete(DocumentRepository $document, $id){
        $result = $document->delete($id);
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,            
            'status' => $status
        ], 200);
    }
}
