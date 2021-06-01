@extends('layouts.app')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Add Post Page</h3>
                        </div>
                        <!-- /.card-header -->

                        <form  role="form" method="post" action="{{route('posts.store')}}"  enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-12">
                                        <div class="card-body">

                                            @include('includes.message')

                                            <div class="row">
                                                <div class="form-group col-md-12 ">
                                                    <label for="name">Name</label>
                                                    <input type="text" id="name" name="name" class="form-control"  value="{{ old('name') }}"   placeholder="Enter Name">
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="description"> Description</label>
                                                        <textarea name="description" class="textarea" placeholder="Enter Description" id="description"
                                                              style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description') }}
                                                        </textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12 ">
                                                    <label for="category">Category</label>
                                                    <select id="category" name="category_id" class="form-control">
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-10">
                                                    <label for="photo">Photo</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" id="photo" name="photo" class="custom-file-input image" >
                                                            <label class="custom-file-label" for="photo">Choose Photo</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" >Upload</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <div class="images">
                                                        <img style="width:200px; height: 120px; " class="image-preview img-thumbnail" src=" {{asset('uploads/posts/default1.jpeg')}} " alt="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" id="submit-all" class="btn btn-primary"> Add Post</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <input type="text" id="test">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        document.querySelector(".image").onchange =  function (){
            console.log("wwwwwwww");
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        }

        $(".image").change(function () {
            console.log("sss");

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });
    </script>

@endsection

