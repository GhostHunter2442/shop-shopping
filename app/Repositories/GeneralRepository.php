<?php

namespace App\Repositories;
use App\General;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class GeneralRepository
{
    public function castData()
    {
        $data = [
            'id' => null,
            'name' => null,
            'email'=> null,
            'adress'=> null,
            'phonenumber'=> null,
            'open_time'=> null,
            'close_time'=> null,
            'latitude'=> null,
            'longitude'=> null,
            'created_at'=> null,
            'updated_at'=> null,
        ];
        return (object) $data;
    }
    public function getAll()
    {
        $general = General::all();
        return $general;
    }
    public function getById($id)
    {
        $general = General::find($id);
        return $general;
    }

    public function update($request, $id)
    {
        $general = $this->getById($id);
        if(empty($general)) return false;

        $general->name = $request->name;
        $general->email = $request->email;
        $general->adress = $request->adress;
        $general->phonenumber = $request->phonenumber;
        $general->open_time = $request->open_time;
        $general->close_time = $request->close_time;
        $general->latitude = $request->latitude;
        $general->longitude = $request->longitude;
        $general->save();
        return true;
    }

}
