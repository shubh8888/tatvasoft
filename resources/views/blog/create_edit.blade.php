@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row ">
    
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header">
                    Create Blog 
                    <!-- <button class="btn btn-primary" style="float:right">Add Blog</button> -->
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" id="blog_form" action="{{ route('blog.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description </label>

                            <div class="col-md-6">
                                <textarea class="form-control" required name="description"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>

                            <div class="col-md-6">
                                <input id="start_date" type="text" class="datepicker_start_date form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}"  readonly autocomplete="start_date" autofocus>

                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>

                            <div class="col-md-6">
                                <input id="end_date" type="text" class="datepicker form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}"  readonly autocomplete="end_date" autofocus>

                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Is Active</label>

                            <div class="col-md-6">
                                <input  type="radio" class="" name="status" value="1"  > Yes
                                <input  type="radio" class="" name="status" value="0"  > No

                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required readonly autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection