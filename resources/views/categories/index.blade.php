@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Show Categories Data</h3>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-primary" href="{{route('categories.create')}}"> <i class="fa fa-plus"></i> New Category</a>
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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-info btn-sm m-2" href="{{route('categories.edit' , $category->id)}}"><i class="fa fa-edit fa-lg"></i></a>

                                        <form method="post" action="{{route('categories.destroy' , $category->id)}}">
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
                    {{$categories->links()}}
                </div>

            </div>

        </div>
    </div>

@endsection
