<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ref, onMounted, on } from "vue";

const props = defineProps({
  user: Array
});
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </template>

    <div class="col-12">
      <div class="row">
        <div class="col-md-3 mb-3">
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
                <div class="fs-6 fw-semibold text-info">100</div>
                <div
                  class="text-medium-emphasis text-uppercase fw-semibold small"
                >
                  EMPLOYEES
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
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
                <div class="fs-6 fw-semibold text-info">50</div>
                <div
                  class="text-medium-emphasis text-uppercase fw-semibold small"
                >
                  CLIENTS
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
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
                <div class="fs-6 fw-semibold text-info">3</div>
                <div
                  class="text-medium-emphasis text-uppercase fw-semibold small"
                >
                  VACANCIES
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
              <div class="bg-info text-white p-4 me-3">
                <svg class="icon icon-xl">
                  <use
                    xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-lan"
                  ></use>
                </svg>
              </div>
              <div>
                <div class="fs-6 fw-semibold text-info">10</div>
                <div
                  class="text-medium-emphasis text-uppercase fw-semibold small"
                >
                  APPLICANTS
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">
          Welcome <b>{{ user.name }}</b
          >,
        </div>
        <div class="card-body">
          <p class="text-medium-emphasis small">
            - recent application <br />
            - calendar <br />
            - widget for total employee <br />
            - widget for total client <br />
            - expenses <br />
          </p>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="row">
        <div class="col-8">
          <div class="card mb-4">
            <div class="card-header">Calendar</div>
            <div class="card-body">
              <p class="text-medium-emphasis small"></p>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card mb-4">
            <div class="card-header">Application</div>
            <div class="card-body">
              <p class="text-medium-emphasis small"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
