<?php
namespace App\Repositories;

use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DocumentRepository
{

    public function castData()
    {
        $data = [
            'id' => null,
            'code_no' => null,
            'name' => null,
            'reference' => null,
            'store' => null,
            'description' => null,
            'file_name' => null,
            'status' => null,
            'doc_date' => Carbon::today(),
            'categorie_id' => null            
        ];
        return (object) $data;
    }

    public function getAll()
    {
        $documents = Document::all();
        return $documents;
    }

    public function getById($id)
    {
        $document = Document::find($id);
        return $document;
    }

    public function store($request)
    {        
        $document = new Document;
        $document->code_no = $request->code_no;
        $document->name = $request->name;
        $document->reference = $request->reference;
        $document->store = $request->store;
        $document->description = $request->description;
        $document->file_name = $request->file_name;      
        $document->doc_date = Carbon::createFromFormat('d/m/Y', $request->doc_date)->toDateString();  
        $document->categorie_id = $request->categorie_id;
        $document->created_by = Auth::id();
        $document->save();
        return true;
    }

    public function update($request, $id)
    {        
        $document = $this->getById($id);
        if(empty($document)) return false;
        
        $document->code_no = $request->code_no;
        $document->name = $request->name;
        $document->reference = $request->reference;
        $document->store = $request->store;
        $document->description = $request->description;
        $document->file_name = $request->file_name;
        $document->status = $request->status;       
        $document->doc_date = Carbon::createFromFormat('d/m/Y' , $request->doc_date)->toDateString(); 
        $document->categorie_id = $request->categorie_id;
        $document->updated_by = Auth::id();
        $document->save();
        return true;
    }

    public function getDatatables()
    {
        $query = Document::select('id', 'code_no', 'name', 'status', 'categorie_id');
        return $query;
    }

    public function delete($id)
    {
        $document = $this->getById($id);
        if(empty($document)) return false;

        $document->delete();
        return true;
    }
}