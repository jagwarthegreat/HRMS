<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ref, onMounted, on } from "vue";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </template>

    <div class="card mb-4">
      <div class="card-header">
        <strong>Card</strong><span class="small ms-1">Body</span>
      </div>
      <div class="card-body">
        <p class="text-medium-emphasis small">
          The main block of a card is the <code>.card-body</code>. Use it
          whenever you need a padded section within a card.
        </p>
        <div class="example">
          <div class="card">
            <div class="card-body">This is some text within a card body.</div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
