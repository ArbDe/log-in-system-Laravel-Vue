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
              description="We'll never share your email with anyone else."
            >
              <b-form-input
                id="input-1"
                v-model="form.username"
                type="email"
                placeholder="Enter email"
                name="username"
              ></b-form-input>
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
      errors:{}
    };
  },
  methods: {
    onSubmit(event) {
      event.preventDefault();

        console.log(this.form);

       

        axios.post('api/login', this.form)
        .then(response =>{
            console.log(response);
        })
        .catch(error => {
            console.error('There was an error!', error.data.error);
            
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