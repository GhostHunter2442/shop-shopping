<?php

namespace App\Repositories;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class UserRepository
{
    public function castData()
    {
        $data = [
            'id' => null,
            'name' => null,
            'email' => null,
            'userrole' => null,
            'created_at' => null,
            'updated_at' => null
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

    public function getByUsername($email)
    {
        $user = User::where('email', $email)->first();
        return $user;
    }
    public function getByPassword($password,$id)
    {


        $user_id = User::find($id);
        if (!Hash::check($password, $user_id->password)) {
            return false;
        }
        return true;
    }

    public function store($request)
    {



        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->userrole = $request->userrole;
        $user->save();
        $this->getById($user->id)->assignRole($request->userrole);  // สร้าง role ใหม่
        return  $user->id;
    }

    public function update($request, $id)
    {
        $paemission_data = array();
        array_push( $paemission_data,
                     $request->readCategory,
                     $request->readProduct
                    );

        // dd($paemission_data);
        $user = $this->getById($id);
        if (empty($user)) {
            return false;
        }
        $user->removeRole($user->userrole); //ลบ role เดิม
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }


        $user->email = $request->email;
        $user->name = $request->name;
        $user->userrole = $request->userrole;
        $user->save();

        $user->assignRole($request->userrole);  // สร้าง role ใหม่

        //add perission
        $user->syncPermissions($paemission_data);
        // $user->revokePermissionTo(['viewCategory','viewProduct']); // ลบ permission
        // $user->givePermissionTo('viewCategory');

      return true;
    }

    public function getDatatables()
    {
        $query = User::select('id','email', 'name', 'userrole');
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
