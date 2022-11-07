<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components_lara/InputError.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  username: "",
  password: "",
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => {
      form.reset("password");
      location.reload();
    }
  });
};
</script>
<style>
.sml {
  font-size: 12px;
}
</style>
<template>
  <div class="loginUi">
    <div class="min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-4 p-4 mb-0">
                <div class="card-body">
                  <form @submit.prevent="submit">
                    <div class="mt-4">
                      <h1>Login</h1>
                      <p class="text-medium-emphasis mb-2">
                        Sign In to your account
                      </p>
                      <div class="input-group mb-3">
                        <span class="input-group-text">
                          <svg class="icon">
                            <use
                              xlink:href="theme/vendors/@coreui/icons/svg/free.svg#cil-user"
                            ></use>
                          </svg>
                        </span>
                        <input
                          class="form-control"
                          type="text"
                          placeholder="Username"
                          id="username"
                          v-model="form.username"
                          required
                          autofocus
                          autocomplete="username"
                        />
                      </div>
                      <InputError
                        class="mt-1"
                        :message="form.errors.username"
                      />

                      <div class="input-group mb-4">
                        <span class="input-group-text">
                          <svg class="icon">
                            <use
                              xlink:href="theme/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"
                            ></use>
                          </svg>
                        </span>
                        <input
                          class="form-control"
                          type="password"
                          placeholder="Password"
                          id="password"
                          v-model="form.password"
                          required
                          autocomplete="current-password"
                        />
                      </div>
                      <InputError
                        class="mt-1"
                        :message="form.errors.password"
                      />

                      <div class="row">
                        <div class="col-12 text-end">
                          <button
                            class="btn btn-primary px-4"
                            type="submit"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                          >
                            Login
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card col-md-8 text-white bg-primary py-5">
                <div class="card-body text-base">
                  <div>
                    <h2>HRMS</h2>
                    <p class="mb-3">
                      “HRMS” stands for Human Resources Management System. It
                      refers to a suite of software that organizations use to
                      manage internal HR functions. From employee data
                      management to payroll, recruitment, benefits, training,
                      talent management, employee engagement, and employee
                      attendance, HRMS software helps HR professionals manage
                      the modern workforce. Also called a human resources
                      information system (HRIS), HRMS systems put information
                      about a company's most valuable assets in front of the
                      people who need them.
                    </p>
                    <small class="bg-info px-1 sml"
                      >https://www.oracle.com/in/human-capital-management/hrms</small
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
