<template>
    <div>
        <b-container fluid class="px-0 mx-0 my-2">
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
                                v-model="form.email"
                                type="email"
                                placeholder="Enter email"
                                required
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
                                required
                            ></b-form-input>
                        </b-form-group>
                        <b-button type="submit" variant="primary"
                            >Submit</b-button
                        >
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
                email: "",
                name: ""
            }
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
        }
    }
};
</script>
