<template>
  <div class="tabelat">
    <b-table striped hover :items="items"></b-table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [{ age: 40, first_name: "Dickerson", last_name: "Macdonald" }],
    };
  },
};
</script>

<style scoped>
.tabelat {
  position: relative;
  align-content: center;
}
</style>