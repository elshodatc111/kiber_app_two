<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>E-Qidruv</title>
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
        <span class="ms-1 text-sm text-dark">E-Qidruv</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    @include('layouts.menu')
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Qidruvdagi shaxslar</a></li>
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
    @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle me-1"></i>
              {{Session::get('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @elseif (Session::has('error'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle me-1"></i>
              {{Session::get('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif      
      <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <h6>Qidruvdagi shaxslar</h6>
              <div class="table-responsive p-0">
                <table class="table table-bordered text-center" border="1" style="font-size:10px;">
                    <tr>
                      <th>#</th>
                      <th>Hudud</th>
                      <th>Substance</th>
                      <th>FIO</th>
                      <th>Qidruv turi</th>
                      <th>Deleted</th>
                    </tr>
                    @forelse($Search as $item)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $item['name'] }}</td>
                      <td>{{ $item['substance'] }}</td>
                      <td>{{ $item['fio']}}</td>
                      <td>
                        @if($item['type']==1)
                          Rasmiy qidiruv
                        @else
                          Qidiruv bo'lishi kutilmoqda
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('search_show',$item['id']) }}" class="btn btn-primary m-0 py-0">show</a>
                      </td>
                    </tr>
                    @empty
                      <tr>
                        <td colspan=7 class="text-center">Qidruvdagi shaxslar mavjud emas.</td>
                      </tr>
                    @endforelse
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Yangi qidruv qo'shish</h6>
              <form action="{{ route('search_create') }}" method="post" enctype="multipart/form-data">
                @csrf 
                <label for="region_id">Hududni tanlang</label>
                <select name="region_id" required style="border:1px solid black" class="form-select">
                  <option value="">tanlang</option>
                  @foreach($Region as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                  @endforeach
                </select>
                <label for="fio">FIO</label>
                <input type="text" name="fio" required style="border: 1px solid black;" class="form-control">
                <label for="adress">Manzil</label>
                <input type="text" name="adress" required style="border: 1px solid black;" class="form-control">
                <label for="photo">Rasmi (JPG)</label>
                <input type="file" name="photo" required style="border: 1px solid black;" class="form-control">
                <label for="birthday">Tug'ilgan kuni</label>
                <input type="date" name="birthday" required style="border: 1px solid black;" class="form-control">
                <label for="substance">Substance</label>
                <select name="substance" required style="border:1px solid black" class="form-select">
                  <option value="">tanlang</option>
                  @foreach($Substance as $item)
                    <option value="{{ $item['substance'] }}">{{ $item['substance'] }}</option>
                  @endforeach
                </select>
                <label for="qyj">QYJ</label>
                <input type="text" name="qyj" required style="border: 1px solid black;" class="form-control">
                <label for="type">Qidruv turini tanlang</label>
                <select name="type" required style="border:1px solid black" class="form-select">
                  <option value="">tanlang</option>
                  <option value="1">Rasmiy qidiruv</option>
                  <option value="2">Qidiruv bo'lishi kutilmoqda</option>
                </select>
                <button class="btn btn-primary mt-2 w-100">Qidruvni saqlash</button>
              </form>
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