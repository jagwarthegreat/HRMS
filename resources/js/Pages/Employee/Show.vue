<script setup>
import AuthenticatedLayout from "./../../Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
</script>

<template>

    <Head title="Create Employee" />

    <AuthenticatedLayout>
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('dashboard')">Dashboard</Link>
            </li>
            <li class="breadcrumb-item">
                <Link :href="route('employee')">User</Link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </template>

        <div class="col-md-12 text-start mb-2">
            <Link class="btn btn-dark btn-sm" :href="route('employee')"> Go back </Link>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">

                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>Employee</strong><span class="small ms-1">Details</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    asd
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="align-items-start">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-home-tab" data-coreui-toggle="pill"
                                    data-coreui-target="#v-pills-home" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true">Personal Details</button>
                                <button class="nav-link" id="v-pills-profile-tab" data-coreui-toggle="pill"
                                    data-coreui-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                                <button class="nav-link" id="v-pills-messages-tab" data-coreui-toggle="pill"
                                    data-coreui-target="#v-pills-messages" type="button" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">Messages</button>
                                <button class="nav-link" id="v-pills-settings-tab" data-coreui-toggle="pill"
                                    data-coreui-target="#v-pills-settings" type="button" role="tab"
                                    aria-controls="v-pills-settings" aria-selected="false">Settings</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab" tabindex="0">

                            <div class="card mb-4">
                                <div class="card-header">
                                    <b>Personal Details</b>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <form class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="inputEmail4" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputPassword4" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="inputPassword4">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputAddress" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="inputAddress"
                                                        placeholder="1234 Main St">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputAddress2" class="form-label">Address 2</label>
                                                    <input type="text" class="form-control" id="inputAddress2"
                                                        placeholder="Apartment, studio, or floor">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputCity" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="inputState" class="form-label">State</label>
                                                    <select id="inputState" class="form-select">
                                                        <option selected>Choose...</option>
                                                        <option>...</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="inputZip" class="form-label">Zip</label>
                                                    <input type="text" class="form-control" id="inputZip">
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                                        <label class="form-check-label" for="gridCheck">
                                                            Check me out
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel"
                            aria-labelledby="v-pills-disabled-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
                    </div>
                </div>
            </div>
        </div>



    </AuthenticatedLayout>
</template>