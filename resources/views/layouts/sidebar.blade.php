 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="{{'home' == request()->path() ? 'nav-link' : 'nav-link collapsed'}}" href="/home">
          <i class="bi bi-activity"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="{{'region' == request()->path() ? 'nav-link' : 'nav-link collapsed'}}" href="/region">
          <i class="bi bi-person"></i>
          <span>Admin</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->