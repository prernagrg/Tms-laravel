@extends('layouts.main')
@section('section')
@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container p-3">
    <a class="btn btn-secondary btn-md float-end " href="{{route('task.create')}}" role="button">Create Tasks</a>
    <table class="table table-responsive">
        <thead>
            <tr>
            <th scope="col">S.N</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task )
            <tr>
               <th scope="row">{{$loop->iteration}}</th>
               <td>{{$task->title}}</td> 
               <td>{{$task->description}}</td> 
               <td>
                <a class="btn btn-primary btn-sm " href="{{route('task.edit',$task->id)}}" role="button"> Edit</a>
                <a class="btn btn-info btn-sm " href="{{route('task.show',$task->id)}}" role="button">View </a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$task->id}}">
                  Delete
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{{$task->id}}">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               Are you sure?😟
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{route('task.destroy', $task->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm " role="button"  type="submit">Delete </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$tasks->links()}}
</div>
@endsection