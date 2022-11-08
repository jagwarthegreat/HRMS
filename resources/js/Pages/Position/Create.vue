<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
  title: "",
});

const positionStore = () => {
  form.post(route("position.store"), {
    onFinish: () => form.reset("title"),
  });
};
</script>

<template>
  <Head title="Create Position" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item"><Link :href="route('dashboard')">Dashboard</Link></li>
      <li class="breadcrumb-item"><Link :href="route('position')">Position</Link></li>
      <li class="breadcrumb-item active" aria-current="page">Create</li>
    </template>

    <div class="col-md-12 text-start mb-2">
      <Link class="btn btn-dark btn-sm" :href="route('position')"> Go back </Link>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">Position Details</div>
        <div class="card-body">
          <form @submit.prevent="positionStore">
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