@extends('layouts.shared')

@section('title', 'All Employees')

@section('content')

    <div class="card mb-3" style="padding:25px">
        <div class="card-header row">
            <div class="col" style="padding:7px">
                <i class="fas fa-table"></i>
                All employees
            </div>
            <div class="col text-right">
                <form action = "/dashboard/all_employees/search/{request?}" method = "post">
                    @csrf
                <input class="form-control mr-sm-2  d-inline" name="SearchString" type="text" placeholder="Search" value={{$searchString}}>
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
                            <tr class="table-success">
                                <th>
                                    First name
                                </th>
                                <th>
                                    Last name
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Downloads
                                </th>
                                <th>
                                    Uploads
                                </th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->first_name }}
                                    </td>
                                    <td>
                                        {{ $user->last_name }}
                                    </td>
                                    <td>
                                        {{ $user->address }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->download }}
                                    </td>
                                    <td>
                                        {{ $user->upload }}
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