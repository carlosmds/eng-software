//import AllFuncionario from './components.bkp/AllFuncionario.vue';
//import CreateFuncionario from './components.bkp/CreateFuncionario.vue';
//import EditFuncionario from './components.bkp/EditFuncionario.vue';
//import FuncionarioAgrupado from './components.bkp/FuncionarioAgrupado.vue';

import LinesOfCode from './components/LinesOfCode.vue';
import ProgramVolume from './components/ProgramVolume.vue';
import AlgorithmVolume from './components/AlgorithmVolume.vue';
import Integrity from './components/Integrity.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'LinesOfCode',
        path: '/LinesOfCode',
        component: LinesOfCode
    },
    {
        name: 'ProgramVolume',
        path: '/ProgramVolume',
        component: ProgramVolume
    },
    {
        name: 'AlgorithmVolume',
        path: '/AlgorithmVolume',
        component: AlgorithmVolume
    },
    {
        name: 'Integrity',
        path: '/Integrity',
        component: Integrity
    },
];