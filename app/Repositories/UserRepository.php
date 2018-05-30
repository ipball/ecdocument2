<?php namespace App\Repositories;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function castData()
    {
        $data = [
            'id' => null,
            'username' => null,
            'email' => null,
            'name' => null,
            'department' => null,
            'user_type' => null
        ];
        return (object) $data;
    }

    public function getAll()
    {
        $users = User::all();
        return $users;
    }

    public function getById($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function getByUsername($username)
    {
        $user = User::where('username', $username)->first();
        return $user;
    }

    public function store($request)
    {        
        $user = new User;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->department = $request->department;
        $user->user_type = $request->user_type;
        $user->save();
        return true;
    }

    public function update($request, $id)
    {
        $user = $this->getById($id);
        if (empty($user)) {
            return false;
        }

        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->department = $request->department;
        $user->user_type = $request->user_type;
        $user->save();
        return true;
    }

    public function getDatatables()
    {
        $query = User::select('id', 'username', 'email', 'name', 'department', 'user_type');
        return $query;
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        if (empty($user)) {
            return false;
        }

        $user->delete();
        return true;
    }

}
