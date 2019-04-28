@extends('layouts.shared')

@section('title', 'Edit')

@section('content')

    <div class="card border-primary margin-top-light mb-3 mx-auto" style="max-width: 40rem;">
        <div class="card-body">
            <h4 class="card-title">Edit docuemnt</h4>

            <form method="post" action="{{ route('documents.update', $document->id) }}">
                @method('PATCH')
                @csrf

             <div class="form-horizontal">
                <hr />
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif

                <div class="form-group">
                    <label for="name"class = "control-label col-md-4">Description</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="description" value={{ $document->description }} />
                    </div>
                </div>
                    <br />
                <div class="form-group">
                    <label for="name"class = "control-label col-md-4">Upload date</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" readonly = "readonly" name="created_at" value={{ $document->created_at}} />
                    </div>
                </div>

                <hr />
                <div class="form-group">
                    <div class="text-center">
                        <input type="submit" value="Save" class="btn btn-primary" /> |
                        <a href="{{ url('/documents') }}">Back to list</a>
                    </div>
                </div>
             </div>
            </form>
        </div>
    </div>

@endsection