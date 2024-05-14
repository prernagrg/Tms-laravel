@extends('layouts.main')
@section('section')
    <div class="container py-4">
        <a class="btn btn-secondary btn-md float-end" href="{{route('task.index')}}" role="button">view tasks </a>
       <div class="shadow p-3 w-50">
        <form action="{{route('task.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="my-3 ">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="write the title here">
            </div>
            <div class="my-3 ">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Write the description here"></textarea>
            </div>
            <div class="my-3">
                <button class="btn btn-primary btn-md "  type="submit">create</button>
            </div>
        </form>
       </div>
    </div>
@endsection
