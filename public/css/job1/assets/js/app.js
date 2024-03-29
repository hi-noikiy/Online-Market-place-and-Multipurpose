
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    components: {
            message: {
                props: ['sender', 'message', 'createdat'],
                template: '<div><b>{{ sender }}</b> <sub class="createdat">{{ createdat | showChatTime }}</sub><p>{{ message }}</p></div>',
                filters: {
                    showChatTime: function (createdat) {
                        var date = new Date(createdat);
                        date = ("0" + date.getDate()).slice(-2) + '/' + ("0" + date.getMonth()).slice(-2) + '/' + date.getFullYear() + ' ' +
                            ("0" + date.getHours()).slice(-2) + ':' + ("0" + date.getMinutes()).slice(-2);
                        return date;
                    }
                }
            },
        },
        data: {
            messages: '',
            message: '',
            isTyping: '',
            onlineUsers: []
        },
        methods: {
            sendMessage: function (event) {
                if (this.message.trim() == '' || this.message.trim == null) {
                    return;
                }
                var th = this;
                axios.post(postChatURL, {
                        'message': th.message,
                    })
                    .then(function (response) {
                        th.message = '';
                        th.messages.push(response.data);
                        th.adjustChatContainer();
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
            fetchChat: function () {
                var th = this;
                axios.get(fetchChatURL)
                    .then(function (response) {
                        th.messages = response.data;
                        th.adjustChatContainer();
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
            sendGroupMessage: function () {
                var th = this;
                axios.post(groupMessageRoute, {
                        'message': th.message,
                    })
                    .then(function (response) {
                        th.message = '';
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
            updateChat: function (res) {
                this.messages.push(res.message);
            },
            adjustChatContainer: function () {
                var chatContainer = document.getElementById('messages');
                if (chatContainer) {
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                }
            },
            userIsTyping: function (chatRoomId) {
                window.Echo.private(`typing-room-${chatRoomId}`)
                    .whisper('typing', {
                        name: window.Laravel.user.name
                    });
            },
        },
        mounted: function () {
            if (fetchChatURL) {
                this.fetchChat();
            }
        },
        updated: function () {
            this.adjustChatContainer();
        },
});
