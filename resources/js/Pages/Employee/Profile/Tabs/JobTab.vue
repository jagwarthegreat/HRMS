<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import EmployeeStatusModal from "./../modals/EmployeeStatusModal.vue";
import EmployeeTypeModal from "./../modals/EmployeeTypeModal.vue";
import EmployeeCompensationModal from "./../modals/EmployeeCompensationModal.vue";
import EmployeeJobInfoModal from "./../modals/EmployeeJobInfoModal.vue";

const newprops = defineProps({
  props: Array,
});

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
                    <button
                        class="btn btn-sm btn-default ms-auto me-1 mb-2"
                        @click="openClickedModal('employeeStatusModal')"
                    >
                        <svg class="icon">
                            <use
                                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
                            ></use>
                        </svg>
                        Update Employee Status
                    </button>
                    <div class="row">
                        <div class="col-12">
                            <table
                                class="table table-hover"
                                style="border: 1px solid #ddd"
                            >
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Employee Status</th>
                                        <th>Comment</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-if="
                                            props.employee.emp_status_histories
                                                .length < 1
                                        "
                                    >
                                        <td colspan="4">
                                            No status history found.
                                        </td>
                                    </tr>
                                    <tr
                                        v-else
                                        v-for="(
                                            statusHistory, keyStatusHistory
                                        ) in props.employee
                                            .emp_status_histories"
                                        :key="keyStatusHistory"
                                    >
                                        <td>
                                            {{ statusHistory.trans_date }}
                                            <span
                                                v-show="
                                                    statusHistory.status == 1
                                                "
                                                class="text-success"
                                                >&#x25cf;</span
                                            >
                                        </td>
                                        <td>
                                            {{
                                                statusHistory.employee_statuses
                                                    .title
                                            }}
                                        </td>
                                        <td>{{ statusHistory.comment }}</td>
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
                    <button
                        class="btn btn-sm btn-default ms-auto me-1 mb-2"
                        @click="openClickedModal('employeeTypeModal')"
                    >
                        <svg class="icon">
                            <use
                                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
                            ></use>
                        </svg>
                        Update Employment Type
                    </button>
                    <div class="row">
                        <div class="col-12">
                            <table
                                class="table table-hover"
                                style="border: 1px solid #ddd"
                            >
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Employement Type</th>
                                        <th>Comment</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-if="
                                            props.employee.emp_type_histories
                                                .length < 1
                                        "
                                    >
                                        <td colspan="4">
                                            No employment type history found.
                                        </td>
                                    </tr>
                                    <tr
                                        v-else
                                        v-for="(
                                            typeHistory, keyTypeHistory
                                        ) in props.employee.emp_type_histories"
                                        :key="keyTypeHistory"
                                    >
                                        <td>
                                            {{ typeHistory.trans_date }}
                                            <span
                                                v-show="typeHistory.status == 1"
                                                class="text-success"
                                                >&#x25cf;</span
                                            >
                                        </td>
                                        <td>
                                            {{
                                                typeHistory.employee_types.title
                                            }}
                                        </td>
                                        <td>{{ typeHistory.comment }}</td>
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
            <h2
                class="accordion-header"
                id="panelsStayOpen-headingCompensation"
            >
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
                    <button
                        class="btn btn-sm btn-default ms-auto me-1 mb-2"
                        @click="openClickedModal('compensationModal')"
                    >
                        <svg class="icon">
                            <use
                                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
                            ></use>
                        </svg>
                        Update Compensation
                    </button>
                    <div class="row">
                        <div class="col-12">
                            <table
                                class="table table-hover"
                                style="border: 1px solid #ddd"
                            >
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
                                    <tr
                                        v-if="
                                            props.employee
                                                .emp_compensation_histories
                                                .length < 1
                                        "
                                    >
                                        <td colspan="6">
                                            No compensation history found.
                                        </td>
                                    </tr>
                                    <tr
                                        v-else
                                        v-for="(
                                            compensationHistory,
                                            keyCompensationHistory
                                        ) in props.employee
                                            .emp_compensation_histories"
                                        :key="keyCompensationHistory"
                                    >
                                        <td>
                                            {{ compensationHistory.trans_date }}
                                            <span
                                                v-show="
                                                    compensationHistory.status ==
                                                    1
                                                "
                                                class="text-success"
                                                >&#x25cf;</span
                                            >
                                        </td>
                                        <td>
                                            {{ compensationHistory.pay_rate }}
                                        </td>
                                        <td>
                                            {{
                                                compensationHistory.pay_types
                                                    .title
                                            }}
                                        </td>
                                        <td>
                                            {{ compensationHistory.reason }}
                                        </td>
                                        <td>
                                            {{ compensationHistory.comment }}
                                        </td>
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
                    <button
                        class="btn btn-sm btn-default ms-auto me-1 mb-2"
                        @click="openClickedModal('jobInfoModal')"
                    >
                        <svg class="icon">
                            <use
                                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
                            ></use>
                        </svg>
                        Update Information
                    </button>
                    <div class="row">
                        <div class="col-12">
                            <table
                                class="table table-hover"
                                style="border: 1px solid #ddd"
                            >
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Department</th>
                                        <th>Job Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-if="
                                            props.employee.emp_job_histories
                                                .length < 1
                                        "
                                    >
                                        <td colspan="5">
                                            No job history found.
                                        </td>
                                    </tr>
                                    <tr
                                        v-else
                                        v-for="(
                                            jobHistory, keyJobHistory
                                        ) in props.employee.emp_job_histories"
                                        :key="keyJobHistory"
                                    >
                                        <td>
                                            {{ jobHistory.trans_date }}
                                            <span
                                                v-show="jobHistory.status == 1"
                                                class="text-success"
                                                >&#x25cf;</span
                                            >
                                        </td>
                                        <td>
                                            {{ jobHistory.locations.title }}
                                        </td>
                                        <td>
                                            {{ jobHistory.departments.title }}
                                        </td>
                                        <td>
                                            {{ jobHistory.positions.title }}
                                        </td>
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

        <EmployeeStatusModal
            :employee_id="props.employee.id"
            :employee_statuses="props.employee_status"
        />
        <EmployeeTypeModal
            :employee_id="props.employee.id"
            :employment_types="props.employeeTypes"
        />
        <EmployeeCompensationModal
            :employee_id="props.employee.id"
            :paytypes="props.paytypes"
        />
        <EmployeeJobInfoModal
            :employee_id="props.employee.id"
            :locations="props.locations"
            :departments="props.departments"
            :positions="props.positions"
            :reportingto="props.employees"
        />
    </div>
</template>