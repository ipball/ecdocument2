<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{    
    public function index()
    {             
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }

        return view('user.index');
    }

    public function getDatatables(UserRepository $user)
    {
        $data = $user->getDatatables();
        $datatables = app('datatables');
        return $datatables->eloquent($data)
            ->blacklist(['id'])
            ->make(true);
    }

    public function renderForm(UserRepository $user, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        
        $cate = $user->getById($id);
        $data['title'] = !empty($cate) ? $cate['name'] : 'สร้างผู้ใช้งานใหม่';
        $data['data'] = !empty($cate) ? $cate : $user->castData();
        return view('user.partials.form', $data);
    }

    public function store(UserRepository $user, Request $request)
    {
        $result = $user->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'status' => 'success',
        ], 200);
    }

    public function update(UserRepository $user, Request $request, $id)
    {
        $result = $user->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function delete(UserRepository $user, $id)
    {
        $result = $user->delete($id);
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function usernameCheck(UserRepository $user, Request $request)
    {
        $result = $user->getByUsername($request->username);
        $status = true;
        if(!empty($result)){
            $status = $result->id != $request->id ? false : true;
        }
        return response()->json($status, 200);
    }
}
