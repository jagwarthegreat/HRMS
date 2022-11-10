<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

const submit = () => {
  alert('saving changes...');
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
      <Link class="btn btn-dark btn-sm" :href="route('employee')"> Go back </Link>
    </div>

    <div class="col-md-12 mb-4">
      <div class="row">
        <div class="col-md-3 mb-3">

          <div class="col-md-12">
            <div class="card mb-1">
              <div class="card-body">
                <div class="row">
                  <div class="avatar">
                    <img class="avatar-img" src="/theme/assets/img/avatars/8.jpg" alt="user@email.com" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <button type="button" class="btn btn-block btn-dark btn-sm" style="width: 100%;">Upload Photo</button>
          </div>

        </div>
        <div class="col-md-9">

          <form @submit.prevent="submit">
            <div class="accordion mb-3" id="employeeDetailAccordion">
              <!-- personal detial -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" type="button" data-coreui-toggle="collapse"
                    data-coreui-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne">
                    Personal Detail
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingOne">
                  <div class="accordion-body">
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="firstname">
                      </div>
                      <div class="col-md-4">
                        <label for="middlename" class="form-label">Middlename</label>
                        <input type="text" class="form-control" id="middlename">
                      </div>
                      <div class="col-md-4">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="lastname">
                      </div>
                      <div class="col-md-4">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact">
                      </div>
                      <div class="col-md-8">
                        <label for="email" class="form-label">E-mail Address</label>
                        <input type="email" class="form-control" id="email">
                      </div>
                      <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address">
                      </div>
                      <div class="col-md-4">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob">
                      </div>
                      <div class="col-md-4">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender">
                          <option value="M">Male</option>
                          <option value="F">Female</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="civil_status" class="form-label">Civil Status</label>
                        <select class="form-select" id="civil_status">
                          <option value="">Single</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="sss" class="form-label">SSS Number</label>
                        <input type="text" class="form-control" id="sss">
                      </div>
                      <div class="col-md-4">
                        <label for="tin" class="form-label">TIN Number</label>
                        <input type="text" class="form-control" id="tin">
                      </div>
                      <div class="col-md-4">
                        <label for="pagibig" class="form-label">HDMF Number</label>
                        <input type="text" class="form-control" id="pagibig">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /personal detial -->

              <!-- education background -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingEduc">
                  <button class="accordion-button" type="button" data-coreui-toggle="collapse"
                    data-coreui-target="#panelsStayOpen-collapseEduc" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseEduc">
                    Educational Background
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseEduc" class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingEduc">
                  <div class="accordion-body">
                    <div class="row g-3">
                      <div class="col-md-8">
                        <label for="elementary" class="form-label">Elementary</label>
                        <input type="text" class="form-control" id="elementary">
                      </div>
                      <div class="col-md-4">
                        <label for="elem_year_graduated" class="form-label">Year Graduated</label>
                        <input type="date" class="form-control" id="elem_year_graduated">
                      </div>
                      <div class="col-md-8">
                        <label for="highschool" class="form-label">Highschool</label>
                        <input type="text" class="form-control" id="highschool">
                      </div>
                      <div class="col-md-4">
                        <label for="hs_year_graduated" class="form-label">Year Graduated</label>
                        <input type="date" class="form-control" id="hs_year_graduated">
                      </div>
                      <div class="col-md-8">
                        <label for="college" class="form-label">College</label>
                        <input type="text" class="form-control" id="college">
                      </div>
                      <div class="col-md-4">
                        <label for="college_year_graduated" class="form-label">Year Graduated</label>
                        <input type="date" class="form-control" id="college_year_graduated">
                      </div>
                      <div class="col-12">
                        <label for="degree" class="form-label">Degree Received</label>
                        <input type="text" class="form-control" id="degree">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /education background -->

              <!-- employment record -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                  <button class="accordion-button" type="button" data-coreui-toggle="collapse"
                    data-coreui-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseTwo">
                    Employment Record
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="accordion-body">
                    <div class="row g-3">

                      <div class="col-12">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company_name">
                      </div>
                      <div class="col-md-6">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position">
                      </div>
                      <div class="col-md-3">
                        <label for="from_date" class="form-label">From</label>
                        <input type="date" class="form-control" id="from_date">
                      </div>
                      <div class="col-md-3">
                        <label for="date_to" class="form-label">To</label>
                        <input type="date" class="form-control" id="date_to">
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <!-- /employment record -->
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>

        </div>
      </div>
    </div>

  </AuthenticatedLayout>
</template>