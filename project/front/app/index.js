import Vue from 'vue';

import App from './App.vue';

import router from './router/router';

new Vue({ 
    router, 
    render: createElement => createElement(App) 
}).$mount('#app');