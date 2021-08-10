<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>

{{-- @extends('layout') --}}

 {{-- @section('contents') --}}

<div class="container">
    <div class="col-10 offset-1 mt-4">
        @if( session()->has('error') === true )
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('auth.postLogin') }}">
            @csrf
            <section class="vh-100" style="background-color: #508bfc;">
                <div class="container py-5 h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                      <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
              
                          <h3 class="mb-5" style="color: black">Sign in</h3>
              
                          <div class="form-outline mb-4">
                            <input type="email" id="typeEmailX"  name="email" class="form-control form-control-lg" />
                            <label class="form-label" for="typeEmailX">Email</label>
                            @error('email')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
              
                          <div class="form-outline mb-4">
                            <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" />
                            <label class="form-label" for="typePasswordX">Password</label>
                            <div>
                              @error('password')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                          <!-- Checkbox -->
                          <div class="form-check d-flex justify-content-start mb-4">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              value=""
                              id="form1Example3"
                            />
                            <label class="form-check-label" for="form1Example3" style="color: gray"> Remember password </label>
                          </div>
              
                          <button class="btn btn-primary btn-lg btn-block">Login</button>
              
                          <hr class="my-4">
              
                          <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
                          <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;" type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>
              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
        </form>
    </div>
</div>
{{-- @endsection --}}

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>