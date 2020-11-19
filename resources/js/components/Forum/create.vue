<template>
    <v-container>
        <v-form @submit.prevent="createQuestion">
  
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
         <v-select 
         :items="categories"
         v-model="form.category_id"
         item-text="name"
         item-value="id"
         label="Category"
         autocomplete
         >

         </v-select>
        </v-col>
        <v-col
          cols="12"
          md="12"
        >
       
          <vue-simplemde v-model="form.body"  />
          <v-btn type="submit" color="green">
              Ask
          </v-btn>
</v-col>
       
       
      </v-row>
  
  </v-form>
    </v-container>
</template>
<script>
export default {
    data(){
        return{
            form:{
                title:null,
                category_id:null,
                body:null
            },
            categories:[],
            errors:{}
        }
    },
    created(){
        axios.get('/api/category')
        .then(response =>this.categories=response.data)

    },
    methods:{
        createQuestion(){
            axios.post('/api/question',this.form)
            .then(response=>this.$router.push(response.data.path))
            .catch(error=>this.errors=error.response.data.error)

        }
    }
    
}
</script>