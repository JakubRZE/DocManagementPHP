@extends('layouts.shared')

@section('title', 'Most downloaded documents')

@section('content')

    <div class="card mb-3" style="padding:25px">
        <div class="card-header row">
            <div class="col" style="padding:7px">
                <i class="fas fa-table"></i>
                The most useful documents
            </div>
            <div class="col text-right">
                <form action ="{{route('on.page')}}" method = "post">
                    @csrf
                <p  class="d-inline">Display on page:</p>
                <input class="form-control mr-sm-1  d-inline" name="amount" type="number" step="1" placeholder="Search" value={{$onPage}}>
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
                            <tr class="table-info">
                                <th>
                                    Description
                                </th>
                                <th>
                                    Upload date
                                </th>
                                <th>
                                    File
                                </th>
                                <th>
                                    Last download
                                </th>
                                <th>
                                    Downloads
                                </th>
                            </tr>
                            @foreach ($documents as $document)
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
                                        {{ $document->last_download}}
                                    </td>
                                    <td>
                                        {{ $document->downloads }}
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


@endsection