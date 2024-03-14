@extends('layout')
@section('title', 'Home')
@section('body')
<link rel="stylesheet" href="{{ asset('css/material-dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/material-dashboard.css.map') }}">
<link rel="stylesheet" href="{{ asset('css/material-dashboard.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/nucleo-icons.css') }}">
<link rel="stylesheet" href="{{ asset('css/nucleo-svg.css') }}">

{{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
        </ul>
        <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Logout</button>
        </form>
      </div>
    </div>
</nav> --}}
<style>
  .hidden {
    display: none;
  }

  .navbar-nav{
    color: white;
  }
</style>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <span class="ms-1 font-weight-bold text-white" id="text">Jabatan Penjara</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link text-white" href="#" onclick="toggleDashboardList()">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">dashboard</i>
                  </div>
                  <span class="nav-link-text ms-1">View KPI</span>
              </a>
              <ul id="dashboard-list" class="hidden">
                  <li>Keselamatan Inteligen</li>
                  <li>Banduan</li>
              </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link text-white" href="../pages/tables.html">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">table_view</i>
                  </div>
                  <span class="nav-link-text ms-1">Profile</span>
              </a>
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
  
  <script>
      function toggleDashboardList() {
          var dashboardList = document.getElementById('dashboard-list');
          dashboardList.classList.toggle('hidden');
      }
  </script>
  
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
    <!-- End Navbar -->
    <div class="container">
      <h1> Welcome, {{ Auth::user()->name }}</h1>
    </div>

    <div class="container">
      <div class="box" onclick="window.location.href='/KeselamatanKoreksional/index'">Keselamatan dan Koreksional</div>
      <div class="box" onclick="window.location.href='/page2'">Box 2</div>
      <div class="box" onclick="window.location.href='/page3'">Box 3</div>
    </div>


    <div class="container-fluid py-4">
      <div class="row min-vh-80 h-100">
        <div class="col-12">
          
        </div>
    </div>
  </div>
  </main>
  
  


@endsection