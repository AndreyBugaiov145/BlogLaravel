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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 46);
/******/ })
/************************************************************************/
/******/ ({

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(47);


/***/ }),

/***/ 47:
/***/ (function(module, exports) {

jQuery(document).ready(function ($) {
    // sroll up page
    $("#swipe-up").on("click", function () {
        $(window).scrollTop(0);
    });

    // Footer slider
    $(window).resize(function () {
        if (screen.width > 660) {
            $('footer ul').css({ 'display': 'block' });
        } else {
            $(' footer ul').css({ 'display': 'none' });
        }
    });

    $('.slider-span').on("click", function (e) {
        if (screen.width < 660) {
            if ($(this).next().css('display') == 'none') {
                $(this).next().css({ 'display': 'block' });
            } else {
                $(this).next().css({ 'display': 'none' });
            }
        }
    });

    // Registration validator
    $('.box-registar input:submit').click(function (event) {
        var _this = this;

        event.preventDefault();
        var validate = false;
        $('.box-registar input').each(function (i, e) {
            $(e).nextAll('p').remove();
            if ($(e).val() == false) {
                $(e).addClass('input-error').after("<p style='color:red'>поле не может быть пустым</p>");
                validate = true;
            } else {
                $(e).removeClass('input-error');
            }
        });

        if (!$('.box-registar input[name=confirm]:checked').val()) {
            $('.box-registar input[name=confirm]').next().after("<p style='color:red'>Согласитесь с условиями</p>");
            validate = true;
        }
        if ($('.box-registar input[name=password]').val() !== $('.box-registar input[name=confirm-password]').val()) {
            $('.box-registar input[name=password]').after("<p style='color:red'>Пароли не совпадают</p>");
            validate = true;
        }
        console.log(validate);
        if (!validate) {
            new Promise(function (resolve) {
                $.post("/registration/checkEmail", { "email": $('.box-registar input[name=email]').val() }, function (d_data) {
                    if (d_data > 0) {
                        alert("Пользователь с таким email уже зарегистрирован");
                        validate = true;
                    }
                    resolve();
                });
            }).then(function () {
                console.log(validate);
                if (!validate) {
                    $(_this).unbind();
                    $(_this).trigger("click");
                }
            });
        }
    });

    // Authorization validator
    $('.box-auth input:submit').click(function (event) {
        var validate = false;
        $('.box-auth input').each(function (i, e) {
            $(e).nextAll('p').remove();
            if ($(e).val() == false) {
                $(e).addClass('input-error').after("<p style='color:red'>поле не может быть пустым</p>");
                validate = true;
            } else {
                $(e).removeClass('input-error');
            }
        });
        if (validate) {
            event.preventDefault();
        }
    });

    // Publication validator
    $('.box-create-publication input:submit').click(function (event) {
        var validate = false;
        $('.box-create-publication input').not('.optional').add("textarea").each(function (i, e) {
            $(e).nextAll('p').remove();
            if ($(e).val() == false) {
                $(e).addClass('input-error').after("<p style='color:red'>поле не может быть пустым</p>");
                validate = true;
            } else {
                $(e).removeClass('input-error');
            }
        });
        if (validate) {
            event.preventDefault();
        }
    });

    // Catalog publication
    $('#deletePublication').click(function (e) {
        if (!confirm("вы уверены?")) {
            e.preventDefault();
        }
        return;
    });

    // User publication
    $('#user-account').on('mouseover', function (e) {
        if ($('.user-menu').css('display') == 'none') {
            $('.user-menu').css({ 'display': 'flex' });
        }
    });
    $('.user-menu:first').on('mouseleave', function (e) {
        $('.user-menu').css({ 'display': 'none' });
    });
});

Share = {
    facebook: function facebook(purl) {
        var ptitle = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
        var pimg = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
        var text = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;

        url = 'http://www.facebook.com/sharer.php?s=100';
        url += '&p[title]=' + encodeURIComponent(ptitle);
        url += '&p[summary]=' + encodeURIComponent(text);
        url += '&p[url]=' + encodeURIComponent(purl);
        url += '&p[images][0]=' + encodeURIComponent(pimg);
        Share.popup(url);
    },
    twitter: function twitter(purl) {
        var ptitle = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;

        url = 'http://twitter.com/share?';
        url += 'text=' + encodeURIComponent(ptitle);
        url += '&url=' + encodeURIComponent(purl);
        url += '&counturl=' + encodeURIComponent(purl);
        Share.popup(url);
    },
    pinterest: function pinterest(purl) {
        var pimg = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
        var text = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;

        url = 'https://www.pinterest.com/pin/create/bookmarklet/?';
        url += 'url=' + encodeURIComponent(purl);
        url += '&media=' + encodeURIComponent(pimg);
        url += '&h==400&w=600';
        url += '&description=' + encodeURIComponent(text);
        Share.popup(url);
    },
    skype: function skype(purl) {
        url = 'https://web.skype.com/share?';
        url += 'url=' + encodeURIComponent(purl);
        url += '&utm_source=share2';
        Share.popup(url);
    },

    popup: function popup(url) {
        window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
    }
};

/***/ })

/******/ });