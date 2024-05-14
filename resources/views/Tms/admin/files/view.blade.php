@extends('layouts.main')
@section('section')
    <div class="container py-4">
        <a class="btn btn-secondary btn-md float-end" href="{{route('file.index')}}" role="button">view files </a>
       <div class="shadow p-3 w-50">
        <form action="{{route('file.show', $file->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="my-3 ">
                <label for="" class="form-label">Title</label>
                <input @readonly(true) type="text" value="{{$file->title}}" class="form-control" name="title" placeholder="write the title here">
            </div>
            <div class="my-3 ">
                <label for="description" class="form-label">Image</label>
                <input type="file" class="form-control" name="img" @readonly(true)>
                <img src="{{asset('uploads/'. $file->img)}}" alt="" width="30%" height="auto">
            </div>
           
        </form>
       </div>
    </div>
@endsection
