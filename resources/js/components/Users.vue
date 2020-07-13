<template>
    <div class="container">
        <div class="btn-container">
            <a v-bind:href="addUserRoute">
                <md-button class="md-raised md-primary">Adicionar usuário</md-button>
            </a>
        </div>

        <div class="table-container">

            <md-table md-card>
                
                <md-table-toolbar>
                    <h1 class="md-title">Lista de Usuários</h1>
                </md-table-toolbar>

                <md-table-row>
                    <md-table-head md-numeric>ID</md-table-head>
                    <md-table-head>Nome</md-table-head>
                    <md-table-head>Email</md-table-head>
                    <md-table-head>Telefone</md-table-head>
                    <md-table-head>Foto</md-table-head>
                    <md-table-head></md-table-head>
                </md-table-row>

                <md-table-row v-for="user in users" :key="user.id">
                    <md-table-cell md-numeric>{{ user.id }}</md-table-cell>
                    <md-table-cell>{{ user.name }}</md-table-cell>
                    <md-table-cell>{{ user.email }}</md-table-cell>
                    <md-table-cell>{{ user.phone }}</md-table-cell>
                    <md-table-cell></md-table-cell>
                </md-table-row>

            </md-table>

        </div>

    </div>
</template>
<script>

export default {
    props: [ 'users', 'addUserRoute' ],
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

.table-container {
    display: flex;
    flex: 1;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

</style>