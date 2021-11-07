import AllFuncionario from './components/AllFuncionario.vue';
import CreateFuncionario from './components/CreateFuncionario.vue';
import EditFuncionario from './components/EditFuncionario.vue';
import FuncionarioAgrupado from './components/FuncionarioAgrupado.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllFuncionario
    },
    {
        name: 'create',
        path: '/create',
        component: CreateFuncionario
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditFuncionario
    },
    {
        name: 'agrupado',
        path: '/agrupado',
        component: FuncionarioAgrupado
    }
];