
<template>
    <div>
        <h5 class="text-center">Exibir a quantidade de linhas de código de um repositório do GitHub</h5>
        <br>
        <div class="col-md-6 mx-auto" style="width: 20%;">
            <form @submit.prevent="buscar">
                <div class="form-group">
                    <label>Repositório (owner/repositorio)</label>
                    <input type="text" class="form-control" placeholder="carlosmds/eng-software" v-model="busca_repositorio">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
        <br>
        <div class="col-md-6 mx-auto" style="width: 40%;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Linguagem</th>
                        <th>Linhas de código</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in lines_of_code" :key="item.language">
                        <td>{{ item.language }}</td>
                        <td>{{ item.linesOfCode }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
 
<script>
    export default {
        methods: {
            buscar() { 
                this.axios
                   .post('http://localhost/api/lines-of-code/', {
                        params: {
                            dados: this.busca_repositorio,
                        }
                    })
                    .then(response => {
                        this.lines_of_code = response.data;
                    });
            },
        },
        data() {
            return {
                busca_repositorio: "carlosmds/eng-software",
                lines_of_code: []
            }
        },
        created() {
            this.buscar()
        }
    }
</script>