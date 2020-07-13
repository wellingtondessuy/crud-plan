<template>
    <div>
        <div class="logoutBtn">
            <form :action="logoutUrl" method="POST">
                <md-button type="submit" class="md-raised md-default">
                    <span>Sair</span>
                </md-button>
            </form>
        </div>
        <div class="container">
            <div>
                <md-button v-on:click="like" class="md-raised md-primary">
                    <span class="md-title">Curtir</span>
                </md-button>
                <md-button v-on:click="dislike" class="md-raised md-accent">
                    <span class="md-title">Não curtir</span>
                </md-button>
            </div>
            <div class="infoContainer">
                <span class="md-title">Total Curtidas: {{likes}}</span>
                <span class="md-title">Total Não curtidas: {{dislikes}}</span>
            </div>
        </div>
    </div>
</template>
<script>

import axios from 'axios'

export default {
    props: [ 'actionUrl', 'logoutUrl', 'totalLikes', 'totalDislikes' ],
    data: () => {
        return {
            likes: 0,
            dislikes: 0
        }
    },
    mounted() {
        this.likes = !this.totalLikes? 0 : this.totalLikes
        this.dislikes = !this.totalDislikes? 0 : this.totalDislikes
    },
    methods: {
        async like () {

            let requestData = { action: 'LIKE' }
            const response = await axios.post(this.actionUrl, requestData)

            if (response.status == 200)
                this.likes++


        },
        async dislike () {

            let requestData = { action: 'DISLIKE' }
            const response = await axios.post(this.actionUrl, requestData)

            if (response.status == 200)
                this.dislikes++

        }
    }
}

</script>

<style>

.container {
    display: flex;
    flex-direction: column;
}

.infoContainer {
    display: flex;
    flex-direction: column;
    margin-top: 30px;
}

.logoutBtn {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
}

</style>