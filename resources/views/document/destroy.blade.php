@extends('layouts.shared')

@section('title', 'Delete')

@section('content')

    <div class="card border-primary margin-top-light mb-3 mx-auto" style="max-width: 40rem;">
        <div class="card-body">
            <h4 class="card-title">Are you sure you want to delete this document?</h4>
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
                        {{$document->title}}
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
                        {{$downloads}}
                    </dd>

                </dl>
                <div class="text-center">

                    <form action="{{ route('documents.destroy', $document->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button> |
                        <a href="{{ url('/documents') }}">Back to list</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection