<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyProject</title>

    <!-- Tailwind is included -->
    {{-- <link rel="stylesheet" href="css/main.css?v=1652870200386"> --}}
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">

    {{-- <span class="menu-item-label">Collection Table</span> --}}

    <link rel="stylesheet" href="{{ asset('src/css/main.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}" />
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#00b4b6" />

    <meta name="description" content="Admin One - free Tailwind dashboard">

    <meta property="og:url" content={{ asset('https://justboil.github.io/admin-one-tailwind/') }}>
    <meta property="og:site_name" content="JustBoil.me">
    <meta property="og:title" content="Admin One HTML">
    <meta property="og:description" content="Admin One - free Tailwind dashboard">
    <meta property="og:image"
        content={{ asset('https://justboil.me/images/one-tailwind/repository-preview-hi-res.png') }}>
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1920">
    <meta property="og:image:height" content="960">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Admin One HTML">
    <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
    <meta property="twitter:image:src"
        content={{ asset('https://justboil.me/images/one-tailwind/repository-preview-hi-res.png') }}>
    <meta property="twitter:image:width" content="1920">
    <meta property="twitter:image:height" content="960">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="{{ asset('https://www.googletagmanager.com/gtag/js?id=UA-130795909-1') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-130795909-1');
    </script>

</head>

<body>
    <div id="app">
        <nav id="navbar-main" class="navbar is-fixed-top">
            <div class="navbar-brand">
                <a class="navbar-item mobile-aside-button">
                    <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
                </a>
                <div class="navbar-item">
                    <div class="control"><input placeholder="Search everywhere..." class="input"></div>
                </div>
            </div>
            <div class="navbar-brand is-right">
                <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
                    <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
                </a>
            </div>
            <div class="navbar-menu" id="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item dropdown has-divider">
                        <a class="navbar-link">
                            <span class="icon"><i class="mdi mdi-menu"></i></span>
                            <span>Sample Menu</span>
                            <span class="icon">
                                <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="navbar-dropdown">
                            <a href="profile.html" class="navbar-item">
                                <span class="icon"><i class="mdi mdi-account"></i></span>
                                <span>My Profile</span>
                            </a>
                            <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-settings"></i></span>
                                <span>Settings</span>
                            </a>
                            <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-email"></i></span>
                                <span>Messages</span>
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-logout"></i></span>
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                    <div class="navbar-item dropdown has-divider has-user-avatar">
                        <a class="navbar-link">
                            <div class="user-avatar">
                                <img src="{{ asset('https://avatars.dicebear.com/v2/initials/john-doe.svg') }}"
                                    alt="John Doe" class="rounded-full">
                            </div>
                            <div class="is-user-name"><span>John Doe</span></div>
                            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                        </a>
                        <div class="navbar-dropdown">
                            <a href="profile.html" class="navbar-item">
                                <span class="icon"><i class="mdi mdi-account"></i></span>
                                <span>My Profile</span>
                            </a>
                            <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-settings"></i></span>
                                <span>Settings</span>
                            </a>
                            <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-email"></i></span>
                                <span>Messages</span>
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-logout"></i></span>
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                    <a title="Log out" class="navbar-item desktop-icon-only" href="">
                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                        <span>Log out</span>
                    </a>
                </div>
            </div>
        </nav>


        <!-- dashborda kaya. -->
        <aside class="aside is-placed-left is-expanded">
            <div class="aside-tools">
                <div>
                    Admin <b class="font-black">One</b>
                </div>
            </div>
            <div class="menu is-menu-main">
                <p class="menu-label">General</p>
                <ul class="menu-list">
                    <li class="active">
                        <a href="{{ route('dashboard.report') }}">
                            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                            <span class="menu-item-label">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <p class="menu-label">Tables</p>
                <ul class="menu-list">
                    <li>
                        <a class="dropdown">
                            <!-- <span class="icon"><i class="mdi mdi-view-list"></i></span> -->
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Students</span>
                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('students.create') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">Create Student</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('students.index') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">View Student</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a class="dropdown">
                            <!-- <span class="icon"><i class="mdi mdi-view-list"></i></span> -->
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Scores</span>
                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('scores.create') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">Add Score</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('scores.index') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">View Score</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown">
                            <!-- <span class="icon"><i class="mdi mdi-view-list"></i></span> -->
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Curriculas</span>
                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('curriculas.create') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">Create curriculas</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('curriculas.index') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">View curriculas</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown">
                            <!-- <span class="icon"><i class="mdi mdi-view-list"></i></span> -->
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Teachers</span>
                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('teachers.create') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">Create Teacher</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('teachers.index') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">View Teacher</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown">
                            <!-- <span class="icon"><i class="mdi mdi-view-list"></i></span> -->
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Level Of Education</span>
                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('levelofeducations.create') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">Create Level Of Education</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('levelofeducations.index') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">View Level Of Education</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown">
                            <!-- <span class="icon"><i class="mdi mdi-view-list"></i></span> -->
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Expenses</span>
                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('expenses.create') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">Create Expenses</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('expenses.index') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">View Expenses</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown">
                            <!-- <span class="icon"><i class="mdi mdi-view-list"></i></span> -->
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Student Payment</span>
                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('studentPayment.create') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">Add Student Payment</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('studentPayment.index') }}">
                                    <span class="icon"><i class="mdi mdi-table"></i></span>
                                    <span class="menu-item-label">View Student Payment</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <p class="menu-label">Users</p>
                    <li class="--set-active-profile-html">
                        <a href="{{ asset('profile.html') }}">
                            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                            <span class="menu-item-label">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('login.html') }}">
                            <span class="icon"><i class="mdi mdi-lock"></i></span>
                            <span class="menu-item-label">Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        {{-- kotay dashborda ka  --}}
        {{-- content --}}
        <section class="section main-section mx-1 -mt-6">
            @yield('admin-content')
        </section>
        {{-- <div id="sample-modal" class="modal">
            <div class="modal-background --jb-modal-close"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Sample modal</p>
                </header>
                <section class="modal-card-body">
                    <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                    <p>This is sample modal</p>
                </section>
                <footer class="modal-card-foot">
                    <button class="button --jb-modal-close">Cancel</button>
                    <button class="button red --jb-modal-close">Confirm</button>
                </footer>
            </div>
        </div>

        <div id="sample-modal-2" class="modal">
            <div class="modal-background --jb-modal-close"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Sample modal</p>
                </header>
                <section class="modal-card-body">
                    <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                    <p>This is sample modal</p>
                </section>
                <footer class="modal-card-foot">
                    <button class="button --jb-modal-close">Cancel</button>
                    <button class="button blue --jb-modal-close">Confirm</button>
                </footer>
            </div>
        </div> --}}

    </div>

    <!-- Scripts below are for demo only -->
    <script type="text/javascript" src="{{ asset('dist/js/main.min.js?v=1652870200386') }}"></script>

    <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('dist/js/chart.sample.js') }}"></script>
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n; // Fix: Change from if (!f._fbq = n; to if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0; // Fix: Add the missing t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s);
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '658339141622648');
        fbq('track', 'PageView');
    </script>

    <noscript><img height="1" width="1" style="display:none"
            src="{{ asset('https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1') }}" /></noscript>

    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
    <link rel="stylesheet"
        href="{{ asset('https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css') }}">
</body>

</html>
