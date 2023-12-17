<DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      Login | SPR Politeknik Caltex Riau
    </title>
  </head>
  @extends('layouts.app')

  @section('content')
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto rounded-3 shadow">
              <div class="card card-plain">
                <div class="card-header pb-0 text-center">
                  <img alt="Logo PSTI" sizes="120x120" src="{{ asset('img/logo_psti.png') }}">
                  <br />
                  <br />
                  <h4 class="font-weight-bolder">Login</h4>
                  <p class="mb-0">SPR Politeknik Caltex Riau</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    @method('post')
                    <div class="flex flex-col mb-3">
                      <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" aria-label="Email" placeholder="Email" required autocomplete="email" autofocus>
                      @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                    </div>
                    <div class="flex flex-col mb-3">
                      <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" aria-label="Password" placeholder="Password" required autocomplete="new-password">
                      @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-rounded btn-lg w-100 mt-4 mb-0">{{ __('Login') }}</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-1 text-sm mx-auto">
                    <a href="/password/reset" class="text-primary text-gradient font-weight-bold">Lupa Password?</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <br />
          <h6 style="text-align: center;">Powered by:</h6>
          <center>
            <img alt="Logo PCR" sizes="10x10" src="{{ asset('img/logo_pcr.png') }}">
          </center>
        </div>
      </div>
    </section>
  </main>

  </html>
  <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    // Inisialisasi Firebase
    var firebaseConfig = {
      apiKey: "AIzaSyC8rKJk7fXSPUyf6tUpkQog473fmY8WPgs",
      authDomain: "spr-pcr-395410.firebaseapp.com",
      databaseURL: "https://spr-pcr-395410-default-rtdb.firebaseio.com",
      projectId: "spr-pcr-395410",
      storageBucket: "spr-pcr-395410.appspot.com",
      messagingSenderId: "462241505021",
      appId: "1:462241505021:web:f00e05ddcb1858f2c62894",
      measurementId: "G-V3HJQJEKDD"
    };
    firebase.initializeApp(config);
  </script>
  @endsection