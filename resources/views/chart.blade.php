<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>
<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="index.html">
        <span class="ms-1 text-sm text-dark">Creative Tim</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('home') }}">
            <span class="nav-link-text ms-1">Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('region') }}">
            <span class="nav-link-text ms-1">Region</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('substance') }}">
            <span class="nav-link-text ms-1">Substance</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('search') }}">
            <span class="nav-link-text ms-1">Search</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('chart') }}">
            <span class="nav-link-text ms-1">Chart</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="nav-link-text ms-1">Log out</span>
          </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Search</a></li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav d-flex align-items-center  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid py-2">
      
      <div class="row mb-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <h6>All Search</h6>
              <div class="table-responsive p-0">
                <table class="table table-bordered text-center" border="1" style="font-size:10px;">
                    <tr>
                      <th>Region</th>
                      <th>Rasmiy qidiruvdagilar soni</th>
                      <th>Qidiruv bo’lishi kutilayotganlar</th>
                    </tr>
                    <tr>
                      <td>Qarshi shaxar</td>
                      <td>15</td>
                      <td>20</td>
                    </tr>

                    
                    <tr>
                      <th>Jami</th>
                      <th>15</th>
                      <th>20</th>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>