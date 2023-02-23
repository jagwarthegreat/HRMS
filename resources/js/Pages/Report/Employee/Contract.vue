<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

function generateReport() {
    var contract_month = $('#contract_month').val();

    $('#contract_table').DataTable().destroy();
    $('#contract_table').dataTable({
        "searching": false,
        "paging": false,
        "processing": true,
        "info": false,
        "ajax": {
            "url": route("report.employee.contract.filter"),
            "data": {
                contract_month: contract_month
            },
            "dataSrc": "data"
        },
        "columns": [{
            "data": "employee_name"
        },{
            "data": "position"
        },{
            "data": "department"
        },{
            "data": "contract_end_date"
        }]
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
    <Head title="Employee Contract Report" />

    <AuthenticatedLayout>
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('dashboard')">Report</Link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Employee Contract Report
            </li>
        </template>

        <div
            class="col-md-12 d-flex flex-row mb-2"
            style="justify-content: space-between"
        >
            <div class="d-flex">
                <select
                    class="me-2 form-select form-select-sm"
                    name="contract_month"
                    id="contract_month"
                    style="width: 130px"
                >
                    <option value="1">1 MONTH</option>
                    <option value="2">2 MONTHS</option>
                    <option value="3">3 MONTHS</option>
                    <option value="4">4 MONTHS</option>
                    <option value="5">5 MONTHS</option>
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
                        <h5>Employee Contract Report</h5>
                    </center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover" id="contract_table">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Contract End Date</th>
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