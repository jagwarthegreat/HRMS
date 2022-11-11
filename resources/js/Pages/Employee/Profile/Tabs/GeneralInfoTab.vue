<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
  employee: Array,
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
  <div class="accordion mb-3" id="employeeDetailAccordion">
    <!-- basic info -->
    <div class="accordion-item mb-3">
      <h2 class="accordion-header" id="panelsStayOpen-headingBasic">
        <button
          class="accordion-button p-2"
          type="button"
          data-coreui-toggle="collapse"
          data-coreui-target="#panelsStayOpen-collapseBasic"
          aria-expanded="true"
          aria-controls="panelsStayOpen-collapseBasic"
        >
          Basic Info
        </button>
      </h2>
      <div
        id="panelsStayOpen-collapseBasic"
        class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingBasic"
      >
        <div class="accordion-body">
          <div class="row">
            <div class="col-md-6">
              <table>
                <tr>
                  <td class="basicInfoLabel">
                    <span>First Name</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.firstname }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Employee ID</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.employee_code }}</td>
                </tr>
              </table>
            </div>
            <div class="col-md-6">
              <table>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Last Name</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.lastname }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Email</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.email }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /basic info -->

    <!-- Work info -->
    <div class="accordion-item mb-3">
      <h2 class="accordion-header" id="panelsStayOpen-headingCurrWork">
        <button
          class="accordion-button p-2"
          type="button"
          data-coreui-toggle="collapse"
          data-coreui-target="#panelsStayOpen-collapseCurrWork"
          aria-expanded="true"
          aria-controls="panelsStayOpen-collapseCurrWork"
        >
          Work
        </button>
      </h2>
      <div
        id="panelsStayOpen-collapseCurrWork"
        class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingCurrWork"
      >
        <div class="accordion-body">
          <div class="row">
            <div class="col-md-6">
              <table>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Department</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">Visuals</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Reporting To</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData"></td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Employee Status</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">Active</td>
                </tr>
              </table>
            </div>
            <div class="col-md-6">
              <table>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Title</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">Designer</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Date of Hire</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">04/14/2014</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Employee Type</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">Regular</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Work info -->

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
          Personal Details
        </button>
      </h2>
      <div
        id="panelsStayOpen-collapseOne"
        class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingOne"
      >
        <div class="accordion-body">
          <div class="row">
            <div class="col-md-6">
              <table>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Address</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">
                    {{ employee.address }}
                  </td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Date of Birth</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.date_of_birth }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Civil Status</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.civil_status }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>TIN Number</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.tin_number }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>PHILHEALTH Number</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">
                    {{ employee.philhealth_number }}
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-6">
              <table>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Contac</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.contact }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Gender</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.gender }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>SSS Number</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.sss_number }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>HDMF Number</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.pagibig_number }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /personal detial -->

    <!-- work experience background -->
    <div class="accordion-item mb-3">
      <h2 class="accordion-header" id="panelsStayOpen-headingWork">
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
              <table class="table table-hover" style="border: 1px solid #ddd">
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
          <a class="btn btn-sm btn-default ms-auto me-1" href="">
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
      <h2 class="accordion-header" id="panelsStayOpen-headingEduc">
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
              <table class="table table-hover" style="border: 1px solid #ddd">
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
          <a class="btn btn-sm btn-default ms-auto me-1" href="">
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
      <h2 class="accordion-header" id="panelsStayOpen-headingDependents">
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
              <table class="table table-hover" style="border: 1px solid #ddd">
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
          <a class="btn btn-sm btn-default ms-auto me-1" href="">
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
</template>