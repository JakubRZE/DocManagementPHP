@extends('layouts.shared')

@section('title', 'Activity')

@section('content')

    <div class="card border-primary margin-top-light mb-3 mx-auto" style="max-width: 40rem;">
        <div class="card-body">
            <h4 class="card-title">Add new document</h4>

            <form action = "{{route('documents.store')}}" method = "post">
                <input type = "hidden" name = "_token" value = "{{csrf_token()}}">

                <div class="form-horizontal">
                    <hr />

                    <div class="form-group">
                        <label class = "control-label col-md-4">Description</label>
                        <div class="col-md-10">
                            <input class = "form-control" type='text' name='description' />
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label class = "control-label col-md-4"> Document</label>--}}
                        {{--<div class="col-md-10">--}}
                            {{--<input type="file" id="btnUpload" name="postedFile" />--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <hr />

                    <div class="text-center">
                        <input type="submit" value="Upload" class="btn btn-dark" />
                    </div>

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                            @foreach($errors->all as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(\Session::has('success'))
                        <hr />
                      <div class="alert alert-success">
                          {{\Session::Get('success')}}
                      </div>
                    @endif

                </div>
            </form>
        </div>
    </div>




@endsection