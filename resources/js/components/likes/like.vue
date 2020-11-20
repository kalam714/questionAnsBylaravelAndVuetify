<template>
    <div>
        <v-btn
        class="ma-2"
        text
        icon
        color="red lighten-2"
        @click="likeIt"
      >
        <v-icon>mdi-thumb-up</v-icon>{{count}}
      </v-btn>
    </div>
</template>
<script>
export default {
    props:['content'],
    data(){
        return{
            liked:this.content.liked,
            count:this.content.like_count
        }
    },
    methods:{
        likeIt(){
            if(User.LoggedIn()){
                this.liked ? this.decr() :this.incr()
                this.liked=!this.liked
            }
        },
        incr(){
            this.count ++
        },
        decr(){
            this.count --
        }
    }
}
</script>