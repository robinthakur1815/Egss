<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['list'] = blog::orderBy('id','desc')->get();
        return view('home', $data);
    }

    public function create()
    {           
        $data['category'] = category::orderBy('id','desc')->get();
        return view('blog.create',$data);

    }    
    
    public function createCatagery(Request $request)
    {           
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


    public function store(Request $request)
    {
           $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            ]);
    
            $event = new blog;
            $event->title = $request->title;
            $event->slug  = Str::slug($request->title);
            $event->category_id = $request->category_id;
            $event->description = $request->description;
            $event->created_at = date('Y-m-d H:i:s');
            $event->image = $request->image;
            $event->status = $request->Status;
            $event->save();
            return redirect()->route('home')
            ->with('success','Blog has been created successfully.');
    }


    public function edit(Request $request, $id)
    {
        $data['data'] = blog::find($id);
        return view('blog.edit',$data);
    }

    public function update(Request $request, $id)
    {
            $event = blog::find($id);
            $event->title = $request->title;
            $event->slug  = Str::slug($request->title);
            $event->category_id = $request->category_id;
            $event->description = $request->description;
            $event->updated_at = date('Y-m-d H:i:s');
            $event->image = $request->image;
            $event->status = $request->Status;
            $event->save();
            return redirect()->route('home')
            ->with('success','Blog has been updated successfully.');
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
            ->with('success','category has been updated successfully.');;
    }

    public function catagerydistroy(Request $request, $id)
    {
        dd($id);
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

