<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

defineProps({});

const clientform = useForm({
  name: "",
  contact: "",
  email: "",
  address: "",
});

const submit = () => {
  clientform.post(route("client.store"), {
    onSuccess: () => {
      clientform.reset(["name", "contact", "email", "address"]);
    },
  });
};
</script>

<style scoped>
.avatar {
  width: 100%;
  height: 100%;
}

.avatar-img {
  width: 100%;
  height: 100%;
  border-radius: 50em;
}

.accordion-button {
  font-weight: 600;
  color: #272829;
  background-color: rgb(255 255 255 / 87%);
}

.accordion-item {
  border-top: 1px solid #ddd;
}

.accordion {
  --cui-accordion-active-color: #768192;
}

.accordion-body {
  overflow-y: auto;
}

a.btn.btn-sm.btn-default.ms-auto.me-1 {
  border: 1px solid #ddd !important;
}

.basicInfoLabel {
  width: 200px;
  vertical-align: baseline;
  display: flex;
  justify-content: space-between;
  color: #768192;
}

.basicInfoData {
  padding-left: 10px;
  font-weight: 500;
}

th,
td {
  padding: 7px;
}
</style>

<template>
  <Head title="Create Client" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item">
        <Link :href="route('dashboard')">Dashboard</Link>
      </li>
      <li class="breadcrumb-item">
        <Link :href="route('client')">Client</Link>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Create</li>
    </template>

    <div class="col-md-12 text-start mb-2">
      <Link class="btn btn-dark btn-sm" :href="route('client')"> Go back </Link>
    </div>

    <div class="col-md-12 mb-4">
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="col-md-12">
            <div class="card mb-1">
              <div class="card-body">
                <div class="row">
                  <div class="avatar">
                    <img
                      class="avatar-img"
                      src="/theme/assets/img/avatars/8.jpg"
                      alt="user@email.com"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <button
              type="button"
              class="btn btn-block btn-dark btn-sm"
              style="width: 100%"
            >
              Upload Photo
            </button>
          </div>
        </div>
        <div class="col-md-9">
          <form @submit.prevent="submit">
            <div class="accordion mb-3" id="employeeDetailAccordion">
              <!-- personal detial -->
              <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button
                    class="accordion-button p-2"
                    type="button"
                    data-coreui-toggle="collapse"
                    data-coreui-target="#panelsStayOpen-collapseOne"
                    aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne"
                  >
                    Personal Detail
                  </button>
                </h2>
                <div
                  id="panelsStayOpen-collapseOne"
                  class="accordion-collapse collapse show"
                  aria-labelledby="panelsStayOpen-headingOne"
                >
                  <div class="accordion-body">
                    <div class="row g-3">
                      <div class="col-md-8">
                        <label for="name" class="form-label">
                          Name<span class="text-danger">*</span>
                        </label>
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          v-model="clientform.name"
                        />
                        <div
                          class="invalid-feedback"
                          v-show="clientform.errors.name"
                          style="display: block"
                        >
                          {{ clientform.errors.name }}
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="contact" class="form-label">
                          Contact<span class="text-danger">*</span>
                        </label>
                        <input
                          type="text"
                          class="form-control"
                          id="contact"
                          v-model="clientform.contact"
                        />
                        <div
                          class="invalid-feedback"
                          v-show="clientform.errors.contact"
                          style="display: block"
                        >
                          {{ clientform.errors.contact }}
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="email" class="form-label"
                          >E-mail Address</label
                        >
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          v-model="clientform.email"
                        />
                        <div
                          class="invalid-feedback"
                          v-show="clientform.errors.email"
                          style="display: block"
                        >
                          {{ clientform.errors.email }}
                        </div>
                      </div>
                      <div class="col-md-8">
                        <label for="address" class="form-label">Address</label>
                        <input
                          type="address"
                          class="form-control"
                          id="address"
                          v-model="clientform.address"
                        />
                        <div
                          class="invalid-feedback"
                          v-show="clientform.errors.address"
                          style="display: block"
                        >
                          {{ clientform.errors.address }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /personal detial -->
            </div>

            <div class="col-12">
              <button
                type="submit"
                class="btn btn-sm btn-primary"
                :class="{ 'opacity-25': clientform.processing }"
                :disabled="clientform.processing"
              >
                Create Client
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>