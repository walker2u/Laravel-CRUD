@extends('layouts.app')
@section('main')
    @if ($msg = Session::get("success"))
    <div class="alert alert-success py-4" role="alert">
        <strong>{{$msg}}</strong>
    </div>
    @endif
    <div class="container">
        <div class="container">
            <div class=" text-center mt-5 ">
                <h1>Create Products</h1>
            </div>


            <div class="row ">
                <div class="col-lg-10 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">

                            <div class = "container">
                                <form id="contact-form" role="form" method="post" action="/product/save"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="controls">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="form_lastname">Product Name</label>
                                                    <input id="form_lastname" type="text" name="name"
                                                        value="{{ old('name') }}" class="form-control"
                                                        placeholder="Please enter your Product Name"
                                                        data-error="Lastname is required.">
                                                    @if ($errors->has('name'))
                                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Image</label>
                                                    <input name="image" type="file" class="form-control-file"
                                                        id="exampleFormControlFile1">
                                                    @if ($errors->has('image'))
                                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="form_message">Description</label>
                                                    <textarea id="form_message" name="description" class="form-control" placeholder="Write your message here."
                                                        rows="4" data-error="Please, leave us a message.">{{ old('description') }}</textarea>
                                                    @if ($errors->has('description'))
                                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                                    @endif
                                                </div>

                                            </div>


                                            <div class="col-md-12">

                                                <input type="submit" class="btn btn-success btn-send  pt-2 btn-block "
                                                    value="Create">

                                            </div>

                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <!-- /.8 -->

                </div>
                <!-- /.row-->

            </div>
        </div>

    </div>
@endsection