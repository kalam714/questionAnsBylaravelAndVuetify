<template>
  <v-card>
    <v-card-title>
        <div>
            <router-link :to="data.path">
        <h2 >{{data.title}}</h2>
            </router-link>
        <div class="green--text">
        <storng>Asked By {{data.user}}</storng>
       
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