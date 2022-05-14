<template>
    <div>
        <h5 class="text-center">Calcular a maturidade do código com base nos dados informados.</h5>

        <br>
        <div class="col-md-6 mx-auto" style="width: 20%;">
            <form @submit.prevent="calcular">
                <div class="form-group">
                    <label>Nº de módulos na versão atual</label>
                    <input type="number" class="form-control" v-model="mt">
                </div>
                <div class="form-group">
                    <label>Nº de módulos na versão atual que foram alterados</label>
                    <input type="number" class="form-control" v-model="fc">
                </div>
                <div class="form-group">
                    <label>Nº de módulos na versão atual que foram acrescentados</label>
                    <input type="number" class="form-control" v-model="fa">
                </div>
                <div class="form-group">
                    <label>Nº de módulos que foram excluídos</label>
                    <input type="number" class="form-control" v-model="fd">
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
                   .post('http://localhost/api/maturity/', {
                        params: {
                            mt: this.mt,
                            fc: this.fc,
                            fa: this.fa,
                            fd: this.fd,
                        }
                    })
                    .then(response => {
                        this.results = response.data;
                    });
            },
        },
        data() {
            return {
                mt: 9,
                fc: 3,
                fa: 1,
                fd: 0,
                results: []
            }
        },
        created() {
            this.calcular()
        }
    }
</script>