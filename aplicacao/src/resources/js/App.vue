<template>
    <v-container fluid>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home.</router-link> 
                    <router-link to="/lines-of-code" class="nav-item nav-link">Lines Of Code.</router-link> 
                    <router-link to="/program-volume" class="nav-item nav-link">Program Volume.</router-link> 
                    <router-link to="/algorithm-volume" class="nav-item nav-link">Algorithm Volume.</router-link> 
                    <router-link to="/maturity" class="nav-item nav-link">Software Maturity Calculator.</router-link> 
                    <router-link to="/integrity" class="nav-item nav-link">Software Integrity Calculator.</router-link> 
                </div>
            </div>
        </nav>
        <br>
        <router-view> </router-view>    
    </v-container>
</template>