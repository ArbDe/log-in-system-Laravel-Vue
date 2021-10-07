<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand>
        <router-link to="/"> Home </router-link>
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item v-if="!userLoggedIn()">
            <router-link to="/login"> LogIn </router-link>
          </b-nav-item>
          <b-nav-item v-if="!userLoggedIn()">
            <router-link to="/register"> Register </router-link>
          </b-nav-item>
          <b-nav-item v-if="userLoggedIn()">
            <router-link to="/user"> My profile </router-link>
          </b-nav-item>
          <b-nav-item v-if="userLoggedIn()"  @click="logout">
            <router-link to="/"> Log out </router-link>
          </b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  // setup() {},
  data(){
    return{
      token: localStorage.getItem('token'),
    }
  },
  methods: {
    userLoggedIn() {
      return this.$store.state.userLoggedIn;  
    },
    logout(){
      window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`;
      axios.post('api/logout').then((response)=>{
        localStorage.removeItem('token');
        this.$router.push('/');
        this.$store.commit('logout');

      }).catch((errors)=>{
        console.log(errors)
      })
    }
  }
};
</script>


<style >
.navbar-brand {
  font-size: 1.5rem;
}

a.nav-link {
  text-decoration: none;
}
a {
  font-weight: bold;
  color: #fef9ef;
}
a:hover {
  text-decoration: none;
  transition: 0.2s;
  color: #b6b1a8;
}
</style>