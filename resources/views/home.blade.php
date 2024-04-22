@extends('layout')
@section('title', 'Home')
@section('body')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<body>
  <div class="wrapper">
    <aside id="sidebar">
      <div class="d-flex">
        <button id="toggle-btn" type="button">
          <i class="lni lni-world"></i>
        </button>
        <div class="sidebar-logo">
          <a href="#">Jabatan Penjara Malaysia</a>
        </div>
      </div>
      <ul class="sidebar-nav">
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="lni lni-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        {{-- <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="lni lni-grid-alt"></i>
            <span>View KPI</span>
          </a>
        </li> --}}
        {{-- <li class="sidebar-item">
          <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" 
              data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
              <i class="lni lni-protection"></i>
              <span>Auth</span>
          </a>
          <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link">Login</a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link">Register</a>
            </li>
          </ul>
        </li> --}}
        <li class="sidebar-item">
          <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" 
              data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
              <i class="lni lni-grid-alt"></i>
              <span>View KPI</span>
          </a>
          <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" 
                  data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                  <i class="lni lni-protection"></i>
                  Sektor Keselamatan
              </a>
              <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="/KeselamatanKoreksional/KeselamatanInteligen" class="sidebar-link">Keselamatan Inteligen</a>
                </li>
                <li class="sidebar-item">
                  <a href="/KeselamatanKoreksional/PengurusanBanduan" class="sidebar-link">Pengurusan Banduan</a>
                </li>
                <li class="sidebar-item">
                  <a href="/KeselamatanKoreksional/TahananRadikal" class="sidebar-link">Tahanan Radikal</a>
                </li>
              </ul>
            </li>
            {{-- <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" 
                  data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                  <i class="lni lni-protection"></i>
                  Sektor Pengurusan
              </a>
              <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Pembangunan Profesionalisme</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Sumber Manusia & Pentadbiran</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Pembangunan & Perolehan</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Teknologi Maklumat</a>
                </li>
              </ul>
            </li> --}}
          </ul>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="lni lni-popup"></i>
            <span>Notification</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="lni lni-cog"></i>
            <span>Settings</span>
          </a>
        </li>
      </ul>
      <div class="sidebar-footer">
        <a href="{{ route('logout') }}" class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
    
    </aside>
    <div class="main p-3">
      <div class="text-center">
        <h1>
          Jabatan Penjara Malaysia
        </h1>
      </div>
    </div>
  </div>

  <script>
    const hamburger = document.querySelector('#toggle-btn');

    hamburger.addEventListener("click", function(){
      document.querySelector('#sidebar').classList.toggle("expand");
    });
  </script>
  {{-- <aside class="sidenav navbar navbar-vertical navbar-expand-xs fixed-start bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
        <span class="ms-1 font-weight-bold text-white" id="text">Jabatan Penjara</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="/home">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#" onclick="toggleDashboardList()">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">View KPI</span>
          </a>
          <fieldset id="dashboard-list" class="hidden">
            <legend>Sektor Keselamatan</legend>
            <ul id="keselamatan-list">
              <li>
                <input type="radio" id="keselamatan-inteligen" name="dashboard-option">
                <label for="keselamatan-inteligen"><a href="/KeselamatanKoreksional/PengurusanBanduan">Keselamatan Inteligen</a></label>
              </li>
              <li>
                <input type="radio" id="pengurusan-banduan" name="dashboard-option">
                <label for="pengurusan-banduan"><a href="/KeselamatanKoreksional/PengurusanBanduan">Pengurusan Banduan</a></label>
              </li>
              <li>
                <input type="radio" id="tahanan-radikal" name="dashboard-option">
                <label for="tahanan-radikal"><a href="/KeselamatanKoreksional/TahananRadikal">Banduan Tahanan Radikal</a></label>
              </li>
            </ul>
          </fieldset>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>
        </li>
      </ul>
    </div>
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Home</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Home</h6>
        </nav>
      </div>
    </nav>
  </main>
</body>--}}
@endsection
