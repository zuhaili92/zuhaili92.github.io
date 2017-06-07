@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Change Password</h3>
                <p class="text-muted m-b-30 font-13"> Fill in the blanks </p>
                <form class="form-horizontal" method="POST" action="/change-password">
                    @include('partials.errors')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-12">Current Password :</label>
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="currentpassword" required=""> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">New Password :</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" required=""> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Confirm Password :</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="password_confirmation" required=""> </div>
                                </div>

                                <button type="submit" name="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <button type="reset" name="cancel" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>

@endsection