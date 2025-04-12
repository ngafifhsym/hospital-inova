<header class="navbar sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Inova Hospital</a>
    <div class="marquee-container justify-content-center d-flex align-items-center">
      <p class="marquee-text justify-content-center d-flex align-items-center"><img src="img/logoinova.png" alt="Logo Inova" width="8%" class="mr-1">Selamat datang  {{ auth()->user()->name }}  Sebagai  {{ auth()->user()->role }}</p>
    </div>
    <ul class="navbar-nav flex-row d-md-none">
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="bi"><use xlink:href="#list"/></svg>
        </button>
      </li>
    </ul>
  
    <div id="navbarSearch" class="navbar-search w-100 collapse">
      <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div>
  </header>