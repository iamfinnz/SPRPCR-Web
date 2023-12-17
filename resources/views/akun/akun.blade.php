<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Tambah Akun | SPR Politeknik Caltex Riau
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Akun'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Tambah Akun Staf BAAK</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form role="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" aria-label="Nama" placeholder="Masukkan nama" required autocomplete="name" autofocus>
                                    @error('name') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" aria-label="Email" placeholder="Masukkan email" required autocomplete="email" autofocus>
                                    @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" aria-label="Password" placeholder="Masukkan password" required autocomplete="new-password">
                                    @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control form-control-lg" aria-label="Conform Password" placeholder="Masukkan confirm password" required autocomplete="new-password">
                                    @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                </div>
                                <div class="form-group mt-5 text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-rounded">Tambah Akun</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    </html>