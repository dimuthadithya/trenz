      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
          <div class="sidebar-logo">
              <!-- Logo Header -->
              <div class="logo-header" data-background-color="dark">
                  <a href="index.html" class="logo">
                      <img
                          src="assets/img/kaiadmin/logo_light.svg"
                          alt="navbar brand"
                          class="navbar-brand"
                          height="20" />
                  </a>
                  <div class="nav-toggle">
                      <button class="btn btn-toggle toggle-sidebar">
                          <i class="gg-menu-right"></i>
                      </button>
                      <button class="btn btn-toggle sidenav-toggler">
                          <i class="gg-menu-left"></i>
                      </button>
                  </div>
                  <button class="topbar-toggler more">
                      <i class="gg-more-vertical-alt"></i>
                  </button>
              </div>
              <!-- End Logo Header -->
          </div>
          <div class="sidebar-wrapper scrollbar scrollbar-inner">
              <div class="sidebar-content">
                  <ul class="mt-5 nav nav-secondary">
                      <li class="nav-item active">
                          <a
                              href="{{ route('admin.dashboard') }}"
                              class="collapsed"
                              aria-expanded="false">
                              <i class="fas fa-home"></i>
                              <p>Dashboard</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.users') }}">
                              <i class="fas fa-users"></i>
                              <p>Users</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#admins">
                              <i class="fas fa-user-secret"></i>
                              <p>Admins</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="admins">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="{{ route('admin.admin.view') }}">
                                          <span class="sub-item">View</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ route('admin.admin.create') }}">
                                          <span class="sub-item">Create</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#products">
                              <i class="fas fa-shopping-bag"></i>
                              <p>Products</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="products">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="{{ route('admin.products') }}">
                                          <span class="sub-item">View</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ route('admin.products.create') }}">
                                          <span class="sub-item">Create</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#Orders">
                              <i class="fas fa-truck"></i>
                              <p>Orders</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="Orders">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="">
                                          <span class="sub-item">View</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Create</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Edit</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Delete</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#category">
                              <i class="fas fa-table"></i>
                              <p>Category</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="category">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="{{ route('admin.categories.view') }}">
                                          <span class="sub-item">View</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ route('admin.categories.create') }}">
                                          <span class="sub-item">Create</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Edit</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Delete</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#payments">
                              <i class="fas fa-credit-card"></i>
                              <p>Payments</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="payments">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="">
                                          <span class="sub-item">View</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Create</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Edit</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Delete</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#productImage">
                              <i class="far fa-image"></i>
                              <p>Product Image</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="productImage">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="">
                                          <span class="sub-item">View</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Create</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Edit</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Delete</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#reviews">
                              <i class="fas fa-star"></i>
                              <p>Reviews</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="reviews">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="">
                                          <span class="sub-item">View</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Create</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Edit</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="">
                                          <span class="sub-item">Delete</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('logout') }}">
                              <i class="fas fa-sign-out-alt"></i>
                              <p>Logout</p>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <!-- End Sidebar -->