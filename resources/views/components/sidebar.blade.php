  <!-- ========== Left Sidebar Start ========== -->
  <div class="left-side-menu">

      <div class="h-100" data-simplebar>

          <!-- User box -->
          <div class="user-box text-center">
              <img src="assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
              <div class="dropdown">
                  <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                      data-bs-toggle="dropdown">Nik Patel</a>
                  <div class="dropdown-menu user-pro-dropdown">

                      <a href="pages-profile.html" class="dropdown-item notify-item">
                          <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                      </a>
                      <a href="javascript:void(0);" class="dropdown-item notify-item">
                          <i data-feather="settings" class="icon-dual icon-xs me-1"></i><span>Settings</span>
                      </a>
                      <a href="javascript:void(0);" class="dropdown-item notify-item">
                          <i data-feather="help-circle" class="icon-dual icon-xs me-1"></i><span>Support</span>
                      </a>
                      <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                          <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Lock Screen</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="javascript:void(0);" class="dropdown-item notify-item">
                          <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                      </a>

                  </div>
              </div>
              <p class="text-muted">Admin Head</p>
          </div>

          <!--- Sidemenu -->
          <div id="sidebar-menu">

              <ul id="side-menu">

                  <li>
                      <a href="{{ route('dashboard') }}">
                          <i data-feather="home"></i>
                          <span> Home </span>
                      </a>
                  </li>
                  <li>
                      <a href="#sidebardashboard" data-bs-toggle="collapse">
                          <i data-feather="file-text"></i>
                          <span> Dashboard </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebardashboard">
                          <ul class="nav-second-level">
                              <li><a href="{{ route('new-employe') }}">Karyawan Baru</a></a></li>
                              <li><a href="#">Habis Kontrak</a></li>
                              <li><a href="#">Seragam Dan Id Card Dept</a></li>
                              <li><a href="#">Seragam Dan Id Card All</a></li>
                              <li><a href="#">Surat Peringatan</a></li>
                              <li><a href="#">Karyawan Keluar</a></li>
                              <li><a href="{{route('employee_birthday')}}">Karyawan Ulang Tahun</a></li>
                          </ul>
                      </div>
                  </li>

                  <li>
                      <a href="#sidebaremployee" data-bs-toggle="collapse">
                          <i data-feather="file-text"></i>
                          <span> Employee </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebaremployee">
                          <ul class="nav-second-level">
                              <li><a href="#">Employee Information</a></li>
                              <li><a href="#">Employee Dept. Information</a></li>
                              <li><a href="#">Employee Report</a></li>
                              <li><a href="#">PKWT</a></li>
                              <li><a href="#">Surat Peringatan</a></li>
                              <li><a href="#">Data Seragam</a></li>
                          </ul>
                      </div>
                  </li>

                  <li>
                      <a href="#sidebarRecruitment" data-bs-toggle="collapse">
                          <i data-feather="file-text"></i>
                          <span> Recruitment </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarRecruitment">
                          <ul class="nav-second-level">
                              <li><a href="#">Permohonan</a></li>
                              <li><a href="#">Seleksi</a></li>
                              <li><a href="#">Exit Interview</a></li>
                          </ul>
                      </div>
                  </li>

                  <li>
                      <a href="#sidebarCareer" data-bs-toggle="collapse">
                          <i data-feather="clipboard"></i>
                          <span> Career Transition </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarCareer">
                          <ul class="nav-second-level">
                              <li><a href="#">Career Transition</a></li>
                              <li><a href="#">Career Report</a></li>
                          </ul>
                      </div>
                  </li>

                  <li>
                      <a href="#sidebarTimeAttendance" data-bs-toggle="collapse">
                          <i data-feather="copy"></i>
                          <span> Time Attendance </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarTimeAttendance">
                          <ul class="nav-second-level">
                              <li><a href="#">Izin Cuti</a></li>
                              <li><a href="#">Lembur</a></li>
                              <li><a href="#">Laporan Absen</a></li>
                              <li><a href="#">Laporan Sisa Cuti</a></li>
                          </ul>
                      </div>
                  </li>

                  <li>
                      <a href="#sidebarPeopleDevelopment" data-bs-toggle="collapse">
                          <i data-feather="filter"></i>
                          <span> People Develpment </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarPeopleDevelopment">
                          <ul class="nav-second-level">
                              <li><a href="#">TNA</a></li>
                              <li><a href="#">Program Training</a></li>
                              <li><a href="#">Add Record Training</a></li>
                              <li><a href="#">Record Training</a></li>
                              <li><a href="#">Evaluasi Training</a></li>
                              <li><a href="#">Upload Data Training</a></li>
                              <li><a href="#">Kompetensi</a></li>
                              <li><a href="#">Job Description</a></li>
                              <li><a href="#">OJT</a></li>
                          </ul>
                      </div>
                  </li>

                  <li>
                      <a href="#sidebarKPI" data-bs-toggle="collapse">
                          <i data-feather="file"></i>
                          <span> KPI </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarKPI">
                          <ul class="nav-second-level">
                              <li><a href="#">Laporan KPI</a></li>
                              <li><a href="#">Feedback Dept</a></li>
                          </ul>
                      </div>
                  </li>

                  <li>
                      <a href="#sidebarHRAdmin" data-bs-toggle="collapse">
                          <i data-feather="slack"></i>
                          <span> HR Admin</span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarHRAdmin">
                          <ul class="nav-second-level">
                              <li><a href="#">Memo Karyawan Baru</a></li>
                          </ul>
                      </div>
                  </li>

                  <li>
                      <a href="#sidebarSetting" data-bs-toggle="collapse">
                          <i data-feather="layers"></i>
                          <span> Setting </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarSetting">
                          <ul class="nav-second-level">
                          </ul>
                      </div>
                  </li>

                  <li class="menu-title mt-2">Account</li>
                  <li>
                      <a href="#sidebarAccount" data-bs-toggle="collapse">
                          <i data-feather="user"></i>
                          <span> Profile </span>
                          <span class="menu-arrow"></span>
                      </a>
                      <div class="collapse" id="sidebarAccount">
                          <ul class="nav-second-level">
                              <li><a href="#">Profile</a></li>
                          </ul>
                      </div>
                  </li>


              </ul>

          </div>
          <!-- End Sidemenu -->

          <div class="clearfix"></div>

      </div>

  </div>
  <!-- Left Sidebar End -->
