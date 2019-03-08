@extends('layouts.app')

@section('title','Nazwa TESTOWA')

@section('content')

<form action="{{route('Sites.save')}}" method="post">
    <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="Enter title">
    </div>

    <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="Enter content">
    </div>

    <div class="form-group">
        <button class="btn btn-primary">Save</button>
    </div>

</form>

@endsection