<template>
    <div>
        <h3 class="text-center">Create Funcionario</h3>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form @submit.prevent="addFuncionario">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="funcionario.nome">
                    </div>
                    <div class="form-group">
                        <label>Departamento</label>
                        <input type="text" class="form-control" v-model="funcionario.departamento">
                    </div>
                    <div class="form-group">
                        <label>Data de admissão</label>
                        <input type="date" class="form-control" v-model="funcionario.data_admissao">
                    </div>
                    <div class="form-group">
                        <label>Horas de Treinamento Necessárias</label>
                        <input type="number" class="form-control" v-model="funcionario.horas_treinamento_necessarias">
                    </div>
                    <div class="form-group">
                        <label>Horas realizadas</label>
                        <input type="number" class="form-control" v-model="funcionario.horas_treinamento_realizadas">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                funcionario: {}
            }
        },
        methods: {
            addFuncionario() {
                this.axios
                    .post('http://localhost/api/funcionarios', this.funcionario)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>