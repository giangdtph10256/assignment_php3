
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{route('front_end.index')}}">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Giới thiệu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('shop')}}">Shop</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      <div class="d-flex align-items-center">
          <div class="container" style="float: right; width:450px;">
              <form action="{{ route('search.product') }}" method="GET">
                  <div style="display: flex">                
                              <input class="form-control d-inline" placeholder="Nhập từ khóa ..." type="text" name="keyword" value="{{ old('keyword') }}" />
                              <button class="btn btn-primary">Tìm kiếm</button>
                  </div>
              </form>
          </div>


        <!-- Icon -->
        <a class="text-reset me-3" href="">
          <i class="fas fa-shopping-cart"></i>
        </a>
        <a
        class="dropdown-toggle d-flex align-items-center hidden-arrow"
        href="#"
        id="navbarDropdownMenuLink"
        role="button"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
        style="margin-right: 20px; text-decoration:none;color:black"
      >
      @if(Auth::check())
      <span class="rounded-circle">
        {{Auth::user()->email}}
      </span>
      @endif
      <a href="{{route('auth.getLoginForm')}}">
        <img
        src="https://mdbootstrap.com/img/new/avatars/2.jpg"
        class="rounded-circle"
        height="25"
        alt=""
        loading="lazy"
      />
      </a>
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="navbarDropdownMenuLink"
      >
        {{-- <li>
          <a class="dropdown-item" href="#">My profile</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Settings</a>
        </li> --}}
        <li>
          <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
        </li>
      </ul>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->