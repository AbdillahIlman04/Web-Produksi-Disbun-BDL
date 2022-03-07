 <!-- ======= Navbar ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <div class="box">
        <i class="bi bi-list toggle-sidebar-btn me-3 text-white"></i>
      </div>
      <a href="/home" class="logo d-flex align-items-center ms-3">
        {{-- <img src="/img/logo.png" alt=""> --}}
        <img src="/img/lp.svg" alt="Dinas Perkebunan" style="width: 30px">
        <span class="d-none d-lg-block">Produksi Disbun</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" id="navbarDropdownUserImage">
            <span class="d-none d-md-block dropdown-toggle ps-2 me-3">{{ Auth::user()->name }}</span>
            @if (Auth::user()->profile != NULL)
            <img class="rounded-circle" alt="Profile" src="{{ Storage::url(Auth::user()->profile) }}" />
            @else
            <img class="rounded-circle" alt="Profile" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" />
            @endif
          </a><!-- End Profile Iamge Icon -->
 
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
               @if (Auth::user()->profile != NULL)
            <img class="rounded-circle" alt="Profile" src="{{ Storage::url(Auth::user()->profile) }}" />
            @else
            <img class="rounded-circle" alt="Profile" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" />
            @endif
              <h6 class="mt-1">
               <span>{{ Auth::user()->name }}</span> <br>
              </h6>
              <span>{{ Auth::user()->email }}</span>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Navbar -->