<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from 'vue'

defineProps({
  employee_status: Array,
});

function generateReport() {
    var status_id = $('#status_id').val();

    $('#contract_table').DataTable().destroy();
    $('#contract_table').dataTable({
        "searching": false,
        "paging": false,
        "processing": true,
        "info": false,
        "ajax": {
            "url": route("report.employee.status.filter"),
            "data": {
                status_id: status_id
            },
            "dataSrc": "data"
        },
        "columns": [{
            "data": "counter"
        },{
            "data": "employee_name"
        },{
            "data": "position"
        },{
            "data": "department"
        },{
            "data": "status"
        }],
    });
}
</script>
<style scoped>
td {
    padding: 3px;
    vertical-align: middle;
}
</style>
<template>
    <Head title="Employee Status Report" />

    <AuthenticatedLayout>
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('dashboard')">Report</Link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Employee Status Report
            </li>
        </template>

        <div
            class="col-md-12 d-flex flex-row mb-2"
            style="justify-content: space-between"
        >
            <div class="d-flex">
                <select
                    class="me-2 form-select form-select-sm"
                    name="status_id"
                    id="status_id"
                    style="width: 130px"
                >
                    <option
                        v-for="(empstats, empStatus) in employee_status"
                        :key="empStatus"
                        :value="empstats.id"
                    >
                        {{ empstats.title }}
                    </option>
                </select>

                <button
                    class="btn btn-dark btn-sm"
                    @click="generateReport()"
                >
                    Generate
                </button>
            </div>
        </div>

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header p-5">
                    <center>
                        <h3>SJS MANPOWER</h3>
                        <h4>Suntal Village, Circumferential Road</h4>
                        <h5>Employee Status Report</h5>
                    </center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover" id="contract_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>