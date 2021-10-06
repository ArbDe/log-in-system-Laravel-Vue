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
                required
              ></b-form-input>
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
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-3" label="Email:" label-for="input-3">
              <b-form-input
                id="input-3"
                v-model="form.email"
                type="email"
                placeholder="Enter email"
                required
              ></b-form-input>
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
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group>
              <label for="Date of Birth">Date of Birth</label>
              <b-form-datepicker
                id="datepicker-placeholder"
                placeholder="Choose a date"
                locale="en"
              ></b-form-datepicker>
            </b-form-group>

            <b-form-group>
              <label for="Gender">Gender</label>
              <b-form-select
                v-model="selected"
                :options="options"
              ></b-form-select>
              <div class="mt-3">
                Selected: <strong>{{ selected }}</strong>
              </div>
            </b-form-group>

            <b-form-group id="pw" label="Your Password:" label-for="pw">
              <b-form-input
                id="pw"
                v-model="form.password"
                type="password"
                placeholder="Enter your Password"
                required
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
      value: "",
      selected: null,
      options: [
        { value: null, text: "Pleas enter your gender" },
        { value: "Male", text: "Male" },
        { value: "Female", text: "Female" },
        { value: "Other", text: "Other" },
      ],
      form: {
        email: "",
        name: "",
      },
    };
  },
  methods: {
    onSubmit(event) {
      event.preventDefault();
      alert(JSON.stringify(this.form));
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
