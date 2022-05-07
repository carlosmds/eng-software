
<template>
    <div>
        <h3 class="text-center">Média de horas:</h3>
        <h5 class="text-center">Contratados a mais de 5 anos: {{ media_mais_de_5_anos }}</h5>
        <h5 class="text-center">Contratados a menos de 5 anos: {{ media_menos_de_5_anos }}</h5>
        <div class="col-md-6 mx-auto">
                <form @submit.prevent="filtrar">
                    <div class="form-group">
                        <label>Departamento</label>
                        <input type="text" class="form-control" v-model="busca_departamento">
                    </div>
                    <div class="form-group">
                        <label>Ordenar por horas de treinamento</label>
                        <select v-model="ordem_treinamentos">
                            <option selected value="asc">Crescente</option>
                            <option value="desc">Decrescente</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>
        <br>
        <table class="table" :key="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Departamento</th>
                <th>Data de Admissão</th>
                <th>Horas de Treinamento Necessárias</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="funcionario in funcionarios" :key="funcionario.id">
                <td>{{ funcionario.id }}</td>
                <td>{{ funcionario.nome }}</td>
                <td>{{ funcionario.departamento }}</td>
                <td>{{ funcionario.data_admissao }}</td>
                <td>{{ funcionario.horas_treinamento_necessarias }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: funcionario.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteFuncionario(funcionario.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        methods: {
            deleteFuncionario(id) { 
                this.axios
                    .delete(`http://localhost/api/funcionarios/${id}`)
                    .then(response => {
                        let i = this.funcionarios.map(data => data.id).indexOf(id);
                        this.funcionarios.splice(i, 1)
                    });
            },
            filtrar(id) { 
                this.axios
                   .get('http://localhost/api/funcionarios/', {
                        params: {
                            busca_departamento: this.busca_departamento,
                            ordem_treinamentos: this.ordem_treinamentos
                        }
                    })
                    .then(response => {
                        this.funcionarios = response.data.funcionarios;
                        this.media_mais_de_5_anos = response.data.media_mais_de_5_anos;
                        this.media_menos_de_5_anos = response.data.media_menos_de_5_anos;
                    });
            },
        },
        data() {
            return {
                funcionarios: [],
                media_mais_de_5_anos: 0,
                media_menos_de_5_anos: 0,
                busca_departamento: "",
                ordem_treinamentos: "asc",
            }
        },
        created() {
            this.axios
                .get('http://localhost/api/funcionarios/', {
                    params: {
                        busca_departamento: this.busca_departamento,
                        ordem_treinamentos: this.ordem_treinamentos
                    }
                })
                .then(response => {
                    this.funcionarios = response.data.funcionarios;
                    this.media_mais_de_5_anos = response.data.media_mais_de_5_anos;
                    this.media_menos_de_5_anos = response.data.media_menos_de_5_anos;
                });
        },
    }
</script>