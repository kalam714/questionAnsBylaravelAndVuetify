<template>
  <v-card class="mt-2">
    <v-card-title>
        <div>
            <router-link :to="data.path">
        <h2 >{{data.title}}</h2>
            </router-link>
        <div class="green--text">
        Asked By {{data.user}}
       
        </div>
         <p>{{data.created_at}}</p>
        </div>


    </v-card-title>


    <v-card-text>
      {{data.body}}
    </v-card-text>

   
  </v-card>
</template>
<script>

export default {
    props:['data']
    
}
</script>