<?php

namespace App\Services;
use Illuminate\Http\Request;

class ImageService {


    public function saveImage(Request $request, $id) {
        $extension = request()->file('logo')->getClientOriginalExtension();
        $name = $id . '/' . $id.'_'.time().'_logo.' . $extension;
        $path = request()->file('logo')->storeAs('public/logos' , $name);
        return $name;
    }

}