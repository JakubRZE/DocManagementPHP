@extends('layouts.shared')

@section('title', 'Active Employees Details')

@section('content')

    <div class="card border-primary mb-3 mx-auto" style="max-width: 50rem;">
        <div class="card-header">Uploaded documents:</div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>
                        Description
                    </th>

                    <th>
                        Upload date
                    </th>
                    <th>
                        File
                    </th>
                </tr>
                @foreach ($documents as $document)
                    <tr>
                        <td>
                            {{ $document->description }}
                        </td>
                        <td>
                            {{ $document->created_at }}
                        </td>
                        <td>
                            {{ $document->title }}
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>

@endsection