
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('chat-message', require('./components/chatMessage.vue'));
Vue.component('chat-log', require('./components/chatLog.vue'));
Vue.component('chat-composer', require('./components/chatComposer.vue'));
Vue.component('list-online', require('./components/ListOnline.vue'));
Vue.component('online', require('./components/online.vue'));

const app = new Vue({
    el: '#app',

    data: {
    	messages: [],
        usersInRoom: []
    },

    methods: {
       addMessage(message) {
       	  this.messages.push(message);
       	  axios.post('/messages', message).then(response => {
             console.log(response.data);
       	  });
       },

       fetchMessage() {
       	  axios.get('/messages').then(response => {
       	  	  this.messages = response.data;
       	  });
       }
    },

    created() {
       this.fetchMessage();

       Echo.join('chatroom')
           .here((users) => {
           	  this.usersInRoom = users
           })
           .joining((user) => {
           	  this.usersInRoom.push(user)
           })
           .leaving((user) => {
           	  this.usersInRoom = this.usersInRoom.filter(u => u != user)
           })
           .listen('MessageSent', (e) => {
           	   this.messages.push({
           	   	  message: e.message.message,
           	   	  user: e.user
           	   });
           });
    }
       	  
});
