<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import CreateDocCategoryModal from "./CreateDocCategoryModal.vue";

defineProps({
  doccategories: Array,
  canCreate: Boolean,
});

function openClickedModal(modal) {
  $("#" + modal).modal("show");
}
</script>
<template>
    <Head title="Document Category" />

    <AuthenticatedLayout>
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('dashboard')">Dashboard</Link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Settings</li>
            <li class="breadcrumb-item active" aria-current="page">
                Document Category
            </li>
        </template>

        <div class="col-md-12 text-end mb-2">
            <button
                class="btn btn-dark btn-sm"
                @click="openClickedModal('createDocCatModal')"
            >
                Create Document Category
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
                                <tbody v-if="doccategories.length > 0">
                                    <tr
                                        v-for="(
                                            doccategory, keyDoccategory
                                        ) in doccategories"
                                        :key="keyDoccategory"
                                    >
                                        <td>{{ doccategory.title }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <CreateDocCategoryModal />
    </AuthenticatedLayout>
</template>