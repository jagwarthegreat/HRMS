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
  <link href="{!! asset('theme/vendors/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}" rel="stylesheet">
  <!-- <link href="{!! asset('theme/css/jquery.dataTables.min.css') !!}" rel="stylesheet"> -->
  <!-- Main styles for this application-->
  <link href="{!! asset('theme/css/stylePro.css') !!}" rel="stylesheet"> <!-- USING PRO-->
  <!-- We use those styles to show code examples, you should remove them in your application.-->
  <link href="{!! asset('theme/css/select2.min.css') !!}" rel="stylesheet">

  <link href="{!! asset('theme/css/summernote-lite.min.css') !!}" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> -->

  <style>
    .nav-link {
      /* padding: 10px !important; */
      font-size: 14px !important;
    }

    .breadcrumb {
      font-size: 13px !important;
    }

    .breadcrumb-item>a {
      text-decoration: none !important;
    }

    th {
      font-weight: 400;
      color: rgb(19, 18, 18);
    }

    body {
      font-size: 14px;
    }

    .avtr {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    @media print {
      #myDivToPrint {
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 12px;
        line-height: 18px;
      }

      .accordion-item {
        border: 1px solid #ddd;
      }

      .donotprint {
        display: none !important;
      }
    }
  </style>

  <script>
    window.sessionEmployeeActiveTab = "{{ $_SESSION['Employee']['tab']['active'] }}";
    window.sessionClientActiveTab = "{{ $_SESSION['Client']['tab']['active'] }}";
    window.dateNow = "{{ date('Y-m-d') }}";
  </script>

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
            <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
          </svg>
          Dashboard
          <!-- <span class="badge badge-sm bg-info ms-auto">NEW</span> -->
        </a>
      </li>

      <!-- {{-- MASTERDATA MANAGEMENT --}} -->
      <li class="nav-group">
        <a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-notes"></use>
          </svg>
          Master Data
        </a>
        <ul class="nav-group-items">
          <li class="nav-item">
            <a class="nav-link" href="{{route('client')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
              </svg> -->
              Clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('location')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-location-pin"></use>
              </svg> -->
              Locations
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('settings.emp.statuses')}}">
              <svg class="nav-icon"></svg>
              Employee Statuses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('settings.emp.types')}}">
              <svg class="nav-icon"></svg>
              Employment Types
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('settings.compensation.types')}}">
              <svg class="nav-icon"></svg>
              Compensation Types
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('settings.doc.category')}}">
              <svg class="nav-icon"></svg>
              Document Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('settings.requirement.category')}}">
              <svg class="nav-icon"></svg>
              Hiring Requirements
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('stock')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
              </svg> -->
              Stocks
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('stock.category')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
              </svg> -->
              Stock Category
            </a>
          </li>
        </ul>
      </li>
      <!-- {{-- /MASTERDATA MANAGEMENT --}} -->

      <!-- {{-- EMPLOYEE MANAGEMENT --}} -->
      <li class="nav-group">
        <a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
          </svg>
          HR Management
        </a>
        <ul class="nav-group-items">
          <li class="nav-item">
            <a class="nav-link" href="{{route('department')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-room"></use>
              </svg> -->
              Departments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('position')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-sitemap"></use>
              </svg> -->
              Positions
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('employee')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-wc"></use>
              </svg> -->
              Employees
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('deployment')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-task"></use>
              </svg> -->
              Deployment
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('memo')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-description"></use>
              </svg> -->
              Memos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('notice')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-bullhorn"></use>
              </svg> -->
              Notices
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('lawsuit')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-inbox"></use>
              </svg> -->
              Lawsuit/Cases
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('quitclaims')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-info"></use>
              </svg> -->
              Quit Claims
            </a>
          </li>
        </ul>
      </li>
      <!-- {{-- /EMPLOYEE MANAGEMENT --}} -->

      <!-- {{-- TRANSACTION MANAGEMENT --}} -->
      <li class="nav-group">
        <a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-truck"></use>
          </svg>
          Transactions
        </a>
        <ul class="nav-group-items">
          <li class="nav-item">
            <a class="nav-link" href="{{route('procurement')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-info"></use>
              </svg> -->
              Procurement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('stock.transfer')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-info"></use>
              </svg> -->
              Stock Transfer
            </a>
          </li>
        </ul>
      </li>
      <!-- {{-- /TRANSACTION MANAGEMENT --}} -->

      <!-- {{-- REPORT MANAGEMENT --}} -->
      <li class="nav-group">
        <a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-print"></use>
          </svg>
          Reports
        </a>
        <ul class="nav-group-items">
          <li class="nav-item">
            <a class="nav-link" href="{{route('report.inventory')}}">
              <!-- <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-info"></use>
              </svg> -->
              Inventory
            </a>
          </li>
        </ul>
      </li>
      <!-- {{-- /REPORT MANAGEMENT --}} -->

      {{-- RECRUITMENT MANAGEMENT --}}
      {{-- <li class="nav-group">
        <a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-user-plus"></use>
          </svg>
          Recruitment
        </a>
        <ul class="nav-group-items">
          <li class="nav-item">
            <a class="nav-link" href="{{route('job.vacancy')}}">
              <svg class="nav-icon"></svg>
              Post Vacancy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('job.applicants')}}">
              <svg class="nav-icon"></svg>
              Applicants
            </a>
          </li>
        </ul>
      </li> --}}
      {{-- /RECRUITMENT MANAGEMENT --}}

      {{-- THIS SECTION SITS AT THE BOTTOM --}}
      {{-- USER MANAGEMENT --}}
      @can('user_management_access')
      <!-- USER MANAGEMENT -->
      <li class="nav-group mt-auto">
        <a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
          </svg>
          User Management
        </a>
        <ul class="nav-group-items">

          <li class="nav-item">
            <a class="nav-link" href="{{route('user.loginparam')}}">
              <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pin"></use>
              </svg>
              Login Parameter</a>
          </li>

          @can('permission_access')
          <li class="nav-item">
            <a class="nav-link" href="{{route('permission')}}">
              <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-lock-unlocked"></use>
              </svg>
              Permissions</a>
          </li>
          @endcan

          @can('role_access')
          <li class="nav-item">
            <a class="nav-link" href="{{route('role')}}">
              <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-briefcase"></use>
              </svg>
              Roles</a>
          </li>
          @endcan

          @can('user_access')
          <li class="nav-item">
            <a class="nav-link" href="{{route('user')}}">
              <svg class="nav-icon">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
              </svg>
              Users</a>
          </li>
          @endcan

        </ul>
      </li>
      <!-- /USER MANAGEMENT -->
      @endcan
      {{-- /USER MANAGEMENT --}}

      {{-- DOCUMENT MANAGEMENT --}}
      {{-- <li class="nav-group">
        <a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-description"></use>
          </svg>
          Documents
        </a>
        <ul class="nav-group-items">
          <li class="nav-item">
            <a class="nav-link" href="{{route('docs.employee')}}">
              <svg class="nav-icon"></svg>
              Employee</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('docs.client')}}">
              <svg class="nav-icon"></svg>
              Client
            </a>
          </li>
        </ul>
      </li> --}}
      {{-- /DOCUMENT MANAGEMENT --}}
      {{-- /THIS SECTION SITS AT THE BOTTOM --}}

    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
  </div>
  <!-- /SIDEBAR -->

  <!-- CONTENT -->
  <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-3">
      <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="toggleSideBar()">
          <svg class="icon icon-lg">
            <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
          </svg>
        </button>
        <a class="header-brand d-md-none" href="#"> HRMS </a>
        <ul class="header-nav d-none d-md-flex">
          <!-- <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Settings</a></li> -->
        </ul>
        <ul class="header-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
              </svg>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
              </svg>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
              </svg></a>
          </li> -->
        </ul>
        <ul class="header-nav ms-3">
          <li class="nav-item dropdown">
            <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true"
              aria-expanded="false">
              <div class="avatar avatar-md">
                @if(Auth::user()->avatar_slug == null)
                <img class="avatar-img avtr" src="/theme/assets/img/avatars/default_avatar.jpeg" />
                @else
                <img class="avatar-img avtr" src="{{'/storage/' . Auth::user()->avatar_slug}}" alt="user@email.com" />
                @endif
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
              <div class="dropdown-header bg-light py-2">
                <div class="fw-semibold">Account</div>
              </div>
              <!-- <a class="dropdown-item" href="#">
                <svg class="icon me-2">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                </svg>
                Updates<span class="badge badge-sm bg-info ms-2">42</span>
              </a> -->
              <!-- <a class="dropdown-item" href="#">
                <svg class="icon me-2">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                </svg>
                Messages<span class="badge badge-sm bg-success ms-2">42</span>
              </a>
              <a class="dropdown-item" href="#">
                <svg class="icon me-2">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-task"></use>
                </svg>
                Tasks<span class="badge badge-sm bg-danger ms-2">42</span>
              </a> -->
              <a class="dropdown-item" href="#">
                <svg class="icon me-2">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
                </svg>
                Notice<span class="badge badge-sm bg-warning ms-2">42</span>
              </a>
              <!--  <div class="dropdown-header bg-light py-2">
                <div class="fw-semibold">Settings</div>
              </div> -->
              <a class="dropdown-item" href="{{route('user.profile')}}">
                <svg class="icon me-2">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg>
                Profile
              </a>
              <!-- <a class="dropdown-item" href="#">
                <svg class="icon me-2">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                </svg>
                Settings
              </a> -->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" onclick="document.getElementById('loginForm').submit();">
                <svg class="icon me-2">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
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
        &copy;2022 HRMS <a href="https://juancoder.com">Juancoder IT Solutions</a>
      </div>
    </footer>
  </div>
  <!-- /CONTENT -->

  <script src="{!! asset('theme/js/coreui.bundle.min.js') !!}"></script> <!-- USING PRO-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="{!! asset('theme/vendors/datatables.net/js/jquery.dataTables.js') !!}"></script>
  <script src="{!! asset('theme/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
  <!-- <script src="{!! asset('theme/js/jquery.dataTables.min.js') !!}"></script> -->
  <!-- CoreUI and necessary plugins-->

  <!--  <script src="{!! asset('theme/vendors/@coreui/coreui/js/coreui.bundle.min.js') !!}"></script> -->
  <script src="{!! asset('theme/vendors/simplebar/js/simplebar.min.js') !!}"></script>
  <!-- <script src="{!! asset('theme/js/multi-select.js') !!}"></script> -->

  <script src="{!! asset('theme/js/select2.min.js') !!}"></script>
  <script src="{!! asset('theme/js/sweetalert2@11.js') !!}"></script>
  <script src="{!! asset('theme/js/summernote-lite.min.js') !!}"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> -->

  <script>
    function toggleSideBar() {
      coreui.Sidebar.getInstance(document.querySelector("#sidebar")).toggle();
    }
  </script>
</body>

</html>

</html>

</html>

</html>

</html>