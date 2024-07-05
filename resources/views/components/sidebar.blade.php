<!-- Sidebar -->
<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <span
                        class="avatar-title rounded-circle border border-white">{{ substr(Auth::user()->nama, 0, 2) }}</span>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->nama }}
                            <span class="user-level">{{ Auth::user()->email }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            {{-- <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ url('setting') }}">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item {{ $title === 'Dashboard' ? 'active' : '' }}">
                    <a href="{{ url('/') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (auth()->user()->hasAnyRole(['superadmin', 'admin']))
                    <li class="nav-item {{ $title === 'Data Master' ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#forms">
                            <i class="fas fa-layer-group"></i>
                            <p>Data Master</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ $title === 'Data Master' ? 'show' : '' }}" id="forms">
                            <ul class="nav nav-collapse">
                                <li class="{{ $title === 'Data Master' && $subtitle === 'Barang' ? 'active' : '' }}">
                                    <a href="{{ url('master/barang') }}">
                                        <span class="sub-item">Barang</span>
                                    </a>
                                </li>
                                <li class="{{ $title === 'Data Master' && $subtitle === 'Vendor' ? 'active' : '' }}">
                                    <a href="{{ url('master/vendor') }}">
                                        <span class="sub-item">Vendor</span>
                                    </a>
                                </li>

                                <li class="{{ $title === 'Data Master' && $subtitle === 'Customer' ? 'active' : '' }}">
                                    <a href="{{ url('master/customer') }}">
                                        <span class="sub-item">Customer</span>
                                    </a>
                                </li>
                                <li class="{{ $title === 'Data Master' && $subtitle === 'Kategori' ? 'active' : '' }}">
                                    <a href="{{ url('master/kategori') }}">
                                        <span class="sub-item">Kategori</span>
                                    </a>
                                </li>
                                <li class="{{ $title === 'Data Master' && $subtitle === 'Satuan' ? 'active' : '' }}">
                                    <a href="{{ url('master/satuan') }}">
                                        <span class="sub-item">Satuan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                <li class="nav-item {{ $title === 'Gudang' ? 'active' : '' }}">
                    <a href="{{ url('rak') }}">
                        <i class="fas fa-table"></i>
                        <p>Data Gudang</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('barangmasuk/*') || Request::is('barangmasuk') ? 'active' : '' }}">
                    <a href="{{ url('barangmasuk') }}">
                        <i class="fas fa-truck-loading"></i>
                        <p>Barang Masuk</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ Request::is('barangkeluar/*') || Request::is('barangkeluar') ? 'active' : '' }}">
                    <a href="{{ url('barangkeluar') }}">
                        <i class="fas fa-truck-moving"></i>
                        <p>Barang Keluar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
