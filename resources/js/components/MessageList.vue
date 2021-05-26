<template>
    <div class="row">
        <div class="col-md-4 border">
            <ul class="list-unstyled" v-for="message in messages.data" :key="message.id">
                <li class="list-group">
                    <button class="list-group-item list-group-item-action" v-on:click="showBody(message)">
                        <p>受信日時:{{ message.sent_at }}</p>
                        <p>件名:{{ message.title }}</p>
                        <span v-if="!message.is_read" class="font-weight-bold text-danger">未読</span>
                    </button>
                </li>
            </ul>
        </div>
        <div class="col-md-8 border">
            <div v-if="this.message">
                <p>受信日時:{{ this.message.sent_at }}</p>
                <h1>{{ this.message.title }}</h1>
                <p>{{ this.message.body }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MessageList",
    props: {
        messages: {
            type: Object,
        },
    },
    mounted: function () {
        console.log(this.messages)
    },
    methods: {
        showBody: function (message) {
            this.message = message
        }
    },
    data() {
        return {
            message: null
        }
    }
}
</script>

<style scoped>

</style>
