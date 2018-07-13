
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import VueChatScroll from 'vue-chat-scroll';
Vue.use(VueChatScroll);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('message', require('./components/message.vue'));

const app = new Vue({
    el: '#app', 
    data: {
        message: '',
        chat:{
            message:[]
        }
    },
    methods:{
        send(){
            if(this.message.length != 0){
                //console.log(this.message);
                
                var that = this;
                axios.post('/send', {
                    message:that.message
                }).then(function(response){
                    // console.log(response);
                    
                    that.chat.message.push({message:that.message,
                                            user:{
                                                name:"you"
                                            },
                                            color:"success"});   
                    console.log(that.chat.message);
                    that.message = "";
                }).catch(function(error){
                    // console.log(error);
                    that.message = "";
                });
            }
        }
    },
    mounted(){
        //console.log("Hello world");
        window.Echo.private('chat').listen('ChatEvent', (e)=>{
            e.color = "warning";
            this.chat.message.push(e);
        });
    }
});
