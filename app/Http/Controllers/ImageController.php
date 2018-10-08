<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

use App\Image;
class ImageController extends Controller
{
    public function index(){

        $dirname = "images/";
        $images =glob($dirname."*.{png,jpeg,jpg,gif}", GLOB_BRACE);
        return View::make('upload')->with(['photos'=>$images]);
    }

    public function imageUpload(Request $request)

    {
        $this->validate($request, [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'

        ]);

        $image=$request->file('image');
        $input['imageName']=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$input['imageName']);

        return back()->with(['success'=>'Your images successfully uploaded' ]);
    }


}


