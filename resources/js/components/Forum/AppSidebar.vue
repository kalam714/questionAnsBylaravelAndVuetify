<template>
    <v-card>
        <v-toolbar class="mt-2" color="green">
            <v-toolbar-title>Categories</v-toolbar-title>
        </v-toolbar>
        <v-list dense>
            
            <v-list-item-title v-for="category in categories" :key="category.id">
                 <v-list-item-content>
            <v-list-item-title>{{category.name}}</v-list-item-title>
            
          </v-list-item-content>

            </v-list-item-title>
        </v-list>
    </v-card>
</template>
<script>
export default {
    data(){
        return{
            categories:{}
        }
    },
    created(){
        axios.get('/api/category')
        .then(response =>this.categories=response.data)
    }
    
}
</script>