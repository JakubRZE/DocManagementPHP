@extends('layouts.shared')

@section('title', 'Documents')

@section('content')

    <div class="card mb-3" style="padding:25px">
        <div class="card-header row">
            <div class="col" style="padding:7px">
                <i class="fas fa-table"></i>
                All documents
            </div>
            <div class="col text-right">
                {{--Search bar--}}
                <form action = "/documents/search" method = "post">
                    @csrf
                <input class="form-control mr-sm-2  d-inline" name="SearchString" type="text" placeholder="Search" value="{{$searchString}}">
                <button class="btn btn-secondary" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">

                                <tbody>

                                <tr class="table-primary">
                                    <th>
                                        Description &nbsp;
                                        <a href="{{route('sort', 'Disc_asc')}}"> <i class="fas fa-arrow-up"></i> </a>
                                        <a href="{{route('sort', 'Disc_desc')}}"> <i class="fas fa-arrow-down"></i> </a>
                                    </th>
                                    <th>
                                        Upload date &nbsp;
                                        <a href="{{route('sort', 'Up_asc')}}"> <i class="fas fa-arrow-up"></i> </a>
                                        <a href="{{route('sort', 'Up_desc')}}"> <i class="fas fa-arrow-down"></i> </a>
                                    </th>
                                    <th>
                                        File
                                    </th>
                                    <th>
                                        Downloads &nbsp;
                                        <a href="{{route('sort', 'Down_asc')}}"> <i class="fas fa-arrow-up"></i> </a>
                                        <a href="{{route('sort', 'Down_desc')}}"> <i class="fas fa-arrow-down"></i> </a>
                                    </th>
                                    <th></th>
                                </tr>

                                @foreach ( $documents as $document )
                                    <tr>
                                        <td>
                                            {{ $document->description }}
                                        </td>
                                        <td>
                                            {{$document->created_at->format('d M Y')}}
                                        </td>
                                        <td>
                                            {{ $document->title }}
                                        </td>
                                        <td>
                                            {{ $document->downloads }}
                                        </td>
                                        <td>
                                            @if($user->is_admin)
                                            <a href="{{route('documents.edit', $document->id)}}">Edit</a> |
                                            <a href="{{route('destroy.show', $document->id)}}">Delete</a> |
                                            @endif
                                            <a href="{{route('documents.show', $document->id)}}">Details</a> |
                                            <a href="{{route('download', $document->id)}}">Download</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection