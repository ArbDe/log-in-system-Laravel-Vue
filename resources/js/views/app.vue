<template>
  <div>
    <Nav />
  </div>
</template>

<script>
import Nav from "../components/Nav.vue";
import LogIn from "./Login.vue";
import Register from "./Register.vue";

export default {
  components: { Nav, LogIn, Register },
};
</script>

<style>
</style>
