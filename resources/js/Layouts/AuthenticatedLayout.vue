<script setup>
import { ref, onMounted } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>
<template>
  <div>
    <div class="container-fluid ps-0 mb-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <slot name="breadcrumbs"/>
        </ol>
      </nav>
    </div>
    
    <slot />
  </div>
</template>
