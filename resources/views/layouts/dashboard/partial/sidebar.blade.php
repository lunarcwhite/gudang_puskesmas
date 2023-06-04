<div class="te-sidenav te-active">
    <div class="te-sidenav-content p-1 bg-light">
        <!-- start sidenav content -->
        <div class="container-fluid text-center py-2">
            <a class="fs-4 text-nowrap text-dark text-decoration-none" href="https://github.com/mteguhpro/pagistrap">
                P<span class="text-menu">agi</span>s<span class="text-menu">trap</span>
            </a>
        </div>
        <div class="nav nav-pills flex-column">

            <!-- divider-->
            <a class="nav-link text-nowrap bg-transparent text-dark" href="{{ route('dashboard.') }}"><i
                    class="bi bi-house-door-fill"></i><span class="text-menu"> Home</span></a>
            <div class="border-top border-dark border-opacity-25 mt-3 mb-1">
                <p class="text-menu text-opacity-50 font-monospace text-nowrap bg-transparent text-dark fw-lighter">
                    Master Data
                </p>
            </div>
            <a class="nav-link text-nowrap bg-transparent text-dark" href="{{ route('dashboard.kategori.index') }}"><i class="bi bi-tags"></i><span class="text-menu"> Kategori</span></a>
            <a class="nav-link text-nowrap bg-transparent text-dark" href="{{ route('dashboard.obat.index') }}"><i class="bi bi-capsule-pill"></i><span class="text-menu"> Obat</span></a>
            <div class="border-top border-dark border-opacity-25 mt-3 mb-1">
                <p class="text-menu text-opacity-50 font-monospace text-nowrap bg-transparent text-dark fw-lighter">
                    Laporan
                </p>
            </div>
            <a class="nav-link text-nowrap bg-transparent text-dark" href="{{ route('dashboard.rekapan.index') }}"><i class="bi bi-clock-history"></i><span class="text-menu"> Rekapan Obat</span></a>
        </div>
        <!-- end sidenav content -->
    </div>
</div>
