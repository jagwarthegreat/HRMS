<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import addDocumentModal from "./../modals/AddDocumentModal.vue";

const newprops = defineProps({
  props: Object,
});

const form = useForm({
  employee_id: newprops.props.employee.id,
  req_status: ''
});
function requirementCheck(id) {
  if($("#hreq"+id).is(":checked")){
    // add to emp_requirements
    form.req_status = "insert"
  }else{
    // delete from emp_requirements
    form.req_status = "delete"
  }
 
  form.post(route('employee.requirement.update', id));
}
</script>
<template>
  <div class="col-md-12">
    <div class="row">
      <div
        class="col-md-3"
        v-for="(hRequierments, keyHRequierments) in props.requirementsWithCheck"
        :key="keyHRequierments"
      >
        <div class="form-check">
          <input
            v-if="hRequierments.ischecked == 'checked'"
            class="form-check-input"
            checked
            type="checkbox"
            value=""
            :id="'hreq' + hRequierments.req_id"
            @click="requirementCheck(hRequierments.req_id)"
          />
          <input
            v-else
            class="form-check-input"
            type="checkbox"
            value=""
            :id="'hreq' + hRequierments.req_id"
            @click="requirementCheck(hRequierments.req_id)"
          />
          <label class="form-check-label" :for="'hreq' + hRequierments.req_id">
            {{ keyHRequierments }}
          </label>
        </div>
      </div>
    </div>
  </div>
</template>