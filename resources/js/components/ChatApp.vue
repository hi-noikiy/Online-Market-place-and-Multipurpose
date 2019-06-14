<template>
  <div class="chat-app">
    <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
    <ContactsList :contacts="contacts" @selected="startConversationWith"/>
  </div>
</template>

<script>
import Conversation from "./Conversation";
import ContactsList from "./ContactsList";

export default {
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      selectedContact: null,
      messages: [],
      contacts: []
    };
  },
  mounted() {
    Echo.private(`messages.${this.user.id}`).listen("NewMessage", e => {
      this.hanleIncoming(e.message);
    });

    axios.get("/ChatContacts").then(response => {
      this.contacts = response.data;
    });
  },
  methods: {
    startConversationWith(contact) {
      // this.updateUnreadCount(contact, true);

      axios.get(`/Conversation/${contact.id}`).then(response => {
        this.messages = response.data;
        this.selectedContact = contact;
      });
    },
    saveNewMessage(message) {
      this.messages.push(message);
    },
    hanleIncoming(message) {
      if (this.selectedContact && message.from == this.selectedContact.id) {
        this.saveNewMessage(message);
      }
      // this.updateUnreadCount(message.from_contact, false);
    }
  },

  components: { Conversation, ContactsList }
};
</script>

<style lang="scss" scoped>
.chat-app {
  display: flex;
}
</style>
