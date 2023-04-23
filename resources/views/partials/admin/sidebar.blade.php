@php
	$type = App\Http\Controllers\Admin\Ledger\DocumentController::type();
@endphp
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
        data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item {{ ($active=='dashboard')?'menu-item-active':'' }}"
                aria-haspopup="true">
                <a href="{{ route('admin.home') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="menu-icon fa-brands fa-hive"></i>
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="menu-section">
                <h4 class="menu-text">Manajemen</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item {{ ($active=='user')?'menu-item-active':'' }}"
                aria-haspopup="true">
                <a href="{{ route('admin.pengguna.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="menu-icon fas fa-users"></i>
                    </span>
                    <span class="menu-text">Pengguna</span>
                </a>
            </li>
            <li class="menu-item {{ ($active=='generation')?'menu-item-active':'' }}"
                aria-haspopup="true">
                <a href="{{ route('admin.generation.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="menu-icon fas fa-layer-group"></i>
                    </span>
                    <span class="menu-text">Periode Angkatan</span>
                </a>
            </li>
            <li class="menu-item {{ ($active=='note')?'menu-item-active':'' }}"
                aria-haspopup="true">
                <a href="{{ route('admin.note.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="menu-icon fas fa-pen"></i>
                    </span>
                    <span class="menu-text">Catatan di Aplikasi</span>
                </a>
            </li>
            {{-- <li class="menu-item {{ ($active=='')?'menu-item-active':'' }}"
                aria-haspopup="true">
                <a href="" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="menu-icon fas fa-users-gear"></i>
                    </span>
                    <span class="menu-text">Pengurus Harian</span>
                </a>
            </li> --}}
            <li class="menu-item menu-item-submenu {{ ($active == 'elder' || $active == 'dpo' || $active == 'bph' || $active == 'bpo') ? 'menu-item-open' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon fas fa-users-gear"></i>
                    <span class="menu-text">Struktur Organisasi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ ($active == 'elder') ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('admin.structure.elder.index') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Pembina</span>
                            </a>
                        </li>
                        <li class="menu-item {{ ($active == 'dpo') ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('admin.structure.dpo.index') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">DPO</span>
                            </a>
                        </li>
                        <li class="menu-item {{ ($active == 'bph') ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('admin.structure.bph.index') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Pengurus Harian</span>
                            </a>
                        </li>
                        <li class="menu-item {{ ($active == 'bpo') ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('admin.structure.bpo.index') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Pengurus Organisasi</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu {{ ($active == $type[1] || $active == $type[0] || $active == $type[2] || $active == 'history') ? 'menu-item-open' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon fas fa-book"></i>
                    <span class="menu-text">Buku Besar</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ ($active == 'history') ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('admin.ledger.history.index') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Sejarah</span>
                            </a>
                        </li>
                        <li class="menu-item {{ ($active == $type[0]) ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('admin.ledger.document.index', ['type' => $type[0]]) }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">AD-ART</span>
                            </a>
                        </li>
                        <li class="menu-item {{ ($active == $type[1]) ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('admin.ledger.document.index', ['type' => $type[1]]) }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">JUKLAT-JUKNIS</span>
                                <span class="menu-label">
                                    {{-- <span class="label label-rounded label-primary"></span> --}}
                                </span>
                            </a>
                        </li>
                        <li class="menu-item {{ ($active == $type[2]) ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('admin.ledger.document.index', ['type' => $type[2]]) }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">GBHO</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
