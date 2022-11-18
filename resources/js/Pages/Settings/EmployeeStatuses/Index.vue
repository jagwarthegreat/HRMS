<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import CreateStatusModal from "./CreateStatusModal.vue";

defineProps({
  statuses: Array,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}

const form = useForm();
function destroy(id) {
  if (confirm("Are you sure you want to Delete")) {
      form.delete(route('settings.emp.statuses.destroy', id));
  }
}
</script>
<style scoped>
td {
  padding: 3px;
  vertical-align: middle;
}
</style>
<template>
  <Head title="Employee Statuses" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item">
        <Link :href="route('dashboard')">Dashboard</Link>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Settings</li>
      <li class="breadcrumb-item active" aria-current="page">
        Employee Statuses
      </li>
    </template>

    <div class="col-md-12 text-end mb-2">
      <button
        class="btn btn-dark btn-sm"
        @click="openClickedModal('createStatusModal')"
      >
        Create Employee Status
      </button>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">Status List</div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>TITLE</th>
                    <th style="width: 100px"></th>
                  </tr>
                </thead>
                <tbody v-if="statuses.length > 0">
                  <tr
                    v-for="(empstatus, keyEmpstatus) in statuses"
                    :key="keyEmpstatus"
                  >
                    <td>{{ empstatus.title }}</td>
                    <td>
                      <button
                        class="btn btn-sm btn-ghost-secondary text-dark"
                        @click="destroy(empstatus.id)"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                      >
                        <svg class="icon">
                          <use
                            xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"
                          ></use>
                        </svg>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <CreateStatusModal />
  </AuthenticatedLayout>
</template>