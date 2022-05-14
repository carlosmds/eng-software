import Home from './components/Home.vue';
import ProjectMeasure from './components/ProjectMeasure.vue';
import AgileMetrics from './components/AgileMetrics.vue';
import LinesOfCode from './components/LinesOfCode.vue';
import ProgramVolume from './components/ProgramVolume.vue';
import AlgorithmVolume from './components/AlgorithmVolume.vue';
import Maturity from './components/Maturity.vue';
import Integrity from './components/Integrity.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'lines-of-code',
        path: '/lines-of-code',
        component: LinesOfCode
    },
    {
        name: 'project-measure',
        path: '/project-measure',
        component: ProjectMeasure
    },
    {
        name: 'agile-metrics',
        path: '/agile-metrics',
        component: AgileMetrics
    },
    {
        name: 'program-volume',
        path: '/program-volume',
        component: ProgramVolume
    },
    {
        name: 'algorithm-volume',
        path: '/algorithm-volume',
        component: AlgorithmVolume
    },
    {
        name: 'maturity',
        path: '/maturity',
        component: Maturity
    },
    {
        name: 'integrity',
        path: '/integrity',
        component: Integrity
    },
];