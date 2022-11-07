<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Head title="Create Employee" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item"><Link :href="route('dashboard')">Dashboard</Link></li>
      <li class="breadcrumb-item"><Link :href="route('employee')">User</Link></li>
      <li class="breadcrumb-item active" aria-current="page">Create</li>
    </template>

    <div class="col-md-12 text-start mb-2">
      <Link class="btn btn-dark btn-sm" :href="route('employee')"> Go back </Link>
    </div>
    <div class="card mb-4">
      <div class="card-header">
        <strong>Employee</strong><span class="small ms-1">Details</span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">asdad</div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>