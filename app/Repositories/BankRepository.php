<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Illuminate\Support\Facades\Storage;
use App\Bank;
class BankRepository
{
    public function castData()
    {
        $data = [
            'id' => null,
            'name' => null,
            'bankpic'=> null,
            'detail'=> null,
            'subdetail'=> null,
            'account'=> null,
            'accountid'=> null,
            'status'=> null,
            'created_at'=> null,
            'updated_at'=> null,
        ];
        return (object) $data;
    }
    public function getAll()
    {
        $bank = Bank::all();
        return $bank;
    }
    public function getById($id)
    {
        $bank = Bank::find($id);
        return $bank;
    }

    public function getDatatables()
    {
        $query = Bank::select('id', 'name', 'bankpic', 'detail', 'subdetail', 'account', 'accountid', 'status')->latest('id');
        return $query;
    }

    public function store($request)
    {
        $bank = new Bank;
        $bank->name = $request->name;
        $bank->detail = $request->detail;
        $bank->subdetail = $request->subdetail;
        $bank->status = $request->status;
        $bank->account = $request->account;
        $bank->accountid = $request->accountid;


        if($request->hasFile('picture')){
               //delete file
               if ($bank->bankpic != 'nopic.png') {
                Storage::disk('public')->delete('images/bank/'.$bank->bankpic);
                }

                $newFileName = uniqid().'.'.$request->picture->extension();
                //upload file
                $request->picture->storeAs('images/bank',$newFileName,'public'); //public เปลี่ยนเป็น amazon S3
                $bank->bankpic = $newFileName;

         }

        $bank->save();

        return true;
    }

    public function update($request, $id)
    {
        $bank = $this->getById($id);
        $bank->name = $request->name;
        $bank->detail = $request->detail;
        $bank->subdetail = $request->subdetail;
        $bank->status = $request->status;
        $bank->account = $request->account;
        $bank->accountid = $request->accountid;

        if($request->hasFile('picture')){
                  //delete file
                if ($bank->bankpic != 'nopic.png') {
                Storage::disk('public')->delete('images/bank/'.$bank->bankpic);
                }

                $newFileName = uniqid().'.'.$request->picture->extension();
                //upload file
                $request->picture->storeAs('images/bank',$newFileName,'public'); //public เปลี่ยนเป็น amazon S3
                $bank->bankpic = $newFileName;



         }

        $bank->update();
        return true;
    }
    public function delete($id)
    {
        $bank = $this->getById($id);
        if ($bank->bankpic != 'nopic.png'){
            Storage::disk('public')->delete('images/bank/'.$bank->bankpic);
        }
         $bank->delete();
         return true;
    }


}
