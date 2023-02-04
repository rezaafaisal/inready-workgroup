@php
    $data = [
    'article' => App\Models\Article::all()->count(),
    'article_category' => App\Models\ArticleCategory::all()->count(),
    'question' => App\Models\Question::all()->count(),
    'user' => App\Models\Patient::all()->count(),
    'talkshow' => App\Models\Talkshow::all()->count()
    ];
@endphp
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
        data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item {{ ($active == 'dashboard') ? 'menu-item-active' : '' }}"
                aria-haspopup="true">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <i class="menu-icon fa-brands fa-hive"></i>
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="menu-section">
                <h4 class="menu-text">Custom</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            @if(Auth::user()->role->name == 'superadmin')
                <li class="menu-item {{ ($active == 'pengelola') ? 'menu-item-active' : '' }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('manager') }}" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <i class="menu-icon fas fa-user-gear"></i>
                        </span>
                        <span class="menu-text">Pengelola</span>
                    </a>
                </li>
                <li class="menu-item {{ ($active == 'pasien') ? 'menu-item-active' : '' }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{ route('patient') }}" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <i class="menu-icon fas fa-user-tag"></i>
                        </span>
                        <span class="menu-text">Pengguna</span>
                        <span class="menu-label">
                            <span
                                class="label label-rounded label-primary">{{ $data['user'] }}</span>
                        </span>
                    </a>
                </li>
            @endif
            <li class="menu-item menu-item-submenu {{ ($active == 'penyakit' || $active == 'pertanyaan' || $active == 'gambar-penyakit') ? 'menu-item-active menu-item-open' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon fas fa-stethoscope"></i>
                    <span class="menu-text">Diagnosa</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ ($active == 'penyakit') ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('disease') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Penyakit</span>
                            </a>
                        </li>
                        <li class="menu-item {{ ($active == 'gambar-penyakit') ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('disease_image') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Gambar Penyakit</span>
                            </a>
                        </li>
                        <li class="menu-item {{ ($active == 'pertanyaan') ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('question') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Pertanyaan Diagnosa</span>
                                <span class="menu-label">
                                    <span
                                        class="label label-rounded label-primary">{{ $data['question'] }}</span>
                                </span>
                            </a>
                        </li>
                        <li class="menu-item {{ ($active == 'catatan') ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('note') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Catatan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu {{ ($active == 'artikel' || $active == 'kategori artikel') ? 'menu-item-active menu-item-open' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon fas fa-newspaper"></i>
                    <span class="menu-text">Artikel</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ ($active == 'kategori artikel') ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('article_categories') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Kategori Artikel</span>
                                <span class="menu-label">
                                    <span
                                        class="label label-rounded label-primary">{{ $data['article_category'] }}</span>
                                </span>
                            </a>
                        </li>
                        <li class="menu-item {{ ($active == 'artikel') ? 'menu-item-active' : '' }}"
                            aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route('articles') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Lihat Artikel</span>
                                <span class="menu-label">
                                    <span
                                        class="label label-rounded label-primary">{{ $data['article'] }}</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item {{ ($active == 'talkshow') ? 'menu-item-active' : '' }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('talkshow') }}" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <i class="menu-icon fas fa-user-tag"></i>
                    </span>
                    <span class="menu-text">Talkshow</span>
                    <span class="label label-rounded label-primary">{{ $data['talkshow'] }}</span>
                </a>
            </li>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
