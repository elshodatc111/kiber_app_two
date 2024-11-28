<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>E-Qidruv</title>
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
        <div class="col-lg-7 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-4">
                  <img src="../photo/{{ $Search['photo'] }}" style="width:100%">
                  <form action="{{ route('search_update_image') }}" method="post"  enctype="multipart/form-data">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $Search['id'] }}">
                    <input type="file" name="photo" required style="border:1px solid black" class="form-control mt-2">
                    <button class="btn btn-primary w-100">Rasmini yangilash</button>
                  </form>
                </div>
                <div class="col-8">
                  <h5>{{ $Search['fio'] }}</h5>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">Hudud: </b>{{ $Search['name'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">FIO: </b>{{ $Search['fio'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">Tug'ilgan kun: </b>{{ $Search['birthday'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">Manzil: </b>{{ $Search['adress'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">Substance: </b>{{ $Search['substance'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">QYJ: </b>{{ $Search['qyj'] }}</p>
                  <p class="mb-1 mt-0"><b class="m-0 p-0">Qidruv turi: </b>
                    @if($Search['type']==1)
                      Rasmiy qidiruv
                    @elseif($Search['type']==2) 
                      Qidiruv bo'lishi kutilmoqda
                    @else 
                      Qidruvdagi shaxs topildi
                    @endif
                  </p>
                  <form action="{{ route('search_delete') }}" method="post" style="display: inline;">
                    @csrf 
                    <input type="hidden" name="id" value="{{ $Search['id'] }}">
                    <button class="btn btn-danger m-0 py-0">Qidruvdagi shaxsni o'chirish</button>
                  </form>
                </div>
                <hr style="color:red">
                <hr>
                <div class="col-12">
                  <h6>Qidruvdagi shaxs haqida</h6>
                  <div class="table-responsive">
                  <table class="table table-bordered" style="font-size:12px;">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Qidruvdagi shaxs haqida</th>
                        <th>Hodim</th>
                        <th>Telefon raqam</th>
                        <th>Habar vaqti</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($Message as $item)
                      <tr class="m-0 p-0">
                        <td class="m-0 p-0">{{ $loop->index+1 }}</td>
                        <td class="m-0 p-0">{{ $item['text'] }}</td>
                        <td class="m-0 p-0">{{ $item['name'] }}</td>
                        <td class="m-0 p-0">{{ $item['phone'] }}</td>
                        <td class="m-0 p-0">{{ $item['created_at'] }}</td>
                      </tr>
                      @empty

                      @endforelse
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Qidruvdagi shaxs ma'lumotlarini yangilash</h6>
              <form action="{{ route('search_update') }}" method="post">
                @csrf 
                <input type="hidden" name="id" value="{{ $Search['id'] }}">
                <label for="region_id">Hudud</label>
                <select name="region_id" required style="border:1px solid black" class="form-select">
                  <option value="">tanlang</option>
                  @foreach($Region as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                  @endforeach
                </select>
                <label for="fio">FIO</label>
                <input type="text" name="fio" required value="{{ $Search['fio'] }}" style="border: 1px solid black;" class="form-control">
                <label for="adress">Manzil</label>
                <input type="text" name="adress" required value="{{ $Search['adress'] }}" style="border: 1px solid black;" class="form-control">
                <label for="birthday">Tug'ilgan haqida</label>
                <input type="date" name="birthday" required value="{{ $Search['birthday'] }}" style="border: 1px solid black;" class="form-control">
                <label for="substance">Substance</label>
                <select name="substance" required style="border:1px solid black" class="form-select">
                  <option value="">tanlang</option>
                  @foreach($Substance as $item)
                    <option value="{{ $item['substance'] }}">{{ $item['substance'] }}</option>
                  @endforeach
                </select>
                <label for="qyj">QYJ</label>
                <input type="text" name="qyj" value="{{ $Search['qyj'] }}" required style="border: 1px solid black;" class="form-control">
                <label for="type">Qidruv turi</label>
                <select name="type" required style="border:1px solid black" class="form-select">
                  <option value="">tanlang</option>
                  <option value="1">Rasmiy qidiruv</option>
                  <option value="2">Qidiruv bo'lishi kutilmoqda</option>
                  <option value="3">Qidruvdagi shaxs topildi</option>
                </select>
                <button class="btn btn-primary mt-2 w-100">O'zgarishlarni saqlash</button>
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