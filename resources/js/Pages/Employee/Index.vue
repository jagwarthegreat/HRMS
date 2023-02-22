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
  $('.employeetbl').DataTable();
  $('.employeetbl').attr('style', 'border-collapse: collapse !important');
})

function filterTable() {
    var filter_by_branch = $('#filter_by_branch').val();
    var filter_by_dept = $('#filter_by_dept').val();

    axios.get(route("employee"),{
        params: {
            filter_by_branch: filter_by_branch,
            filter_by_dept: filter_by_dept
        }
    })
    .then(function (response) {
        console.log(response);
    }).catch((error) => {
        console.log(error);
    });
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
                    <option
                        v-for="(department, departmenttype) in departments"
                        :key="departmenttype"
                        :value="department.id"
                    >
                        {{ department.title }}
                    </option>
                </select>

                <Link
                    class="btn btn-dark btn-sm"
                    method="get"
                    as="button"
                    @click="filterTable()"
                >
                    Filter
                </Link>
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
                <strong>Employee</strong><span class="small ms-1">List</span>
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
                            <tbody v-if="employees.length > 0">
                                <tr
                                    v-for="(employee, keyEmployee) in employees"
                                    :key="keyEmployee"
                                >
                                    <td style="font-weight: 600">
                                        {{
                                            employee.lastname +
                                            ", " +
                                            employee.firstname +
                                            " " +
                                            employee.middlename
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            employee.emp_curr_work == null
                                                ? "--"
                                                : employee.emp_curr_work
                                                      .positions.title
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            employee.emp_curr_work == null
                                                ? "---"
                                                : employee.emp_curr_work
                                                      .departments.title
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            employee.emp_curr_type == null
                                                ? "---"
                                                : employee.emp_curr_type
                                                      .employee_types.title
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            employee.emp_curr_status == null
                                                ? "---"
                                                : employee.emp_curr_status
                                                      .employee_statuses.title
                                        }}
                                    </td>
                                    <td>
                                        <Link
                                            class="btn btn-sm btn-ghost-secondary text-dark"
                                            :href="
                                                route(
                                                    'employee.show',
                                                    employee.id
                                                )
                                            "
                                            title="View"
                                        >
                                            <svg class="icon">
                                                <use
                                                    xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
                                                ></use>
                                            </svg>
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>