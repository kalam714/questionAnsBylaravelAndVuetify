<template>
    <v-container>
        <reply v-for="(reply,index) in replies" :key="reply.id" :data="reply" 
        :index=index v-if="replies">

        </reply>

    </v-container>
</template>
<script>
import Reply from './reply'
export default {
    props:['replies'],
    data(){
        return {
            content:this.question.replies
        }

    },
    components:{
        Reply
    },
    created(){
        this.listen()
    },
    methods:{
        listen(){
            EventBus.$on('replyDelete',(index)=>{
                axois.delete(`/api/question/${this.question.slug}/reply/${this.content[index].id}`)
                .then(response=>{
                    this.content.splice(index,1)
                })
            })
        }
    }
   
}
</script>