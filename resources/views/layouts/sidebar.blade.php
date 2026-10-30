<aside class="main-sidebar sidebar-light-primary elevation-1">
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
        <img src="{{ url('gambar/logo/logo.jpg') }}" alt="REKA CODING" class="brand-image img-circle elevation-1">
        <span class="brand-text font-weight-light text-uppercase">{{ $profil->website }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-1 pb-2 mb-1 d-flex align-items-center">
            <div class="image">
                <img src="{{ url('gambar/logo/logo.jpg') }}" class="img-circle elevation-1" alt="User Image">
            </div>
            <div class="info">
                <a  href="#" class="d-block">{{ Auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('admin/dashboard') }}" class="nav-link {{ setActive('admin/dashboard') }}">
                        <i class="fas fa-chart-bar"></i>
                        <p> Dashboard <i class="fas fa-arrow-alt-circle-right right"></i></p>
                    </a>
                </li>
                
                <li class="nav-item {{ setOpen('user') . setOpen('role') . setOpen('permission') }}">
                   @can('Master Data')
                    <a  class="nav-link"><i class="fa fa-database"></i> <p> Master Data <i class="fas fa-arrow-alt-circle-down right"></i></p> </a>
                   @endcan
                    <ul class="nav nav-treeview">
                      @can('Master Kategori')
                        <li class="nav-item"> <a href="{{ url('admin/kategori') }}" class="nav-link {{ setActive('admin/kategori') }}"> <i class="fa fa-circle"></i> <p> Data Kategori </p> </a> </li>
                      @endcan
                      @can('Master Cara Bayar')
                        <li class="nav-item"> <a href="{{ url('admin/cara-bayar') }}" class="nav-link {{ setActive('min/cara-bayar') }}"> <i class="fa fa-circle"></i> <p> Metode Pembayaran </p> </a> </li>
                      @endcan
                      @can('Master Profil')
                        <li class="nav-item"> <a href="{{ url('admin/profil') }}" class="nav-link {{ setActive('admin/Profil') }}"> <i class="fa fa-cog"></i> <p> Data Profil </p> </a> </li>
                    @endcan
                    </ul>
                </li>

                
                <li class="nav-item {{ setOpen('user') . setOpen('role') . setOpen('permission') }}">
                    @can('Navigasi User')
                        <a  class="nav-link"><i class="fa fa-cog"></i> <p> Manajemen User <i class="fas fa-arrow-alt-circle-down right"></i></p> </a>
                    @endcan
                    <ul class="nav nav-treeview">
                        @can('Master Permission')
                        <li class="nav-item"> <a href="{{ url('admin/permission') }}" class="nav-link {{ setActive('admin/permission') }}"> <i class="fa fa-universal-access"></i> <p> Data Permission </p> </a> </li>
                        @endcan
                        @can('Master Role')
                        <li class="nav-item"> <a href="{{ url('admin/role') }}" class="nav-link {{ setActive('admin/role') }}"> <i class="fa fa-circle"></i> <p> Data Role / Hak Akses </p> </a> </li>
                        @endcan
                        @can('Master User')
                        <li class="nav-item"> <a href="{{ url('admin/user') }}" class="nav-link {{ setActive('admin/user') }}"> <i class="fa fa-users"></i> <p> Data User </p> </a> </li>
                        @endcan
                    </ul>
                </li>

                <li class="nav-item {{ setOpen('admin/produk') }}">
                    @can('Navigasi Produk')
                    <a class="nav-link"><i class="fa fa-code"></i> <p> Source Code <i class="fas fa-arrow-alt-circle-down right"></i></p></a>
                    @endcan
                    <ul class="nav nav-treeview">
                        @can('Master Produk')
                        <li class="nav-item"> <a href="{{ url('admin/produk') }}" class="nav-link {{ request()->is('admin/produk') ? 'active' : '' }}"> <i class="fa fa-circle"></i> <p> Daftar Produk </p> </a> </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item {{ setOpen('user') . setOpen('role') . setOpen('permission') }}">
                    @can('Navigasi Artikel')
                    <a  class="nav-link"><i class="fa fa-pen-nib"></i> <p> Blog  Artikel <i class="fas fa-arrow-alt-circle-down right"></i></p> </a>
                    @endcan
                    <ul class="nav nav-treeview">
                        @can('Master Artikel')
                        <li class="nav-item"> <a href="{{ url('admin/artikel') }}" class="nav-link {{ setActive('admin/artikel') }}"> <i class="fa fa-circle"></i> <p> Daftar Artikel </p> </a> </li>
                        @endcan
                    </ul>
                </li>

                <li class="nav-item {{ setOpen('user') . setOpen('role') . setOpen('permission') }}">
                    @can('Navigasi Layanan')
                    <a  class="nav-link"><i class="fa fa-spinner"></i> <p> Data Layanan <i class="fas fa-arrow-alt-circle-down right"></i></p> </a>
                    @endcan
                    <ul class="nav nav-treeview">
                        @can('Master Layanan')
                        <li class="nav-item"> <a href="{{ url('admin/layanan') }}" class="nav-link {{ setActive('admin/layanan') }}"> <i class="fa fa-circle"></i> <p> Daftar Layanan </p> </a> </li>
                        @endcan
                    </ul>
                </li>

                @can('Master Produk')
                <li class="nav-item {{ setOpen('user') . setOpen('role') . setOpen('permission') }}">
                    <a href="{{ url('admin/pembelian') }}" class="nav-link {{ setActive('admin/pembelian') }}">
                        <i class="fa fa-shopping-cart"></i>
                        <p> Pembelian </p>
                    </a>
                </li>
                @endcan

                <li class="nav-item {{ setOpen('user') . setOpen('role') . setOpen('permission') }}">
                    <a  class="nav-link"><i class="fa fa-comment"></i> <p> Pesan Kontak <i class="fas fa-arrow-alt-circle-down right"></i></p> </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ url('admin/') }}" class="nav-link {{ setActive('admin/artikel') }}"> <i class="fa fa-circle"></i> <p> Kotak Masuk (Inbox) </p> </a> </li>
                    </ul>
                </li>

                <li class="nav-item {{ setOpen('user') . setOpen('role') . setOpen('permission') }}">
                    <a  class="nav-link"><i class="fa fa-id-card"></i> <p> Pesanan / Transaksi <i class="fas fa-arrow-alt-circle-down right"></i></p> </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ url('admin/') }}" class="nav-link {{ setActive('admin/artikel') }}"> <i class="fa fa-circle"></i> <p> Kotak Masuk (Inbox) </p> </a> </li>
                    </ul>
                </li>

                <li class="nav-item {{ setOpen('user') . setOpen('role') . setOpen('permission') }}">
                    <a  class="nav-link"><i class="fa fa-th"></i> <p> Laporan <i class="fas fa-arrow-alt-circle-down right"></i></p> </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ url('admin/') }}" class="nav-link {{ setActive('admin/artikel') }}"> <i class="fa fa-circle"></i> <p> Kotak Masuk (Inbox) </p> </a> </li>
                    </ul>
                </li>

                <li class="nav-item {{ setOpen('user') . setOpen('role') . setOpen('permission') }}">
                    <a  class="nav-link"><i class="fa fa-rocket"></i> <p> Support System<i class="fas fa-arrow-alt-circle-down right"></i></p> </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ url('admin/') }}" class="nav-link {{ setActive('admin/artikel') }}"> <i class="fa fa-circle"></i> <p> Log Aktivitas  User</p> </a> </li>
                        <li class="nav-item"> <a href="{{ url('admin/') }}" class="nav-link {{ setActive('admin/artikel') }}"> <i class="fa fa-circle"></i> <p> FAQ / Bantuan </p> </a> </li>
                        <li class="nav-item"> <a href="{{ url('admin/') }}" class="nav-link {{ setActive('admin/artikel') }}"> <i class="fa fa-user-lock"></i> <p> Ganti Password </p> </a> </li>
                        <li class="nav-item"> <a href="{{ url('logout') }}" class="nav-link {{ setActive('logout') }}"> <i class="fa fa-sign-out-alt"></i> <p> Log Out </p> </a> </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
