<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  client: Object,
});

const empform = useForm({
  name: "",
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
                    <span>Name</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ client.name }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Email</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ client.email }}</td>
                </tr>
              </table>
            </div>
            <div class="col-md-6">
              <table>
                <tr>
                  <td class="basicInfoLabel">
                    <span>Contact</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ client.contact }}</td>
                </tr>
                <tr>
                  <td class="basicInfoLabel">
                    <span>address</span>
                    <span>:</span>
                  </td>
                  <td class="basicInfoData">{{ client.address }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /basic info -->
  </div>
</template>