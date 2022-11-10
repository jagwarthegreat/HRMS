<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const empform = useForm({
  firstname: "",
  middlename: "",
  lastname: "",
  contact: "",
  email: "",
  address: "",
  dob: "",
  gender: "",
  civil_status: "",
  sss: "",
  tin: "",
  pagibig: "",
  philhealth: "",
  elementary: "",
  elem_year_graduated: "",
  highschool: "",
  hs_year_graduated: "",
  college: "",
  college_year_graduated: "",
  degree: "",
});

const submit = () => {
  empform.post(route("employee.store"), {
    onSuccess: () => {
      empform.reset([
        "firstname",
        "middlename",
        "lastname",
        "contact",
        "email",
        "address",
        "dob",
        "gender",
        "civil_status",
        "sss",
        "tin",
        "pagibig",
        "philhealth",
        "elementary",
        "elem_year_graduated",
        "highschool",
        "hs_year_graduated",
        "college",
        "college_year_graduated",
        "degree",
      ]);
    },
  });
};
</script>

<style scoped>
.avatar {
  width: 100%;
  height: 100%;
}

.avatar-img {
  width: 65%;
  height: 100%;
  border-radius: 50em;
}

.accordion-button {
  font-weight: 600;
  color: #272829;
  background-color: rgb(255 255 255 / 87%);
}

.accordion-item {
  border-top: 1px solid #ddd;
}

.accordion {
  --cui-accordion-active-color: #768192;
}

