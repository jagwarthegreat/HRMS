<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Linkm, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
  title: "",
});

const permissionStore = () => {
  form.post(route("permission.store"), {
    onFinish: () => form.reset("title"),
  });
};
</script>

<template>
  <Head title="Create Permission" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
          <li class="breadcrumb-item">
            <!-- if breadcrumb is single--><span>Dashboard</span>
          </li>
          <li class="breadcrumb-item"><span>Permission</span></li>
          <li class="breadcrumb-item active"><span>Create Permission</span></li>
        </ol>
      </nav>
    </template>

    <div class="col-md-12 text-start mb-2">
      <a class="btn btn-dark btn-sm" :href="route('permission')"> Go back </a>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">Permission Details</div>
        <div class="card-body">
          <form @submit.prevent="permissionStore">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input
                    type="text"
                    class="form-control"
                    id="title"
                    v-model="form.title"
                  />
                </div>
              </div>
              <div class="col-12 text-base">
                <button
                  class="btn btn-dark px-4"
                  type="submit"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                >
                  Save
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>