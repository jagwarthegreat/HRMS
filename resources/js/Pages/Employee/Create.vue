<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

defineProps({
  employee_status: Array,
  departments: Array,
  positions: Array,
  locations: Array,
  employees: Array,
  paytypes: Array,
});

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
  employeeType: "",
  employeeStatus: "",
  doh: "",
  department: "",
  jobTitle: "",
  location: "",
  reportingTo: "",
  payRate: "",
  payType: "",
  shift: "",
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
        "employeeType",
        "employeeStatus",
        "doh",
        "department",
        "jobTitle",
        "location",
        "reportingTo",
        "payRate",
        "payType",
        "shift",
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
  width: 100%;
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

a.btn.btn-sm.btn-default.ms-auto.me-1 {
  border: 1px solid #ddd !important;
}

.basicInfoLabel {
  width: 200px;
  vertical-align: baseline;
  display: flex;
  justify-content: space-between;
  color: #768192;
}

.basicInfoData {
  padding-left: 10px;
  font-weight: 500;
}

th,
td {
  padding: 7px;
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
        <div class="col-md-3 mb-3">
          <div class="col-md-12">
            <div class="card mb-1">
              <div class="card-body">
                <div class="row">
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
          </div>
          <div class="col-md-12">
            <button
              type="button"
              class="btn btn-block btn-dark btn-sm"
              style="width: 100%"
            >
              Upload Photo
            </button>
          </div>
        </div>
        <div class="col-md-9">
          <form @submit.prevent="submit">
            <div class="accordion mb-3" id="employeeDetailAccordion">
              <!-- personal detial -->
              <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button
                    class="accordion-button p-2"
                    type="button"
                    data-coreui-toggle="collapse"
                    data-coreui-target="#panelsStayOpen-collapseOne"
                    aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne"
                  >
                    Personal Detail
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
                        <label for="contact" class="form-label">Contact</label>
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
                        <label for="address" class="form-label">Address</label>
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
                        <label for="gender" class="form-label">Gender</label>
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
                        <label for="sss" class="form-label">SSS Number</label>
                        <input
                          type="text"
                          class="form-control"
                          id="sss"
                          v-model="empform.sss"
                        />
                      </div>
                      <div class="col-md-4">
                        <label for="tin" class="form-label">TIN Number</label>
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
                      <div class="col-md-4">
                        <label for="employeeType" class="form-label"
                          >Employee Type</label
                        >
                        <select
                          class="form-select"
                          id="employeeType"
                          v-model="empform.employeeType"
                        >
                          <option value="">Full Time</option>
                          <option value="">Part Time</option>
                          <option value="">On Contract</option>
                          <option value="">Trainee</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="employeeStatus" class="form-label"
                          >Employee Status</label
                        >
                        <select
                          class="form-select"
                          id="employeeStatus"
                          v-model="empform.employeeStatus"
                        >
                          <option
                            v-for="(status, keyStatus) in employee_status"
                            :key="keyStatus"
                            :value="status.id"
                          >
                            {{ status.title }}
                          </option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="dob" class="form-label">Date of Hire</label>
                        <input
                          type="date"
                          class="form-control"
                          id="doh"
                          v-model="empform.doh"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /personal detial -->

              <!-- work detial -->
              <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="panelsStayOpen-headingWorkAdd">
                  <button
                    class="accordion-button p-2"
                    type="button"
                    data-coreui-toggle="collapse"
                    data-coreui-target="#panelsStayOpen-collapseWorkAdd"
                    aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseWorkAdd"
                  >
                    Work
                  </button>
                </h2>
                <div
                  id="panelsStayOpen-collapseWorkAdd"
                  class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingWorkAdd"
                >
                  <div class="accordion-body">
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label for="department" class="form-label"
                          >Department</label
                        >
                        <select
                          class="form-select"
                          id="department"
                          v-model="empform.department"
                        >
                          <option
                            v-for="(department, keyDepartment) in departments"
                            :key="keyDepartment"
                            :value="department.id"
                          >
                            {{ department.title }}
                          </option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="jobTitle" class="form-label"
                          >Job Title</label
                        >
                        <select
                          class="form-select"
                          id="jobTitle"
                          v-model="empform.jobTitle"
                        >
                          <option
                            v-for="(position, keyPosition) in positions"
                            :key="keyPosition"
                            :value="position.id"
                          >
                            {{ position.title }}
                          </option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="location" class="form-label"
                          >Location</label
                        >
                        <select
                          class="form-select"
                          id="location"
                          v-model="empform.location"
                        >
                          <option
                            v-for="(location, keylocation) in locations"
                            :key="keylocation"
                            :value="location.id"
                          >
                            {{ location.title }}
                          </option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="reportingTo" class="form-label"
                          >Reporting To</label
                        >
                        <select
                          class="form-select"
                          id="reportingTo"
                          v-model="empform.reportingTo"
                        >
                          <option
                            v-for="(employee, keyEmployee) in employees"
                            :key="keyEmployee"
                            :value="employee.id"
                          >
                            {{ employee.firstname }}
                          </option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="payRate" class="form-label">Pay Rate</label>
                        <input
                          type="text"
                          class="form-control"
                          id="payRate"
                          v-model="empform.payRate"
                        />
                      </div>
                      <div class="col-md-4">
                        <label for="payType" class="form-label">Pay Type</label>
                        <select
                          class="form-select"
                          id="payType"
                          v-model="empform.payType"
                        >
                          <option
                            v-for="(paytype, keypaytype) in paytypes"
                            :key="keypaytype"
                            :value="paytype.id"
                          >
                            {{ paytype.title }}
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /work detial -->
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-sm btn-primary">
                Create Employee
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>