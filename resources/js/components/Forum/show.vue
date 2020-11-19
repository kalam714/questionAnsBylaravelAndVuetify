<template>
<v-card>
    <v-container>
    <v-card-title>
       <div>
           <div class="headline">
               {{data.title}}
           </div>
             <div class="green--text">
        Asked By {{data.user}}
        </div>
         <p>{{data.created_at}}</p>
        
       </div>
       <v-spacer></v-spacer>
       <v-btn color="green">5 Replies</v-btn>
    </v-card-title>
    <v-card-text v-html="body"></v-card-text>
    <v-card-actions>
      <v-btn icon small @click="questionEdit">
        <v-icon color="orange">edit</v-icon>
        
      </v-btn>
      

<v-divider></v-divider>
        <v-btn icon small @click="deleteQuestion">
        <v-icon color="red">delete</v-icon>
      </v-btn>
    </v-card-actions>
    
    </v-container>
</v-card>
    
</template>
<script>

export default {
    props:['data'],
    data(){
      return{
        own: User.own(this.data.user_id)
      }
    },
    computed:{
      body(){
        return md.parse(this.data.body)
      }
    },
    methods:{
      deleteQuestion(){
        axios.delete(`/api/question/${this.data.slug}`)
        .then(response =>this.$router.push('/forum'))
        .catch(error=>console.log(error.response.data))
      },
      questionEdit(){
        EventBus.$emit('Editing')
      }
    }
}
</script>