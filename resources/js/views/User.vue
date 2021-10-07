<template>
  <div class="tabelat">
    <b-table striped hover :items="[{  first_name: user.name, last_name: user.surname, email: user.email, user_name: user.username }]"></b-table>
    <button class='btn btn-danger' @click="logout">logout</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // items: [{  first_name: user.name, last_name: user.surname, email: user.email, user_name: user.username }],
      user:{},
      token: localStorage.getItem('token'),
    };
  },
  methods:{
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
  },
  mounted(){
    window.axios.defaults.headers.common['Authorization'] = `Bearer ${this.token}`;
    axios.get('api/user-info').then((response)=>{
      this.user=response.data
    }).catch((errors)=>{
      console.log(errors)
    })
  }
};
</script>

<style scoped>
.tabelat {
  position: relative;
  align-content: center;
}
</style>