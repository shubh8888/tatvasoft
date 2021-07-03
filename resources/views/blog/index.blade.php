@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row ">
    
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header">
                    Blog Listing
                    <a href="{{route('blog.create')}}" class="btn btn-primary" style="float:right">Add Blog</a>
                </div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-error" role="alert">
                            <h4>{{$errors->first()}}</h4>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(!empty($blogs))
                                @foreach($blogs as $blog)
                                <tr>
                                    <td>
                                        <img src="{{asset('/storage/')}}{{$blog->blog_image}}" width="50">
                                    </td>
                                    <td>{{$blog->title}}</td>
                                    <td>
                                        @if(!empty(Auth::user()))
                                            <a class="btn btn-danger" href="{{route('blog.destroy', $blog->id)}}"> Delete</a></td>
                                        @endif
                                </tr>

                                @endforeach
                           @endif 
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection