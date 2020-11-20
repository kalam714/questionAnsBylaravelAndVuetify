<template>
<div v-if="question">
    
    <edit v-if="editQuestion" :data=question></edit>
 
        <show :data=question  v-else>

</show>
<v-container>
<replies :replies="question.replies"></replies>
<new-reply :questionSlug="question.slug"></new-reply>
</v-container>

    
</div>

    
</template>
<script>
import show from './show'
import edit from './edit'
import Replies from '../Reply/replies'
import Reply from '../Reply/reply.vue'
import newReply from '../Reply/newReply'
  

export default {
    components:{
        show,
        edit,
        Replies,
        Reply,
        newReply,
    },
    
    data(){
        return{
            question:null,
            editQuestion:false
        }
    },
    created(){
        this.getQuestion()
        this.listen()
       
    },
    methods:{
        getQuestion(){
        axios.get(`/api/question/${this.$route.params.slug}`)
        .then(response=>this.question=response.data.data)
        .catch(error=>console.log(error))

        },
        listen(){
            EventBus.$on('Editing',()=>{
                this.editQuestion=true
            })
            EventBus.$on('cancle',()=>{
                this.editQuestion=false
            })
        }
    }
}
</script>