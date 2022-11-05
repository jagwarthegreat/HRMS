<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Linkm, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const roleform = useForm({
  roletitle: "",
});

const roleStore = () => {
  roleform.post(route("role.store"), {
    onFinish: () => roleform.reset("title"),
  });
};

onMounted(() => {
  $(".form-multi-select").select2();
});
// $(".js-example-basic-multiple").select2();
</script>

<template>
  <Head title="Create Role" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
          <li class="breadcrumb-item">
            <!-- if breadcrumb is single--><span>Dashboard</span>
          </li>
          <li class="breadcrumb-item"><span>Role</span></li>
          <li class="breadcrumb-item active"><span>Create Role</span></li>
        </ol>
      </nav>
    </template>

    <div class="col-md-12 text-start mb-2">
      <a class="btn btn-dark btn-sm" :href="route('role')"> Go back </a>
    </div>

    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header">Role Detail</div>
        <div class="card-body">
          <form @submit.prevent="roleStore">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="roletitle" class="form-label">Title</label>
                  <input type="text" class="form-control" id="roletitle" />
                </div>
                <div class="mb-3">
                  <label for="rolepermissions" class="form-label"
                    >Permissions</label
                  >
                  <select
                    class="form-multi-select"
                    multiple
                    data-coreui-search="true"
                  >
                    <option value="AL">Alabama</option>
                    <option value="AS">AUSTIRia</option>
                    <option value="WY">Wyoming</option>
                  </select>
                </div>
              </div>
              <div class="col-12 text-base">
                <button class="btn btn-dark px-4" type="submit">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>