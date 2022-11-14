<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;


class CategoryController extends Controller
{
    
     public function catagery()
    {
        $data['list'] = category::orderBy('id','desc')->get();
        return view('catagery', $data);
    }

    public function create()
    {           
        $data['category'] = category::orderBy('id','desc')->get();
        return view('blog.create',$data);

    }    
    public function add()
    {            
        return view('add');
    } 

    public function createCatagery(Request $request)
    {           
          // dd($request); 
           $request->validate([
            'name' => 'required',
            ]);
            $event = new category;
            $event->name = $request->name;
            $event->slug  = Str::slug($request->name);
            $event->created_at = date('Y-m-d H:i:s');
            $event->save();
            return redirect()->route('catagery')
            ->with('success','category has been created successfully.');;
    } 

    public function Catageryupdate(Request $request ,$id)
    {            
           $request->validate([
            'name' => 'required',
            ]);
            $event = category::find($id);
            $event->name = $request->name;
            $event->slug = Str::slug($request->name);
            $event->updated_at = date('Y-m-d H:i:s');
            $event->save();
            return redirect()->route('catagery')
            ->with('success','category has been created successfully.');;
    }
    
  
    public function Catageryedit(Request $request, $id)
    {
        $data['data'] = category::find($id);
        return view('ctedit',$data);
    }


    public function catagerydistroy(Request $request, $id)
    {
       
        $data = category::find($id)->delete();
        return redirect()->route('catagery')->with('success','Catagery deleted successfully');
    }

    public function uploadtos3aws($filename)
    {
          $file = 'uploads';
          $filePath = Storage::disk('s3')->put($file, $filename);
          $awsUrl= \Config::get('filesystems.disks.s3.url').$filePath;
          return $awsUrl;
    }
    
}

