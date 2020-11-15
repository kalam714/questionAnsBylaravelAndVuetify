<template>
  <v-form v-model="valid">
    <v-container>
      <v-row>
      

        <v-col
          cols="12"
          md="12"
        >
          <v-text-field
            v-model="form.email"
            type="email"
           
            label="Email"
            required
          ></v-text-field>
        </v-col>

        <v-col
          cols="12"
          md="12"
        >
          <v-text-field
            v-model="form.password"
            type="password"
            
            label="Password"
            required
          ></v-text-field>
        </v-col>
        <v-col
          cols="12"
          md="4"
        >
          <v-btn type="submit" color="green">
              Login
          </v-btn>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>
<script>
export default {
    data(){
        return{
            form:{
                email:null,
                password:null
            }
        }
    }
    
}
</script>