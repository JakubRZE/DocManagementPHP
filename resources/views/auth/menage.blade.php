@extends('layouts.shared')

@section('title', 'Manage')

@section('content')


    <div class="card border-info mb-3 mx-auto" style="max-width: 40rem;">

        <div class="card-header"><h4>Your account information</h4></div>

        <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            <div>
                <h4></h4>

                <dl class="dl-horizontal">

                    <dt class="text-secondary">
                        First Name
                    </dt>

                    <dt>
                        {{ Auth::user()->first_name }}
                        <br /><br />
                    </dt>


                    <dt class="text-secondary">
                        Last Name
                    </dt>
                    <dt>
                        {{ Auth::user()->last_name }}
                        <br /><br />
                    </dt>


                    <dt class="text-secondary">
                        Address
                    </dt>
                    <dt>
                        {{ Auth::user()->address }}
                        <br /><br />
                    </dt>

                    <dt class="text-secondary">
                        Registration Date
                    </dt>
                    <dt>
                        {{ Auth::user()->created_at->format('Y/m/d') }}
                        <br /><br />
                    </dt>

                </dl>

                <hr />

                <div class="form-group text-center">
                    <a href="#demo" data-toggle="collapse" class="badge badge-secondary"> <h5>Change your account settings</h5> </a>
                </div>
                <div id="demo" class="collapse">

                    <dl class="dl-horizontal">
                        <dt>Password:</dt>
                        <dd class="text-info">
                            <a class="nav-link"  href="{{ url('/manage/change_psw') }}">Change your password</a>
                        </dd>

                    </dl>
                </div>
            </div>

        </div>
    </div>


@endsection