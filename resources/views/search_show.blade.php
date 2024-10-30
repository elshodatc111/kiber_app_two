<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
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
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header">
              <h6>Search Person</h6>
              <div class="row">
                <div class="col-4">
                  <img src="../photo/{{ $Search['photo'] }}" style="width:100%">
                  <form action="{{ route('search_update_image') }}" method="post"  enctype="multipart/form-data">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $Search['id'] }}">
                    <input type="file" name="photo" required style="border:1px solid black" class="form-control mt-2">
                    <button class="btn btn-primary w-100">Update Photo</button>
                  </form>
                </div>
                <div class="col-4">
                  <h5>{{ $Search['fio'] }}</h5>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">Region: </b>{{ $Search['name'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">FIO: </b>{{ $Search['fio'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">Birthday: </b>{{ $Search['birthday'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">Address: </b>{{ $Search['adress'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">Substance: </b>{{ $Search['substance'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">QYJ time: </b>{{ $Search['qyj'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">Type: </b>
                    @if($Search['type']==1)
                      Rasmiy qidiruv
                    @else 
                      Qidiruv bo'lishi kutilmoqda
                    @endif
                  </p>
                  <form action="{{ route('search_delete') }}" method="post" style="display: inline;">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $Search['id'] }}">
                    <button class="btn btn-danger m-0 py-0">delete</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Update Search</h6>
              <form action="{{ route('search_update') }}" method="post">
                @csrf 
                <input type="hidden" name="id" value="{{ $Search['id'] }}">
                <label for="region_id">Region</label>
                <select name="region_id" required style="border:1px solid black" class="form-select">
                  <option value="">choose</option>
                  @foreach($Region as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                  @endforeach
                </select>
                <label for="fio">FIO</label>
                <input type="text" name="fio" required value="{{ $Search['fio'] }}" style="border: 1px solid black;" class="form-control">
                <label for="adress">Address</label>
                <input type="text" name="adress" required value="{{ $Search['adress'] }}" style="border: 1px solid black;" class="form-control">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" required value="{{ $Search['birthday'] }}" style="border: 1px solid black;" class="form-control">
                <label for="substance">Substance</label>
                <select name="substance" required style="border:1px solid black" class="form-select">
                  <option value="">choose</option>
                  @foreach($Substance as $item)
                    <option value="{{ $item['substance'] }}">{{ $item['substance'] }}</option>
                  @endforeach
                </select>
                <label for="qyj">QYJ time</label>
                <input type="text" name="qyj" value="{{ $Search['qyj'] }}" required style="border: 1px solid black;" class="form-control">
                <label for="type">Type</label>
                <select name="type" required style="border:1px solid black" class="form-select">
                  <option value="">choose</option>
                  <option value="1">Rasmiy qidiruv</option>
                  <option value="2">Qidiruv bo'lishi kutilmoqda</option>
                </select>
                <button class="btn btn-primary mt-2 w-100">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>