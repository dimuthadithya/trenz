<x-app-layout>
    @push('styles')
    <style>
        :root {
            --primary-color: #FF6A00;
            --gray-100: #f5f5f5;
            --gray-200: #e5e5e5;
            --gray-300: #d4d4d4;
            --gray-400: #a3a3a3;
            --gray-500: #737373;
            --gray-600: #525252;
            --gray-700: #404040;
            --gray-800: #262626;
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
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
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
            font-size: 0.875rem;
        }

        .nav-links a i {
            font-size: 1.125rem;
            color: var(--gray-500);
            transition: all 0.2s ease;
        }

        .nav-links a:hover {
            background: var(--gray-100);
            color: var(--primary-color);
        }

        .nav-links a:hover i {
            color: var(--primary-color);
        }

        .nav-links a.active {
            background: var(--primary-color);
            color: white;
            font-weight: 500;
        }

        .nav-links a.active i {
            color: white;
        }

        .profile-content {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            min-height: 500px;
        }

        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .profile-sidebar {
                position: relative;
                top: 0;
            }
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
                <!-- Content will be different for each section -->
                @yield('profile-content')
            </div>
        </div>
    </div>
</x-app-layout>