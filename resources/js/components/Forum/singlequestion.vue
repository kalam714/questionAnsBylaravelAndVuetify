<template>
<show :data=question>

</show>
    
</template>
<script>
import show from './show'
  

export default {
    components:{show},
    
    data(){
        return{
            question:{}
        }
    },
    created(){
        
        axios.get(`/api/question/${this.$route.params.slug}`)
        .then(response=>this.question=response.data.data)
        .catch(error=>console.log(error))
    }
}
</script>