<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
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
  padding: 5px;
}
</style>

<template>
  <div class="accordion mb-3" id="jobDetailAccordion">
    <!-- employment status -->
    <div class="accordion-item mb-3">
      <h2 class="accordion-header" id="panelsStayOpen-headingEmployStats">
        <button
          class="accordion-button p-2"
          type="button"
          data-coreui-toggle="collapse"
          data-coreui-target="#panelsStayOpen-collapseEmployStats"
          aria-expanded="true"
          aria-controls="panelsStayOpen-collapseEmployStats"
        >
          Employee Status
        </button>
      </h2>
      <div
        id="panelsStayOpen-collapseEmployStats"
        class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingEmployStats"
      >
        <div class="accordion-body">
          <a class="btn btn-sm btn-default ms-auto me-1 mb-2" href="">
            <svg class="icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
              ></use>
            </svg>
            Update Employee Status
          </a>
          <div class="row">
            <div class="col-12">
              <table class="table table-hover" style="border: 1px solid #ddd">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Employee Status</th>
                    <th>Comment</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      07/21/2021
                      <span class="text-success">&#x25cf;</span>
                    </td>
                    <td>Active</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>07/21/2017</td>
                    <td>Inactive</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /employment status -->

    <!-- employment type -->
    <div class="accordion-item mb-3">
      <h2 class="accordion-header" id="panelsStayOpen-headingEmployType">
        <button
          class="accordion-button p-2"
          type="button"
          data-coreui-toggle="collapse"
          data-coreui-target="#panelsStayOpen-collapseEmployType"
          aria-expanded="true"
          aria-controls="panelsStayOpen-collapseEmployType"
        >
          Employment Type
        </button>
      </h2>
      <div
        id="panelsStayOpen-collapseEmployType"
        class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingEmployType"
      >
        <div class="accordion-body">
          <a class="btn btn-sm btn-default ms-auto me-1 mb-2" href="">
            <svg class="icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
              ></use>
            </svg>
            Update Employment Type
          </a>
          <div class="row">
            <div class="col-12">
              <table class="table table-hover" style="border: 1px solid #ddd">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Employement Type</th>
                    <th>Comment</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      07/21/2021
                      <span class="text-success">&#x25cf;</span>
                    </td>
                    <td>Regular</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>07/21/2017</td>
                    <td>Parttime</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /employment type -->

    <!-- Compensation -->
    <div class="accordion-item mb-3">
      <h2 class="accordion-header" id="panelsStayOpen-headingCompensation">
        <button
          class="accordion-button p-2"
          type="button"
          data-coreui-toggle="collapse"
          data-coreui-target="#panelsStayOpen-collapseCompensation"
          aria-expanded="true"
          aria-controls="panelsStayOpen-collapseCompensation"
        >
          Compensation
        </button>
      </h2>
      <div
        id="panelsStayOpen-collapseCompensation"
        class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingCompensation"
      >
        <div class="accordion-body">
          <a class="btn btn-sm btn-default ms-auto me-1 mb-2" href="">
            <svg class="icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
              ></use>
            </svg>
            Update Compensation
          </a>
          <div class="row">
            <div class="col-12">
              <table class="table table-hover" style="border: 1px solid #ddd">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Pay Rate</th>
                    <th>Pay Type</th>
                    <th>Change Reason</th>
                    <th>Comment</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      07/21/2021
                      <span class="text-success">&#x25cf;</span>
                    </td>
                    <td>10000</td>
                    <td>monthly</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Compensation -->

    <!-- job info -->
    <div class="accordion-item mb-3">
      <h2 class="accordion-header" id="panelsStayOpen-headingJobInfo">
        <button
          class="accordion-button p-2"
          type="button"
          data-coreui-toggle="collapse"
          data-coreui-target="#panelsStayOpen-collapseJobInfo"
          aria-expanded="true"
          aria-controls="panelsStayOpen-collapseJobInfo"
        >
          Job Information
        </button>
      </h2>
      <div
        id="panelsStayOpen-collapseJobInfo"
        class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingJobInfo"
      >
        <div class="accordion-body">
          <a class="btn btn-sm btn-default ms-auto me-1 mb-2" href="">
            <svg class="icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
              ></use>
            </svg>
            Update Information
          </a>
          <div class="row">
            <div class="col-12">
              <table class="table table-hover" style="border: 1px solid #ddd">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Department</th>
                    <th>Job Title</th>
                    <th>Reports To</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      07/21/2021
                      <span class="text-success">&#x25cf;</span>
                    </td>
                    <td>Main Location</td>
                    <td>Visuals</td>
                    <td>Designer</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /job info -->
  </div>
</template>