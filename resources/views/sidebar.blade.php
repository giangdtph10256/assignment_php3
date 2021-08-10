<div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light"></div>
  
    {{-- <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Menu quản trị</p> --}}
  
    <ul class="nav flex-column bg-white mb-0">
      {{-- <li class="nav-item">
        <a href="/layout" class="nav-link text-dark font-italic bg-light">
                  <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                  Home
              </a>
      </li> --}}
      <li class="nav-item">
        <a href="{{route('admin.users.index')}}" class="nav-link text-dark font-italic">
                  <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                  User
              </a>
      </li>
      <li class="nav-item">
        <a href="{{route('admin.categories.index')}}" class="nav-link text-dark font-italic">
                  <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                  Category
              </a>
      </li>
      <li class="nav-item">
        <a href="{{route('admin.products.index')}}" class="nav-link text-dark font-italic">
                  <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                  Product
              </a>
      </li>
    </ul>
  </div>