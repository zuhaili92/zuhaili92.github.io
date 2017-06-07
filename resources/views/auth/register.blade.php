@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
<h2 class="form-signin-heading" align="center"><img src="/image/logo.png" width="500px" alt="Complaint System"></h2>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Registration Form</div>
                <div class="panel-body">

                @include('partials.errors')

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('card_id') ? ' has-error' : '' }}">
                            <label for="card_id" class="col-md-4 control-label">Card ID</label>

                            <div class="col-md-6">
                                <input id="card_id" type="text" class="form-control" name="card_id" value="{{ old('card_id') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel_no') ? ' has-error' : '' }}">
                            <label for="tel_no" class="col-md-4 control-label">Telephone No</label>

                            <div class="col-md-6">
                                <input id="tel_no" type="text" class="form-control" name="tel_no" value="{{ old('tel_no') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                            <select class="form-control" id="department" name="department" required>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->department_name}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
<div align="right">Already have an account ? <a href="/"><button class="btn btn-default">Login</button></a></div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
