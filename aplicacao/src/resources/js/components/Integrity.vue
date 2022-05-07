
<template>
    <h5 class="text-center">Teste de dados: {{ dados2['teste'] }}</h5>
</template>
 
<script>
    export default {
        methods: {
            
        },
        data() {
            return {
                dados: "teste",
                dados1: [],
                dados2: [],
                ...
            }
        },
        created() {
            this.axios
                .get('http://localhost/api/route.../', {
                    params: {
                        param1: this.dados,
                        param2: this.dados
                    }
                })
                .then(response => {
                    this.dados1 = response.data.data1;
                    this.dados2 = response.data.data2;
                });
        },
    }
</script>