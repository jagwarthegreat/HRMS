<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>
<style>
  .nav-link {
    /* padding: 10px !important; */
    font-size: 14px;
  }
</style>
<template>
  <div>
    <!-- SIDEBAR -->
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="/theme/assets/brand/coreui.svg#full"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="/theme/assets/brand/coreui.svg#signet"></use>
            </svg>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item">
              <a class="nav-link" :href="route('dashboard')">
                <svg class="nav-icon">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                </svg> 
                Dashboard
                <!-- <span class="badge badge-sm bg-info ms-auto">NEW</span> -->
              </a>
            </li>

            <!-- USER MANAGEMENT -->
            <li class="nav-group">
              <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg> 
                User Management
              </a>
              <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="login.html" target="_top">
                    <svg class="nav-icon">
                      <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-lock-unlocked"></use>
                    </svg> Permissions</a></li>
                <li class="nav-item"><a class="nav-link" href="register.html" target="_top">
                    <svg class="nav-icon">
                      <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-briefcase"></use>
                    </svg> Roles</a></li>
                <li class="nav-item"><a class="nav-link" :href="route('user.index')" target="_top">
                    <svg class="nav-icon">
                      <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                    </svg> Users</a></li>
              </ul>
            </li>
            <!-- /USER MANAGEMENT -->

            <!-- <li class="nav-title">MASTERDATA</li> -->
            <li class="nav-group">
              <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg> 
                Employee Management
              </a>
              <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="login.html" target="_top">
                    <svg class="nav-icon">
                      <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                    </svg> Login</a></li>
                <li class="nav-item"><a class="nav-link" href="register.html" target="_top">
                    <svg class="nav-icon">
                      <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                    </svg> Register</a></li>
                <li class="nav-item"><a class="nav-link" href="404.html" target="_top">
                    <svg class="nav-icon">
                      <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
                    </svg> Error 404</a></li>
                <li class="nav-item"><a class="nav-link" href="500.html" target="_top">
                    <svg class="nav-icon">
                      <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
                    </svg> Error 500</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="typography.html">
                <svg class="nav-icon">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                </svg> Typography</a></li>

            <li class="nav-item mt-auto"><a class="nav-link" href="https://coreui.io/docs/templates/installation/" target="_blank">
                <svg class="nav-icon">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                </svg> Docs</a></li>
            <li class="nav-item"><a class="nav-link nav-link-danger" href="https://coreui.io/pro/" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
                </svg> Try CoreUI
                <div class="fw-semibold">PRO</div>
              </a>
            </li>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <!-- /SIDEBAR -->

    <!-- CONTENT -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                  <svg class="icon icon-lg">
                    <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                  </svg>
                </button>
                <a class="header-brand d-md-none" href="#">
                  <svg width="118" height="46" alt="CoreUI Logo">
                    <use xlink:href="theme/assets/brand/coreui.svg#full"></use>
                  </svg>
                </a>
                <ul class="header-nav d-none d-md-flex">
                  <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                </ul>
                <ul class="header-nav ms-auto">
                  <li class="nav-item"><a class="nav-link" href="#">
                      <svg class="icon icon-lg">
                        <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                      </svg></a></li>
                  <li class="nav-item"><a class="nav-link" href="#">
                      <svg class="icon icon-lg">
                        <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
                      </svg></a></li>
                  <li class="nav-item"><a class="nav-link" href="#">
                      <svg class="icon icon-lg">
                        <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                      </svg></a></li>
                </ul>
                <ul class="header-nav ms-3">
                  <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      <div class="avatar avatar-md"><img class="avatar-img" src="/theme/assets/img/avatars/8.jpg" alt="user@email.com"></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pt-0">
                      <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Account</div>
                      </div><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                          <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                        </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                          <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                        </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                          <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-task"></use>
                        </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                          <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
                        </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
                      <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Settings</div>
                      </div><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                          <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg> Profile</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                          <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                        </svg> Settings</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                          <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                        </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                          <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                        </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                      <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                          <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                        </svg> Lock Account</a>
                        <Link class="dropdown-item" :href="route('logout')" method="post" as="button">
                          <svg class="icon me-2">
                            <use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                          </svg> 
                          Logout
                        </Link>
                    </div>
                  </li>
                </ul>
            </div>
            <div class="header-divider"></div>
            <div class="container-fluid">
                <slot name="breadcrumbs" />
            </div>
        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <slot />
                </div>
            </div>
        </div>
        <footer class="footer">
            <div>HRMS <a href="https://juancoder.com">Juancoder IT Solutions</a> ©2022 creativeLabs.</div>
        </footer>
    </div>
    <!-- /CONTENT -->
  </div>
</template>
