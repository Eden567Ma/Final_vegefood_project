/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Le bloc de code suivant peut être utilisé pour enregistrer automatiquement votre
 * Composants Vue. Il analysera récursivement ce répertoire pour le Vue
 * composants et les enregistrer automatiquement avec leur "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Ensuite, nous allons créer une nouvelle instance d'application Vue et l'attacher à
 * la page. Ensuite, vous pouvez commencer à ajouter des composants à cette application
 * ou personnalisez l'échafaudage JavaScript pour répondre à vos besoins uniques.
 */

const app = new Vue({
    el: '#app',
});
