<script setup>
import AuthenticatedLayout from "../../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";
import GeneralInfoTab from "./Tabs/GeneralInfoTab.vue";
import JobTab from "./Tabs/JobTab.vue";
import LeaveTab from "./Tabs/LeaveTab.vue";
import PerformanceTab from "./Tabs/PerformanceTab.vue";
import DocumentsTab from "./Tabs/DocumentsTab.vue";
import RequirementsTab from "./Tabs/RequirementsTab.vue";

defineProps({
  employee: Array,
});
</script>

<style scoped>
.avatar {
  width: 32%;
  height: 100%;
}

.avatar-img {
  width: 50%;
  height: 100%;
  border-radius: 50em;
}

a.nav-link {
  color: #505050;
}
</style>

<template>
  <Head title="Create Employee" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item">
        <Link :href="route('dashboard')">Dashboard</Link>
      </li>
      <li class="breadcrumb-item">
        <Link :href="route('employee')">Employee</Link>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </template>

    <div class="col-md-12 text-start mb-2">
      <Link class="btn btn-dark btn-sm" :href="route('employee')">
        Go back
      </Link>
    </div>

    <div class="col-md-12 mb-4">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-md-8">
              <div class="card mb-4">
                <div class="card-body d-flex">
                  <div class="avatar">
                    <img
                      class="avatar-img"
                      src="/theme/assets/img/avatars/8.jpg"
                      alt="user@email.com"
                    />
                  </div>
                  <div class="d-flex flex-column">
                    <h4><b>Judywen Guapin</b></h4>
                    <p class="mb-0">&mdash; Designer</p>
                    <a href="#">jguapin@gmail.com</a>
                    <span>
                      <svg class="icon">
                        <use
                          xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-screen-smartphone"
                        ></use>
                      </svg>
                      09214476089
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-header">Actions</div>
                <div class="card-body">
                  <a
                    class="btn btn-sm btn-primary ms-auto me-1 text-light"
                    href=""
                  >
                    <svg class="icon">
                      <use
                        xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
                      ></use>
                    </svg>
                    Edit
                  </a>

                  <a
                    class="btn btn-sm btn-danger ms-auto me-1 text-light"
                    href=""
                  >
                    <svg class="icon">
                      <use
                        xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-x-circle"
                      ></use>
                    </svg>
                    Terminate
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    id="nav-home-tab"
                    data-coreui-toggle="tab"
                    data-coreui-target="#nav-home"
                    type="button"
                    role="tab"
                    aria-controls="nav-home"
                    aria-selected="true"
                    >General Info</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="nav-job-tab"
                    data-coreui-toggle="tab"
                    data-coreui-target="#nav-job"
                    type="button"
                    role="tab"
                    aria-controls="nav-job"
                    aria-selected="true"
                    >Job</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="nav-leave-tab"
                    data-coreui-toggle="tab"
                    data-coreui-target="#nav-leave"
                    type="button"
                    role="tab"
                    aria-controls="nav-leave"
                    aria-selected="true"
                    >Leave</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="nav-performance-tab"
                    data-coreui-toggle="tab"
                    data-coreui-target="#nav-performance"
                    type="button"
                    role="tab"
                    aria-controls="nav-performance"
                    aria-selected="true"
                    >Performance</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="nav-document-tab"
                    data-coreui-toggle="tab"
                    data-coreui-target="#nav-document"
                    type="button"
                    role="tab"
                    aria-controls="nav-document"
                    aria-selected="true"
                    >Documents</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="nav-requirements-tab"
                    data-coreui-toggle="tab"
                    data-coreui-target="#nav-requirements"
                    type="button"
                    role="tab"
                    aria-controls="nav-requirements"
                    aria-selected="true"
                    >Requirements</a
                  >
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="nav-tabContent">
                <div
                  class="tab-pane fade show active"
                  id="nav-home"
                  role="tabpanel"
                  aria-labelledby="nav-home-tab"
                  tabindex="0"
                >
                  <GeneralInfoTab :employee="employee" />
                </div>
                <div
                  class="tab-pane fade show"
                  id="nav-job"
                  role="tabpanel"
                  aria-labelledby="nav-job-tab"
                  tabindex="0"
                >
                  <JobTab />
                </div>
                <div
                  class="tab-pane fade show"
                  id="nav-leave"
                  role="tabpanel"
                  aria-labelledby="nav-leave-tab"
                  tabindex="0"
                >
                  <LeaveTab />
                </div>
                <div
                  class="tab-pane fade show"
                  id="nav-performance"
                  role="tabpanel"
                  aria-labelledby="nav-performance-tab"
                  tabindex="0"
                >
                  <PerformanceTab />
                </div>
                <div
                  class="tab-pane fade show"
                  id="nav-document"
                  role="tabpanel"
                  aria-labelledby="nav-document-tab"
                  tabindex="0"
                >
                  <DocumentsTab />
                </div>
                <div
                  class="tab-pane fade show"
                  id="nav-requirements"
                  role="tabpanel"
                  aria-labelledby="nav-requirements-tab"
                  tabindex="0"
                >
                  <RequirementsTab />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>