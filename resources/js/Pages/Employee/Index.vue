<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from 'vue'

defineProps({
  employees: Array,
  departments: Array,
  locations: Array,
});

onMounted(() => {
    filterTable();
})

function filterTable() {
    var filter_by_branch = $('#filter_by_branch').val();
    var filter_by_dept = $('#filter_by_dept').val();

    getEmployeeData(filter_by_branch, filter_by_dept);
}

function getEmployeeData(filterByBranch = '', filterByDept = '') {
    var filter_by_branch = (filterByBranch == '') ? '' : filterByBranch;
    var filter_by_dept = (filterByDept == '') ? '' : filterByDept;

    $('#employeetbl').DataTable().destroy();
    $('#employeetbl').dataTable({
        "processing": true,
        "ajax": {
            "url": route("employee.filter"),
            "data":  {
                filter_by_branch: filter_by_branch,
                filter_by_dept: filter_by_dept
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
            "data": "employee_type"
        },{
            "data": "status"
        },{
            "mRender": function(data, type, row) {
                return '<a class="btn btn-sm btn-ghost-secondary text-dark" href="'+ route("employee.show", row.employee_id) +'" title="View"><svg class="icon"><use xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"></use></svg></a>';
            }
        }]
    });

    $('#filter_by_branch').val(filter_by_branch);
    $('#filter_by_dept').val(filter_by_dept);

    $('#employeetbl').attr('style', 'border-collapse: collapse !important');
}
</script>

<template>
    <Head title="Employee" />

    <AuthenticatedLayout>
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('dashboard')">Dashboard</Link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Employee</li>
        </template>

        <div
            class="col-md-12 d-flex flex-row mb-2"
            style="justify-content: space-between"
        >
            <div class="d-flex">
                <select
                    class="me-2 form-select form-select-sm"
                    name="filter_by_branch"
                    id="filter_by_branch"
                    style="width: 200px"
                >
                    <option value="-1">-- All Locations--</option>
                    <option
                        v-for="(location, locationtype) in locations"
                        :key="locationtype"
                        :value="location.id"
                    >
                        {{ location.title }}
                    </option>
                </select>

                <select
                    class="me-2 form-select form-select-sm"
                    name="filter_by_dept"
                    id="filter_by_dept"
                    style="width: 200px"
                >
                    <option value="-1">-- All Departments --</option>
                    <option
                        v-for="(department, departmenttype) in departments"
                        :key="departmenttype"
                        :value="department.id"
                    >
                        {{ department.title }}
                    </option>
                </select>

                <button
                    class="btn btn-dark btn-sm"
                    @click="filterTable()"
                >
                    Filter
                </button>
            </div>

            <div>
                <Link
                    class="btn btn-dark btn-sm"
                    :href="route('employee.create')"
                    method="get"
                    as="button"
                >
                    Create Employee
                </Link>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Employee List
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <table
                            class="table table-hover employeetbl"
                            id="employeetbl"
                        >
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Employment Type</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>