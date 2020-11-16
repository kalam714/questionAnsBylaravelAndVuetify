<template>
   <v-container  grid-list-md>
       <v-layout row wrap>
           <v-flex xs8> 
               <question v-for="question in questions" :key="question.id" :data=question>

               </question>
           </v-flex>
           categories

       </v-layout>

   </v-container>
</template>
<script>
import question from './question'
export default {
    components:{
        question
    },
    data(){
        return{

           questions:{}
        }
    },
    created(){
        axios.get('/api/question')
        .then(response => this.questions=response.data)
        .catch(error =>console.log(error))
    }
}
</script>