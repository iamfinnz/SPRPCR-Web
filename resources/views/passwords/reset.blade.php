@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo2.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/logo2.png') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>
    Forgot Password | SPR Politeknik Caltex Riau
  </title>
  <style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>
@section('content')
<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto rounded-3 shadow">
            <div class="card card-plain">
              <div class="card-header pb-0 text-center">
                <img alt="Logo" sizes="76x76" src="{{ asset('img/logo_psti.png') }}">
                <br />
                <br />
                <h4 class="font-weight-bolder">Forgot Password</h4>
                <p class="mb-0">Inputkan alamat email yang terdaftar</p>
              </div>
              <div class="card-body">
                @if ($errors->any())
                <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                  {{ $error }} <br>
                  @endforeach
                </ul>
                @endif

                {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\Auth\PasswordResetController@store']) !!}

                <div class="form-group">
                  {!! Form::label('email', 'Email:') !!}
                  {!! Form::email('email', null, ['class'=>'form-control', 'placeholder' => 'Alamat email terdaftar'])!!}
                </div>

                <div class="form-group">
                  {!! Form::submit('Reset Password', ['class'=>'btn btn-primary btn-rounded mt-3']) !!}
                </div>

                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
        <br />
        <h6 style="text-align: center;">Powered by:</h6>
        <img class="center" alt="Logo PCR" sizes="10x10" src="{{ asset('img/logo_pcr.png') }}">
      </div>
  </section>
</main>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  @if(Session::has('message'))
  toastr.success("{{ Session::get('message') }}")
  @endif
  @if(Session::has('error'))
  toastr.error("{{ Session::get('error') }}")
  @endif
</script>
@endsection