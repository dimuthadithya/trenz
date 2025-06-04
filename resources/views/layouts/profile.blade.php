<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/logo/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/logo/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/logo/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/logo/favicon_io/site.webmanifest') }}">

    <title>Trenz</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cookie&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <!-- Notyf -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap v5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />

    <style>
        :root {
            --primary-color: #FF6A00;
            --primary-hover: #E65C00;
            --primary-bg-light: #FFF0E6;
            --gray-50: #fafafa;
            --gray-100: #f5f5f5;
            --gray-200: #e5e5e5;
            --gray-300: #d4d4d4;
            --gray-400: #a3a3a3;
            --gray-500: #737373;
            --gray-600: #525252;
            --gray-700: #404040;
            --gray-800: #262626;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 2rem;
        }

        .profile-sidebar {
            position: sticky;
            top: 2rem;
            height: fit-content;
            background: white;
            border-radius: 8px;
            box-shadow: var(--shadow);
            padding: 1.5rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--gray-200);
            margin-bottom: 1.5rem;
        }

        .user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--gray-500);
        }

        .user-details h4 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray-800);
            margin: 0;
        }

        .user-details p {
            font-size: 0.875rem;
            color: var(--gray-500);
            margin: 0;
        }

        .nav-section {
            margin-bottom: 1.5rem;
        }

        .nav-section h5 {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.75rem;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-links li {
            margin-bottom: 0.25rem;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
            color: var(--gray-600);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .nav-links a:hover {
            background: var(--primary-bg-light);
            color: var(--primary-color);
        }

        .nav-links a.active {
            background: var(--primary-color);
            color: white;
        }

        .nav-links a i {
            width: 16px;
            text-align: center;
        }

        .profile-content {
            background: white;
            border-radius: 8px;
            box-shadow: var(--shadow);
            padding: 2rem;
        }

        @media (max-width: 991px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .profile-sidebar {
                position: static;
                margin-bottom: 2rem;
            }
        }
    </style>

</head>

<body>
    @include('layouts.navbar')

    <div class="profile-container">
        <div class="profile-grid">
            <aside class="profile-sidebar">
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details">
                        <h4>{{ Auth::user()->name }}</h4>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <nav>
                    <div class="nav-section">
                        <h5>Account Settings</h5>
                        <ul class="nav-links">
                            <li>
                                <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                                    <i class="fas fa-user-edit"></i>
                                    Edit Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.address') }}" class="nav-link {{ request()->routeIs('profile.address') ? 'active' : '' }}">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Addresses
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.payments') }}" class="nav-link {{ request()->routeIs('profile.payments') ? 'active' : '' }}">
                                    <i class="fas fa-credit-card"></i>
                                    Payment Methods
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="nav-section">
                        <h5>My Shopping</h5>
                        <ul class="nav-links">
                            <li>
                                <a href="{{ route('profile.orders') }}" class="nav-link {{ request()->routeIs('profile.orders') ? 'active' : '' }}">
                                    <i class="fas fa-shopping-bag"></i>
                                    Orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.cancellations') }}" class="nav-link {{ request()->routeIs('profile.cancellations') ? 'active' : '' }}">
                                    <i class="fas fa-ban"></i>
                                    Cancellations
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.reviews') }}" class="nav-link {{ request()->routeIs('profile.reviews') ? 'active' : '' }}">
                                    <i class="fas fa-star"></i>
                                    Reviews
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.wishlist') }}" class="nav-link {{ request()->routeIs('profile.wishlist') ? 'active' : '' }}">
                                    <i class="fas fa-heart"></i>
                                    Wishlist
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>

            <main class="profile-content">
                @yield('profile-content')
            </main>
        </div>
    </div>
    @yield('profile-content')



    @include('layouts.footer')

    <!-- Bootstrap v5.3.3 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


    <!-- notyf -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- CountUp -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.6.2/countUp.umd.min.js"></script>


    <!-- Js Plugins -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/notyf.js') }}"></script>

    <!-- login sucess message -->
    @if(session('login_success'))
    <script>
        notyf.open({
            type: "login",
            message: "{{ session('login_success') }}"
        });
    </script>
    @endif

    @if(session('logout_success'))
    <script>
        notyf.open({
            type: "logout",
            message: "{{ session('logout_success') }}"
        });
    </script>
    @endif

    <script>
        function updateDom(target, event) {
            const categoryName = target.id;

            $('#product-list').children().each(function() {
                if ($(this).hasClass(categoryName)) {
                    $(this).show();
                    $('#showing_category_text').html(categoryName);
                } else {
                    $(this).hide();
                }
            });
        }
        $('#showing_category_btn').on('click', function() {
            $('#product-list').children().each(function() {
                $(this).show();
            });
            $('#showing_category_text').html('All');
        });
    </script>
    <!-- login sucess message end -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>