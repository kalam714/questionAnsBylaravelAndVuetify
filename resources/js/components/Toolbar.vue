<template>
  <v-toolbar>
    
    <v-toolbar-title>Title</v-toolbar-title>
    
    <div class="hidden-sm-and-down">
       <router-link v-for="item in items" :key="item.name" 
       :to="item.to" v-if="item.show">
      <v-btn text>{{item.name}}</v-btn>
      </router-link>
    </div>
  </v-toolbar>
</template>
<script>
export default {
  data(){
    return {
    items:[
      {name:'Forum',to:'/forum',show:true},
      {name:'Ask Question',to:'/askquestion',show:User.LoggedIn()},
      {name:'Categories',to:'/categories',show:User.LoggedIn()},
      {name:'Login',to:'/login',show:!User.LoggedIn()},
      {name:'Logout',to:'/logout',show:User.LoggedIn()}
    ]
  }
  },
  created(){
    EventBus.$on('logout',()=>{
      User.Logout()
    })
  }
}
</script>