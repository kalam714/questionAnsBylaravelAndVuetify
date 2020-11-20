<template>
   <div class="mt-2">
       <v-card>
           <v-card-title>
               <div class="headline" color="green">
                   {{data.user}}
               </div>
               <div class="ml-2">
                   Replied {{data.created_at}}
               </div>
               <v-spacer></v-spacer>
               <like :content="data"></like>
           </v-card-title>
           <v-divider></v-divider>
           <v-card-text v-html="data.reply"></v-card-text>
            <v-divider></v-divider>
           <v-card-actions v-if="own">
                           
         <v-btn icon small>
        <v-icon color="green">Edit</v-icon>
        </v-btn>
        <v-divider></v-divider>
         <v-btn icon small @click="destroy"> 
        <v-icon color="red">Delete</v-icon>
      </v-btn>
           
        
           </v-card-actions>

       </v-card>
   </div>
</template>
<script>
import Like from '../likes/like'
export default {
    props:['data','index'],
    components:{Like},
    computed:{
        own(){
            return User.own(this.data.user_id)

        }
    },
    methods:{
        destroy(){
            EventBus.$emit('replyDelete',this.index)
        }
    }
}
</script>