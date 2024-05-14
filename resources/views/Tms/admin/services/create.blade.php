@extends('layouts.main')
@section('section')
    <div class="container py-4">
        <a class="btn btn-secondary btn-md float-end" href="{{ route('service.index') }}" role="button">view services </a>
        <div class="shadow p-3 w-50 ">
            <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="my-3 ">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="write the name here">
                </div>
                <div class="my-3 ">
                    <label class="form-label" for="basic-icon-default-company">Image</label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="imagebox" class="form-control" name="img"
                            aria-describedby="basic-icon-default-company2" @readonly(true) />
                        <!-- Modal trigger button -->
                        <form action="{{route('file.create',$file->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('GET')
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalId{{$file->id}}">
                            choose image
                        </button>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId{{$file->id}}" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Choose an Image
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <style>
                                            [type=radio]:checked+img{
                                                outline: 2px solid red
                                            }
                                        </style>
                                       
                                            @foreach ($files as $file)
                                            <label >
                                                <input type="radio" style="opacity: 0" name="img" value="{{$file['img']}}">
                                                <img src="{{asset('uploads/'.$file->img)}}" alt="" width="100px" height="100px" class="my-2">
                                            </label>
                                            @endforeach

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Optional: Place to the bottom of scripts -->
                        <script>
                            const myModal = new bootstrap.Modal(
                                document.getElementById("modalId"),
                                options,
                            );
                        </script>
                        </form>
                    </div>

                    <div class="my-3">
                        <button class="btn btn-primary btn-md " type="submit">create</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
