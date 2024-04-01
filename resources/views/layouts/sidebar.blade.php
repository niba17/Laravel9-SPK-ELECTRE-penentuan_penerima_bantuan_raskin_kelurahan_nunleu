<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-center">
                    <a href="/home" class="text-nowrap logo-img">
                        {{-- <img src="{{ asset('template') }}/src/assets/images/logos/dark-logo.svg" width="180"
                            alt="" /> --}}
                        <span class="h2">SPK </span> <span class="h1" style="color:#174FEB;"> |
                        </span>
                        <span class="h2" style="color:#49BEFF;"> ELECTRE</span>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Dashboard</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (Request::route()->getName() == 'home') active @endif" href="/home"
                                aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-house ms-1"></i>
                                </span>
                                <span class="hide-menu">Home</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Data</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (Request::route()->getName() == 'akun' ||
                                    Request::route()->getName() == 'akun-add' ||
                                    Request::route()->getName() == 'akun-edit') active @endif" href="/akun"
                                aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-user ms-1"></i>
                                </span>
                                <span class="hide-menu">Akun</span>
                            </a>
                        </li>
                        {{-- <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">UI COMPONENTS</span>
                        </li> --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (Request::route()->getName() == 'kriteria_sub_kriteria' ||
                                    Request::route()->getName() == 'kriteria_sub_kriteria-add' ||
                                    Request::route()->getName() == 'kriteria_sub_kriteria-edit' ||
                                    Request::route()->getName() == 'kriteria-add' ||
                                    Request::route()->getName() == 'kriteria-edit' ||
                                    Request::route()->getName() == 'sub_kriteria-add' ||
                                    Request::route()->getName() == 'sub_kriteria-edit') active @endif"
                                href="/kriteria_sub_kriteria" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-gear ms-1"></i>
                                </span>
                                <span class="hide-menu">Kriteria & Sub Kriteria</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (Request::route()->getName() == 'penduduk_sub_kriteria' ||
                                    Request::route()->getName() == 'penduduk_sub_kriteria-set' ||
                                    Request::route()->getName() == 'penduduk-add' ||
                                    Request::route()->getName() == 'penduduk-edit') active @endif"
                                href="/penduduk_sub_kriteria" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-user-gear ms-1"></i>
                                </span>
                                <span class="hide-menu">Penduduk & Sub Kriteria</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (Request::route()->getName() == 'perhitungan-hasil') active @endif" href="#"
                                onclick="perhitungan()" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-user-gear ms-1"></i>
                                </span>
                                <span class="hide-menu">Perhitungan</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-item">
                            <a class="sidebar-link" href="/kecamatan_kelurahan" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-location-dot ms-1"></i>
                                </span>
                                <span class="hide-menu">Kecamatan & Kelurahan</span>
                            </a>
                        </li> --}}
                    </ul>
                    {{-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
                        <div class="d-flex">
                            <div class="unlimited-access-title me-3">
                                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/"
                                    target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
                            </div>
                            <div class="unlimited-access-img">
                                <img src="{{ asset('template') }}/src/assets/images/backgrounds/rocket.png"
                                    alt="" class="img-fluid">
                            </div>
                        </div>
                    </div> --}}
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
