<!-- Profile layout that other profile pages can extend -->
<x-app-layout>
    @push('styles')
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
            grid-template-columns: 280px 1fr;
            gap: 2rem;
        }

        .profile-sidebar {
            position: sticky;
            top: 2rem;
            height: fit-content;
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 1.5rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding-bottom: 1.5rem;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .user-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--primary-bg-light);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-avatar i {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .user-details h4 {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-800);
            margin: 0 0 0.25rem;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .user-details p {
            font-size: 0.875rem;
            color: var(--gray-500);
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .nav-section {
            margin-bottom: 2rem;
        }

        .nav-section:last-child {
            margin-bottom: 0;
        }

        .nav-section h5 {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin: 0 0 0.75rem;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-links li {
            margin-bottom: 0.375rem;
        }

        .nav-links li:last-child {
            margin-bottom: 0;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.625rem 0.875rem;
            border-radius: 8px;
            color: var(--gray-600);
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 0.875rem;
        }

        .nav-links a i {
            font-size: 1rem;
            color: var(--gray-500);
            transition: color 0.2s ease;
            min-width: 1rem;
            text-align: center;
        }

        .nav-links a:hover {
            background: var(--gray-50);
            color: var(--primary-color);
        }

        .nav-links a:hover i {
            color: var(--primary-color);
        }

        .nav-links a.active {
            background: var(--primary-bg-light);
            color: var(--primary-color);
            font-weight: 500;
        }

        .nav-links a.active i {
            color: var(--primary-color);
        }

        .profile-content {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow);
            min-height: 500px;
            padding: 2rem;
        }

        .content-header {
            margin-bottom: 2rem;
        }

        .content-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-800);
            margin: 0;
        }

        .content-header p {
            font-size: 0.875rem;
            color: var(--gray-500);
            margin: 0.5rem 0 0;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 1rem;
            }

            .profile-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .profile-sidebar {
                position: relative;
                top: 0;
                margin-bottom: 1rem;
            }

            .profile-content {
                padding: 1.5rem;
            }
        }

        /* Common form styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
            color: var(--gray-700);
            background-color: white;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--primary-bg-light);
        }

        /* Button styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 6px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-outline {
            background-color: transparent;
            border-color: var(--gray-300);
            color: var(--gray-600);
        }

        .btn-outline:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        /* Badge styles */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 500;
            border-radius: 9999px;
        }

        .badge-primary {
            background-color: var(--primary-bg-light);
            color: var(--primary-color);
        }

        .badge-success {
            background-color: #E8F5E9;
            color: #2E7D32;
        }

        .badge-warning {
            background-color: #FFF3E0;
            color: #EF6C00;
        }

        .badge-danger {
            background-color: #FFEBEE;
            color: #C62828;
        }
    </style>
    @endpush

    <div class="profile-container">
        <div class="profile-grid">
            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details">
                        <h4>{{ auth()->user()->name }}</h4>
                        <p>{{ auth()->user()->email }}</p>
                    </div>
                </div>

                <!-- Account Management -->
                <div class="nav-section">
                    <h5>Account</h5>
                    <ul class="nav-links">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="{{ Route::currentRouteName() == 'profile.edit' ? 'active' : '' }}">
                                <i class="fas fa-user-circle"></i>Profile Info
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.address') }}" class="{{ Route::currentRouteName() == 'profile.address' ? 'active' : '' }}">
                                <i class="fas fa-map-marker-alt"></i>Address Book
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.payments') }}" class="{{ Route::currentRouteName() == 'profile.payments' ? 'active' : '' }}">
                                <i class="fas fa-credit-card"></i>Payment Methods
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Orders & Returns -->
                <div class="nav-section">
                    <h5>Orders</h5>
                    <ul class="nav-links">
                        <li>
                            <a href="{{ route('profile.orders') }}" class="{{ Route::currentRouteName() == 'profile.orders' ? 'active' : '' }}">
                                <i class="fas fa-shopping-bag"></i>My Orders
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.returns') }}" class="{{ Route::currentRouteName() == 'profile.returns' ? 'active' : '' }}">
                                <i class="fas fa-undo"></i>Returns
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.cancellations') }}" class="{{ Route::currentRouteName() == 'profile.cancellations' ? 'active' : '' }}">
                                <i class="fas fa-times-circle"></i>Cancellations
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Reviews & Wishlist -->
                <div class="nav-section">
                    <h5>My Activity</h5>
                    <ul class="nav-links">
                        <li>
                            <a href="{{ route('profile.reviews') }}" class="{{ Route::currentRouteName() == 'profile.reviews' ? 'active' : '' }}">
                                <i class="fas fa-star"></i>Reviews
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.wishlist') }}" class="{{ Route::currentRouteName() == 'profile.wishlist' ? 'active' : '' }}">
                                <i class="fas fa-heart"></i>Wishlist
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="profile-content">
                @hasSection('content-header')
                    <div class="content-header">
                        @yield('content-header')
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</x-app-layout>
