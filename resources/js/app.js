/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



window.Vue = require('vue');
//file for scroll
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

//file for notification
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {
    timeout: 5000
})



// Vue.component('status', require('./components/status.vue'));
// Vue.component('new', require('./components/new.vue'));
Vue.component('message', require('./components/message.vue'));


//  const app=new Vue({
// 	el: '#reg',

// render: h => h(App),
// });

const app = new Vue({
    el: '#appchat',
    data: {
        message: '',
        time: 0,
        utc: 0,
        line: ' ',
        iam: '',

        chat: {
            messages: [],
            user: [],
            color: [],
            time: [],
            messageid: [],
            onlineUserId: [],
            spamedmessageid: [],
            images:[],
            mgssender:[]

        },
        typing: '',
        online: ' ',
      
    },
    methods: {
        send(id) {
           
            if (this.message.length != 0) {
                this.chat.messages.push(this.message);
                this.chat.user.push('me');
                this.chat.color.push("mesuccess");
                this.chat.time.push(this.getTime());
               
                this.time = this.getTime();
                this.utc = this.getTimezone();
                console.log(this.time);
                axios.post('/send/' + id, {
                        message: this.message,
                        time: this.time,
                        utc: this.utc,

                    })
                    .then(response => {
                       // console.log(response.data);
                        this.message = '';

                        this.chat.messageid.push(response.data.id);
                        //this.readWriteStatus = response.data.readWriteStatus;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }

        },


        getTime() {

            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var second = currentTime.getSeconds();
            var year = currentTime.getFullYear();
            var month = currentTime.getMonth();
            var date = currentTime.getDate();

            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            var months=['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sept','Oct','Nov','Dec'];
            let tim = hours + ':' + minutes + ':' + second + '   ' + date + '/' + month + '/' + year;

            return tim;

        },
        getTimezone() {
            var currentTime = new Date();
            var utc = currentTime.getTimezoneOffset();
            return utc;

        },
        getOldMessages() {

            axios.post('/getOldMessage', {
                    room: fetchroomId,
                    time: this.getTime(),
                    utc: this.getTimezone(),
                })
                .then(response => {
                    console.log(response.data);
                    this.chat.messages = response.data.messages;
                    this.chat.color = response.data.color;
                    this.chat.time = response.data.time;
                    this.chat.user = response.data.user;
                    this.chat.messageid = response.data.messageid;
                    
                    this.chat.mgssender = response.data.mgssender;
                    this.chat.images = response.data.image;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        // geallOnlineUser() {
        //     axios.post('/getallOnlineUser', {

        //         })
        //         .then(response => {
        //             this.chat.onlineUserId.push(response.data.onlineUserId);
        //         })
        //         .catch(error => {
        //             console.log(error);
        //         });
        // }

    },
    created() {
        // Echo.channel('online')
        //     .listen('OnlineEvent', e => {
        //         // console.log('ami sob sonsiree vai');
        //         console.log(e.user.id);
        //         this.line = 'online';
        //         axios.post('/setonline', {
        //                 id: e.user.id,
        //             })
        //             .then(response => {
        //                 this.line = 'Online Now';
        //             })
        //             .catch(error => {
        //                 console.log(error);
        //             });

        //     });
        window.Echo.channel(`chatroomId` + fetchroomId)
            .listen('App\\Events\\ChatEvent',(e)=>{
              console.log(e);
          });
    },

  
    mounted() {
        this.getOldMessages();
        //this.check=fetchroomId;
        console.log(fetchroomId);

       
        // Echo.private(`chatroomId` + fetchroomId)
        //     .listen('ChatEvent', (e) => {
        //         console.log(e);
        //     });


        // Echo.channel('messagesent-')
        //     .listen('Messagesent', (e) => {
        //        console.log(e);
        //     });
        // Echo.private(`chat-roomId.${fetchroomId}`)
        //     .listen('ChatEvent', (e) => {
        //         console.log(e);
        //         console.log(fetchroomId);
        //         // this.chat.messages.push(e.message.message);
        //         // this.chat.user.push('him');
        //         // this.chat.color.push("warning");
        //         // this.chat.time.push(this.getTime());
        //         // this.chat.messageid.push(e.message.id);
               

        //     })
        //     .listenForWhisper('typing', (e) => {
        //         if (e.name != '')
        //             this.typing = "typing...";
        //         else
        //             this.typing = "";
        //     });


        //  Echo.join('chat-roomId-' + fetchroomId)
        //     .here((users) => {
        //         this.online = 1;
        //     })
        //     .joining((user) => {
        //     	//this.$toaster.success(user.name+' has joined the room.')
        //        this.online = 1;
        //     })
        //     .leaving((user) => {
        //     	//this.$toaster.warning(user.name+' has left the room')
        //         this.online = 0;
        //     });
    }
});
