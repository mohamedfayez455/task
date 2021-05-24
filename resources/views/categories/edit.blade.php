@extends('layouts.app')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Category Page</h3>
                        </div>
                        <!-- /.card-header -->

                        <form  role="form" method="post" action="{{route('categories.update' , $category->id)}}" >
                            @csrf
                            {{method_field('PUT')}}
                            <div class="card-body">
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-12">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="form-group col-md-12 ">
                                                    <label for="name">Name</label>
                                                    <input type="text" id="name" name="name" class="form-control"  value="{{ $category->name }}"   placeholder="Enter Name">
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="description"> Description</label>
                                                        <textarea name="description" class="textarea" placeholder="Enter Description" id="description"
                                                              style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $category->description }}
                                                        </textarea>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" id="submit-all" class="btn btn-primary"> Add Category</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

