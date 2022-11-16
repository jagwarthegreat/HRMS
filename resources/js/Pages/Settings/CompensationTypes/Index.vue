<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import CreateCompensationTypesModal from "./CreateCompensationTypesModal.vue";

defineProps({
  paytypes: Array,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}
</script>
<template>
    <Head title="Compensation Types" />

    <AuthenticatedLayout>
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('dashboard')">Dashboard</Link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Settings</li>
            <li class="breadcrumb-item active" aria-current="page">
                Compensation Types
            </li>
        </template>

        <div class="col-md-12 text-end mb-2">
            <button
                class="btn btn-dark btn-sm"
                @click="openClickedModal('createCompensationTypeModal')"
            >
                Create Compensation Types
            </button>
        </div>

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">Type List</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>TITLE</th>
                                    </tr>
                                </thead>
                                <tbody v-if="paytypes.length > 0">
                                    <tr
                                        v-for="(
                                            paytype, keyPaytype
                                        ) in paytypes"
                                        :key="keyPaytype"
                                    >
                                        <td>{{ paytype.title }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <CreateCompensationTypesModal />
    </AuthenticatedLayout>
</template>