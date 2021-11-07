<template>
    <div>
        <h3 class="text-center">Edit Funcionario</h3>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form @submit.prevent="updateFuncionario">
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
                        <label>Horas de treinamento necessárias</label>
                        <input type="text" class="form-control" v-model="funcionario.horas_treinamento_necessarias">
                    </div>
                    <div class="form-group">
                        <label>Horas realizadas</label>
                        <input type="text" class="form-control" v-model="funcionario.horas_treinamento_realizadas">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
        created() {
            this.axios
                .get(`http://localhost/api/funcionarios/${this.$route.params.id}`)
                .then((res) => {
                    this.funcionario = res.data;
                });
        },
        methods: {
            updateFuncionario() {
                this.axios
                    .patch(`http://localhost/api/funcionarios/${this.$route.params.id}`, this.funcionario)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>