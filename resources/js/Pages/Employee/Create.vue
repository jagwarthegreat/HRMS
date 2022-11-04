<script setup>
import AuthenticatedLayout from './../../Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Create Employee" />

    <AuthenticatedLayout>
        <template #breadcrumbs>
            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb my-0 ms-2">
                      <li class="breadcrumb-item">
                          <!-- if breadcrumb is single--><span>Dashboard</span>
                      </li>
                      <li class="breadcrumb-item"><span>Employee</span></li>
                      <li class="breadcrumb-item active"><span>Create Employee</span></li>
                  </ol>
              </nav>
        </template>
        <div class="col-md-12 text-start mb-2">
            <Link class="btn btn-dark btn-sm" :href="route('employee.index')" method="get" as="button">
                Go back
            </Link>
        </div>
        <div class="card mb-4">
            <div class="card-header"><strong>Employee</strong><span class="small ms-1">Details</span></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        asdad
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>