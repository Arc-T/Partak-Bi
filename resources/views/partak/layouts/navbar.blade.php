<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                            </path>
                        </svg>
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input me-0" type="checkbox" id="toggle-dark"
                                style="cursor: pointer">
                            <label class="form-check-label"></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                            height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                    opacity=".3"></path>
                                <g transform="translate(-210 -1)">
                                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                    <circle cx="220.5" cy="11.5" r="4"></circle>
                                    <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="header-top-left">
                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown"
                        class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2">
                            <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Avatar" />
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name">Partak</h6>
                            <p class="user-dropdown-status text-sm text-muted">
                                Admin
                            </p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        <li><a class="dropdown-item" href="#">اکانت من</a></li>
                        <li><a class="dropdown-item" href="#">تنظیمات</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <form method="POST" action="{{ route('partak.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">خروج</button>
                            </form>
                            {{-- <a class="dropdown-item" href="{{ route('partak.logout') }}">Logout</a> --}}
                        </li>
                    </ul>
                </div>
                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item">
                    <a href="{{ route('partak.dashboard') }}" class="menu-link">
                        <span><i class="bi bi-grid-fill"></i> داشبورد</span>
                    </a>
                </li>

                <li class="menu-item has-sub">
                    <a href="#" class="menu-link">
                        <span><i class="bi bi-file-earmark-medical-fill"></i> مدیریت شرکت ها </span>
                    </a>
                    <div class="submenu">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">

                                <li class="submenu-item">
                                    <a href={{ route('partak.companies.index') }} class="submenu-link">لیست شرکت ها </a>
                                </li>

                                <li class="submenu-item">
                                    <a href="{{ route('partak.companies.create') }}" class="submenu-link">ثبت شرکت جدید</a>
                                </li>

                                <li class="submenu-item has-sub">
                                    <a href="#" class="submenu-link">پایگاه داده
                                        شرکتها</a>

                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">
                                        <li class="subsubmenu-item">
                                            <a href="{{ route('partak.companies-database.index') }}" class="subsubmenu-link">لیست
                                                پایگاه داده ها</a>
                                        </li>

                                        <li class="subsubmenu-item">
                                            <a href="{{ route('partak.companies-database.create') }}" class="subsubmenu-link">ثبت
                                                پایگاه داده</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item has-sub">
                    <a href="#" class="menu-link">
                        <span><i class="bi bi-stack"></i>
                            مدیریت شاخص ها</span>
                    </a>
                    <div class="submenu">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                {{-- <li class="submenu-item">
                                    <a href="{{ route('partak.indicator_group.list') }}" class="submenu-link">لیست
                                        گروه
                                        شاخص ها</a>
                                </li> --}}

                                <li class="submenu-item">
                                    <a href="{{ route('partak.indicators.index') }}" class="submenu-link">لیست شاخص
                                        ها</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="{{ route('partak.indicators.create') }}" class="submenu-link">ثبت
                                        شاخص
                                        جدید
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item has-sub">
                    <a href="#" class="menu-link">
                        <span><i class="bi-grid-1x2-fill"></i>
                            گروه شرکت ها</span>
                    </a>
                    <div class="submenu">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">

                                <li class="submenu-item">
                                    <a href="{{ route('partak.companies-group.index') }}" class="submenu-link">لیست گروه
                                        شرکت </a>
                                </li>

                                <li class="submenu-item">
                                    <a href="{{ route('partak.companies-group.create') }}"
                                        class="submenu-link">ثبت
                                        گروه شرکت جدید</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item has-sub">
                    <a href="#" class="menu-link">
                        <span><i class="bi bi-person-fill"></i>
                            مدیریت کاربران</span>
                    </a>
                    <div class="submenu">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">

                                <li class="submenu-item">
                                    <a href="{{ route('partak.users.index') }}" class="submenu-link">لیست
                                        کاربران
                                    </a>
                                </li>

                                <li class="submenu-item">
                                    <a href="{{ route('partak.users.create') }}" class="submenu-link">ثبت کاربر
                                        جدید</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
