@extends('layouts.shared')

@section('title', 'Activity')

@section('content')

    <div style="padding: 15px">
        <div class="row">
            <div class="col">

                <div class="card border-primary mb-3" style="max-width: 50rem;">
                    <div class="card-header">Upload history:</div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>
                                    Description
                                </th>

                                <th>
                                    File
                                </th>
                                <th></th>
                            </tr>

                            @foreach ( $uploaded_doc as $doc )
                                <tr>
                                    <td>
                                        {{ $doc->description }}
                                    </td>

                                    <td>
                                        {{ $doc->title }}
                                    </td>
                                    <td>
                                        <a href="{{route('documents.show', $doc->id)}}">Document details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>

            </div>

            <div class="col">

                <div class="card border-info mb-3" style="max-width: 50rem;">
                    <div class="card-header">Download history:</div>
                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>
                                    Description
                                </th>

                                <th>
                                    File
                                </th>
                                <th></th>
                            </tr>

                            @foreach ( $downloaded_doc as $doc )
                                <tr>
                                    <td>
                                        {{ $doc->description }}
                                    </td>

                                    <td>
                                        {{ $doc->title }}
                                    </td>
                                    <td>
                                        <a href="{{route('documents.show', $doc->id)}}">Document details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection