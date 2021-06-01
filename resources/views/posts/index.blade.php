@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Show Posts Data</h3>
                        </div>
                        <div class="col-md-6  d-flex flex-row-reverse">
                            <a class="btn btn-primary" href="{{route('posts.create')}}"> <i class="fa fa-plus"></i> New Post</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->description}}</td>
                                <td>{{$post->category ? $post->category->name : ''}}</td>
                                <td>
                                    <img style="width:100px; height: 80px; " class="image-preview img-thumbnail" src=" {{asset('uploads/posts/'.$post->photo)}} " alt="">
                                </td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-info btn-sm m-2" href="{{route('posts.edit' , $post->id)}}"><i class="fa fa-edit fa-lg"></i></a>

                                        <form method="post" action="{{route('posts.destroy' , $post->id)}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger btn-sm m-2"><i class="fa fa-trash fa-lg"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{$posts->links()}}
                </div>

            </div>

        </div>
    </div>

@endsection
