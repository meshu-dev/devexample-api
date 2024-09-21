<script setup>
  defineProps({ fastFoods: Array })
</script>
 
<template>
  <div v-if="fastFoods && fastFoods.length > 0">
    <h1>Fastfoods</h1>
    <ul>
      <li v-for="fastFood in fastFoods">{{ fastFood }}</li>
    </ul>
  </div>
</template>
