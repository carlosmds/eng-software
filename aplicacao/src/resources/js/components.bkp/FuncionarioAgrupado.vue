
<template>
    <div>
        <h3 class="text-center">Média de horas empresa: {{ media_empresa }}</h3>
        <br>
        <table class="table" :key="table">
            <thead>
            <tr>
                <th>Departamento</th>
                <th>Média de horas de treinamento necessárias</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="treinamentos in treinamentos_por_departamento" :key="treinamentos.departamento">
                <td>{{ treinamentos.departamento }}</td>
                <td>{{ treinamentos.media_horas }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                treinamentos_por_departamento: [],
                media_empresa: 0,
            }
        },
        created() {
            this.axios
                .get('http://localhost/api/funcionarios', {
                    params: {
                        agrupado: true,
                    }
                })
                .then(response => {
                    this.treinamentos_por_departamento = response.data.treinamentos_por_departamento;
                    this.media_empresa = response.data.media_empresa;
                });
        },
    }
</script>