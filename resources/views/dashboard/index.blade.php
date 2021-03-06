@extends('layouts.shared')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-black-50 mx-auto text-center">REPORTS</h2>

    <div class="margin-top-light mb-3 mx-auto" style="max-width: 40rem;">
        <div class="card-body text-center">
            <a href="{{route('dash.activ')}}" class="customLink">
            <div class="card bg-success mx-auto card-body" style="max-width: 30rem;">
                <h4>The most active employees</h4>
            </div>
            </a>

            <hr />
            <a href="{{route('dash.useful')}}" class="customLink">
            <div class="card bg-info mx-auto card-body" style="max-width: 30rem;">
                <h4>The most usefull documents</h4>
            </div>
            </a>

            <hr />
            For administrator
            @if($user->is_admin)
                <a href="{{route('dash.employe')}}" class="customLink">
                <div class="card bg-warning mx-auto card-body" style="max-width: 30rem;">
                    <h4>List of all employees</h4>
                </div>
                </a>
            @else
                <a href="#" class="customLink" title="You are not the administrator">
                    <div class="card bg-warning mx-auto card-body" style="max-width: 30rem;">
                        <h4>List of all employees</h4>
                    </div>
                </a>
            @endif
        </div>

    </div>
@endsection