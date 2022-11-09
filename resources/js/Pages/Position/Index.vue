<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  positions: Array,
  canCreate: Boolean,
});

</script>
<template>
  <Head title="Position" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item"><Link :href="route('dashboard')">Dashboard</Link></li>
      <li class="breadcrumb-item active" aria-current="page">Position</li>
    </template>

    <div class="col-md-12 text-end mb-2" v-if="canCreate">
      <Link
        class="btn btn-dark btn-sm"
        :href="route('position.create')"
        method="get"
        as="button"
      >
        Create Position
      </Link>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">Position List</div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                  </tr>
                </thead>
                <tbody v-if="positions.length > 0">
                  <tr
                    v-for="(position, keyPosition) in positions"
                    :key="keyPosition"
                  >
                    <td>{{ position.id }}</td>
                    <td>{{ position.title }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>