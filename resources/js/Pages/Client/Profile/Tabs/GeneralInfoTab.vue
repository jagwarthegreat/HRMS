<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import WorkExperienceModal from "./../modals/WorkExperienceModal.vue";
import EducBgModal from "./../modals/EducBgModal.vue";
import DependentsModal from "./../modals/DependentsModal.vue";

const props = defineProps({
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

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const work_status =
  props.employee.emp_status_histories[0] == null
    ? "---"
    : props.employee.emp_status_histories[0].employee_statuses.title;
const work_type =
  props.employee.emp_type_histories[0] == null
    ? "---"
    : props.employee.emp_type_histories[0].employee_types.title;
const work_department =
  props.employee.emp_job_histories[0] == null
    ? "---"
    : props.employee.emp_job_histories[0].departments.title;
const work_title =
  props.employee.emp_job_histories[0] == null
    ? "---"
    : props.employee.emp_job_histories[0].positions.title;
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

button.btn.btn-sm.btn-default.ms-auto.me-1 {
  border: 1px solid #0000002e !important;
  box-shadow: none !important;
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
                  <td class="basicInfoData">{{ work_department }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Employee Status</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">
                    {{ work_status }}
                  </td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Employee Type</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ work_type }}</td>
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
                  <td class="basicInfoData">{{ work_title }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Date of Hire</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ employee.date_of_hire }}</td>
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
          <button
            class="btn btn-sm btn-default ms-auto me-1 mb-2"
            @click="openClickedModal('workExperienceModal')"
          >
            <svg class="icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-plus"
              ></use>
            </svg>
            Add Experience
          </button>
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
                  <tr v-if="employee.work_experiences.length < 1">
                    <td colspan="5">No work experiences found.</td>
                  </tr>
                  <tr
                    v-else
                    v-for="(workExp, keyWorkExp) in employee.work_experiences"
                    :key="keyWorkExp"
                  >
                    <td>{{ workExp.companyName }}</td>
                    <td>{{ workExp.jobtitle }}</td>
                    <td>{{ workExp.from }}</td>
                    <td>{{ workExp.to }}</td>
                    <td>{{ workExp.job_desc }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
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
          <button
            class="btn btn-sm btn-default ms-auto me-1 mb-2"
            @click="openClickedModal('educBgModal')"
          >
            <svg class="icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-plus"
              ></use>
            </svg>
            Add Education
          </button>
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
                  <tr v-if="employee.educ_backgrounds.length < 1">
                    <td colspan="5">No education information found.</td>
                  </tr>
                  <tr
                    v-else
                    v-for="(educBg, keyEducBg) in employee.educ_backgrounds"
                    :key="keyEducBg"
                  >
                    <td>{{ educBg.schoolName }}</td>
                    <td>{{ educBg.degree }}</td>
                    <td>{{ educBg.field }}</td>
                    <td>{{ educBg.year }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
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
          <button
            class="btn btn-sm btn-default ms-auto me-1 mb-2"
            @click="openClickedModal('dependentsModal')"
          >
            <svg class="icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-plus"
              ></use>
            </svg>
            Add Dependents
          </button>
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
                  <tr v-if="employee.dependents.length < 1">
                    <td colspan="4">No dependent information found.</td>
                  </tr>
                  <tr
                    v-else
                    v-for="(dependent, keyDependent) in employee.dependents"
                    :key="keyDependent"
                  >
                    <td>{{ dependent.fullname }}</td>
                    <td>{{ dependent.relationship }}</td>
                    <td>{{ dependent.contact }}</td>
                    <td>{{ dependent.dob }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /dependents background -->

    <WorkExperienceModal :employee_id="employee.id" />
    <EducBgModal :employee_id="employee.id" />
    <DependentsModal :employee_id="employee.id" />
  </div>
</template>