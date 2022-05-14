<template>
    <div>
        <h5 class="text-center">Calcular métricas ágeis com base nos dados informados pelo usuário</h5>

        <br>
        <div class="col-md-6 mx-auto" style="width: 20%;">
            <form @submit.prevent="calcular">

                <div class="form-group">
                    <label>repo_data</label>
                    <input required type="text" class="form-control" placeholder="carlosmds/eng-software" v-model="repo_data">
                </div>
                <div class="form-group">
                    <label>total_lines_of_test</label>
                    <input required type="number" class="form-control" v-model="total_lines_of_test">
                </div>
                <div class="form-group">
                    <label>total_test_cases</label>
                    <input required type="number" class="form-control" v-model="total_test_cases">
                </div>
                <div class="form-group">
                    <label>total_assertions</label>
                    <input required type="number" class="form-control" v-model="total_assertions">
                </div>
                <div class="form-group">
                    <label>total_assertions_unit</label>
                    <input required type="number" class="form-control" v-model="total_assertions_unit">
                </div>
                <div class="form-group">
                    <label>assertions_passing_unit</label>
                    <input required type="number" class="form-control" v-model="assertions_passing_unit">
                </div>
                <div class="form-group">
                    <label>assertions_failing_unit</label>
                    <input required type="number" class="form-control" v-model="assertions_failing_unit">
                </div>
                <div class="form-group">
                    <label>number_of_feature_tests</label>
                    <input required type="number" class="form-control" v-model="number_of_feature_tests">
                </div>
                <div class="form-group">
                    <label>number_of_feature_tests_on_last_iteration</label>
                    <input required type="number" class="form-control" v-model="number_of_feature_tests_on_last_iteration">
                </div>
                <div class="form-group">
                    <label>total_assertions_feature</label>
                    <input required type="number" class="form-control" v-model="total_assertions_feature">
                </div>
                <div class="form-group">
                    <label>assertions_passing_feature</label>
                    <input required type="number" class="form-control" v-model="assertions_passing_feature">
                </div>
                <div class="form-group">
                    <label>assertions_failing_feature</label>
                    <input required type="number" class="form-control" v-model="assertions_failing_feature">
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
                   .post('http://localhost/api/agile-metrics/', {
                        params: {
                            //fator de teste
                            repo_data: this.repo_data,
                            //quantidade de casos de teste e assertivas
                            total_lines_of_test: this.total_lines_of_test,
                            total_test_cases: this.total_test_cases,
                            total_assertions: this.total_assertions,
                            //porcentagem de assertivas de teste de unidade passando e falhando
                            total_assertions_unit: this.total_assertions_unit,
                            assertions_passing_unit: this.assertions_passing_unit,
                            assertions_failing_unit: this.assertions_failing_unit,
                            //quantidade de testes de aceitação/integração por funcionalidades
                            number_of_feature_tests: this.number_of_feature_tests,
                            number_of_feature_tests_on_last_iteration: this.number_of_feature_tests_on_last_iteration,
                            //porcentagem de assertivas de teste de aceitação/integração passando e falhando
                            total_assertions_feature: this.total_assertions_feature,
                            assertions_passing_feature: this.assertions_passing_feature,
                            assertions_failing_feature: this.assertions_failing_feature,
                        }
                    })
                    .then(response => {
                        this.results = response.data;
                    });
            },
        },
        data() {
            return {
                repo_data: 'carlosmds/eng-software',
                total_lines_of_test: 200,
                total_test_cases: 10,
                total_assertions: 120,
                total_assertions_unit: 42,
                assertions_passing_unit: 26,
                assertions_failing_unit: 2,
                number_of_feature_tests: 32,
                number_of_feature_tests_on_last_iteration: 25,
                total_assertions_feature: 78,
                assertions_passing_feature: 62,
                assertions_failing_feature: 16,
                results: []
            }
        },
        created() {
            this.calcular()
        }
    }
</script>