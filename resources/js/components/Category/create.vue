<template>
    <v-container >
        <v-form @submit.prevent="createCategory">
  
      <v-row>
         <v-col
          cols="12"
          md="12"
        >
          <v-text-field
            v-model="form.name"
            type="text"
            label="Title Of The Question"
            required
          ></v-text-field>
        </v-col>
        
        <v-col
          cols="12"
          md="12"
        >
       
    
          <v-btn type="submit" color="teal">
             Create
          </v-btn>
</v-col>
       
       
      </v-row>
  
  </v-form>

   <v-card xs4>
        <v-toolbar class="mt-2" color="green">
            <v-toolbar-title>Categories</v-toolbar-title>
        </v-toolbar>
        <v-list dense>
            
            <v-list-item-title v-for="category in categories" :key="category.id">
                 <v-list-item-content>
           
               
            <v-list-item-title>{{category.name}}</v-list-item-title>

             
            <v-list-item-actions>
                
         <v-btn icon small @click="deleteCategory(category.slug)">
        <v-icon color="red">delete</v-icon>
      </v-btn>
            </v-list-item-actions>
            
          </v-list-item-content>

            </v-list-item-title>
            
            <v-divider></v-divider>
        </v-list>
    </v-card>
    </v-container>
</template>
<script>
export default {
    data(){
        return{
            form:{
                name:null
            },
            categories:{}
        }
    },

    methods:{
        createCategory(){
            axios.post('/api/category',this.form)
            .then(response=>{
                this.categories.unshift(response.data)
                this.form.name=null
            })
        },
        deleteCategory(slug,index){
            axios.delete(`/api/category/${slug}`)
            .then(response=>this.categories.splice(index,1))
        }
       
    },
     created(){
         if(!User.admin()){
             this.$router.push('/forum')
         }
        axios.get('/api/category')
        .then(response =>this.categories=response.data)
    }
    
}
</script>