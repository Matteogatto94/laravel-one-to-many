@extends('layouts.admin')

@section('content')

<h1>Create a new Project</h1>

@if ($errors->any())

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif


<form action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Type a title" aria-describedby="titleHelper" value="{{old('title')}}">
    </div>
    @error('title')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror

    <div class="mb-3">
        <label for="cover_image" class="form-label">Cover Image</label>
        <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" placeholder="" aria-describedby="coverImageHelper">
        <small id="coverImageHelper" class="text-muted">Add your cover image</small>
    </div>
    @error('cover_image')

    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror


    <div class="mb-3">
        <label for="category_id" class="form-label">Categories</label>
        <select class="form-select form-select-md @error('category_id') 'id-invalid' @enderror" name="category_id" id="category_id">
            <option selected>Select one</option>

            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    @error('category_id')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror


    <div class="mb-3">
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5" placeholder="Type a text">{{old('body')}}</textarea>
        </div>
    </div>
    @error('body')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
    <button type="submit" class="btn btn-primary">Create</button>


</form>
@endsection