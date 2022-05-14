<template>
    <div>
        <h5 class="text-center">Calcular o volume do código de um programa com base nos dados informados pelo usuário</h5>

        <br>
        <div class="col-md-6 mx-auto" style="width: 20%;">
            <form @submit.prevent="calcular">
                <div class="form-group">
                    <label>Nº de operadores distintos</label>
                    <input type="number" class="form-control" v-model="n1">
                </div>
                <div class="form-group">
                    <label>Nº de operandos distintos</label>
                    <input type="number" class="form-control" v-model="n2">
                </div>
                <button type="submit" class="btn btn-primary">Calcular</button>
            </form>
        </div>
        <br>
        <div class="col-md-6 mx-auto" style="width: 40%;">
           <h6>Resultados</h6>
           <table class="table">
                <thead>
                    <tr>
                        <th>Variável</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in results" :key="item.var">
                        <td>{{ item.var }}</td>
                        <td>{{ item.value }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
 
<script>
    export default {
        methods: {
            calcular() { 
                this.axios
                   .post('http://localhost/api/program-volume/', {
                        params: {
                            n1: this.n1,
                            n2: this.n2,
                        }
                    })
                    .then(response => {
                        this.results = response.data;
                    });
            },
        },
        data() {
            return {
                n1: 10,
                n2: 20,
                results: []
            }
        },
        created() {
            this.calcular()
        }
    }
</script>