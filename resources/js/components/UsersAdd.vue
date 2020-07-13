<template>
    <div class="container">
        <div class="inputs-container">
            <form method="POST" v-bind:action="addUserRoute" v-on:submit="add">
                <input type="hidden" name="_token" v-bind:value="csrfToken">
                <md-field class="input">
                    <label>Nome</label>
                    <md-input v-model="name" name="name"></md-input>
                </md-field>
                <md-field class="input">
                    <label>Email</label>
                    <md-input v-model="email" name="email"></md-input>
                </md-field>
                <md-field class="input">
                    <label>Senha</label>
                    <md-input v-model="password" type="password" name="password"></md-input>
                </md-field>
                <md-field class="input">
                    <label>Telefone</label>
                    <md-input v-model="phone" name="phone"></md-input>
                </md-field>
                <md-button type="submit" class="md-raised md-primary">Criar usuário</md-button>
            </form>

        </div>
    </div>
</template>
<script>

export default {
    props: [ 'csrfToken', 'addUserRoute' ],
    data: () => ({
        name: '',
        email: '',
        password: '',
        phone: '',
        photo: null
    }),
    methods: {
        add(e) {

        }
    }
}

</script>

<style>

.container {
    display: flex;
}
.btn-container {
    display: flex;
    flex: 1;
    flex-direction: row;
    justify-content: flex-end;
    padding-top: 30px;
    padding-right: 30px;
}

.inputs-container {
    display: flex;
    flex: 1;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.input {
    width: 500px
}

</style>