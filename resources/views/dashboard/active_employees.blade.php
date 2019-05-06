@extends('layouts.shared')

@section('title', 'Active Employees')

@section('content')

    <div class="card mb-3" style="padding:25px">
        <div class="card-header row">
            <div class="col" style="padding:7px">
                <i class="fas fa-table"></i>
                Top 10 active employees
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <tbody>
                            <tr class="table-success">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Uploads
                                </th>
                                <th>
                                    Details
                                </th>
                            </tr>

                            {{--@foreach (var item in Model)--}}
                                <tr>
                                    <td>
                                        {{--@Html.DisplayFor(modelItem => item.FullName)--}}
                                    </td>
                                    <td>
                                        {{--@Html.DisplayFor(modelItem => item.Email)--}}
                                    </td>
                                    <td>
                                        {{--@Html.DisplayFor(modelItem => item.UploadsCount)--}}
                                    </td>
                                    <td>
                                        {{--@Html.ActionLink("Details", "ActiveEmployeesDetails", new { userId = item.Id })--}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection