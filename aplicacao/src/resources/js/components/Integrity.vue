<template>
    <div>
        <h5 class="text-center">Calcular a integridade de segurança do código com os dados informados pelo usuário.</h5>

        <br>
        <div class="col-md-6 mx-auto" style="width: 20%;">
            <form @submit.prevent="calcular">
                <div class="form-group">
                    <label>Probabilidade da ameaça ocorrer (%)</label>
                    <input type="number" class="form-control" v-model="a">
                </div>
                <div class="form-group">
                    <label>Efetividade dos mecanismos de segurança (%)</label>
                    <input type="number" class="form-control" v-model="s">
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
                   .post('http://localhost/api/integrity/', {
                        params: {
                            a: this.a,
                            s: this.s,
                        }
                    })
                    .then(response => {
                        this.results = response.data;
                    });
            },
        },
        data() {
            return {
                a: 25,
                s: 95,
                results: []
            }
        },
        created() {
            this.calcular()
        }
    }
</script>