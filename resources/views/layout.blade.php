<style>
.vertical-nav {
  min-width: 17rem;
  width: 17rem;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
  transition: all 0.4s;
}
.page-content {
  width: calc(100% - 17rem);
  margin-left: 17rem;
  transition: all 0.4s;
}
#sidebar.active {
  margin-left: -17rem;
}
#content.active {
  width: 100%;
  margin: 0;
}
@media (max-width: 768px) {
  #sidebar {
    margin-left: -17rem;
  }
  #sidebar.active {
    margin-left: 0;
  }
  #content {
    width: 100%;
    margin: 0;
  }
  #content.active {
    margin-left: 17rem;
    width: calc(100% - 17rem);
  }
}
body {
  background: white;
  min-height: 100vh;
  overflow-x: hidden;
}
.separator {
  margin: 3rem 0;
  border-bottom: 1px dashed #fff;
}
.text-uppercase {
  letter-spacing: 0.1em;
}
.text-gray {
  color: #aaa;
}
</style>
<!--important link source from "https://bootstrapious.com/p/bootstrap-vertical-navbar"-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="row">
  <!-- Header -->
  <div class="col-12">
          <div class="pull-right" style="float: right; margin-right:20px;">
            @if(Auth::check())
                {{Auth::user()->email}}
            @endif
              @auth
                  <a class="btn btn-success" href="{{ route('auth.logout') }}" class="btn btn-default">Logout</a>
              @endauth
          </div>
  </div>
{{-- sidebar --}}
@include('sidebar')
{{-- end sidebar --}}
<div class="page-content p-5" id="content">
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"> Menu</small></button>
  <div class="separator"></div>
  <div class="row text-white">
    <div class="col-lg-12">
        {{-- nội dung --}}
        @yield('contents')
        {{-- end nội dung --}}
    </div>
  </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
$(function() {
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});
</script>
@stack('script')
