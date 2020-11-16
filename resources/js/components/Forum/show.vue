<template>
<v-card>
    <v-container>
    <v-card-title>
       <div>
           <div class="headline">
               {{data.title}}
           </div>
             <div class="green--text">
        <storng>Asked By {{data.user}}</storng>
       
        </div>
         <p>{{data.created_at}}</p>
        
       </div>
       <v-spacer></v-spacer>
       <v-btn color="green">5 Replies</v-btn>
    </v-card-title>
    <v-card-text v-html="data.body"></v-card-text>
    </v-container>
</v-card>
    
</template>
<script>
export default {
    props:['data']
}
</script>