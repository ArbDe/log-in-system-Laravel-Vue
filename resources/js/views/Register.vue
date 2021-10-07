<template>
  <div>
    <b-container fluid class="test">
      <b-row>
        <b-col cols="12" md="4"></b-col>
        <b-col cols="12" md="4">
          <b-form @submit="onSubmit" @reset="onReset">
            <b-form-group id="input-group-1" label="Name:" label-for="input-1">
              <b-form-input
                id="input-1"
                v-model="form.name"
                type="text"
                placeholder="Enter name"
                name="name"
              ></b-form-input>
              <p class="text-danger" v-text="errors.name"></p>
            </b-form-group>

            <b-form-group
              id="input-group-2"
              label="Surname:"
              label-for="input-2"
            >
              <b-form-input
                id="input-2"
                v-model="form.surname"
                type="text"
                placeholder="Enter surname"
                name = "surname"
                
              ></b-form-input>
              <p class="text-danger" v-text="errors.surname"></p>

            </b-form-group>

            <b-form-group id="input-group-3" label="Email:" label-for="input-3">
              <b-form-input
                id="input-3"
                v-model="form.email"
                type="email"
                placeholder="Enter email"
                name="email"
              ></b-form-input>
             <p class="text-danger" v-text="errors.email"></p>

            </b-form-group>

            <b-form-group
              id="input-group-4"
              label="Username:"
              label-for="input-4"
            >
              <b-form-input
                id="input-4"
                v-model="form.username"
                type="text"
                placeholder="Enter username"
                name="username"
              ></b-form-input>
              <p class="text-danger" v-text="errors.username"></p>

            </b-form-group>

            <b-form-group>
              <label for="Date of Birth">Date of Birth</label>
              <b-form-datepicker
                id="datepicker-placeholder"
                v-model="form.dob"
                placeholder="Choose a date"
                locale="en"
                name="dob"
              ></b-form-datepicker>
              <p class="text-danger" v-text="errors.dob"></p>

            </b-form-group>

            <b-form-group>
              <label for="Gender">Gender</label>
              <b-form-select
                v-model="form.gender"
                :options="gender"
                name="gender"
              ></b-form-select>
              <p class="text-danger" v-text="errors.gender"></p>

            </b-form-group>

            <b-form-group id="pw" label="Your Password:" label-for="pw">
              <b-form-input
                id="pw"
                v-model="form.password"
                type="password"
                placeholder="Enter your Password"
                name="password"
                
              ></b-form-input>
               <p class="text-danger" v-text="errors.password"></p>

            </b-form-group>

            <b-form-group id="cpw" label="Confirm passowrd:" label-for="cpw">
              <b-form-input
                id="cpw"
                v-model="form.password_confirmation"
                type="password"
                placeholder="Confirm password "
                name="password_confirmation"
              ></b-form-input>
             <p class="text-danger" v-text="errors.password_confirmation"></p>

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
          surname:"",
          email: "",
          username: "",
          dob: "",
          gender: null,
          password: "",
          password_confirmation: "",
        },
        gender: [
        { value: null, text: "Pleas enter your gender" },
        { value: "Male", text: "Male" },
        { value: "Female", text: "Female" },
        { value: "Other", text: "Other" },
        ],
        errors:{},
    };
  },
  methods: {
    onSubmit(event) {
      event.preventDefault();
      
        console.log(this.form);

       
        axios.post('api/register', this.form)
        .then(response =>{
            // console.log(response);
            this.$router.push("/login");


        })
        .catch(errors => {
            this.errors = errors.response.data.errors
        });

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
  margin-top: 20px;
  margin-bottom: 30px;
}
</style>
