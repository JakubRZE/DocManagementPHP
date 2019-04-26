@extends('layouts.shared')

@section('title', 'Details')

@section('content')

 <div class="card border-primary margin-top-light mb-3 mx-auto" style="max-width: 40rem;">
  <div class="card-body">
   <h4 class="card-title">Document details</h4>

   <div>

    <hr />
    <dl class="dl-horizontal">
     <dt>
      Uploaded by:
     </dt>

     <dd>
      {{$full_name}}
     </dd>

     <dt>
      Description
     </dt>

     <dd>
      {{$document->description}}
     </dd>

     <dt>
      Upload Date
     </dt>

     <dd>
      {{$document->created_at->format('d M Y')}}
     </dd>

     <dt>
      File
     </dt>

     <dd>
      {{ $document->title }}
     </dd>

     <dt>
      Content Type
     </dt>

     <dd>
      {{$document->type}}
     </dd>

     <dt>
      Downloads
     </dt>

     <dd>
      {{--@Html.DisplayFor(model => model.Downloads)--}}
     </dd>

    </dl>
    <div class="text-center">
     <p>
      <a href="{{route('documents.show', $document->id)}}">Download</a> |
      <a href="{{ url('/documents') }}">Back to list</a>
     </p>

    </div>
   </div>
  </div>
 </div>

@endsection