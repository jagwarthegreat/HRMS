<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ref, onMounted, on } from "vue";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
          <li class="breadcrumb-item active">
            <!-- if breadcrumb is single--><span>Dashboard</span>
          </li>
          <!-- <li class="breadcrumb-item active"><span>Dashboard</span></li> -->
        </ol>
      </nav>
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
