<template>
    <div class="container-chat clearfix">
    <div class="people-list" id="people-list">
      <!-- <div class="search">
        <input type="text" placeholder="search" />
        <i class="fa fa-search"></i>
      </div> -->
      <ul class="list">
        <li @click.prevent="selectUser(user.id)" class="clearfix" v-for="user in userList" :key="user.id">
          <img :src="'/profil/' + user.profil" alt="avatar" />
          <div class="about">
            <div class="nama">{{user.name}}</div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li>
      </ul>
    </div>
    
    <div class="chat">
      <div class="chat-header clearfix">
        
        <div class="chat-about">
          <div v-if="userMessage.user" class="chat-with">{{userMessage.user.name}}</div>
          <div class="chat-num-messages">...</div>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->
      
      <div class="chat-history" v-chat-scroll>
        <ul>
          <li class="clearfix" v-for="message in userMessage.message" :key="message.id">
            <div :class="`message-data ${message.user.id==userMessage.user.id ? 'align-left' : 'align-right'}`">
              <span class="message-data-name" >{{message.user.name}}</span> <i class="fa fa-circle me"></i>
              <span class="message-data-time" >{{message.created_at | timeformat}}</span> &nbsp; &nbsp;
              
            </div>
            <div :class="`message ${message.user.id==userMessage.user.id ? 'other-message float-right' : 'my-message'}`">
              {{message.message}}
            </div>
          </li>
          
        </ul>
        
      </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">
        <input @keydown.enter="sendMessage" v-model="message" name="message-to-send" id="message-to-send" placeholder ="Type your message"/>

      </div> <!-- end chat-message -->
      
    </div> <!-- end chat -->
    
</div> <!-- end container -->
</template>

<script>
export default {
    mounted(){
        this.$store.dispatch('userList');
    },
    data(){
        return{
          message:'',
        }
    },
    computed:{
        userList(){
            return this.$store.getters.userList
        },
        userMessage(){
            return this.$store.getters.userMessage
        }
    },
    created(){

    },
    methods:{
      selectUser(userId){
        this.$store.dispatch('userMessage', userId);
      },
      sendMessage(e){
        // console.log(this.message);
        e.preventDefault();
        if(this.message!=''){
          axios.post('/sendmessage', {message:this.message,user_id:this.userMessage.user.id})
          .then(response => {
            // console.log(response.data)
            this.selectUser(this.userMessage.user.id);
          })
          this.message = ''
        }
      }

    }
}
</script>

<style>
  /* .people-list ul{overflow-y: scroll!important;} */
</style>