<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
            <span class="ms-1 font-weight-bold ms-3">SPR Politeknik Caltex Riau</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-dashboard text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'peminjaman' ? 'active' : '' }}" href="{{ route('peminjaman') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-university text-secondary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Peminjaman</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'riwayat' ? 'active' : '' }}" href="{{ route('riwayat') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-history text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Riwayat Peminjaman</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'matakuliah' ? 'active' : '' }}" href="{{ route('matakuliah') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-ticket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Mata Kuliah</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('template') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-download text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Download Template Matkul</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dosen' ? 'active' : '' }}" href="{{ route('dosen') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-chalkboard-teacher text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Dosen</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'ruangan' ? 'active' : '' }}" href="{{ route('ruangan') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-door-open text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Ruangan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'akun' ? 'active' : '' }}" href="{{ route('akun') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tambah Akun</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <br />
            <img class="w-50 mx-auto" src="{{ asset('img/logo_psti.png') }}" alt="logo_psti">
            <img class="w-50 mx-auto" src="{{ asset('img/logo_pcr.png') }}" alt="logo_pcr">
        </div>
    </div>
</aside>