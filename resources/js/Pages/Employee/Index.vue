<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    employees: []
});

const createEmployee = () =>  {
    alert("create user");
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #breadcrumbs>
            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb my-0 ms-2">
                      <li class="breadcrumb-item">
                          <!-- if breadcrumb is single--><span>Dashboard</span>
                      </li>
                      <li class="breadcrumb-item active"><span>Employee</span></li>
                  </ol>
              </nav>
        </template>

        <div class="col-md-12 text-end mb-2">
            <Link class="btn btn-dark btn-sm" :href="route('employee.create')" method="get" as="button">
                Create Employee
            </Link>
        </div>
        <div class="card mb-4">
            <div class="card-header"><strong>Employee</strong><span class="small ms-1">List</span></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Employment Status</th>
                            </tr>
                        </thead>
                        <tbody v-if="employees.length > 0">
                            <tr v-for="(employee, keyEmployee) in employees" :key="keyEmployee">
                                <td>{{employee.firstname +" "+ employee.middlename +" "+ employee.lastname}}</td>
                                <td>{{employee.employment_status}}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>