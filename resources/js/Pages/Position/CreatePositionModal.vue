<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const positionform = useForm({
  title: "",
  position_id: "",
});

const submitForm = () => {
  positionform.title = $("#title").val();
  positionform.position_id = $("#position_id").val();

  positionform.post(route("position.store"), {
    onSuccess: () => {
      positionform.reset("title");
      $("#createPositionModal").modal("hide");
    },
  });
};
</script>

<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="createPositionModal"
        tabindex="-1"
        aria-labelledby="createPositionModal"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <form @submit.prevent="submitForm">
                    <input type="hidden" id="position_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPositionModalTitle">
                            Add Position
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-coreui-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="title" class="form-label"
                                    >Title</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    v-model="positionform.title"
                                />
                                <div
                                    class="invalid-feedback"
                                    v-show="positionform.errors.title"
                                    style="display: block"
                                >
                                    {{ positionform.errors.title }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            class="btn btn-sm btn-primary"
                            :class="{ 'opacity-25': positionform.processing }"
                            :disabled="positionform.processing"
                        >
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>