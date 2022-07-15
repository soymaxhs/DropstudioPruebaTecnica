<script setup>
import { RouterView } from "vue-router";
</script>

<template>
  <header>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  </header>
  <RouterView />
</template>