.accordion-body {
  overflow-y: auto;
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
        <Link :href="route('employee')">User</Link>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Create</li>
    </template>

    <div class="col-md-12 text-start mb-2">
      <Link class="btn btn-dark btn-sm" :href="route('employee')">
        Go back
      </Link>
    </div>

    <div class="col-md-12 mb-4">
      <div class="row">
        <div class="col-md-3">
          <div class="col-md-12">
            <div class="card mb-4">
              <div class="card-body">
                <div class="avatar">
                  <img
                    class="avatar-img"
                    src="/theme/assets/img/avatars/8.jpg"
                    alt="user@email.com"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="row">
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-body text-center">
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
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-header">Actions</div>
                  <div class="card-body">
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
        </div>
        <div class="col-md-9">
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
                  <div class="accordion mb-3" id="employeeDetailAccordion">
                    <!-- personal detial -->
                    <div class="accordion-item mb-3">
                      <h2
                        class="accordion-header"
                        id="panelsStayOpen-headingOne"
                      >
                        <button
                          class="accordion-button p-2"
                          type="button"
                          data-coreui-toggle="collapse"
                          data-coreui-target="#panelsStayOpen-collapseOne"
                          aria-expanded="true"
                          aria-controls="panelsStayOpen-collapseOne"
                        >
                          Personal Details
                        </button>
                      </h2>
                      <div
                        id="panelsStayOpen-collapseOne"
                        class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingOne"
                      >
                        <div class="accordion-body">
                          <div class="row g-3">
                            <div class="col-md-4">
                              <label for="firstname" class="form-label"
                                >Firstname</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="firstname"
                                v-model="empform.firstname"
                              />
                            </div>
                            <div class="col-md-4">
                              <label for="middlename" class="form-label"
                                >Middlename</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="middlename"
                                v-model="empform.middlename"
                              />
                            </div>
                            <div class="col-md-4">
                              <label for="lastname" class="form-label"
                                >Lastname</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="lastname"
                                v-model="empform.lastname"
                              />
                            </div>
                            <div class="col-md-4">
                              <label for="contact" class="form-label"
                                >Contact</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="contact"
                                v-model="empform.contact"
                              />
                            </div>
                            <div class="col-md-8">
                              <label for="email" class="form-label"
                                >E-mail Address</label
                              >
                              <input
                                type="email"
                                class="form-control"
                                id="email"
                                v-model="empform.email"
                              />
                            </div>
                            <div class="col-12">
                              <label for="address" class="form-label"
                                >Address</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="address"
                                v-model="empform.address"
                              />
                            </div>
                            <div class="col-md-4">
                              <label for="dob" class="form-label"
                                >Date of Birth</label
                              >
                              <input
                                type="date"
                                class="form-control"
                                id="dob"
                                v-model="empform.dob"
                              />
                            </div>
                            <div class="col-md-4">
                              <label for="gender" class="form-label"
                                >Gender</label
                              >
                              <select
                                class="form-select"
                                id="gender"
                                v-model="empform.gender"
                              >
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label for="civil_status" class="form-label"
                                >Civil Status</label
                              >
                              <select
                                class="form-select"
                                id="civil_status"
                                v-model="empform.civil_status"
                              >
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Separated">Separated</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Single">Single</option>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label for="sss" class="form-label"
                                >SSS Number</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="sss"
                                v-model="empform.sss"
                              />
                            </div>
                            <div class="col-md-4">
                              <label for="tin" class="form-label"
                                >TIN Number</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="tin"
                                v-model="empform.tin"
                              />
                            </div>
                            <div class="col-md-4">
                              <label for="pagibig" class="form-label"
                                >HDMF Number</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="pagibig"
                                v-model="empform.pagibig"
                              />
                            </div>
                            <div class="col-md-4">
                              <label for="philhealth" class="form-label"
                                >PHILHEALTH Number</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="philhealth"
                                v-model="empform.philhealth"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /personal detial -->

                    <!-- work experience background -->
                    <div class="accordion-item mb-3">
                      <h2
                        class="accordion-header"
                        id="panelsStayOpen-headingWork"
                      >
                        <button
                          class="accordion-button p-2"
                          type="button"
                          data-coreui-toggle="collapse"
                          data-coreui-target="#panelsStayOpen-collapseWork"
                          aria-expanded="true"
                          aria-controls="panelsStayOpen-collapseWork"
                        >
                          Work Experience
                        </button>
                      </h2>
                      <div
                        id="panelsStayOpen-collapseWork"
                        class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingWork"
                      >
                        <div class="accordion-body">
                          <div class="row">
                            <div class="col-12">
                              <table
                                class="table table-hover"
                                style="border: 1px solid #ddd"
                              >
                                <thead>
                                  <tr>
                                    <th>Previous Company</th>
                                    <th>Job Title</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Job Description</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Test Corp</td>
                                    <td>Designer</td>
                                    <td>07/01/2017</td>
                                    <td>09/30/2019</td>
                                    <td>image editing</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <a
                            class="btn btn-sm btn-default ms-auto me-1"
                            href=""
                          >
                            <svg class="icon">
                              <use
                                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-plus"
                              ></use>
                            </svg>
                            Add Experience
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- /work experience background -->

                    <!-- education background -->
                    <div class="accordion-item mb-3">
                      <h2
                        class="accordion-header"
                        id="panelsStayOpen-headingEduc"
                      >
                        <button
                          class="accordion-button p-2"
                          type="button"
                          data-coreui-toggle="collapse"
                          data-coreui-target="#panelsStayOpen-collapseEduc"
                          aria-expanded="true"
                          aria-controls="panelsStayOpen-collapseEduc"
                        >
                          Educational Background
                        </button>
                      </h2>
                      <div
                        id="panelsStayOpen-collapseEduc"
                        class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingEduc"
                      >
                        <div class="accordion-body">
                          <div class="row">
                            <div class="col-12">
                              <table
                                class="table table-hover"
                                style="border: 1px solid #ddd"
                              >
                                <thead>
                                  <tr>
                                    <th>School Name</th>
                                    <th>Degree</th>
                                    <th>Field of Study</th>
                                    <th>Year of Completion</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Test School</td>
                                    <td>Bachelor of Arts</td>
                                    <td>Designing</td>
                                    <td>2017</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <a
                            class="btn btn-sm btn-default ms-auto me-1"
                            href=""
                          >
                            <svg class="icon">
                              <use
                                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-plus"
                              ></use>
                            </svg>
                            Add Education
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- /education background -->

                    <!-- dependents background -->
                    <div class="accordion-item mb-3">
                      <h2
                        class="accordion-header"
                        id="panelsStayOpen-headingDependents"
                      >
                        <button
                          class="accordion-button p-2"
                          type="button"
                          data-coreui-toggle="collapse"
                          data-coreui-target="#panelsStayOpen-collapseDependents"
                          aria-expanded="true"
                          aria-controls="panelsStayOpen-collapseDependents"
                        >
                          Dependents
                        </button>
                      </h2>
                      <div
                        id="panelsStayOpen-collapseDependents"
                        class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingDependents"
                      >
                        <div class="accordion-body">
                          <div class="row">
                            <div class="col-12">
                              <table
                                class="table table-hover"
                                style="border: 1px solid #ddd"
                              >
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Relationship</th>
                                    <th>Contact</th>
                                    <th>Date of Birth</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Naruto</td>
                                    <td>Brother</td>
                                    <td>0921182736</td>
                                    <td>03/18/1985</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <a
                            class="btn btn-sm btn-default ms-auto me-1"
                            href=""
                          >
                            <svg class="icon">
                              <use
                                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-plus"
                              ></use>
                            </svg>
                            Add Dependents
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- /dependents background -->
                  </div>
                </div>
                <div
                  class="tab-pane fade show"
                  id="nav-job"
                  role="tabpanel"
                  aria-labelledby="nav-job-tab"
                  tabindex="0"
                >
                  job tab
                </div>
                <div
                  class="tab-pane fade show"
                  id="nav-leave"
                  role="tabpanel"
                  aria-labelledby="nav-leave-tab"
                  tabindex="0"
                >
                  leave tab
                </div>
                <div
                  class="tab-pane fade show"
                  id="nav-performance"
                  role="tabpanel"
                  aria-labelledby="nav-performance-tab"
                  tabindex="0"
                >
                  performance tab
                </div>
                <div
                  class="tab-pane fade show"
                  id="nav-document"
                  role="tabpanel"
                  aria-labelledby="nav-document-tab"
                  tabindex="0"
                >
                  document tab
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>