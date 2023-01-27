<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  user: Object,
  employee_count: Number,
  client_count: Number,
  active_cases: Number,
});
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </template>

    <div class="col-12 mt-3">
      <div class="row">
        <div class="col-md-12 mb-3">
          <div
            class="card overflow-hidden"
            style="background-color: #30811c; color: #fff"
          >
            <div class="card-body p-5 d-flex flex-column align-items-baseline">
              <h2 style="font-weight: 400">Hello, {{ user.name }}</h2>
              <h5 style="font-weight: 400">Welcome back to your dashboard</h5>
              <!-- <img
                src="/theme/assets/img/sjs_logo.png"
                style="position: absolute; right: 0; top: 0; height: 100%"
              /> -->
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4 mb-3">
              <Link :href="route('employee')" style="text-decoration: none;">
                <div class="card overflow-hidden">
                  <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-info text-white p-4 me-3">
                      <svg class="icon icon-xl">
                        <use
                          xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-people"
                        ></use>
                      </svg>
                    </div>
                    <div>
                      <div class="fs-6 fw-semibold text-info">
                        {{ employee_count }}
                      </div>
                      <div
                        class="text-medium-emphasis text-uppercase fw-semibold small"
                      >
                        EMPLOYEES
                      </div>
                    </div>
                  </div>
                </div>
              </Link>
            </div>

            <div class="col-md-4 mb-3">
              <Link :href="route('client')" style="text-decoration: none;">
                <div class="card overflow-hidden">
                  <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-info text-white p-4 me-3">
                      <svg class="icon icon-xl">
                        <use
                          xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-user"
                        ></use>
                      </svg>
                    </div>
                    <div>
                      <div class="fs-6 fw-semibold text-info">
                          {{ client_count }}
                      </div>
                      <div
                        class="text-medium-emphasis text-uppercase fw-semibold small"
                      >
                        CLIENTS
                      </div>
                    </div>
                  </div>
                </div>
              </Link>
            </div>

            <div class="col-md-4 mb-3">
              <Link :href="route('lawsuit')" style="text-decoration: none;">
                <div class="card overflow-hidden">
                  <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-info text-white p-4 me-3">
                      <svg class="icon icon-xl">
                        <use
                          xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-briefcase"
                        ></use>
                      </svg>
                    </div>
                    <div>
                      <div class="fs-6 fw-semibold text-info">
                        {{ active_cases }}
                      </div>
                      <div
                        class="text-medium-emphasis text-uppercase fw-semibold small"
                      >
                        ACTIVE CASES
                      </div>
                    </div>
                  </div>
                </div>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
