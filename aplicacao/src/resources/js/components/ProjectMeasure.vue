<template>
    <div>
        <h5 class="text-center">Calcular métricas do projeto com base nos dados informados pelo usuário</h5>

        <br>
        <div class="col-md-6 mx-auto" style="width: 20%;">
            <form @submit.prevent="calcular">

                <div class="form-group">
                    <label>data_real_de_termino</label>
                    <input required type="date" class="form-control" v-model="data_real_de_termino">
                </div>
                <div class="form-group">
                    <label>data_real_de_inicio</label>
                    <input required type="date" class="form-control" v-model="data_real_de_inicio">
                </div>
                <div class="form-group">
                    <label>data_planejada_de_termino</label>
                    <input required type="date" class="form-control" v-model="data_planejada_de_termino">
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
                   .post('http://localhost/api/project-measure/', {
                        params: {
                            //medidas de projeto
                            data_real_de_termino: this.data_real_de_termino,
                            data_real_de_inicio: this.data_real_de_inicio,
                            data_planejada_de_termino: this.data_planejada_de_termino,
                        }
                    })
                    .then(response => {
                        this.results = response.data;
                    });
            },
        },
        data() {
            return {
                data_real_de_termino: null,
                data_planejada_de_termino: null,
                results: [],
            }
        },
        created() {
            this.calcular()
        }
    }
</script>