<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">Inova Hospital</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('/') ? 'active bg-success rounded text-white' : '' }}" aria-current="page" href="/">
            <i class="bi bi-house"></i>
            Dashboard
          </a>
        </li>
        {{-- Pendaftaran Pasien --}}
        @canany(['admin', 'petugas'])
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('pendaftaranPasien/*') ? 'active bg-success rounded text-white' : '' }}" data-bs-toggle="collapse" href="#settingsMenu" role="button" aria-expanded="false" aria-controls="settingsMenu">
            <i class="bi bi-patch-plus"></i>
            Pendaftaran Pasien
          </a>
          <div class="collapse" id="settingsMenu">
            <ul class="nav flex-column ms-3">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/pendaftaranPasien">
                  <i class="bi bi-person"></i>
                  Daftar Pasien
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/kunjungan">
                  <i class="bi bi-capsule"></i>
                  Daftar Kunjungan
                </a>
              </li>
            </ul>
          </div>
        </li>   
        @endcanany
        @canany(['admin', 'dokter'])
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('tindakan/*') ? 'active bg-success rounded text-white' : '' }}" data-bs-toggle="collapse" href="#settingsMenu" role="button" aria-expanded="false" aria-controls="settingsMenu">
            <i class="bi bi-capsule"></i>
            Tindakan & Obat
          </a>
          <div class="collapse" id="settingsMenu">
            <ul class="nav flex-column ms-3">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/tindakan">
                  <i class="bi bi-person"></i>
                  Tindakan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/obat">
                  <i class="bi bi-capsule"></i>
                  Obat
                </a>
              </li>
            </ul>
          </div>
        </li>    
        @endcanany
        @canany(['admin', 'kasir'])
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('pembayaran') ? 'active bg-success rounded text-white' : '' }}" href="/pembayaran">
            <i class="bi bi-cash"></i>
            Pembayaran
          </a>
        </li>      
        @endcanany
        @canany('admin')
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('pegawai/*') ? 'active bg-success rounded text-white' : '' }}" href="/pegawai">
            <i class="bi bi-database"></i>
            Data Pegawai
          </a>
        </li>     
        @endcanany
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('profil') ? 'active bg-success rounded text-white' : '' }}" data-bs-toggle="collapse" href="#settingsMenu" role="button" aria-expanded="false" aria-controls="settingsMenu">
              <i class="bi bi-gear"></i>
              Pengaturan
            </a>
            <div class="collapse" id="settingsMenu">
              <ul class="nav flex-column ms-3">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" href="/profil">
                    <i class="bi bi-person"></i>
                    Profil
                  </a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link d-flex align-items-center gap-2 text-danger"><i class="bi bi-box-arrow-right"></i>Logout</button>
                    </form>
                </li>
              </ul>
            </div>
        </li>              
      </ul>
    </div>
  </div>
</div>
