<template>
        <v-container>
        <v-form @submit.prevent="editQuestion">
  
      <v-row>
         <v-col
          cols="12"
          md="12"
        >
          <v-text-field
            v-model="form.title"
            type="text"
            label="Title Of The Question"
            required
          ></v-text-field>
        </v-col>
        
        <v-col
          cols="12"
          md="12"
        >
       
          <vue-simplemde v-model="form.body"  />
          <v-btn type="submit" color="green">
              Update
          </v-btn>
           <v-btn type="submit" @click="cancle" color="red">
              Cancle
          </v-btn>
</v-col>
       
       
      </v-row>
  
  </v-form>
    </v-container>
</template>
<script>
export default {
    props:['data'],

    data(){
        return{
            form:{
                title:null,
                body:null
            }
        }
    },
    created(){
        this.form=this.data

    },
    methods:{
        cancle(){
            EventBus.$emit('cancle')
        },
        editQuestion(){
            axios.put(`/api/question/${this.form.slug}`,this.form)
            .then(response=>this.cancle())
        }
    }
    
}
</script>