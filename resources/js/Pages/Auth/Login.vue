<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components_lara/InputError.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import { ref, onMounted, onErrorCaptured } from "vue";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  username: "",
  password: "",
  lat: "",
  long: ""
});

const submit = () => {
  getLocation();
  // form.post(route("login"), {
  //   onSuccess: () => {
  //     form.reset("password");
  //     location.reload();
  //   },
  // });
};

let options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};

function getLocation() {
   if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(success, error, options);
   } else {
      alert("Geolocation is not supported by this browser.");
   }
}

function success(position) {
  var pos = position.coords.latitude +","+ position.coords.longitude;
  form.lat = position.coords.latitude;
  form.long = position.coords.longitude;
  
  form.post(route("login"), {
    onSuccess: () => {
      form.reset("password");

      const msg = usePage().props.value.flash.message;
      if(msg == null){
        location.reload();
      }
    },
  });
}

function error(err) {
  console.error(`ERROR(${err.code}): ${err.message}`);
  alert("Geolocation is having trouble, please reload the page and try again.");
}
</script>
<template>
  <GuestLayout>
    <div class="loginUi">
      <div class="min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
              <!-- <img src="/theme/assets/img/sjs_logo.png" style="height: 100%" /> -->
              LOGO HERE
            </div>
            <div class="col-lg-4">
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

                        <div class="input-group mb-3">
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
                          <span class="text-danger mb-2">
                            {{ $page.props.flash.message }}
                          </span>
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
