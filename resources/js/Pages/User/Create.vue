<script setup>
import AuthenticatedLayout from './../../Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Create User" />

    <AuthenticatedLayout>
        <template #breadcrumbs>
            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb my-0 ms-2">
                      <li class="breadcrumb-item">
                          <!-- if breadcrumb is single--><span>Dashboard</span>
                      </li>
                      <li class="breadcrumb-item"><span>User</span></li>
                      <li class="breadcrumb-item active"><span>Create User</span></li>
                  </ol>
              </nav>
        </template>

        <div class="card mb-4">
            <div class="card-header"><strong>User</strong><span class="small ms-1">Details</span></div>
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