<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">> Funcionarios List</router-link> 
                    <router-link to="/create" class="nav-item nav-link">> Create Funcionario</router-link>
                    <router-link to="/agrupado" class="nav-item nav-link">> Agrupado</router-link>
                </div>
            </div>
        </nav>
        <hr><br>
        <router-view> </router-view>
    </div>
</template>