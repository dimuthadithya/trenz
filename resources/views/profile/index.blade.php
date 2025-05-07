<x-app-layout>
    @push('styles')
    <style>
        :root {
            --daraz-orange: #FF6A00;
            --light-gray: #f5f5f5;
            --dark-gray: #757575;
        }

        body {
            background-color: #F0F0F0;
            font-family: Arial, sans-serif;
        }

        .daraz-header {
            background-color: var(--daraz-orange);
            color: white;
            padding: 10px 0;
        }

        .daraz-logo {
            height: 40px;
        }

        .search-container {
            width: 100%;
            max-width: 700px;
        }

        .search-box {
            border-radius: 2px;
            border: none;
        }

        .search-btn {
            background-color: white;
            border: none;
            color: #FF6A00;
        }

        .top-nav {
            font-size: 0.8rem;
        }

        .navbar-toggler {
            border: none;
        }

        .account-container {
            background-color: white;
            border-radius: 3px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
            margin-bottom: 20px;
        }

        .account-sidebar {
            background-color: white;
            padding: 15px;
            margin-right: 10px;
        }

        .account-sidebar h5 {
            color: #424242;
            font-size: 1rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding-left: 0;
        }

        .sidebar-menu li {
            padding: 3px 0;
            color: #757575;
            font-size: 0.9rem;
        }

        .sidebar-menu .active {
            color: var(--daraz-orange);
            font-weight: 500;
        }

        .orders-container {
            background-color: white;
            padding: 15px;
            border-radius: 3px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
        }

        .orders-tabs {
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 20px;
        }

        .orders-tabs .nav-link {
            color: #757575;
            border: none;
            border-bottom: 3px solid transparent;
            padding: 10px 15px;
            font-size: 0.9rem;
        }

        .orders-tabs .nav-link.active {
            color: var(--daraz-orange);
            background-color: transparent;
            border-bottom: 3px solid var(--daraz-orange);
            font-weight: 500;
        }

        .search-order {
            margin-bottom: 20px;
        }

        .order-item {
            border: 1px solid #e0e0e0;
            border-radius: 3px;
            margin-bottom: 20px;
        }

        .order-header {
            background-color: #f9f9f9;
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-vendor {
            font-weight: 600;
            color: #424242;
        }

        .order-status {
            color: #757575;
            font-size: 0.9rem;
        }

        .order-content {
            padding: 15px;
            display: flex;
            align-items: center;
        }

        .order-img {
            width: 80px;
            text-align: center;
        }

        .order-img img {
            max-width: 60px;
        }

        .order-details {
            flex-grow: 1;
            padding: 0 15px;
        }

        .order-title {
            margin-bottom: 5px;
            font-size: 0.95rem;
            color: #424242;
        }

        .order-info {
            font-size: 0.85rem;
            color: #757575;
        }

        .order-price {
            font-weight: 600;
            color: #424242;
            text-align: right;
            width: 80px;
        }

        .order-qty {
            color: #757575;
            font-size: 0.85rem;
            text-align: center;
            width: 80px;
        }

        .delivered-label {
            background-color: #F5F5F5;
            color: #757575;
            padding: 3px 10px;
            border-radius: 2px;
            font-size: 0.8rem;
        }

        .nav::before,
        .nav::after {
            background: transparent;
        }
    </style>
    @endpush
    <!-- Main content container -->
    <div class="container mt-4 mb-5 ">
        <div class="row">
            <!-- Left sidebar -->
            <div class="col-md-3">
                <div class="account-sidebar">
                    <div class="pb-2">Hello, dimuth adithya</div>

                    <h5 class="mt-3">Manage My Account</h5>
                    <ul class="sidebar-menu ms-3">
                        <li><a href="">My Profile</a></li>
                        <li><a href="">Address Book</a></li>
                        <li><a href="">My Payment Options</a></li>
                    </ul>

                    <h5 class="mt-3">My Orders</h5>
                    <ul class="sidebar-menu ms-3">
                        <li class="active"><a href="">My Orders</a></li>
                        <li><a href="">My Returns</a></li>
                        <li><a href="">My Cancellations</a></li>
                    </ul>

                    <h5 class="mt-3">My Reviews</h5>

                    <h5 class="mt-3">My Wishlist & Followed Stores</h5>
                </div>
            </div>

            <!-- Main content area -->
            <div class="col-md-9">
                <div class="orders-container">
                    <h4 class="mb-3">My Orders</h4>

                    <!-- Order tabs -->
                    <ul class="nav orders-tabs ">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">To Pay</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">To Ship</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">To Receive</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">To Review(s)</a>
                        </li>
                    </ul>

                    <!-- Search order -->
                    <div class="search-order">
                        <div class="input-group">
                            <span class="bg-white input-group-text border-end-0">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control border-start-0" placeholder="Search by seller name, order ID or product name">
                        </div>
                    </div>

                    <!-- Order items -->
                    <x-order-item />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>