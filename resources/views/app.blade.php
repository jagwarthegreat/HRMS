<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

         <!-- Vendors styles-->
        <link rel="stylesheet" href="{!! asset('theme/vendors/simplebar/css/simplebar.css') !!}">
        <link rel="stylesheet" href="{!! asset('theme/css/vendors/simplebar.css') !!}">
        <!-- Main styles for this application-->
        <link href="{!! asset('theme/css/stylePro.css') !!}" rel="stylesheet"> <!-- USING PRO-->
        <!-- We use those styles to show code examples, you should remove them in your application.-->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>
            .nav-link {
              /* padding: 10px !important; */
              font-size: 14px !important;
            }

            .breadcrumb {
              font-size: 13px !important;
            }

            .breadcrumb-item > a {
              text-decoration: none !important;
            }
        </style>

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body>
      <!-- SIDEBAR -->
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <div class="sidebar-brand-full">HRMS</div>
        <div class="sidebar-brand-narrow"></div>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
          <a class="nav-link" href="{{route('dashboard')}}">
            <svg class="nav-icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg>
            Dashboard
            <!-- <span class="badge badge-sm bg-info ms-auto">NEW</span> -->
          </a>
        </li>

        <!-- USER MANAGEMENT -->
        <li class="nav-group">
          <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-user"
              ></use>
            </svg>
            User Management
          </a>
          <ul class="nav-group-items">
            <li class="nav-item">
              <a class="nav-link" href="{{route('permission')}}" target="_top">
                <svg class="nav-icon">
                  <use
                    xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-lock-unlocked"
                  ></use>
                </svg>
                Permissions</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('role')}}" target="_top">
                <svg class="nav-icon">
                  <use
                    xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-briefcase"
                  ></use>
                </svg>
                Roles</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user')}}" target="_top">
                <svg class="nav-icon">
                  <use
                    xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-people"
                  ></use>
                </svg>
                Users</a
              >
            </li>
          </ul>
        </li>
        <!-- /USER MANAGEMENT -->

        <!-- <li class="nav-title">MASTERDATA</li> -->
        <li class="nav-group">
          <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-people"
              ></use>
            </svg>
            Employee Management
          </a>
          <ul class="nav-group-items">
            <li class="nav-item">
              <a class="nav-link" :href="route('position')" target="_top">
                <svg class="nav-icon">
                  <use
                    xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-badge"
                  ></use>
                </svg>
                Position</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" :href="route('employee')" target="_top">
                <svg class="nav-icon">
                  <use
                    xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-user"
                  ></use>
                </svg>
                Employees</a
              >
            </li>
          </ul>
        </li>

        <li class="nav-item mt-auto">
          <a
            class="nav-link"
            href="https://coreui.io/docs/templates/installation/"
            target="_blank"
          >
            <svg class="nav-icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-description"
              ></use>
            </svg>
            Docs</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link nav-link-danger"
            href="https://coreui.io/pro/"
            target="_top"
          >
            <svg class="nav-icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-layers"
              ></use>
            </svg>
            Try CoreUI
            <div class="fw-semibold">PRO</div>
          </a>
        </li>
      </ul>
      <button
        class="sidebar-toggler"
        type="button"
        data-coreui-toggle="unfoldable"
      ></button>
    </div>
    <!-- /SIDEBAR -->

    <!-- CONTENT -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-3">
        <div class="container-fluid">
          <button
            class="header-toggler px-md-0 me-md-3"
            type="button"
            onclick="toggleSideBar()"
          >
            <svg class="icon icon-lg">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-menu"
              ></use>
            </svg>
          </button>
          <a class="header-brand d-md-none" href="#"> HRMS </a>
          <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
          </ul>
          <ul class="header-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use
                    xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-bell"
                  ></use>
                </svg>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use
                    xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-list-rich"
                  ></use>
                </svg>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use
                    xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"
                  ></use></svg></a>
            </li>
          </ul>
          <ul class="header-nav ms-3">
            <li class="nav-item dropdown">
              <a
                class="nav-link py-0"
                data-coreui-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <div class="avatar avatar-md">
                  <img
                    class="avatar-img"
                    src="/theme/assets/img/avatars/8.jpg"
                    alt="user@email.com"
                  />
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Account</div>
                </div>
                <a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-bell"
                    ></use>
                  </svg>
                  Updates<span class="badge badge-sm bg-info ms-2">42</span></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"
                    ></use>
                  </svg>
                  Messages<span class="badge badge-sm bg-success ms-2"
                    >42</span
                  ></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-task"
                    ></use>
                  </svg>
                  Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-comment-square"
                    ></use>
                  </svg>
                  Comments<span class="badge badge-sm bg-warning ms-2"
                    >42</span
                  ></a
                >
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Settings</div>
                </div>
                <a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-user"
                    ></use>
                  </svg>
                  Profile</a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-settings"
                    ></use>
                  </svg>
                  Settings</a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-credit-card"
                    ></use>
                  </svg>
                  Payments<span class="badge badge-sm bg-secondary ms-2"
                    >42</span
                  ></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-file"
                    ></use>
                  </svg>
                  Projects<span class="badge badge-sm bg-primary ms-2"
                    >42</span
                  ></a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"
                    ></use>
                  </svg>
                  Lock Account</a
                >
                <a
                  class="dropdown-item"
                  href="#"
                  onclick="document.getElementById('loginForm').submit();"
                >
                  <svg class="icon me-2">
                    <use
                      xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-account-logout"
                    ></use>
                  </svg>
                  Logout
                </a>
                <form id="loginForm" action="{{route('logout')}}" method="post">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </header>
      <div class="body flex-grow-1 px-0">
        <div class="container-fluid">
          <div class="row">
            @inertia
          </div>
        </div>
      </div>
      <footer class="footer">
        <div>
          HRMS <a href="https://juancoder.com">Juancoder IT Solutions</a> ©2022
          creativeLabs.
        </div>
      </footer>
    </div>
    <!-- /CONTENT -->

      <script src="{!! asset('theme/js/coreui.bundle.min.js') !!}"></script> <!-- USING PRO-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <!-- CoreUI and necessary plugins-->
      {{-- <script src="{!! asset('theme/vendors/@coreui/coreui/js/coreui.bundle.min.js') !!}"></script> --}}
      <script src="{!! asset('theme/vendors/simplebar/js/simplebar.min.js') !!}"></script>
      <!-- Plugins and scripts required by this view-->
      {{-- <script src="{!! asset('theme/js/multi-select.js') !!}"></script> --}}
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script>
        function toggleSideBar() {
          coreui.Sidebar.getInstance(document.querySelector("#sidebar")).toggle();
        }
      </script>
    </body>
</html>
