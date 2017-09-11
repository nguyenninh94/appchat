<template>
    <div class="chat-composer">
    	<input type="text" name="message" placeholder="typing your message..." v-model="messageText" @keyup.enter="sendMessage">
    	<button class="btn btn-primary" @click="sendMessage" :disabled="not_working">Send</button>
    </div>
</template>

<script>
	export default {
		props: ['user'],

        data() {
        	return {
        		messageText: '',
        		not_working: true
        	}
        },

        methods: {
        	sendMessage() {
        		this.$emit('messagesent', {
        			message: this.messageText,
        			user: this.user
        		});
        		this.messageText = ''
        	}
        },

        watch: {
        	messageText() {
        		if(this.messageText.length > 0)
        			this.not_working = false
        	    else
        	        this.not_working = true		
        	} 
        } 
	}
</script>

<style>
	.chat-composer {
		display: flex;
	}

	.chat-composer input {
		flex: 1 auto;
	}

	.chat-composer button {
		border-radius: 0;
	}
</style>