@include('layouts.header')

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              {{-- <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo --> --}}

              <div class="card mb-3 pb-2 pt-4">

                <div class="card-body">
                  {{-- @if (session()->has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success') }}    
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif --}}
                  {{-- @if (session()->has('loginError'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ session('loginError') }}    
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif --}}
                 
                  <div class="pt-4 pb-5 mt-3">
                    <div class="d-flex justify-content-center">
                      <img src="/img/lp.svg" alt="Dinas Perkebunan" style="width: 90px">
                    </div>
                  </div>

                  <form class="row g-3 needs-validation" action="/login" method="post">
                    @csrf

                    <div class="col-12">
                      <label for="email" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control" id="email" autofocus required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    {{-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> --}}
                    <div class="col-12">
                      <button class="p-2 btn btn-success w-100 text-white mt-2" type="submit">Login</button>
                    </div>
                    {{-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a class="text-success" href="/register">Create an account</a></p>
                    </div> --}}
                  </form>

                </div>
              </div>

              {{-- <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div> --}}

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

 {{-- @include('layouts.footer') --}}