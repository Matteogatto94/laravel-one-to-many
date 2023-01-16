@extends('layouts.admin')

@section('content')

<h1>Update Project: {{$project->title}}</h1>

@if ($errors->any())

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif


<form action="{{route('admin.projects.update', $project->slug)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Type a title" aria-describedby="titleHelper" value="{{old('title', $project->title)}}">
    </div>
    @error('title')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror


    <div class="mb-3 d-flex gap-4">
        <img width="140" src="{{ asset('storage/' . $project->cover_image)}}" alt="">
        <div>
            <label for="cover_image" class="form-label">Replace Cover Image</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" placeholder="" aria-describedby="coverImageHelper">
            <small id="coverImageHelper" class="text-muted">Replace the project cover image</small>
        </div>
    </div>

    <div class="mb-3">
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5" placeholder="Type a text">{{old('body', $project->body)}}</textarea>
        </div>
    </div>
    @error('body')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
    <button type="submit" class="btn btn-primary">Update</button>


</form>
@endsection