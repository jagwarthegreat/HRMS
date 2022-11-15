<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import addDocumentModal from "./../modals/AddDocumentModal.vue";

const newprops = defineProps({
  props: Array,
});
</script>
<template>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-3"  
        v-for="(hRequierments, keyHRequierments) in props.hiringRequirements"
        :key="keyHRequierments">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" :id="'hreq'+hRequierments.id">
          <label class="form-check-label" :for="'hreq'+hRequierments.id">
            {{hRequierments.title}}
          </label>
        </div>
      </div>  
    </div>
  </div>
</template>