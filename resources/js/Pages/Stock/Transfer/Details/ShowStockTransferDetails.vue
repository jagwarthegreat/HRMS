<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  details: Array,
});

</script>
<template>
    <div class="card mb-4">
      <div class="card-header">Stock Transfer Lists</div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Stock Name</th>
              <th>Qty</th>
              <th></th>
            </tr>
          </thead>
              <tbody v-if="details.length > 0">
                <tr
                  v-for="(detail, keyDetail) in details"
                  :key="keyDetail"
                >
                  <td>
                    {{ keyDetail + 1 }}
                  </td>
                  <td>
                    {{ detail.stock.name }}
                  </td>
                  <td>
                    {{ detail.quantity }}
                  </td>
                </tr>
              </tbody>
        </table>
      </div>
    </div>
</template>