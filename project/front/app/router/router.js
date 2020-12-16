import Vue from "vue";
import VueRouter from 'vue-router';
import LoginView from '../views/LoginView';
import RegisterView from '../views/RegisterView';
import AddIncomeView from '../views/AddIncomeView';
import IncomesListView from '../views/IncomesListView';

Vue.use(VueRouter);

const routeList = [
    {name: 'login', path: '/', component: LoginView},
    {name: 'register', path: '/register', component: RegisterView},
    {name: 'addIncome', path: '/add-income', component: AddIncomeView},
    {name: 'incomesList', path: '/incomes', component: IncomesListView}

];

const router = new VueRouter({
    routes: routeList,
    mode: "history"
});

export default router;