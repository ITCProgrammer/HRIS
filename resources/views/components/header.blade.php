  <!-- Topbar Start -->
  <div class="navbar-custom">
      <div class="container-fluid">
          <ul class="list-unstyled topnav-menu float-end mb-0">

              <li class="dropdown d-none d-lg-inline-block">
                  <a class="nav-link dropdown-toggle arrow-none" data-toggle="fullscreen" href="#">
                      <i data-feather="maximize"></i>
                  </a>
              </li>

              <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                  <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                      aria-haspopup="false" aria-expanded="false">
                      <i data-feather="globe"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">

                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">
                          <img src="assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12">
                          <span class="align-middle">English</span>
                      </a>

                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">
                          <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12">
                          <span class="align-middle">German</span>
                      </a>

                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">
                          <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12">
                          <span class="align-middle">Italian</span>
                      </a>

                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">
                          <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12">
                          <span class="align-middle">Spanish</span>
                      </a>

                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">
                          <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12">
                          <span class="align-middle">Russian</span>
                      </a>

                  </div>
              </li>

              <li class="dropdown notification-list topbar-dropdown">
                  <a class="nav-link dropdown-toggle position-relative" data-bs-toggle="dropdown" href="#"
                      role="button" aria-haspopup="false" aria-expanded="false">
                      <i data-feather="bell"></i>
                      <span class="badge bg-danger rounded-circle noti-icon-badge">6</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                      <!-- item-->
                      <div class="dropdown-item noti-title">
                          <h5 class="m-0">
                              <span class="float-end">
                                  <a href="#" class="text-dark"><small>Clear All</small></a>
                              </span>Notification
                          </h5>
                      </div>

                      <div class="noti-scroll" data-simplebar>

                          <!-- item-->
                          <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                              <div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div>
                              <p class="notify-details">New user registered.<small class="text-muted">5 hours
                                      ago</small>
                              </p>
                          </a>

                          <!-- item-->
                          <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                              <div class="notify-icon">
                                  <img src="assets/images/users/avatar-1.jpg" class="img-fluid rounded-circle"
                                      alt="" />
                              </div>
                              <p class="notify-details">Karen Robinson</p>
                              <p class="text-muted mb-0 user-msg">
                                  <small>Wow ! this admin looks good and awesome design</small>
                              </p>
                          </a>

                          <!-- item-->
                          <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                              <div class="notify-icon">
                                  <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle"
                                      alt="" />
                              </div>
                              <p class="notify-details">Cristina Pride</p>
                              <p class="text-muted mb-0 user-msg">
                                  <small>Hi, How are you? What about our next meeting</small>
                              </p>
                          </a>

                          <!-- item-->
                          <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom active">
                              <div class="notify-icon bg-success"><i class="uil uil-comment-message"></i> </div>
                              <p class="notify-details">
                                  Jaclyn Brunswick commented on Dashboard<small class="text-muted">1 min ago</small>
                              </p>
                          </a>

                          <!-- item-->
                          <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                              <div class="notify-icon bg-danger"><i class="uil uil-comment-message"></i></div>
                              <p class="notify-details">
                                  Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small>
                              </p>
                          </a>

                          <!-- item-->
                          <a href="javascript:void(0);" class="dropdown-item notify-item">
                              <div class="notify-icon bg-primary">
                                  <i class="uil uil-heart"></i>
                              </div>
                              <p class="notify-details">
                                  Carlos Crouch liked <b>Admin</b> <small class="text-muted">13 days ago</small>
                              </p>
                          </a>
                      </div>

                      <!-- All-->
                      <a href="javascript:void(0);"
                          class="dropdown-item text-center text-primary notify-item notify-all">
                          View all <i class="fe-arrow-right"></i>
                      </a>

                  </div>
              </li>

              @auth
                  <li class="dropdown notification-list topbar-dropdown">
                      <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                          role="button" aria-haspopup="false" aria-expanded="false">
                          @if (auth()->user()->image)
                              <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="user-image"
                                  class="rounded-circle">
                          @else
                              <img src="{{ asset('profile/empty.png') }}" alt="user-image" class="rounded-circle">
                          @endif
                          <span class="pro-user-name ms-1">
                              {{ ucwords(auth()->user()->username) }} <i class="uil uil-angle-down"></i>
                          </span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end profile-dropdown ">

                          <a href="{{ route('profile') }}" class="dropdown-item notify-item">
                              <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>Profile</span>
                          </a>

                          <a href="" class="dropdown-item notify-item">
                              <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Lock Screen</span>
                          </a>

                          <div class="dropdown-divider"></div>
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button class="dropdown-item notify-item" type="submit">
                                  <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                              </button>
                          </form>

                      </div>
                  </li>
              @endauth


              <li class="dropdown notification-list">
                  <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                      <i data-feather="settings"></i>
                  </a>
              </li>

          </ul>

          <!-- LOGO -->
          <div class="logo-box">
              <a href="index.html" class="logo logo-dark">
                  <span class="logo-sm">
                      <img src="{{ asset('img/ITTI_logo_large.png') }}" alt="" height="65">
                      <span class="logo-lg-text-dark">HRIS</span>
                  </span>
                  <span class="logo-lg">
                      <img src="{{ asset('img/ITTI_logo_large.png') }}" alt="" height="65">
                      <span class="logo-lg-text-dark">HRIS</span>
                  </span>
              </a>

              <a href="index.html" class="logo logo-light">
                  <span class="logo-sm">
                      <img src="{{ asset('img/ITTI_logo_large.png') }}" alt="" height="65">
                      <span class="logo-lg-text-light">HRIS</span>
                  </span>
                  <span class="logo-lg">
                      <img src="{{ asset('img/ITTI_logo_large.png') }}" alt="" height="65">
                      <span class="logo-lg-text-light">HRIS</span>
                  </span>
              </a>
          </div>

          <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
              <li>
                  <button class="button-menu-mobile">
                      <i data-feather="menu"></i>
                  </button>
              </li>

              <li>
                  <!-- Mobile menu toggle (Horizontal Layout)-->
                  <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                      <div class="lines">
                          <span></span>
                          <span></span>
                          <span></span>
                      </div>
                  </a>
                  <!-- End mobile menu toggle-->
              </li>

          </ul>
          <div class="clearfix"></div>
      </div>
  </div>
  <!-- End Topbar -->
