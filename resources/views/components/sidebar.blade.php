<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item"><a href="{{ request()->routeIs('admin*') ? route('admin.dashboard') : route('user.dashboard') }}"><i class="fas fa-home"></i><p>Dashboard</p></a></li>
                @if (request()->routeIs('admin*'))
                    <li class="nav-section"><span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span><h4 class="text-section">Master Data</h4></li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#akun"><i class="fas fa-book"></i><p>Daftar Akun</p><span class="caret"></span></a>
                        <div class="collapse" id="akun">
                            <ul class="nav nav-collapse">
                                <li><a href="{{ route('admin.coa.index') }}"><span class="sub-item">Daftar Akuntansi</span></a></li>
                                <li><a href="{{ route('admin.coa-detail.index') }}"><span class="sub-item">Daftar Rincian Akuntansi</span></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{ route('admin.user.index') }}"><i class="fas fa-user"></i><p>Daftar User</p></a></li>
                @endif

                @if (!(request()->routeIs('admin*')))
                    <li class="nav-section"><span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span><h4 class="text-section">Master Data</h4></li>
                    <li class="nav-item"><a href="{{ route('user.coa.index')  }}"><i class="fas fa-book"></i><p>Daftar Akun</p></a></li>
                    <li class="nav-item"><a href="{{ route('user.item.index')  }}"><i class="fas fa-cubes"></i><p>Daftar Barang</p></a></li>

                    <li class="nav-section"><span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span><h4 class="text-section">Transaksi</h4></li>
                    <li class="nav-item"><a href="{{ route('user.purchase.index') }}"><i class="fas fa-coins"></i><p>Pembelian</p></a></li>
                    <li class="nav-item"><a href="{{ route('user.sale.index') }}"><i class="fas fa-receipt"></i><p>Penjualan</p></a></li>
                    <li class="nav-item"><a href="{{ route('user.cash-payment.index') }}"><i class="fas fa-piggy-bank"></i><p>Pengeluaran Kas</p></a></li>
                    <li class="nav-item"><a href="{{ route('user.cash-receipt.index') }}"><i class="fas fa-hand-holding-usd"></i><p>Penerimaan Kas</p></a></li>

                    <li class="nav-section"><span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span><h4 class="text-section">Laporan</h4></li>
                    <li class="nav-item"><a href="{{ route('user.general-entry.index') }}"><i class="fas fa-bookmark"></i><p>Jurnal Umum</p></a></li>
                    <li class="nav-item"><a href="#" id="filterButtonLR" data-toggle="modal" data-target="#printModalLR"><i class="fas fa-chart-line"></i><p>Laporan Laba Rugi</p></a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
