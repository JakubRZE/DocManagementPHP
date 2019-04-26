@extends('layouts.shared')

@section('title', 'Activity')

@section('content')

    <div class="card border-primary margin-top-light mb-3 mx-auto" style="max-width: 40rem;">
        <div class="card-body">
            <h4 class="card-title">Add new document</h4>

            <form action = "{{route('documents.store')}}" method = "post" enctype="multipart/form-data">
                <input type = "hidden" name = "_token" value = "{{csrf_token()}}">

                <div class="form-horizontal">
                    <hr />
                    <div class="form-group">
                        <label class = "control-label col-md-4">Description</label>
                        <div class="col-md-10">
                            <input class = "form-control" type='text' name='description' />
                        </div>
                        @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
                    </div>

                    <div class="form-group">
                        <label class = "control-label col-md-4">Document:</label>
                        <div class="col-md-10">
                            <input type="file" name="file"/>
                        </div>
                        @if ($errors->has('file')) <p class="help-block">{{ $errors->first('file') }}</p> @endif
                    </div>
                    <hr />

                    <div class="text-center">
                        <input type="submit" value="Upload" class="btn btn-dark" />
                    </div>

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