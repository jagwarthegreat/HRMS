<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  clients: [],
});

const createEmployee = () => {
  alert("create client");
};
</script>

<template>
  <Head title="Clients" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item">
        <Link :href="route('dashboard')">Dashboard</Link>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Client</li>
    </template>

    <div class="col-md-12 text-end mb-2">
      <Link
        class="btn btn-dark btn-sm"
        :href="route('client.create')"
        method="get"
        as="button"
      >
        Create Client
      </Link>
    </div>
    <div class="card mb-4">
      <div class="card-header">
        <strong>Client</strong><span class="small ms-1">List</span>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <div class="row">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th></th>
                </tr>
              </thead>
              <tbody v-if="clients.length > 0">
                <tr v-for="(client, keyClient) in clients" :key="keyClient">
                  <td>
                    {{ client.name }}
                  </td>
                  <td>
                    {{ client.address }}
                  </td>
                  <td>
                    {{ client.contact }}
                  </td>
                  <td>
                    {{ client.email }}
                  </td>
                  <td>
                    <Link
                      class="btn btn-sm btn-default ms-auto me-1"
                      :href="route('client.show', client.id)"
                    >
                      <svg class="icon">
                        <use
                          xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"
                        ></use>
                      </svg>
                      view
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