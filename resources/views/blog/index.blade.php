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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection