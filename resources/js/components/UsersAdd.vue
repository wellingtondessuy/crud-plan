<template>
    <div class="container">
        <div class="inputs-container">
            <form method="POST" v-bind:action="!edit? addUserRoute : editUserRoute" v-on:submit="add">
                <input type="hidden" name="_token" v-bind:value="csrfToken">
                <md-field class="input" :class="nameError? 'md-invalid' : ''">
                    <label>Nome</label>
                    <md-input v-model="name" name="name"></md-input>
                    <span class="md-error">{{ nameError }}</span>
                </md-field>
                <md-field class="input" :class="emailError? 'md-invalid' : ''">
                    <label>Email</label>
                    <md-input v-model="email" name="email"></md-input>
                    <span v-if="emailError" class="md-error">{{ emailError }}</span>
                </md-field>
                <md-field class="input" :class="passwordError? 'md-invalid' : ''">
                    <label>Senha</label>
                    <md-input v-model="password" type="password" name="password"></md-input>
                    <span v-if="passwordError" class="md-error">{{ passwordError }}</span>
                </md-field>
                <md-field class="input" :class="phoneError? 'md-invalid' : ''">
                    <label>Telefone</label>
                    <md-input v-model="phone" name="phone"></md-input>
                    <span v-if="phoneError" class="md-error">{{ phoneError }}</span>
                </md-field>
                <md-button v-if="!edit" type="submit" class="md-raised md-primary">Criar usuário</md-button>
                <md-button v-if="edit" type="submit" class="md-raised md-primary">Salvar usuário</md-button>
            </form>

        </div>
    </div>
</template>
<script>

export default {
    props: [
        'edit',
        'csrfToken',
        'addUserRoute',
        'editUserRoute',
        'name',
        'email',
        'password',
        'phone',
        'nameError',
        'emailError',
        'passwordError',
        'phoneError'
    ],
    data: () => ({
        name: this.name,
        email: this.email,
        password: this.password,
        phone: this.phone,
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