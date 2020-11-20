<template>
    <div class="mt-3">
         <vue-simplemde v-model="body"  />
          <v-btn type="submit" dark color="green" @click="submit">
              Reply
          </v-btn>

    </div>
</template>
<script>
export default {
    props:['questionSlug'],
    data(){
        return{
            body:null
        }
    },
    methods:{
        submit(){
            axios.post(`/api/question/${this.questionSlug}/reply`,{body:this.body})
            .then(response=>{
                this.body=''
            })
        }
    }
}
</script>