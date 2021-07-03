<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use App\Http\Requests\blogEditCreate;
use Illuminate\Http\Request;
use Storage;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs  = blogs::allBlogs();
        return view('blog.index', compact('blogs'));
        // return view('blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(blogEditCreate $request)
    {
        $filename = '';
        if(!empty($request->image)){
            $filename = 'blog/'.time().'.jpg';
            Storage::disk('local')->put($filename, $request->image);
        }
        $blog = new blogs();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->start_date = $request->start_date;
        $blog->end_date = $request->end_date;
        $blog->is_active = !empty($request->status)?$request->status:'0';
        $blog->blog_image = $filename;
        if($blog->save()){
            return redirect("/")->with(['status' => "blog created successfully!"]);
        }else{
            return Redirect::back()->withErrors(['status'=>'We are facing some issue please try after some Time.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(blogs $blogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blogs $blogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        if(blogs::where('id', $id)->delete()){
            return redirect("/")->with(['status' => "Blog Deleted successfully!"]);
        }else{
            return redirect()->back()->withErrors(['status'=>'We are facing some issue please try after some Time.']);
        }
    }

    // public function storeImage($blog)
    // {
    //     if (request()->has('image')) {
    //         $blog->update([
    //             'profile_pic' => request()->image->store('users',
    //                 'public'),
    //         ]);
    //         // $img_path = public_path('/storage/uploads/') . $user->profile_pic;
    //         // $image = Image::make($img_path)->fit('200');
    //         // $image->save();
    //     }
    // }
}
