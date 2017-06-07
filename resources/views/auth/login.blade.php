@extends('layouts.app')

@section('content')
<h2 class="form-signin-heading" align="center"><img src="/image/logo.png" width="500px" alt="Complaint System"></h2>
<div class="form-signin">

@include('partials.errors')
  <form action="/login" method="POST">
  {{ csrf_field() }}
    <div class="form-group">
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    </div>
    <div class="form-group">
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
    </label>
</div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</div>
</form>
<div class="form-group">
Dont have an account ? <a href="/register"><button class="btn btn-info"> Sign Up</button></a>
</div>
</div>
@endsection
