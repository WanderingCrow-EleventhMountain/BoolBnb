/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/search.js":
/*!********************************!*\
  !*** ./resources/js/search.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var registerButton = $('.register-button');
  var scrolledButton = $('#scrolled-button'); // header scroll

  $(document).scroll(function () {
    var scrollDocument = $(document).scrollTop();

    if (scrollDocument != 0) {
      $('.logobnb').attr('src', 'img/LOGO_UNO_MOD.png');
      $('header').css({
        'background-color': 'white',
        'box-shadow': '1px 1px 15px 5px grey'
      });
      $('.header-dx ul li a').css({
        'color': 'rgb(225, 60, 60)'
      });
      registerButton.addClass('scrolled');
    } else {
      $('.logobnb').attr('src', 'img/LOGO_UNO_MOD_BA.png');
      registerButton.removeClass('scrolled');
      $('header').css({
        'background-color': 'transparent',
        'box-shadow': 'none'
      });
      $('.header-dx ul a').css({
        'color': 'white'
      });
    }
  }); // click sul scrolled-Button

  scrolledButton.click(function () {
    window.scrollTo({
      top: 0,
      left: 0,
      behavior: 'smooth'
    });
  }); // hover register-button

  registerButton.mouseenter(function () {
    registerButton.css({
      'background-color': 'rgb(225, 60, 60)'
    });
    $('.register-button a').css({
      'color': 'white'
    });
  }); // hover register-button

  registerButton.mouseleave(function () {
    registerButton.css({
      'background-color': 'transparent'
    });

    if (registerButton.hasClass('scrolled')) {
      $('.register-button a').css({
        'color': 'rgb(225, 60, 60)'
      });
    } else {
      $('.register-button a').css({
        'color': 'white'
      });
    }
  }); // filtro

  var optionals = []; // handlebars

  var source = $('#entry-template').html();
  var template = Handlebars.compile(source);
  $('.filter').change(function (e) {
    e.preventDefault();
    optionals = [];
    $('input[name="optionals[]"]:checked').each(function () {
      optionals.push($(this).val());
    });
    var radius = $('#distance').val();
    var rooms = $('#rooms').val();
    var beds = $('#beds').val();
    var lat = $('#search-lat').val();
    var lon = $('#search-lon').val();
    $('.container-apartments').html(''); // 

    $('.main_content').css('opacity', '.4');
    $('.logobnb-loading').show();
    $.ajax({
      method: "GET",
      url: "http://localhost:8000/api/search/filter",
      data: {
        optionals: optionals,
        latitude: lat,
        longitude: lon,
        distance: radius,
        beds: beds,
        rooms: rooms
      },
      dataType: "json",
      success: function success(response) {
        console.log(response);
        var data = response;
        $('.main_content').css('opacity', '1');
        $('.logobnb-loading').hide();

        if (data.length > 0) {
          for (var i = 0; i < data.length; i++) {
            var apartment = data[i];
            var context = {
              title: apartment.title,
              beds: apartment.beds,
              rooms: apartment.room_number,
              bath: apartment.bath_number,
              price: apartment.price,
              img: apartment.image,
              id: apartment.id
            };
            $('.container-apartments').append(template(context));
          }
        } else {
          $('.container-apartments').append('<div class="alert alert-danger text-center" role="alert">' + '<strong class="text-danger">' + 'Nessun risultato trovato' + '</strong>' + '</div>');
        }
      }
    });
  });
});

/***/ }),

/***/ 4:
/*!**************************************!*\
  !*** multi ./resources/js/search.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Shild\Documents\Boolean\BoolBnb\Project\resources\js\search.js */"./resources/js/search.js");


/***/ })

/******/ });