@extends('layouts.shared')

@section('title', 'Activity')

@section('content')

    <div class="card mb-3" style="padding:25px">
        <div class="card-header row">
            <div class="col" style="padding:7px">
                <i class="fas fa-table"></i>
                All documents
            </div>
            <div class="col text-right">
                {{--@using (Html.BeginForm(new { @class = "form-inline" }))--}}
                {{--{--}}
                <input class="form-control mr-sm-2  d-inline" id="SearchString" name="SearchString" type="text" placeholder="Search" value="@ViewBag.CurrentFilter">
                <button class="btn btn-secondary" type="submit">Submit</button>
                {{--}--}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    @*<div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row">*@
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">

                                <tbody>

                                <tr class="table-primary">
                                    <th>
                                        {{--@Html.ActionLink("Description", "Index", new { sortOrder = ViewBag.DiscSortParm })--}}
                                    </th>
                                    <th>
                                        {{--@Html.ActionLink("Upload date", "Index", new { sortOrder = ViewBag.UpSortParm })--}}
                                    </th>
                                    <th>
                                        File
                                    </th>
                                    <th>
                                        {{--@Html.ActionLink("Downloads", "Index", new { sortOrder = ViewBag.DownSortParm })--}}
                                    </th>
                                    <th></th>
                                </tr>

                                {{--@foreach (var item in Model)--}}
                                    {{--{--}}
                                    <tr>
                                        <td>
                                            {{--@Html.DisplayFor(modelItem => item.Description)--}}
                                        </td>
                                        <td>
                                            {{--@Html.DisplayFor(modelItem => item.UploadDate)--}}
                                        </td>
                                        <td>
                                            {{--@Html.DisplayFor(modelItem => item.Name)--}}
                                        </td>
                                        <td>
                                            {{--@Html.DisplayFor(modelItem => item.Downloads)--}}
                                        </td>
                                        <td>

                                            {{--@if (User.IsInRole("Admin"))--}}
                                                {{--{--}}
                                                {{--@Html.ActionLink("Edit", "Edit", new { id = item.Id })--}}
                                                {{--@Html.Encode(Html.Raw(" | "));--}}
                                                {{--@Html.ActionLink("Delete", "Delete", new { id = item.Id })--}}
                                                {{--@Html.Encode(Html.Raw(" | "));--}}
                                                {{--}--}}

                                                {{--@Html.ActionLink("Details", "Details", new { id = item.Id }) |--}}
                                                {{--@Html.ActionLink("Download", "DownloadFile", new { id = item.Id })--}}
                                        </td>
                                    </tr>
                                    {{--}--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>


@endsection