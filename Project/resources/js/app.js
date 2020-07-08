/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(document).ready(function () {
    // HEADER SCROLL
    $(document).scroll(function () {
        var scrollDocument = $(document).scrollTop();
        if (scrollDocument != 0) {
            $('header').css({
                'background-color': 'white',
                'box-shadow': '1px 1px 15px 5px grey'

            });
            $('.header-dx ul a').css({
                'color': 'rgb(225, 60, 60)'
            });
        } else {
            $('header').css({
                'background-color': 'transparent',
                'box-shadow': 'none'
            });
            $('.header-dx ul a').css({
                'color': 'white'
            });
        }
    });

    $('.register-button a').mouseenter(function(){
      $('.register-button a').css({
          'color': 'white'
      });
    });
    $('.register-button').mouseleave(function(){
      if (scrollDocument == 0) {
        $('.register-button a').css({
          'color': 'white'
        });
      } else {
        $('.register-button a').css({
          'color': 'rgb(225, 60, 60)'
        });
      }
    });
    // FADE-OUT MESSAGGI CON SUCCESSO
    var alert = $('.alert-success');
    alert.fadeOut(4000);
});
