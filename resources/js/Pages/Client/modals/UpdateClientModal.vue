<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const client_form = useForm({
    client_id: "",
    name: "",
    address: "",
    contact: "",
    email: "",
});

const updateClient = () => {
    client_form.client_id = $("#clientid").val();
    client_form.name = $("#name").val();
    client_form.contact = $("#contact").val();
    client_form.email = $("#email").val();
    client_form.address = $("#address").val();

    client_form.post(route("client.update"), {
    	preserveScroll: true,
        onSuccess: () => {
          $("#updateClientModal").modal("hide");
        },
    });
};

onMounted(()=>{
    
});
</script>
<style scoped>
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
</style>
<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="updateClientModal"
        tabindex="-1"
        aria-labelledby="updateClientModal"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form @submit.prevent="updateClient">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateClientModal">
                            Update Client Detail
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-coreui-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="clientid">
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <label
                                            for="name"
                                            class="form-label"
                                        >
                                            Name<span
                                                class="text-danger"
                                                >*</span
                                            >
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            v-model="client_form.name"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-show="
                                                client_form.errors
                                                    .name
                                            "
                                            style="display: block"
                                        >
                                            {{
                                                client_form.errors
                                                    .name
                                            }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label
                                            for="contact"
                                            class="form-label"
                                        >
                                            Contact<span
                                                class="text-danger"
                                                >*</span
                                            >
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="contact"
                                            v-model="
                                                client_form.contact
                                            "
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-show="
                                                client_form.errors
                                                    .contact
                                            "
                                            style="display: block"
                                        >
                                            {{
                                                client_form.errors
                                                    .contact
                                            }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label
                                            for="email"
                                            class="form-label"
                                            >E-mail Address</label
                                        >
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="email"
                                            v-model="
                                                client_form.email
                                            "
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-show="
                                                client_form.errors
                                                    .email
                                            "
                                            style="display: block"
                                        >
                                            {{
                                                client_form.errors
                                                    .email
                                            }}
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label
                                            for="address"
                                            class="form-label"
                                            >Address</label
                                        >
                                        <input
                                            type="address"
                                            class="form-control"
                                            id="address"
                                            v-model="
                                                client_form.address
                                            "
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-show="
                                                client_form.errors
                                                    .address
                                            "
                                            style="display: block"
                                        >
                                            {{
                                                client_form.errors
                                                    .address
                                            }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            class="btn btn-sm btn-primary"
                            :class="{ 'opacity-25': client_form.processing }"
                            :disabled="client_form.processing"
                        >
                            Update client
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>