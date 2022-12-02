<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import ShowProcurementDetails from "./Details/ShowProcurementDetails.vue";
import CreateProcurementDetails from "./Details/CreateProcurementDetails.vue";
import ShowProcurementInfo from "./ShowProcurementInfo.vue";

const props = defineProps({
  details:[],
  procurement:[],
  stocks:[],
});


const procurementFinishForm = useForm({
  procurement_id:props.procurement.id
});

const finishForm = () => {
  procurementFinishForm.post(route("procurement.finish"), {
    onSuccess: () => {
    },
  });
};
</script>
<template>
  <Head title="Procurements Details" />

  <AuthenticatedLayout>
    <template #breadcrumbs>
      <li class="breadcrumb-item">
        <Link :href="route('dashboard')">Dashboard</Link>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Procurements</li>
    </template>
    <div class="col-md-12 text-start mb-2">
      <Link class="btn btn-dark btn-sm" :href="route('procurement')">
        <svg class="icon">
          <use
            xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-arrow-left"
          ></use>
        </svg>
        Go back
      </Link>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ShowProcurementInfo :procurement="procurement"></ShowProcurementInfo>
      </div>
      <div class="row">
        <div class="col-md-4" v-show="procurement.status == 0">
          <CreateProcurementDetails :stocks="stocks" :procurement_id="procurement.id"></CreateProcurementDetails>
        </div>
        <div :class="props.procurement.status == 0 ?'col-md-8':'col-md-12'">
          <ShowProcurementDetails :details="details"></ShowProcurementDetails>
        </div>
      </div>
    </div>
    <div class="row" v-show="procurement.status == 0">
      <div class="col-md-12">
        <button
          type="button"
          class="btn btn-primary rounded-pill"
          style="float:right"
          @click="finishForm"
          :class="{ 'opacity-25': procurementFinishForm.processing }"
          :disabled="procurementFinishForm.processing"
        >
          <svg class="icon">
              <use
                xlink:href="/theme/vendors/@coreui/icons/svg/free.svg#cil-check"
              ></use>
            </svg>
          Finish Procurement
        </button>
      </div>
    </div>
  </AuthenticatedLayout>
</template>