<template>
  <div>
    <b-container fluid class="test">
      <b-row>
        <b-col cols="12" md="4"></b-col>
        <b-col cols="12" md="4">
          <b-form @submit="onSubmit" @reset="onReset">
            <b-form-group
              id="input-group-1"
              label="Email address:"
              label-for="input-1"
            >
              <b-form-input
                id="input-1"
                v-model="form.username"
                type="text"
                placeholder="Enter email or username"
                name="username"

              ></b-form-input>
            <p class="text-danger" v-text="errors.username"></p>

            </b-form-group>

            <b-form-group
              id="input-group-2"
              label="Your Password:"
              label-for="input-2"
            >
              <b-form-input
                id="input-2"
                v-model="form.password"
                type="password"
                placeholder="Enter your Password"
                name="password"
              ></b-form-input>
              <p class="text-danger" v-text="errors.password"></p>

            </b-form-group>
            <b-button type="submit" variant="primary">Submit</b-button>
          </b-form>
        </b-col>
        <b-col cols="12" md="4"></b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: "",
        username: "",
        password: "",
      },
      errors: {},
    };
  },
  methods: {
    onSubmit(event) {
      event.preventDefault();

      console.log(this.form);

      axios.post("api/login", this.form)
        .then((response) => {
        //   console.log(response);
          localStorage.setItem('token', response.data.token)
          this.$store.commit('login');
          this.$router.push("/user");
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors;
        });
      // console.log(this.form);
    },
    onReset(event) {
      event.preventDefault();
      this.form.email = "";
      this.form.name = "";
    },
  },
};
</script>

<style scoped>
.test {
  margin-top: 30px;
  margin-bottom: 30px;
}
</style>