@extends('layouts.main')
@section('section')
    <div class="container py-4">
        <a class="btn btn-secondary btn-md float-end" href="{{route('task.index')}}" role="button">view tasks </a>
       <div class="shadow p-3 w-50">
        <form action="{{route('task.update',$task->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="my-3 ">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" value="{{$task->title}}" name="title" placeholder="write the title here">
            </div>
            <div class="my-3 ">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Write the description here">{{$task->description}}</textarea>
            </div>
            <div class="my-3">
                <button class="btn btn-primary btn-md "  type="submit">Update</button>
            </div>
        </form>
       </div>
    </div>
@endsection
