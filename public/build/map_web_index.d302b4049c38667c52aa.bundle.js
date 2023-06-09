/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		"map_web_index": 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push(["./resources/views/pages/map/web/index/index.js","vendors"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/constants/path/index.js":
/*!*******************************************!*\
  !*** ./resources/constants/path/index.js ***!
  \*******************************************/
/*! exports provided: PATH */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PATH", function() { return PATH; });
var root = '/';

var createPath = function createPath(path) {
  return root + path;
};

var PATH = {
  FAVORITES: createPath('favorites')
};

/***/ }),

/***/ "./resources/events/index.js":
/*!***********************************!*\
  !*** ./resources/events/index.js ***!
  \***********************************/
/*! exports provided: EVENTS_NAMES */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "EVENTS_NAMES", function() { return EVENTS_NAMES; });
var EVENTS_NAMES = {
  COMMON: {
    CATALOG: {
      CLOSE: "CATALOG_CLOSE",
      OPEN: "CATALOG_OPEN"
    },
    MODALS: {
      COMMON: {
        CLOSE: "MODALS_COMMON_CLOSE",
        OPEN: "MODALS_COMMON_OPEN"
      }
    }
  },
  INPUTS: {
    RADIO: {
      GROUP: {
        CHANGE: "INPUTS_RADIO_GROUP_CHANGE"
      }
    }
  }
};

/***/ }),

/***/ "./resources/helpers/cookie.js":
/*!*************************************!*\
  !*** ./resources/helpers/cookie.js ***!
  \*************************************/
/*! exports provided: getCookieData */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getCookieData", function() { return getCookieData; });
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

var getCookieData = function getCookieData() {
  var cookie = document.cookie;
  var cookieArray = cookie.split(';');
  return cookieArray.reduce(function (acc, cookieString) {
    var cookieStringFormatted = cookieString.trim();
    var cookieNameValueArray = cookieStringFormatted.split('=');
    var cookieName = cookieNameValueArray[0];
    var cookieValue = cookieNameValueArray[1];
    return _objectSpread(_objectSpread({}, acc), {}, _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()({}, cookieName, cookieValue));
  }, {});
};

/***/ }),

/***/ "./resources/helpers/debounce.js":
/*!***************************************!*\
  !*** ./resources/helpers/debounce.js ***!
  \***************************************/
/*! exports provided: debounce */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "debounce", function() { return debounce; });
var _this = undefined;

var debounce = function debounce(callback) {
  var timeout = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 300;
  var timeoutId;
  return function () {
    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    clearTimeout(timeoutId);
    timeoutId = setTimeout(function () {
      callback.apply(_this, args);
    }, timeout);
  };
};

/***/ }),

/***/ "./resources/helpers/events.js":
/*!*************************************!*\
  !*** ./resources/helpers/events.js ***!
  \*************************************/
/*! exports provided: addEventListener */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addEventListener", function() { return addEventListener; });
var addEventListener = function addEventListener(element, event, callback) {
  if (!element) {
    console.error('No element for addEventListener');
    return;
  }

  element.removeEventListener(event, callback);
  element.addEventListener(event, callback);
};

/***/ }),

/***/ "./resources/helpers/module.js":
/*!*************************************!*\
  !*** ./resources/helpers/module.js ***!
  \*************************************/
/*! exports provided: module */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "module", function() { return module; });
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");





function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }


var jPrefix = 'j-';
var jStatusPrefix = jPrefix + 'status-';

var Module = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(function Module() {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default()(this, Module);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, 'j-event-module__update', _this.handleUpdate);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "createModule", function (cssClass, JsClass) {
    var namesArray = cssClass.split(jPrefix);

    if (namesArray.length === 1) {
      console.error('No j- prefix exists');
      return;
    }

    var initCssClass = _this.getInitName(namesArray[1]);

    var selector = ".".concat(cssClass, ":not(.").concat(initCssClass, ")");
    var modulesList = document.querySelectorAll(selector);
    modulesList.forEach(function (element) {
      element.classList.add(initCssClass);
      new JsClass(element);
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "getInitName", function (name) {
    return jStatusPrefix + name;
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleUpdate", function () {
    Object.entries(_this.moduleData).forEach(function (_ref) {
      var _ref2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_ref, 2),
          cssClass = _ref2[0],
          JsClass = _ref2[1].JsClass;

      _this.createModule(cssClass, JsClass);
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "initModule", function (cssClass, JsClass) {
    _this.moduleData = _objectSpread(_objectSpread({}, _this.moduleData), {}, _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()({}, cssClass, {
      JsClass: JsClass
    }));

    _this.createModule(cssClass, JsClass);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "updateModules", function () {
    document.dispatchEvent(new CustomEvent('j-event-module__update'));
  });

  this.moduleData = {};
  this.bind();
});

var module = new Module();

/***/ }),

/***/ "./resources/helpers/plural.js":
/*!*************************************!*\
  !*** ./resources/helpers/plural.js ***!
  \*************************************/
/*! exports provided: plural_ru */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "plural_ru", function() { return plural_ru; });
var plural_ru = function plural_ru(count, words) {
  var _count = Number(count);

  var cases = [2, 0, 1, 1, 1, 2];
  return words[_count % 100 > 4 && _count % 100 < 20 ? 2 : cases[Math.min(_count % 10, 5)]];
};

/***/ }),

/***/ "./resources/helpers/query.js":
/*!************************************!*\
  !*** ./resources/helpers/query.js ***!
  \************************************/
/*! exports provided: getQueryData, getUrlWithNewQueryData, setUrlQuery */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getQueryData", function() { return getQueryData; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getUrlWithNewQueryData", function() { return getUrlWithNewQueryData; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setUrlQuery", function() { return setUrlQuery; });
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_2__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

var getQueryData = function getQueryData() {
  var queryString = window.location.search;

  if (!queryString) {
    return {};
  }

  var urlSearchParams = new URLSearchParams(queryString);

  var urlSearchParamsEntries = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_2___default()(urlSearchParams.entries());

  return urlSearchParamsEntries.reduce(function (acc, urlSearchParamsEntriesItem) {
    var _urlSearchParamsEntri = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(urlSearchParamsEntriesItem, 2),
        queryName = _urlSearchParamsEntri[0],
        queryValue = _urlSearchParamsEntri[1];

    return _objectSpread(_objectSpread({}, acc), {}, _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()({}, queryName, queryValue));
  }, {});
};
var getUrlWithNewQueryData = function getUrlWithNewQueryData(_ref) {
  var _ref$defaultUrl = _ref.defaultUrl,
      defaultUrl = _ref$defaultUrl === void 0 ? window.location : _ref$defaultUrl,
      queryDataArray = _ref.queryDataArray,
      _ref$removeQueryWitho = _ref.removeQueryWithoutValue,
      removeQueryWithoutValue = _ref$removeQueryWitho === void 0 ? true : _ref$removeQueryWitho;
  var url = new URL(defaultUrl);
  var queryString = window.location.search;
  var urlSearchParams = new URLSearchParams(queryString);
  queryDataArray.forEach(function (_ref2) {
    var key = _ref2.key,
        value = _ref2.value;

    if (removeQueryWithoutValue) {
      if (!value) {
        urlSearchParams["delete"](key);
        return;
      }
    }

    urlSearchParams.set(key, value);
  });
  url.search = urlSearchParams.toString();
  return url;
};
var setUrlQuery = function setUrlQuery(queryDataArray) {
  var newUrl = getUrlWithNewQueryData({
    queryDataArray: queryDataArray
  });
  var newUrlString = newUrl.toString();
  history.pushState({}, null, newUrlString);
};

/***/ }),

/***/ "./resources/helpers/toggle.js":
/*!*************************************!*\
  !*** ./resources/helpers/toggle.js ***!
  \*************************************/
/*! exports provided: toggleClass */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "toggleClass", function() { return toggleClass; });
var toggleClass = function toggleClass(element, className, isShow) {
  if (isShow) {
    element.classList.add(className);
  } else {
    element.classList.remove(className);
  }
};

/***/ }),

/***/ "./resources/views/components/buttons/burger/index.js":
/*!************************************************************!*\
  !*** ./resources/views/components/buttons/burger/index.js ***!
  \************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/buttons/burger/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/components/buttons/burger/index.less":
/*!**************************************************************!*\
  !*** ./resources/views/components/buttons/burger/index.less ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/components/buttons/filter/index.js":
/*!************************************************************!*\
  !*** ./resources/views/components/buttons/filter/index.js ***!
  \************************************************************/
/*! exports provided: ButtonsFilter */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ButtonsFilter", function() { return ButtonsFilter; });
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/buttons/filter/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_4__);





var ButtonsFilter = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function ButtonsFilter(_ref) {
  var _this = this;

  var _container = _ref.container,
      _onClick = _ref.onClick,
      _onReset = _ref.onReset;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, ButtonsFilter);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_3__["addEventListener"])(_this.module, 'click', _this.handleClick);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_3__["addEventListener"])(_this.buttonReset, 'click', _this.handleResetButtonClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "checkResetButtonVisibility", function () {
    var title = _this.titleContainer.textContent;

    if (title.trim() !== _this.defaultTitle) {
      _this.toggleButtonDefaultState(false);
    } else {
      _this.toggleButtonDefaultState(true);
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleClick", function (e) {
    var isResetButton = _this.isResetButtonPressed(e);

    if (isResetButton || !_this.onClick) {
      return;
    }

    _this.onClick();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleResetButtonClick", function (e) {
    e.stopPropagation();

    _this.onReset();

    _this.toggleButtonDefaultState(true);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "setFilter", function (value) {
    if (!value) {
      _this.toggleButtonDefaultState(true);

      return;
    }

    _this.setTitle(value);

    _this.checkResetButtonVisibility();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "init", function (_ref2) {
    var container = _ref2.container,
        onClick = _ref2.onClick,
        onReset = _ref2.onReset;
    _this.module = container.querySelector('.j-buttons-filter');
    _this.onClick = onClick;
    _this.onReset = onReset;
    _this.defaultTitle = _this.module.dataset.defaultTitle.trim();
    _this.titleContainer = _this.module.querySelector('.j-buttons-filter__title');
    _this.buttonReset = _this.module.querySelector('.j-buttons-filter__button-reset');

    _this.checkResetButtonVisibility();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "isResetButtonPressed", function (e) {
    return e.target.classList.contains('j-buttons-filter__button-reset') || e.target.closest('.j-buttons-filter__button-reset');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "setTitle", function (title) {
    _this.titleContainer.textContent = title;
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "toggleButtonDefaultState", function () {
    var isDefault = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

    if (isDefault) {
      _this.module.classList.add('j-style-default-state');

      _this.setTitle(_this.defaultTitle);
    } else {
      _this.module.classList.remove('j-style-default-state');
    }
  });

  this.init({
    container: _container,
    onClick: _onClick,
    onReset: _onReset
  });
  this.bind();
});

/***/ }),

/***/ "./resources/views/components/buttons/filter/index.less":
/*!**************************************************************!*\
  !*** ./resources/views/components/buttons/filter/index.less ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/components/buttons/modal/open/index.js":
/*!****************************************************************!*\
  !*** ./resources/views/components/buttons/modal/open/index.js ***!
  \****************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var events_index__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! events/index */ "./resources/events/index.js");
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");






var OPEN = events_index__WEBPACK_IMPORTED_MODULE_3__["EVENTS_NAMES"].COMMON.MODALS.COMMON.OPEN;

var ButtonsModalOpen = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function ButtonsModalOpen(item) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, ButtonsModalOpen);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(_this.module, 'click', _this.handleClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleClick", function (e) {
    document.dispatchEvent(new CustomEvent(OPEN, {
      detail: {
        href: _this.href,
        templateId: _this.templateId
      }
    }));
  });

  this.module = item;
  this.templateId = this.module.dataset.templateId;
  this.href = this.module.dataset.href;
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_5__["module"].initModule('j-components-buttons-modal-open', ButtonsModalOpen);

/***/ }),

/***/ "./resources/views/components/hint/common/index.js":
/*!*********************************************************!*\
  !*** ./resources/views/components/hint/common/index.js ***!
  \*********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/hint/common/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/components/hint/common/index.less":
/*!***********************************************************!*\
  !*** ./resources/views/components/hint/common/index.less ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/components/info/common/index.js":
/*!*********************************************************!*\
  !*** ./resources/views/components/info/common/index.js ***!
  \*********************************************************/
/*! exports provided: Info */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Info", function() { return Info; });
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/info/common/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_5__);






var Info = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function Info(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, Info);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_3__["addEventListener"])(_this.closeButton, 'click', _this.handleClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleClick", function () {
    _this.module.classList.add('hidden');

    localStorage.setItem(_this.id, 'hidden');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "init", function () {
    var isHide = localStorage.getItem(_this.id);

    if (isHide) {
      return;
    }

    _this.show();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "show", function () {
    _this.module.classList.remove('hidden');
  });

  this.module = element;
  this.closeButton = this.module.querySelector('.j-components-info-common__close-button');
  this.id = this.module.dataset.id;
  this.init();
  this.bind();
});
helpers_module__WEBPACK_IMPORTED_MODULE_4__["module"].initModule('j-components-info-common', Info);

/***/ }),

/***/ "./resources/views/components/info/common/index.less":
/*!***********************************************************!*\
  !*** ./resources/views/components/info/common/index.less ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/components/inputs/search/index.js":
/*!***********************************************************!*\
  !*** ./resources/views/components/inputs/search/index.js ***!
  \***********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/inputs/search/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_5__);







var SearchInput = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function SearchInput(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, SearchInput);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_3__["addEventListener"])(_this.searchInput, 'input', _this.handleInput);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleInput", function (e) {
    document.dispatchEvent(new CustomEvent('j-event-inputs-search__input', {
      detail: {
        name: _this.name,
        value: e.target.value
      }
    }));
  });

  this.module = element;
  this.name = this.module.dataset.name;
  this.searchInput = this.module.querySelector('.j-inputs-search__input');
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_4__["module"].initModule('j-inputs-search', SearchInput);

/***/ }),

/***/ "./resources/views/components/inputs/search/index.less":
/*!*************************************************************!*\
  !*** ./resources/views/components/inputs/search/index.less ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/components/modals/base/common/index.js":
/*!****************************************************************!*\
  !*** ./resources/views/components/modals/base/common/index.js ***!
  \****************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var events_index__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! events/index */ "./resources/events/index.js");
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/modals/base/common/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_6__);







var _EVENTS_NAMES$COMMON$ = events_index__WEBPACK_IMPORTED_MODULE_3__["EVENTS_NAMES"].COMMON.MODALS.COMMON,
    CLOSE = _EVENTS_NAMES$COMMON$.CLOSE,
    OPEN = _EVENTS_NAMES$COMMON$.OPEN;

var ModalsCommon = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function ModalsCommon(item) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, ModalsCommon);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, CLOSE, _this.handleClose);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, OPEN, _this.handleOpen);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(_this.module, 'click', _this.handleBackdropClick);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(_this.closeButton, 'click', _this.handleCloseButtonClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleBackdropClick", function (e) {
    var isBackdropClicked = _this.isBackdropClicked(e.target);

    if (isBackdropClicked) {
      _this.sendCloseModalEvent();
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleClose", function () {
    _this.module.classList.remove('components-modals-base-common_show');

    document.body.classList.remove('j-style-overflow-hidden');
    _this.contentContainer.innerHTML = '';
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleCloseButtonClick", function () {
    _this.sendCloseModalEvent();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleOpen", function (e) {
    var detail = e.detail;
    var href = detail.href,
        templateId = detail.templateId;
    var template = document.querySelector(".j-template[data-template-id=\"".concat(templateId, "\"]"));

    if (!template) {
      return;
    }

    _this.module.classList.add('components-modals-base-common_show');

    document.body.classList.add('j-style-overflow-hidden');
    _this.contentContainer.innerHTML = template.content.firstElementChild.outerHTML;

    var content = _this.contentContainer.querySelector('.j-template__content');

    if (content) {
      content.dataset.href = href;
    }

    helpers_module__WEBPACK_IMPORTED_MODULE_5__["module"].updateModules();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "isBackdropClicked", function (target) {
    return target.classList.contains('j-components-modals-base-common') || target.classList.contains('j-components-modals-base-common__body-block');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "sendCloseModalEvent", function () {
    document.dispatchEvent(new CustomEvent(CLOSE, {
      detail: {
        name: _this.name,
        type: CLOSE
      }
    }));
  });

  this.module = item;
  this.closeButton = this.module.querySelector('.j-components-modals-base-common__close-button');
  this.contentContainer = this.module.querySelector('.j-components-modals-base-common__content-container');
  this.name = this.module.dataset.name;
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_5__["module"].initModule('j-components-modals-base-common', ModalsCommon);

/***/ }),

/***/ "./resources/views/components/modals/base/common/index.less":
/*!******************************************************************!*\
  !*** ./resources/views/components/modals/base/common/index.less ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/components/modals/layout/catalog/content/index.js":
/*!***************************************************************************!*\
  !*** ./resources/views/components/modals/layout/catalog/content/index.js ***!
  \***************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_components_inputs_search__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/components/inputs/search */ "./resources/views/components/inputs/search/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/modals/layout/catalog/content/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./resources/views/components/modals/layout/catalog/content/index.less":
/*!*****************************************************************************!*\
  !*** ./resources/views/components/modals/layout/catalog/content/index.less ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/components/modals/layout/catalog/index.js":
/*!*******************************************************************!*\
  !*** ./resources/views/components/modals/layout/catalog/index.js ***!
  \*******************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var events_index__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! events/index */ "./resources/events/index.js");
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var views_components_inputs_search__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! views/components/inputs/search */ "./resources/views/components/inputs/search/index.js");
/* harmony import */ var views_components_modals_layout_catalog_content__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! views/components/modals/layout/catalog/content */ "./resources/views/components/modals/layout/catalog/content/index.js");
/* harmony import */ var views_components_modals_layout_catalog_navigation__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! views/components/modals/layout/catalog/navigation */ "./resources/views/components/modals/layout/catalog/navigation/index.js");
/* harmony import */ var views_components_search_catalog__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! views/components/search/catalog */ "./resources/views/components/search/catalog/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/modals/layout/catalog/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_11__);





function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }









var CLOSE = events_index__WEBPACK_IMPORTED_MODULE_4__["EVENTS_NAMES"].COMMON.MODALS.COMMON.CLOSE;

var Catalog = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(function Catalog(item) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default()(this, Catalog);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_5__["addEventListener"])(_this.module, 'mouseover', _this.handleMouseOver);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_5__["addEventListener"])(document, 'j-event-modules-common-catalog__check-is-active-hidden', _this.handleCheckIsActiveHidden);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_5__["addEventListener"])(document, CLOSE, _this.handleModalClose);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "getFirstVisibleNavigationItemId", function () {
    var firstVisibleNavigationItem = _this.navigationItemList.find(function (element) {
      return !element.classList.contains('hidden');
    });

    return firstVisibleNavigationItem.dataset.itemId;
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleCheckIsActiveHidden", function () {
    var isNavigationItemHidden = _this.isActiveNavigationItemHidden();

    if (!isNavigationItemHidden) {
      return;
    }

    var id = _this.getFirstVisibleNavigationItemId();

    _this.setActiveItem(id);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleModalClose", function () {
    document.removeEventListener('j-event-modules-common-catalog__check-is-active-hidden', _this.handleCheckIsActiveHidden);
    document.removeEventListener(CLOSE, _this.handleModalClose);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleMouseOver", function (e) {
    var target = e.target;
    var navigationItem = target.closest('.j-components-catalog-navigation-item');

    if (navigationItem) {
      var itemId = navigationItem.dataset.itemId;

      _this.setActiveItem(itemId);
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "init", function () {
    _this.setCatalogData();

    _this.setActiveItem(_this.initialSelectedItemId);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "isActiveNavigationItemHidden", function () {
    return _this.selectedNavigationItem.classList.contains('hidden');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "selectContentItem", function (id) {
    if (_this.selectedContentItem) {
      _this.selectedContentItem.classList.remove('selected');
    }

    _this.selectedContentItem = _this.catalogData[id].content.element;

    _this.selectedContentItem.classList.add('selected');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "selectNavigationItem", function (id) {
    if (_this.selectedNavigationItem) {
      _this.selectedNavigationItem.classList.remove('selected');
    }

    _this.selectedNavigationItem = _this.catalogData[id].navigation.element;

    _this.selectedNavigationItem.classList.add('selected');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "setActiveItem", function (id) {
    _this.selectNavigationItem(id);

    _this.selectContentItem(id);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "setCatalogData", function () {
    var contentData = _this.contentItemList.reduce(function (acc, element) {
      var itemId = element.dataset.itemId;
      return _objectSpread(_objectSpread({}, acc), {}, _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()({}, itemId, element));
    }, {});

    _this.catalogData = _this.navigationItemList.reduce(function (acc, element) {
      var itemId = element.dataset.itemId;
      return _objectSpread(_objectSpread({}, acc), {}, _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()({}, itemId, {
        content: {
          element: contentData[itemId]
        },
        navigation: {
          element: element
        }
      }));
    }, {});
  });

  this.module = item;
  this.initialSelectedItemId = 0;
  this.contentItemList = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(this.module.querySelectorAll('.j-components-catalog-content-item'));
  this.navigationItemList = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(this.module.querySelectorAll('.j-components-catalog-navigation-item'));
  this.selectedContentItem = null;
  this.selectedNavigationItem = null;
  this.init();
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_6__["module"].initModule('j-modules-common-catalog', Catalog);

/***/ }),

/***/ "./resources/views/components/modals/layout/catalog/index.less":
/*!*********************************************************************!*\
  !*** ./resources/views/components/modals/layout/catalog/index.less ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/components/modals/layout/catalog/navigation/index.js":
/*!******************************************************************************!*\
  !*** ./resources/views/components/modals/layout/catalog/navigation/index.js ***!
  \******************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_components_inputs_search__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/components/inputs/search */ "./resources/views/components/inputs/search/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/modals/layout/catalog/navigation/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./resources/views/components/modals/layout/catalog/navigation/index.less":
/*!********************************************************************************!*\
  !*** ./resources/views/components/modals/layout/catalog/navigation/index.less ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/components/popup/cookie/index.js":
/*!**********************************************************!*\
  !*** ./resources/views/components/popup/cookie/index.js ***!
  \**********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/popup/cookie/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_5__);







var Cookie = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function Cookie(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, Cookie);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_3__["addEventListener"])(_this.button, 'click', _this.handleAcceptCookie);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleAcceptCookie", function () {
    localStorage.setItem('cookie_accept', true);

    _this.module.classList.add('hidden');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "init", function () {
    var isAccepted = Boolean(localStorage.getItem('cookie_accept'));

    if (!isAccepted) {
      _this.module.classList.remove('hidden');
    }
  });

  this.module = element;
  this.button = this.module.querySelector('.j-components-popup-cookie__button-accept');
  this.init();
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_4__["module"].initModule('j-components-popup-cookie', Cookie);

/***/ }),

/***/ "./resources/views/components/popup/cookie/index.less":
/*!************************************************************!*\
  !*** ./resources/views/components/popup/cookie/index.less ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/components/search/catalog/index.js":
/*!************************************************************!*\
  !*** ./resources/views/components/search/catalog/index.js ***!
  \************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");





function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }




var SearchCatalog = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(function SearchCatalog(item) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default()(this, SearchCatalog);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, 'j-event-inputs-search__input', _this.handleInput);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "checkActiveItem", function () {
    document.dispatchEvent(new CustomEvent('j-event-modules-common-catalog__check-is-active-hidden'));
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleInput", function (e) {
    var detail = e.detail;
    var value = detail.value;

    if (!value) {
      _this.showAll();
    } else {
      _this.showSearchedItems(value);
    }

    _this.checkActiveItem();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "init", function () {
    var contentBlockData = _this.contentBlocksList.reduce(function (acc, element) {
      var _element$dataset = element.dataset,
          itemId = _element$dataset.itemId,
          value = _element$dataset.value;

      var items = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(element.querySelectorAll('.j-components-search-catalog__content-item'));

      var itemsList = items.map(function (itemElement) {
        var value = itemElement.dataset.value;
        return {
          element: itemElement,
          value: value
        };
      });
      return _objectSpread(_objectSpread({}, acc), {}, _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()({}, itemId, {
        element: element,
        itemsList: itemsList,
        value: value
      }));
    }, {});

    _this.searchDataList = _this.navigationItemsList.map(function (element) {
      var _element$dataset2 = element.dataset,
          itemId = _element$dataset2.itemId,
          value = _element$dataset2.value;
      var content = contentBlockData[itemId];
      return {
        content: content,
        navigation: {
          element: element,
          value: value
        }
      };
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "showAll", function () {
    _this.searchDataList.forEach(function (_ref) {
      var content = _ref.content,
          navigation = _ref.navigation;
      var navigationElement = navigation.element;
      var contentBlockElement = content.element,
          contentItemsList = content.itemsList;
      contentItemsList.forEach(function (_ref2) {
        var element = _ref2.element;
        element.classList.remove('hidden');
      });
      navigationElement.classList.remove('hidden');
      contentBlockElement.classList.remove('hidden');
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "showSearchedItems", function (searchValue) {
    var regexp = new RegExp(searchValue, 'i');

    _this.searchDataList.forEach(function (_ref3) {
      var content = _ref3.content,
          navigation = _ref3.navigation;
      var navigationElement = navigation.element,
          navigationValue = navigation.value;
      var contentBlockElement = content.element,
          contentItemsList = content.itemsList,
          contentValue = content.value;
      var isContentExists = false;
      contentItemsList.forEach(function (_ref4) {
        var element = _ref4.element,
            value = _ref4.value;

        if (value === 'Остальное') {
          return;
        }

        var isSuit = regexp.test(value);

        if (isSuit) {
          isContentExists = true;
          element.classList.remove('hidden');
        } else {
          element.classList.add('hidden');
        }
      });
      var isNavigationValueSuit = regexp.test(navigationValue) || navigationValue === 'Другое';
      var isSuit = isNavigationValueSuit || isContentExists;

      if (!isSuit) {
        navigationElement.classList.add('hidden');
        contentBlockElement.classList.add('hidden');
      } else {
        navigationElement.classList.remove('hidden');
        contentBlockElement.classList.remove('hidden');
      }
    });
  });

  this.module = item;
  this.initialSelectedItemId = 0;
  this.navigationItemsList = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(this.module.querySelectorAll('.j-components-search-catalog__navigation-item'));
  this.contentBlocksList = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(this.module.querySelectorAll('.j-components-search-catalog__content-block'));
  this.selectedContentItem = null;
  this.selectedNavigationItem = null;
  this.init();
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_5__["module"].initModule('j-components-search-catalog', SearchCatalog);

/***/ }),

/***/ "./resources/views/factory/cards/offer/map/index.js":
/*!**********************************************************!*\
  !*** ./resources/views/factory/cards/offer/map/index.js ***!
  \**********************************************************/
/*! exports provided: MapOfferCard */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "MapOfferCard", function() { return MapOfferCard; });
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var views_modules_pages_favorites_shared_components_button__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! views/modules/pages/favorites/shared/components/button */ "./resources/views/modules/pages/favorites/shared/components/button/index.js");
/* harmony import */ var events_index__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! events/index */ "./resources/events/index.js");
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_plural__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! helpers/plural */ "./resources/helpers/plural.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./index.less */ "./resources/views/factory/cards/offer/map/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_8__);









var CLOSE = events_index__WEBPACK_IMPORTED_MODULE_5__["EVENTS_NAMES"].COMMON.MODALS.COMMON.CLOSE;
var MapOfferCard = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(function MapOfferCard(_element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default()(this, MapOfferCard);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_6__["addEventListener"])(_this.module, 'click', _this.handleModuleClick);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_6__["addEventListener"])(_this.salePointsButton, 'click', _this.handleSalePointsButtonClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleModuleClick", function (e) {
    var target = e.target;
    var element = target.classList.contains('j-factory-cards-offer-map__placemark-link') ? target : target.closest('.j-factory-cards-offer-map__placemark-link');

    if (!element) {
      return;
    }

    document.dispatchEvent(new CustomEvent(CLOSE));
    document.dispatchEvent(new CustomEvent('j-event-map__show-placemark', {
      detail: {
        placemarkId: element.dataset.placemarkId
      }
    }));
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleSalePointsButtonClick", function (e) {
    if (_this.salePointsBlock.classList.contains('show')) {
      _this.salePointsBlock.classList.remove('show');
    } else {
      _this.salePointsBlock.classList.add('show');
    }
  });

  this.module = _element;
  this.salePointsButton = this.module.querySelector('.j-factory-cards-offer-map__sale-points-button');
  this.salePointsBlock = this.module.querySelector('.j-factory-cards-offer-map__sale-points-block');
  this.bind();
});

_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(MapOfferCard, "createMapOfferCard", function (_ref) {
  var placemarkList = _ref.placemarkList,
      placemarkData = _ref.placemarkData;
  var isUserAuth = Boolean(document.querySelector('.j-user__auth'));
  var _placemarkData$offer = placemarkData.offer,
      catalog = _placemarkData$offer.catalog,
      product = _placemarkData$offer.product,
      salePoints = _placemarkData$offer.salePoints,
      seller = _placemarkData$offer.seller;
  var address = product.address,
      created_at = product.created_at,
      description = product.description,
      id = product.id,
      img = product.img,
      productLink = product.link,
      phone = product.phone,
      price = product.price,
      price_description = product.price_description,
      rating = product.rating,
      rating_votes = product.rating_votes,
      title = product.title;
  var src = img.src;
  var sellerLink = seller.link,
      name = seller.name;
  var catalog_level_one = catalog.catalog_level_one,
      catalog_level_two = catalog.catalog_level_two;
  var _name = name;

  if (!_name) {
    _name = 'имя не указано';
  }

  var salePointsHtml = salePoints.map(function (_ref2) {
    var address = _ref2.address,
        description = _ref2.description,
        salePointId = _ref2.id,
        phone = _ref2.phone,
        title = _ref2.title,
        working_hours = _ref2.working_hours;
    return "\n                <div class=\"factory-cards-offer-map__sale-point-address-container\">".concat(address, "</div>\n                <button\n                    class=\"factory-cards-offer-map__show-on-map-button factory-cards-offer-map__show-on-map-button_with-offset j-factory-cards-offer-map__placemark-link\"\n                    data-placemark-id=\"").concat(id, "_").concat(salePointId, "\"\n                    type=\"button\"\n                >\n                    <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" viewBox=\"0 0 491.582 491.582\" width=\"14\" height=\"14\">\n                        <path\n                            d=\"M245.791,0C153.799,0,78.957,74.841,78.957,166.833c0,36.967,21.764,93.187,68.493,176.926 c31.887,57.138,63.627,105.4,64.966,107.433l22.941,34.773c2.313,3.507,6.232,5.617,10.434,5.617s8.121-2.11,10.434-5.617    l22.94-34.771c1.326-2.01,32.835-49.855,64.967-107.435c46.729-83.735,68.493-139.955,68.493-176.926    C412.625,74.841,337.783,0,245.791,0z M322.302,331.576c-31.685,56.775-62.696,103.869-64.003,105.848l-12.508,18.959    l-12.504-18.954c-1.314-1.995-32.563-49.511-64.007-105.853c-43.345-77.676-65.323-133.104-65.323-164.743    C103.957,88.626,167.583,25,245.791,25s141.834,63.626,141.834,141.833C387.625,198.476,365.647,253.902,322.302,331.576z\" fill=\"currentColor\" />\n                        <path\n                            d=\"M245.791,73.291c-51.005,0-92.5,41.496-92.5,92.5s41.495,92.5,92.5,92.5s92.5-41.496,92.5-92.5    S296.796,73.291,245.791,73.291z M245.791,233.291c-37.22,0-67.5-30.28-67.5-67.5s30.28-67.5,67.5-67.5    c37.221,0,67.5,30.28,67.5,67.5S283.012,233.291,245.791,233.291z\" fill=\"currentColor\" />\n                    </svg>\n                    \u041F\u043E\u043A\u0430\u0437\u0430\u0442\u044C \u043D\u0430 \u043A\u0430\u0440\u0442\u0435\n                </button>\n            ");
  });
  var salePontButton = salePointsHtml.length ? "\n            <button class=\"factory-cards-offer-map__sale-points-button j-factory-cards-offer-map__sale-points-button\" type=\"button\">\n                <span class=\"factory-cards-offer-map__sale-points-button-text factory-cards-offer-map__sale-points-button-text_show\">\u0421\u0432\u0435\u0440\u043D\u0443\u0442\u044C</span>\n                <span class=\"factory-cards-offer-map__sale-points-button-text factory-cards-offer-map__sale-points-button-text_hide\">\u0420\u0430\u0437\u0432\u0435\u0440\u043D\u0443\u0442\u044C</span>\n            </button>\n        " : '';
  var salePointsBlock = salePointsHtml.length ? "\n            <div class=\"factory-cards-offer-map__sale-points-block j-factory-cards-offer-map__sale-points-block\">\n                <div class=\"factory-cards-offer-map__sale-points-title\">\u0422\u043E\u0440\u0433\u043E\u0432\u044B\u0435 \u0442\u043E\u0447\u043A\u0438:</div>\n                <div class=\"factory-cards-offer-map__sale-points-container\">".concat(salePointsHtml.join(''), "</div>\n                ").concat(salePontButton, "\n            </div>\n        ") : '';
  var favoritesHint = !isUserAuth ? "\n            <div class=\"modules-pages-favorites-shared-components-button__hint-block\">\n                <div class=\"modules-pages-favorites-shared-components-button__hint-title\">\u0427\u0442\u043E\u0431\u044B \u0434\u043E\u0431\u0430\u0432\u0438\u0442\u044C \u0442\u043E\u0432\u0430\u0440 \u0432 \u0438\u0437\u0431\u0440\u0430\u043D\u043D\u043E\u0435 \u043D\u0443\u0436\u043D\u043E</div>\n                <div class=\"modules-pages-favorites-shared-components-button__hint-text-container\">\n                    <a class=\"modules-pages-favorites-shared-components-button__hint-link\" href=\"/login\">\u0412\u043E\u0439\u0442\u0438</a>\n                </div>\n                <div class=\"modules-pages-favorites-shared-components-button__hint-text-container\">\n                    <div class=\"modules-pages-favorites-shared-components-button__hint-text\">\u0438\u043B\u0438</div>\n                </div>\n                <div class=\"modules-pages-favorites-shared-components-button__hint-text-container\">\n                    <a class=\"modules-pages-favorites-shared-components-button__hint-link\" href=\"/register\">\u0417\u0430\u0440\u0435\u0433\u0438\u0441\u0442\u0440\u0438\u0440\u043E\u0432\u0430\u0442\u044C\u0441\u044F</a>\n                </div>\n            </div>\n        " : '';
  var favoritesBlock = "\n            <div\n                class=\"modules-pages-favorites-shared-components-button j-favorites-components-button\"\n                data-id=\"".concat(id, "\"\n            >\n                <button class=\"modules-pages-favorites-shared-components-button__button j-favorites-components-button__button\">\n                    <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" viewBox=\"0 0 47.94 47.94\">\n                        <path d=\"M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757  c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042  c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685  c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528  c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956  C22.602,0.567,25.338,0.567,26.285,2.486z\" fill=\"currentColor\"/>\n                    </svg>\n                </button>\n                ").concat(favoritesHint, "\n            </div>\n        ");
  var catalogCategoriesLevelTwoTitleList = catalog_level_two.map(function (_ref3) {
    var title = _ref3.title;
    return title;
  }).join(', ');
  var ratingLayout = rating > 0 ? "\n            <div class=\"factory-cards-offer-map__rating-container\">\n                <div class=\"factory-cards-offer-map__rating-star-container\">\n                    <div class=\"factory-cards-offer-map__rating-star-container-default\"></div>\n                    <div class=\"factory-cards-offer-map__rating-star-container-active\" style=\"width: ".concat(20 * rating, "px\"></div>\n                </div>\n                <div class=\"factory-cards-offer-map__rating-votes-container\">").concat(rating_votes, " ").concat(Object(helpers_plural__WEBPACK_IMPORTED_MODULE_7__["plural_ru"])(rating_votes, ['оценка', 'оценки', 'оценок']), "</div>\n            </div>\n        ") : '';
  var createdAtDate = new Date(created_at);
  var createdAtMonth = createdAtDate.getMonth() + 1;
  var createdAtDay = createdAtDate.getDate();
  var createdAtDayFormatted = createdAtDay < 10 ? "0".concat(createdAtDay) : createdAtDay;
  var createdAtMonthFormatted = createdAtMonth < 10 ? "0".concat(createdAtMonth) : createdAtMonth;
  var createdAtYear = createdAtDate.getFullYear();
  return "\n            <div class=\"factory-cards-offer-map j-factory-cards-offer-map\">\n                <div class=\"factory-cards-offer-map__image-block\">\n                    <div class=\"factory-cards-offer-map__image-container\">\n                        <img\n                            alt=\"\"\n                            class=\"factory-cards-offer-map__image\"\n                            src=\"".concat(src, "\"\n                        >\n                        <a\n                            class=\"factory-cards-offer-map__image-link\"\n                            href=\"").concat(productLink, "\"\n                        ></a>\n                    </div>\n                </div>\n                <div class=\"factory-cards-offer-map__content-block\">\n                    <div class=\"factory-cards-offer-map__info-section\">\n                        <div>\n                            <a\n                                class=\"factory-cards-offer-map__product-link\"\n                                href=\"").concat(productLink, "\"\n                            >").concat(title, "</a>\n                        </div>\n                        <div class=\"factory-cards-offer-map__address-container j-factory-cards-offer-map__placemark-link\">\n                            ").concat(address, "\n                        </div>\n                        <button\n                            class=\"factory-cards-offer-map__show-on-map-button factory-cards-offer-map__show-on-map-button_with-offset j-factory-cards-offer-map__placemark-link\"\n                            data-placemark-id=\"").concat(id, "\"\n                            type=\"button\"\n                        >\n                            <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" viewBox=\"0 0 491.582 491.582\" width=\"14\" height=\"14\">\n                                <path\n                                    d=\"M245.791,0C153.799,0,78.957,74.841,78.957,166.833c0,36.967,21.764,93.187,68.493,176.926 c31.887,57.138,63.627,105.4,64.966,107.433l22.941,34.773c2.313,3.507,6.232,5.617,10.434,5.617s8.121-2.11,10.434-5.617    l22.94-34.771c1.326-2.01,32.835-49.855,64.967-107.435c46.729-83.735,68.493-139.955,68.493-176.926    C412.625,74.841,337.783,0,245.791,0z M322.302,331.576c-31.685,56.775-62.696,103.869-64.003,105.848l-12.508,18.959    l-12.504-18.954c-1.314-1.995-32.563-49.511-64.007-105.853c-43.345-77.676-65.323-133.104-65.323-164.743    C103.957,88.626,167.583,25,245.791,25s141.834,63.626,141.834,141.833C387.625,198.476,365.647,253.902,322.302,331.576z\" fill=\"currentColor\" />\n                                <path\n                                    d=\"M245.791,73.291c-51.005,0-92.5,41.496-92.5,92.5s41.495,92.5,92.5,92.5s92.5-41.496,92.5-92.5    S296.796,73.291,245.791,73.291z M245.791,233.291c-37.22,0-67.5-30.28-67.5-67.5s30.28-67.5,67.5-67.5    c37.221,0,67.5,30.28,67.5,67.5S283.012,233.291,245.791,233.291z\" fill=\"currentColor\" />\n                            </svg>\n                            \u041F\u043E\u043A\u0430\u0437\u0430\u0442\u044C \u043D\u0430 \u043A\u0430\u0440\u0442\u0435\n                        </button>\n                        ").concat(salePointsBlock, "\n                        <div class=\"factory-cards-offer-map__price-container\">\n                            <span class=\"factory-cards-offer-map__price-title\">\u0426\u0435\u043D\u0430:</span>\n                            <span class=\"factory-cards-offer-map__price\">\n                                ").concat(price, "\n                            </span>\n                        </div>\n                        <div class=\"factory-cards-offer-map__contacts-block\">\n                            <div class=\"factory-cards-offer-map__phone-container\">\n                                <span class=\"factory-cards-offer-map__phone-title\">\u0422\u0435\u043B\u0435\u0444\u043E\u043D:</span>\n                                <a class=\"j-modules-common-offers-list__phone-link\" href=\"tel:").concat(phone, "\">").concat(phone, "</a>\n                            </div>\n                            <div class=\"factory-cards-offer-map__seller-info-container\">\n                                <span class=\"factory-cards-offer-map__seller-info-title\">\u041F\u0440\u043E\u0434\u0430\u0432\u0435\u0446:</span>\n                                <a href=\"").concat(sellerLink, "\">").concat(_name, "</a>\n                            </div>\n                        </div>\n                    </div>\n                    <div class=\"factory-cards-offer-map__category-block\">\n                        <div>\n                            <span class=\"factory-cards-offer-map__category-title\">\u0422\u043E\u0432\u0430\u0440\u044B:</span>\n                            ").concat(catalogCategoriesLevelTwoTitleList, "\n                        </div>\n                        ").concat(ratingLayout, "\n                        <div class=\"factory-cards-offer-map__created-at-block\">\n                            \u041E\u043F\u0443\u0431\u043B\u0438\u043A\u043E\u0432\u0430\u043D\u043E: ").concat(createdAtDayFormatted, ".").concat(createdAtMonthFormatted, ".").concat(createdAtYear, "\n                        </div>\n                    </div>\n                </div>\n                <div class=\"factory-cards-offer-map__service-block\">\n                    ").concat(favoritesBlock, "\n                </div>\n            </div>\n        ");
});

_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(MapOfferCard, "init", function () {
  var list = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(document.querySelectorAll('.j-factory-cards-offer-map'));

  list.forEach(function (element) {
    new MapOfferCard(element);
  });
});

/***/ }),

/***/ "./resources/views/factory/cards/offer/map/index.less":
/*!************************************************************!*\
  !*** ./resources/views/factory/cards/offer/map/index.less ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/breadcrumbs/item/index.js":
/*!******************************************************************!*\
  !*** ./resources/views/modules/common/breadcrumbs/item/index.js ***!
  \******************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/breadcrumbs/item/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/common/breadcrumbs/item/index.less":
/*!********************************************************************!*\
  !*** ./resources/views/modules/common/breadcrumbs/item/index.less ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/breadcrumbs/list/index.js":
/*!******************************************************************!*\
  !*** ./resources/views/modules/common/breadcrumbs/list/index.js ***!
  \******************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_modules_common_breadcrumbs_item__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/modules/common/breadcrumbs/item */ "./resources/views/modules/common/breadcrumbs/item/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/breadcrumbs/list/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./resources/views/modules/common/breadcrumbs/list/index.less":
/*!********************************************************************!*\
  !*** ./resources/views/modules/common/breadcrumbs/list/index.less ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/catalog/modal/index.js":
/*!***************************************************************!*\
  !*** ./resources/views/modules/common/catalog/modal/index.js ***!
  \***************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_components_modals_layout_catalog__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/components/modals/layout/catalog */ "./resources/views/components/modals/layout/catalog/index.js");
/* harmony import */ var views_modules_common_map_common_components_filters_product_modal_components_buttons_content__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! views/modules/common/map/common/components/filters/product/modal/components/buttons/content */ "./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/content/index.js");
/* harmony import */ var views_modules_common_map_common_components_filters_product_modal_components_buttons_navigation__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! views/modules/common/map/common/components/filters/product/modal/components/buttons/navigation */ "./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/navigation/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/catalog/modal/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_3__);





/***/ }),

/***/ "./resources/views/modules/common/catalog/modal/index.less":
/*!*****************************************************************!*\
  !*** ./resources/views/modules/common/catalog/modal/index.less ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/footer/index/index.js":
/*!**************************************************************!*\
  !*** ./resources/views/modules/common/footer/index/index.js ***!
  \**************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_components_popup_cookie__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/components/popup/cookie */ "./resources/views/components/popup/cookie/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/footer/index/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./resources/views/modules/common/footer/index/index.less":
/*!****************************************************************!*\
  !*** ./resources/views/modules/common/footer/index/index.less ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/geo/components/button/index.js":
/*!***********************************************************************!*\
  !*** ./resources/views/modules/common/geo/components/button/index.js ***!
  \***********************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/geo/components/button/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_4__);






var GeoButton = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function GeoButton(item) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, GeoButton);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_3__["addEventListener"])(_this.module, 'click', _this.handleClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleClick", function (e) {
    navigator.geolocation.getCurrentPosition(_this.handleSuccess, _this.handleError, {
      enableHighAccuracy: true,
      timeout: 10000
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleError", function (e) {
    console.error(e);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleSuccess", function (position) {
    document.dispatchEvent(new CustomEvent('j-event-modules-common-geo-components-button__update-geo', {
      detail: {
        position: position
      }
    }));
  });

  this.module = item;
  this.bind();
});

var list = document.querySelectorAll('.j-modules-common-geo-components-button');
list.forEach(function (item) {
  new GeoButton(item);
});

/***/ }),

/***/ "./resources/views/modules/common/geo/components/button/index.less":
/*!*************************************************************************!*\
  !*** ./resources/views/modules/common/geo/components/button/index.less ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/header/index/index.js":
/*!**************************************************************!*\
  !*** ./resources/views/modules/common/header/index/index.js ***!
  \**************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_components_buttons_burger__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/components/buttons/burger */ "./resources/views/components/buttons/burger/index.js");
/* harmony import */ var views_modules_common_catalog_modal__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! views/modules/common/catalog/modal */ "./resources/views/modules/common/catalog/modal/index.js");
/* harmony import */ var views_modules_common_header_search__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! views/modules/common/header/search */ "./resources/views/modules/common/header/search/index.js");
/* harmony import */ var views_modules_common_location_components_buttons_iconButton__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! views/modules/common/location/components/buttons/iconButton */ "./resources/views/modules/common/location/components/buttons/iconButton/index.js");
/* harmony import */ var views_modules_common_location_components_modal__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! views/modules/common/location/components/modal */ "./resources/views/modules/common/location/components/modal/index.js");
/* harmony import */ var views_modules_common_map_common_components_filters_product__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! views/modules/common/map/common/components/filters/product */ "./resources/views/modules/common/map/common/components/filters/product/index.js");
/* harmony import */ var views_modules_common_profile_modal__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! views/modules/common/profile/modal */ "./resources/views/modules/common/profile/modal/index.js");
/* harmony import */ var views_modules_pages_favorites_shared_components_header_counter__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! views/modules/pages/favorites/shared/components/header-counter */ "./resources/views/modules/pages/favorites/shared/components/header-counter/index.js");
/* harmony import */ var views_modules_pages_favorites_shared_components_section__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! views/modules/pages/favorites/shared/components/section */ "./resources/views/modules/pages/favorites/shared/components/section/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/header/index/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_9__);











/***/ }),

/***/ "./resources/views/modules/common/header/index/index.less":
/*!****************************************************************!*\
  !*** ./resources/views/modules/common/header/index/index.less ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/header/search/index.js":
/*!***************************************************************!*\
  !*** ./resources/views/modules/common/header/search/index.js ***!
  \***************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/asyncToGenerator */ "./node_modules/@babel/runtime/helpers/asyncToGenerator.js");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var helpers_debounce__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! helpers/debounce */ "./resources/helpers/debounce.js");
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var helpers_toggle__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! helpers/toggle */ "./resources/helpers/toggle.js");
/* harmony import */ var views_modules_common_header_search_templates_search_result_container__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! views/modules/common/header/search/templates/search-result-container */ "./resources/views/modules/common/header/search/templates/search-result-container/index.js");
/* harmony import */ var views_modules_common_header_search_templates_search_result_item__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! views/modules/common/header/search/templates/search-result-item */ "./resources/views/modules/common/header/search/templates/search-result-item/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/header/search/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_12__);














var Search = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(function Search(element) {
  var _this = this,
      _this$CSRFContainer;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3___default()(this, Search);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(document, 'click', _this.handleDocumentClick);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(_this.searchInput, 'input', Object(helpers_debounce__WEBPACK_IMPORTED_MODULE_6__["debounce"])(_this.handleSearchInputInput, 500));
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(_this.searchInput, 'focus', _this.handleSearchInputFocus);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(_this.clearButton, 'click', _this.handleClearButtonClick);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(_this.mobileSearchButton, 'click', _this.handleMobileSearchButtonClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "clearResultsContainer", function () {
    _this.searchResultsOutput.innerHTML = '';

    _this.noResultsContainer.classList.add('hidden');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "close", function () {
    _this.module.classList.remove('j-style-header-search__focus');

    _this.module.classList.remove('j-style-header-search__mobile-show');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "createSearchResultBlock", function (_ref) {
    var dataList = _ref.dataList,
        title = _ref.title;

    if (!dataList.length) {
      return;
    }

    var container = _this.createSearchResultContainer(title);

    var items = _this.createSearchResultItems(dataList);

    var itemsContainer = container.querySelector('.j-header-search__search-results-container');
    itemsContainer.innerHTML = items;
    return container;
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "createSearchResultContainer", function (title) {
    var containerTemplate = _this.getSearchContainerTemplateHTML();

    var titleContainer = containerTemplate.querySelector('.j-header-search__search-results-container-title');
    titleContainer.innerHTML = title;
    return containerTemplate;
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "createSearchResultItems", function (dataList) {
    var itemsList = dataList.map(function (_ref2) {
      var linkFull = _ref2.linkFull,
          phone = _ref2.phone,
          title = _ref2.title;

      var itemTemplate = _this.getSearchItemTemplateHTML();

      var linkElement = itemTemplate.querySelector('.j-header-search__search-result-item-link');
      linkElement.innerHTML = "".concat(title, ", ").concat(phone);
      linkElement.href = linkFull;
      return itemTemplate.outerHTML;
    });
    return itemsList.join('');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "fetchData", /*#__PURE__*/_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.mark(function _callee() {
    var searchValue, _yield$_this$sendRequ, data, errors;

    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.wrap(function _callee$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            searchValue = _this.searchInput.value;

            if (searchValue) {
              _context.next = 3;
              break;
            }

            return _context.abrupt("return");

          case 3:
            _context.next = 5;
            return _this.sendRequest(searchValue);

          case 5:
            _yield$_this$sendRequ = _context.sent;
            data = _yield$_this$sendRequ.data;
            errors = _yield$_this$sendRequ.errors;

            if (!errors) {
              _context.next = 10;
              break;
            }

            return _context.abrupt("return");

          case 10:
            _this.setData(data);

          case 11:
          case "end":
            return _context.stop();
        }
      }
    }, _callee);
  })));

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "getSearchContainerTemplateHTML", function () {
    var template = _this.module.querySelector('.j-template[data-template-id="header-search-result-container"]');

    return template.content.firstElementChild.cloneNode(true);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "getSearchItemTemplateHTML", function () {
    var template = _this.module.querySelector('.j-template[data-template-id="header-search-result-item"]');

    return template.content.firstElementChild.cloneNode(true);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleClearButtonClick", function (e) {
    _this.searchInput.value = '';

    _this.close();

    _this.clearResultsContainer();

    Object(helpers_toggle__WEBPACK_IMPORTED_MODULE_9__["toggleClass"])(_this.module, 'j-style-header-search__has-value', false);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleDocumentClick", function (e) {
    var isClickInside = _this.module.contains(e.target);

    if (isClickInside) {
      return;
    }

    _this.close();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleMobileSearchButtonClick", function (e) {
    _this.module.classList.add('j-style-header-search__mobile-show');

    _this.searchInput.focus();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleSearchInputFocus", function (e) {
    _this.module.classList.add('j-style-header-search__focus');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleSearchInputInput", function (e) {
    _this.clearResultsContainer();

    var value = _this.searchInput.value;

    if (value) {
      _this.fetchData();
    }

    Object(helpers_toggle__WEBPACK_IMPORTED_MODULE_9__["toggleClass"])(_this.module, 'j-style-header-search__has-value', value);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "isDataExists", function (data) {
    return data.some(function (_ref4) {
      var dataList = _ref4.dataList;
      return dataList.length;
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "sendRequest", /*#__PURE__*/function () {
    var _ref5 = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.mark(function _callee2(searchValue) {
      var bodyData, body, response;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.wrap(function _callee2$(_context2) {
        while (1) {
          switch (_context2.prev = _context2.next) {
            case 0:
              bodyData = {
                data: {
                  title: searchValue
                }
              };
              body = JSON.stringify(bodyData);
              _context2.next = 4;
              return fetch('/api/search/common', {
                body: body,
                headers: {
                  'Accept': 'application/json',
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': _this.CSRFValue
                },
                method: 'POST'
              });

            case 4:
              response = _context2.sent;
              return _context2.abrupt("return", response.json());

            case 6:
            case "end":
              return _context2.stop();
          }
        }
      }, _callee2);
    }));

    return function (_x) {
      return _ref5.apply(this, arguments);
    };
  }());

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "setData", function (data) {
    var _this$searchResultsOu;

    var isDataExists = _this.isDataExists(data);

    if (!isDataExists) {
      _this.noResultsContainer.classList.remove('hidden');

      return;
    }

    var list = data.map(_this.createSearchResultBlock);
    var listFiltered = list.filter(function (item) {
      return item;
    });

    (_this$searchResultsOu = _this.searchResultsOutput).prepend.apply(_this$searchResultsOu, _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(listFiltered));
  });

  this.module = element;
  this.searchResultsOutput = this.module.querySelector('.j-header-search__search-results-output');
  this.noResultsContainer = this.module.querySelector('.j-header-search__no-results-container');
  this.searchInput = this.module.querySelector('.j-header-search__input');
  this.clearButton = this.module.querySelector('.j-header-search__clear-button');
  this.mobileSearchButton = this.module.querySelector('.j-header-search__mobile-search-button');
  this.CSRFContainer = document.querySelector('.j-csrf-token');
  this.CSRFValue = (_this$CSRFContainer = this.CSRFContainer) === null || _this$CSRFContainer === void 0 ? void 0 : _this$CSRFContainer.dataset.value;
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_8__["module"].initModule('j-header-search', Search);

/***/ }),

/***/ "./resources/views/modules/common/header/search/index.less":
/*!*****************************************************************!*\
  !*** ./resources/views/modules/common/header/search/index.less ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/header/search/templates/search-result-container/index.js":
/*!*************************************************************************************************!*\
  !*** ./resources/views/modules/common/header/search/templates/search-result-container/index.js ***!
  \*************************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/header/search/templates/search-result-container/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/common/header/search/templates/search-result-container/index.less":
/*!***************************************************************************************************!*\
  !*** ./resources/views/modules/common/header/search/templates/search-result-container/index.less ***!
  \***************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/header/search/templates/search-result-item/index.js":
/*!********************************************************************************************!*\
  !*** ./resources/views/modules/common/header/search/templates/search-result-item/index.js ***!
  \********************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/header/search/templates/search-result-item/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/common/header/search/templates/search-result-item/index.less":
/*!**********************************************************************************************!*\
  !*** ./resources/views/modules/common/header/search/templates/search-result-item/index.less ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/layout/web/index.js":
/*!************************************************************!*\
  !*** ./resources/views/modules/common/layout/web/index.js ***!
  \************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_components_modals_base_common__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/components/modals/base/common */ "./resources/views/components/modals/base/common/index.js");
/* harmony import */ var views_modules_common_location_components_controller__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! views/modules/common/location/components/controller */ "./resources/views/modules/common/location/components/controller/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/layout/web/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_2__);




/***/ }),

/***/ "./resources/views/modules/common/layout/web/index.less":
/*!**************************************************************!*\
  !*** ./resources/views/modules/common/layout/web/index.less ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/location/components/buttons/iconButton/index.js":
/*!****************************************************************************************!*\
  !*** ./resources/views/modules/common/location/components/buttons/iconButton/index.js ***!
  \****************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/location/components/buttons/iconButton/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/common/location/components/buttons/iconButton/index.less":
/*!******************************************************************************************!*\
  !*** ./resources/views/modules/common/location/components/buttons/iconButton/index.less ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/location/components/controller/index.js":
/*!********************************************************************************!*\
  !*** ./resources/views/modules/common/location/components/controller/index.js ***!
  \********************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var helpers_query__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! helpers/query */ "./resources/helpers/query.js");







var LocationController = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function LocationController(item) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, LocationController);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_3__["addEventListener"])(document, 'j-event--location-common-open-modal-button__reset', _this.handleResetClick);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_3__["addEventListener"])(_this.module, 'click', _this.handleModuleClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleModuleClick", function (e) {
    var target = e.target;
    var isLocationButton = target.classList.contains('j-location-controller__location-button');

    if (isLocationButton) {
      _this.setLocationCookie(target);

      _this.setLocationQuery(target);

      document.location.reload();
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleResetClick", function (e) {
    _this.resetLocationCookie();

    _this.resetLocationQuery();

    document.location.reload();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "resetLocationCookie", function () {
    var now = new Date();
    document.cookie = "search-region-id=0;expires=".concat(now, ";path=/;");
    document.cookie = "search-city-id=0;expires=".concat(now, ";path=/;");
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "resetLocationQuery", function () {
    var queryDataArray = [{
      key: 'search-country-id',
      value: null
    }, {
      key: 'search-region-id',
      value: null
    }, {
      key: 'search-city-id',
      value: null
    }];
    Object(helpers_query__WEBPACK_IMPORTED_MODULE_5__["setUrlQuery"])(queryDataArray);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "setLocationCookie", function (target) {
    var _target$dataset = target.dataset,
        _target$dataset$searc = _target$dataset.searchCountryId,
        searchCountryId = _target$dataset$searc === void 0 ? 1 : _target$dataset$searc,
        searchRegionId = _target$dataset.searchRegionId,
        searchCityId = _target$dataset.searchCityId;
    var currentYear = new Date().getFullYear();
    var expirationTime = new Date(currentYear + 10, 0);
    document.cookie = "search-country-id=".concat(searchCountryId, ";path=/;expires=").concat(expirationTime, ";");
    document.cookie = "search-region-id=".concat(searchRegionId, ";path=/;expires=").concat(expirationTime, ";");

    if (searchCityId) {
      document.cookie = "search-city-id=".concat(searchCityId, ";path=/;expires=").concat(expirationTime, ";");
    } else {
      document.cookie = "search-city-id=".concat(searchCityId, ";path=/;expires=Thu, 01 Jan 1970 00:00:00 GMT;");
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "setLocationQuery", function (target) {
    var _target$dataset2 = target.dataset,
        _target$dataset2$sear = _target$dataset2.searchCountryId,
        searchCountryId = _target$dataset2$sear === void 0 ? 1 : _target$dataset2$sear,
        searchRegionId = _target$dataset2.searchRegionId,
        searchCityId = _target$dataset2.searchCityId;
    var queryDataArray = [{
      key: 'search-country-id',
      value: searchCountryId
    }, {
      key: 'search-region-id',
      value: searchRegionId
    }, {
      key: 'search-city-id',
      value: searchCityId
    }];
    Object(helpers_query__WEBPACK_IMPORTED_MODULE_5__["setUrlQuery"])(queryDataArray);
  });

  this.module = item;
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_4__["module"].initModule('j-location-controller', LocationController);

/***/ }),

/***/ "./resources/views/modules/common/location/components/modal/components/buttons/content/index.js":
/*!******************************************************************************************************!*\
  !*** ./resources/views/modules/common/location/components/modal/components/buttons/content/index.js ***!
  \******************************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/location/components/modal/components/buttons/content/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/common/location/components/modal/components/buttons/content/index.less":
/*!********************************************************************************************************!*\
  !*** ./resources/views/modules/common/location/components/modal/components/buttons/content/index.less ***!
  \********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/location/components/modal/components/buttons/navigation/index.js":
/*!*********************************************************************************************************!*\
  !*** ./resources/views/modules/common/location/components/modal/components/buttons/navigation/index.js ***!
  \*********************************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/location/components/modal/components/buttons/navigation/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/common/location/components/modal/components/buttons/navigation/index.less":
/*!***********************************************************************************************************!*\
  !*** ./resources/views/modules/common/location/components/modal/components/buttons/navigation/index.less ***!
  \***********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/location/components/modal/index.js":
/*!***************************************************************************!*\
  !*** ./resources/views/modules/common/location/components/modal/index.js ***!
  \***************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_components_buttons_modal_open__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/components/buttons/modal/open */ "./resources/views/components/buttons/modal/open/index.js");
/* harmony import */ var views_components_modals_base_common__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! views/components/modals/base/common */ "./resources/views/components/modals/base/common/index.js");
/* harmony import */ var views_components_modals_layout_catalog__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! views/components/modals/layout/catalog */ "./resources/views/components/modals/layout/catalog/index.js");
/* harmony import */ var views_modules_common_location_components_modal_components_buttons_content__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! views/modules/common/location/components/modal/components/buttons/content */ "./resources/views/modules/common/location/components/modal/components/buttons/content/index.js");
/* harmony import */ var views_modules_common_location_components_modal_components_buttons_navigation__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! views/modules/common/location/components/modal/components/buttons/navigation */ "./resources/views/modules/common/location/components/modal/components/buttons/navigation/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/location/components/modal/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_5__);







/***/ }),

/***/ "./resources/views/modules/common/location/components/modal/index.less":
/*!*****************************************************************************!*\
  !*** ./resources/views/modules/common/location/components/modal/index.less ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/map/common/components/filters/product/buttons/filterButton/index.js":
/*!************************************************************************************************************!*\
  !*** ./resources/views/modules/common/map/common/components/filters/product/buttons/filterButton/index.js ***!
  \************************************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var views_components_buttons_filter__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! views/components/buttons/filter */ "./resources/views/components/buttons/filter/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/map/common/components/filters/product/buttons/filterButton/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_6__);








var ProductFilterButton = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function ProductFilterButton(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, ProductFilterButton);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_3__["addEventListener"])(document, 'j-event-modules-pages-map-web-common-components-filters-product-controller__set-filter', _this.handleSetFilter);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleResetClick", function () {
    document.dispatchEvent(new CustomEvent('j-event--modules-pages-map-web-common-components-filters-product-filter-button__reset'));
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleSetFilter", function (e) {
    var value = e.detail.value;

    _this.buttonsFilterInstance.setFilter(value);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "initButtonsFilter", function () {
    _this.buttonsFilterInstance = new views_components_buttons_filter__WEBPACK_IMPORTED_MODULE_5__["ButtonsFilter"]({
      container: _this.module,
      onReset: _this.handleResetClick
    });
  });

  this.module = element;
  this.initButtonsFilter();
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_4__["module"].initModule('j-modules-common-filters-product-filter-button', ProductFilterButton);

/***/ }),

/***/ "./resources/views/modules/common/map/common/components/filters/product/buttons/filterButton/index.less":
/*!**************************************************************************************************************!*\
  !*** ./resources/views/modules/common/map/common/components/filters/product/buttons/filterButton/index.less ***!
  \**************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/map/common/components/filters/product/controller/index.js":
/*!**************************************************************************************************!*\
  !*** ./resources/views/modules/common/map/common/components/filters/product/controller/index.js ***!
  \**************************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var events_index__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! events/index */ "./resources/events/index.js");
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var helpers_query__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! helpers/query */ "./resources/helpers/query.js");







var CLOSE = events_index__WEBPACK_IMPORTED_MODULE_3__["EVENTS_NAMES"].COMMON.MODALS.COMMON.CLOSE;

var MapProductFilterController = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function MapProductFilterController(item) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, MapProductFilterController);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, 'j-event--modules-pages-map-web-common-components-filters-product-filter-button__reset', _this.handleReset);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, 'click', _this.handleClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleClick", function (e) {
    var target = e.target;
    var isNavigationButton = target.classList.contains('j-modules-common-filters-product-modal-components-buttons-navigation');
    var isContentButton = target.classList.contains('j-modules-common-filters-product-modal-components-buttons-content');

    if (!isNavigationButton && !isContentButton) {
      return;
    }

    var id = target.dataset.id;
    var query = [];

    if (isNavigationButton) {
      query.push({
        key: 'catalogLevelOneId',
        value: id
      }, {
        key: 'catalogLevelTwoId',
        value: null
      });
    }

    if (isContentButton) {
      query.push({
        key: 'catalogLevelOneId',
        value: null
      }, {
        key: 'catalogLevelTwoId',
        value: id
      });
    }

    if (window.location.pathname === '/') {
      Object(helpers_query__WEBPACK_IMPORTED_MODULE_6__["setUrlQuery"])(query);

      _this.setFilter(target.innerHTML);

      return;
    }

    window.location.href = Object(helpers_query__WEBPACK_IMPORTED_MODULE_6__["getUrlWithNewQueryData"])({
      defaultUrl: window.location.origin,
      queryDataArray: query
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleReset", function (e) {
    _this.resetUrlQuery();

    _this.setFilter();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "resetUrlQuery", function () {
    var query = [{
      key: 'catalogLevelOneId',
      value: null
    }, {
      key: 'catalogLevelTwoId',
      value: null
    }];
    Object(helpers_query__WEBPACK_IMPORTED_MODULE_6__["setUrlQuery"])(query);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "setFilter", function (value) {
    document.dispatchEvent(new CustomEvent(CLOSE));
    document.dispatchEvent(new CustomEvent('j-event-modules-pages-map-web-common-components-filters-product-controller__set-filter', {
      detail: {
        value: value
      }
    }));
    document.dispatchEvent(new CustomEvent('j-event--map-filter-update'));
  });

  this.module = item;
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_5__["module"].initModule('j-modules-pages-map-web-common-components-filters-product-controller', MapProductFilterController);

/***/ }),

/***/ "./resources/views/modules/common/map/common/components/filters/product/index.js":
/*!***************************************************************************************!*\
  !*** ./resources/views/modules/common/map/common/components/filters/product/index.js ***!
  \***************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_modules_common_map_common_components_filters_product_buttons_filterButton__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/modules/common/map/common/components/filters/product/buttons/filterButton */ "./resources/views/modules/common/map/common/components/filters/product/buttons/filterButton/index.js");
/* harmony import */ var views_modules_common_map_common_components_filters_product_controller__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! views/modules/common/map/common/components/filters/product/controller */ "./resources/views/modules/common/map/common/components/filters/product/controller/index.js");
/* harmony import */ var views_modules_common_map_common_components_filters_product_modal__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! views/modules/common/map/common/components/filters/product/modal */ "./resources/views/modules/common/map/common/components/filters/product/modal/index.js");




/***/ }),

/***/ "./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/content/index.js":
/*!************************************************************************************************************************!*\
  !*** ./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/content/index.js ***!
  \************************************************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/content/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/content/index.less":
/*!**************************************************************************************************************************!*\
  !*** ./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/content/index.less ***!
  \**************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/navigation/index.js":
/*!***************************************************************************************************************************!*\
  !*** ./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/navigation/index.js ***!
  \***************************************************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/navigation/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/navigation/index.less":
/*!*****************************************************************************************************************************!*\
  !*** ./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/navigation/index.less ***!
  \*****************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/map/common/components/filters/product/modal/index.js":
/*!*********************************************************************************************!*\
  !*** ./resources/views/modules/common/map/common/components/filters/product/modal/index.js ***!
  \*********************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_modules_common_map_common_components_filters_product_modal_components_buttons_content__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/modules/common/map/common/components/filters/product/modal/components/buttons/content */ "./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/content/index.js");
/* harmony import */ var views_modules_common_map_common_components_filters_product_modal_components_buttons_navigation__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! views/modules/common/map/common/components/filters/product/modal/components/buttons/navigation */ "./resources/views/modules/common/map/common/components/filters/product/modal/components/buttons/navigation/index.js");



/***/ }),

/***/ "./resources/views/modules/common/map/yandex/components/balloon/offer/viewAll/index.js":
/*!*********************************************************************************************!*\
  !*** ./resources/views/modules/common/map/yandex/components/balloon/offer/viewAll/index.js ***!
  \*********************************************************************************************/
/*! exports provided: getOfferBalloon */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getOfferBalloon", function() { return getOfferBalloon; });
/* harmony import */ var helpers_plural__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! helpers/plural */ "./resources/helpers/plural.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/map/yandex/components/balloon/offer/viewAll/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_1__);


var getOfferBalloon = function getOfferBalloon(offerData, markerId) {
  var catalog = offerData.catalog,
      product = offerData.product,
      salePoints = offerData.salePoints,
      seller = offerData.seller;
  var address = product.address,
      contact_person = product.contact_person,
      created_at = product.created_at,
      delivery = product.delivery,
      delivery_description = product.delivery_description,
      description = product.description,
      id = product.id,
      phone = product.phone,
      price = product.price,
      price_description = product.price_description,
      rating = product.rating,
      rating_votes = product.rating_votes,
      title = product.title,
      working_hours = product.working_hours;
  var sellerId = seller.id,
      name = seller.name;
  var catalog_level_one = catalog.catalog_level_one,
      catalog_level_two = catalog.catalog_level_two;
  var salePointId = markerId.split('_')[1];
  var currentSalePoint = salePoints.find(function (_ref) {
    var id = _ref.id;
    return id.toString() === salePointId;
  });
  var contactAddress = address;
  var contactName = name !== null && name !== void 0 ? name : 'не указано';
  var contactPhone = phone;
  var balloonDescription = description !== null && description !== void 0 ? description : '';

  if (contact_person) {
    contactName = contact_person;
  }

  if (currentSalePoint) {
    var _currentSalePoint$des;

    var _contactAddress = currentSalePoint['address'];

    var _contactName = currentSalePoint['contact_person'] || contact_person;

    var _contactPhone = currentSalePoint['phone'];

    var _description = (_currentSalePoint$des = currentSalePoint['description']) !== null && _currentSalePoint$des !== void 0 ? _currentSalePoint$des : '';

    if (_description) {
      balloonDescription = _description;
    }

    if (_contactName) {
      contactName = _contactName;
    }

    if (_contactPhone) {
      contactPhone = _contactPhone;
    }

    if (_contactAddress) {
      contactAddress = _contactAddress;
    }
  }

  var catalogCategoriesLevelTwoTitleList = catalog_level_two.map(function (_ref2) {
    var title = _ref2.title;
    return title;
  }).join(', ');
  var ratingLayout = rating > 0 ? "\n        <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__rating-block\">\n            <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__rating-star-container\">\n                <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__rating-star-container-default\"></div>\n                <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__rating-star-container-active\" style=\"width: ".concat(20 * rating, "px\"></div>\n            </div>\n            <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__rating-votes-container\">\n                ").concat(rating_votes, " ").concat(Object(helpers_plural__WEBPACK_IMPORTED_MODULE_0__["plural_ru"])(rating_votes, ['оценка', 'оценки', 'оценок']), "\n            </div>\n        </div>\n    ") : '';
  var createdAtDate = new Date(created_at);
  var createdAtMonth = createdAtDate.getMonth() + 1;
  var createdAtDay = createdAtDate.getDate();
  var createdAtDayFormatted = createdAtDay < 10 ? "0".concat(createdAtDay) : createdAtDay;
  var createdAtMonthFormatted = createdAtMonth < 10 ? "0".concat(createdAtMonth) : createdAtMonth;
  var createdAtYear = createdAtDate.getFullYear();
  return "\n        <div class=\"modules-common-map-yandex-components-balloon-offer-view-all\">\n            ".concat(ratingLayout, "\n            <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__created-at-block\">\n                \u041E\u043F\u0443\u0431\u043B\u0438\u043A\u043E\u0432\u0430\u043D\u043E: ").concat(createdAtDayFormatted, ".").concat(createdAtMonthFormatted, ".").concat(createdAtYear, "\n            </div>\n            <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__title ").concat(ratingLayout ? 'modules-common-map-yandex-components-balloon-offer-view-all__title_with-offset' : '', "\">\n                <a\n                    href=\"/offers/").concat(id, "\"\n                >").concat(title, "</a>\n            </div>\n            <div>").concat(balloonDescription, "</div>\n            <div>").concat(contactAddress, "</div>\n            <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-price\">\n                <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-price-title\">\u0426\u0435\u043D\u0430</div>\n                <div>\n                    <span class=\"modules-common-map-yandex-components-balloon-offer-view-all__price\">").concat(price, "</span>\n                </div>\n                <div>").concat(price_description !== null && price_description !== void 0 ? price_description : '', "</div>\n            </div>\n            <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-seller\">\n                <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-seller-title\">\u041A\u043E\u043D\u0442\u0430\u043A\u0442\u043D\u043E\u0435 \u043B\u0438\u0446\u043E:</div>\n                <div>\n                    <a\n                        href=\"/sellers/").concat(sellerId, "\"\n                    >").concat(contactName, "</a>\n                </div>\n            </div>\n            <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-seller\">\n                <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-seller-title\">\u0422\u0435\u043B\u0435\u0444\u043E\u043D</div>\n                <div>\n                    <a\n                        href=\"tel:").concat(contactPhone, "\"\n                    >").concat(contactPhone, "</a>\n                </div>\n            </div>\n            ").concat(delivery ? "\n                    <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-seller\">\n                        <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-seller-title\">\u0414\u043E\u0441\u0442\u0430\u0432\u043A\u0430: \u0435\u0441\u0442\u044C</div>\n                        <div>".concat(delivery_description, "</div>\n                    </div>\n                ") : "", "\n            ").concat(working_hours ? "\n                    <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-seller\">\n                        <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-seller-title\">\u0412\u0440\u0435\u043C\u044F \u0440\u0430\u0431\u043E\u0442\u044B:</div>\n                        <div>".concat(working_hours, "</div>\n                    </div>\n                ") : "", "\n            <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-link\">\n                <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-seller-title\">\u0422\u043E\u0432\u0430\u0440\u044B:</div>\n                <div>").concat(catalogCategoriesLevelTwoTitleList, "</div>\n            </div>\n            <div class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-link\">\n                <a\n                    class=\"modules-common-map-yandex-components-balloon-offer-view-all__section-link-title\"\n                    href=\"/offers/").concat(id, "\"\n                >\u041F\u043E\u0434\u0440\u043E\u0431\u043D\u0435\u0435</a>\n            </div>\n        </div>\n    ");
};

/***/ }),

/***/ "./resources/views/modules/common/map/yandex/components/balloon/offer/viewAll/index.less":
/*!***********************************************************************************************!*\
  !*** ./resources/views/modules/common/map/yandex/components/balloon/offer/viewAll/index.less ***!
  \***********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/map/yandex/components/viewAll/index.js":
/*!*******************************************************************************!*\
  !*** ./resources/views/modules/common/map/yandex/components/viewAll/index.js ***!
  \*******************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/asyncToGenerator */ "./node_modules/@babel/runtime/helpers/asyncToGenerator.js");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var helpers_cookie__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! helpers/cookie */ "./resources/helpers/cookie.js");
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_debounce__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! helpers/debounce */ "./resources/helpers/debounce.js");
/* harmony import */ var helpers_query__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! helpers/query */ "./resources/helpers/query.js");
/* harmony import */ var views_modules_common_map_yandex_components_balloon_offer_viewAll__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! views/modules/common/map/yandex/components/balloon/offer/viewAll */ "./resources/views/modules/common/map/yandex/components/balloon/offer/viewAll/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/map/yandex/components/viewAll/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_11__);













var MapYandexComponentsViewAll = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(function MapYandexComponentsViewAll(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3___default()(this, MapYandexComponentsViewAll);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "addMarkersToMap", function () {
    _this.mapCluster = new ymaps.Clusterer();
    var placemarks = [];

    _this.offerData.forEach(function (_ref) {
      var markersList = _ref.markersList,
          offer = _ref.offer;
      markersList.forEach(function (_ref2) {
        var id = _ref2.id,
            markerCoords = _ref2.markerCoords;
        var lat = markerCoords.lat,
            lng = markerCoords.lng;
        var markerInstance = new ymaps.Placemark([lat, lng], {
          data: {
            offer: offer
          },
          id: id
        }, {
          balloonContentLayout: _this.getBalloonContentLayoutClass(offer, id.toString())
        });
        markerInstance.events.add(['click'], _this.handlePlacemarkClick);
        placemarks.push(markerInstance);
      });
    });

    _this.mapCluster.add(placemarks);

    _this.mapInstance.geoObjects.add(_this.mapCluster);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(document, 'j-event--map-filter-update', _this.handleUpdateMapFilter);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(document, 'j-event-map__show-placemark', _this.handleShowPlacemark);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(document, 'j-event-modules-common-geo-components-button__update-geo', _this.handleUpdateGeo);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(document, 'j-event-map-yandex-components-view-all__get-visible-markers-data', _this.handleGetVisibleMarkerData);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "bindMapEvents", function () {
    _this.mapInstance.events.add(['boundschange'], Object(helpers_debounce__WEBPACK_IMPORTED_MODULE_8__["debounce"])(_this.handleMapBoundsChange, 500));
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "getPlacemarksDataList", function () {
    var list = [];
    var geoQueryResultInstance = ymaps.geoQuery(_this.mapCluster.getGeoObjects()).searchInside(_this.mapInstance);
    geoQueryResultInstance.each(function (placemark) {
      list.push({
        placemark: {
          id: placemark.properties.get('id')
        },
        placemarkData: placemark.properties.get('data')
      });
    });
    return list;
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleGetVisibleMarkerData", function () {
    var list = _this.getPlacemarksDataList();

    document.dispatchEvent(new CustomEvent('j-event-map-yandex-components-view-all__get-visible-markers-data-complete', {
      detail: {
        list: list
      }
    }));
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleMapBoundsChange", function () {
    _this.updatePlacemarsDataList();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handlePlacemarkClick", function (e) {
    var originalEvent = e.originalEvent;

    _this.mapInstance.setCenter(originalEvent.target.geometry.getCoordinates(), 17, {
      duration: 1000
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleShowPlacemark", function (e) {
    var geoQueryResult = ymaps.geoQuery(_this.mapCluster.getGeoObjects());
    var geoQueryResultPlacemarks = geoQueryResult.search("properties.id = \"".concat(e.detail.placemarkId, "\""));

    _this.mapInstance.setCenter(geoQueryResultPlacemarks.get(0).geometry.getCoordinates(), 17, {
      duration: 1000
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleUpdateGeo", function (e) {
    _this.geo = e.detail.position;

    _this.showGeoCoordinates();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "fetchData", /*#__PURE__*/_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.mark(function _callee() {
    var _cookieData$searchCi, _cookieData$searchCo, _cookieData$searchRe, cookieData, _getQueryData, catalogLevelOneId, catalogLevelTwoId, bodyData, body, result;

    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.wrap(function _callee$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            _context.prev = 0;
            cookieData = Object(helpers_cookie__WEBPACK_IMPORTED_MODULE_6__["getCookieData"])();
            _getQueryData = Object(helpers_query__WEBPACK_IMPORTED_MODULE_9__["getQueryData"])(), catalogLevelOneId = _getQueryData.catalogLevelOneId, catalogLevelTwoId = _getQueryData.catalogLevelTwoId;
            bodyData = {
              filter: {
                catalog: {
                  levelOneId: catalogLevelOneId !== null && catalogLevelOneId !== void 0 ? catalogLevelOneId : null,
                  levelTwoId: catalogLevelTwoId !== null && catalogLevelTwoId !== void 0 ? catalogLevelTwoId : null
                },
                location: {
                  city: (_cookieData$searchCi = cookieData['search-city-id']) !== null && _cookieData$searchCi !== void 0 ? _cookieData$searchCi : null,
                  country: (_cookieData$searchCo = cookieData['search-country-id']) !== null && _cookieData$searchCo !== void 0 ? _cookieData$searchCo : null,
                  region: (_cookieData$searchRe = cookieData['search-region-id']) !== null && _cookieData$searchRe !== void 0 ? _cookieData$searchRe : null
                }
              }
            };
            body = JSON.stringify(bodyData);
            _context.next = 7;
            return fetch('/api/map', {
              body: body,
              headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': _this.tokenCSRFValue
              },
              method: 'POST'
            });

          case 7:
            result = _context.sent;
            return _context.abrupt("return", result.json());

          case 11:
            _context.prev = 11;
            _context.t0 = _context["catch"](0);
            console.error(_context.t0);

          case 14:
          case "end":
            return _context.stop();
        }
      }
    }, _callee, null, [[0, 11]]);
  })));

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "getBalloonContentLayoutClass", function (offerData, markerId) {
    return ymaps.templateLayoutFactory.createClass(Object(views_modules_common_map_yandex_components_balloon_offer_viewAll__WEBPACK_IMPORTED_MODULE_10__["getOfferBalloon"])(offerData, markerId));
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleUpdateMapFilter", /*#__PURE__*/function () {
    var _ref4 = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.mark(function _callee2(e) {
      var _yield$_this$fetchDat, data, errors, _list;

      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.wrap(function _callee2$(_context2) {
        while (1) {
          switch (_context2.prev = _context2.next) {
            case 0:
              _context2.next = 2;
              return _this.fetchData();

            case 2:
              _yield$_this$fetchDat = _context2.sent;
              data = _yield$_this$fetchDat.data;
              errors = _yield$_this$fetchDat.errors;

              if (!errors) {
                _this.offerData = data;

                _this.mapInstance.geoObjects.remove(_this.mapCluster);

                _this.addMarkersToMap();

                _list = _this.getPlacemarksDataList();

                _this.sendPlacemarksDataListUpdateEvent({
                  list: _list
                });
              }

            case 6:
            case "end":
              return _context2.stop();
          }
        }
      }, _callee2);
    }));

    return function (_x) {
      return _ref4.apply(this, arguments);
    };
  }());

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleYMapsReady", function () {
    _this.initMap();

    _this.addMarkersToMap();

    _this.bindMapEvents();

    _this.updatePlacemarsDataList();

    if (_this.geo) {
      _this.showGeoCoordinates();
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "init", /*#__PURE__*/_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.mark(function _callee3() {
    var _yield$_this$fetchDat2, data, errors;

    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.wrap(function _callee3$(_context3) {
      while (1) {
        switch (_context3.prev = _context3.next) {
          case 0:
            _context3.next = 2;
            return _this.fetchData();

          case 2:
            _yield$_this$fetchDat2 = _context3.sent;
            data = _yield$_this$fetchDat2.data;
            errors = _yield$_this$fetchDat2.errors;

            if (!errors) {
              _this.offerData = data;
              window.ymaps.ready(_this.handleYMapsReady);
            }

          case 6:
          case "end":
            return _context3.stop();
        }
      }
    }, _callee3);
  })));

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "initMap", function () {
    _this.mapInstance = new ymaps.Map(_this.mapContainer, {
      center: [33, 84],
      controls: ['zoomControl'],
      zoom: 2
    });

    _this.mapInstance.options.set('dragCursor', 'arrow');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "sendPlacemarksDataListUpdateEvent", function (_ref6) {
    var list = _ref6.list;
    document.dispatchEvent(new CustomEvent('j-event-map-yandex-components-view-all__update-visible-markers-data', {
      detail: {
        list: list
      }
    }));
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "showGeoCoordinates", function () {
    var coords = _this.geo.coords;
    var latitude = coords.latitude,
        longitude = coords.longitude;

    _this.mapInstance.setCenter([latitude, longitude], 11, {
      duration: 1000
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "updatePlacemarsDataList", function () {
    var list = _this.getPlacemarksDataList();

    _this.sendPlacemarksDataListUpdateEvent({
      list: list
    });
  });

  this.module = element;
  this.mapContainer = this.module.querySelector('.j-map-yandex-components-view-all__map-container');
  this.tokenCSRFInput = this.module.querySelector('input[name="_token"]');
  this.tokenCSRFValue = this.tokenCSRFInput.value;

  if (!this.tokenCSRFValue) {
    console.error('no csrf token found');
    return;
  }

  this.init();
  this.bind();
});

var list = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(document.querySelectorAll('.j-map-yandex-components-view-all'));

list.forEach(function (element) {
  new MapYandexComponentsViewAll(element);
});

/***/ }),

/***/ "./resources/views/modules/common/map/yandex/components/viewAll/index.less":
/*!*********************************************************************************!*\
  !*** ./resources/views/modules/common/map/yandex/components/viewAll/index.less ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/offers/list/index.js":
/*!*************************************************************!*\
  !*** ./resources/views/modules/common/offers/list/index.js ***!
  \*************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var views_factory_cards_offer_map__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! views/factory/cards/offer/map */ "./resources/views/factory/cards/offer/map/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/offers/list/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_6__);








var OffersList = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(function OffersList(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default()(this, OffersList);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, 'j-event-map-yandex-components-view-all__update-visible-markers-data', _this.handleUpdateVisibleMarkersData);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleUpdateVisibleMarkersData", function (e) {
    var list = e.detail.list;
    _this.module.innerHTML = '';
    var formattedData = {};
    list.forEach(function (_ref) {
      var placemark = _ref.placemark,
          placemarkData = _ref.placemarkData;
      var productId = placemarkData.offer.product.id;

      if (!formattedData[productId]) {
        formattedData[productId] = {
          placemarkList: [placemark],
          placemarkData: placemarkData
        };
        return;
      }

      formattedData[productId].placemarkList.push(placemark);
    });
    var htmlList = Object.values(formattedData).map(function (data) {
      return views_factory_cards_offer_map__WEBPACK_IMPORTED_MODULE_5__["MapOfferCard"].createMapOfferCard(data);
    });

    if (htmlList.length) {
      _this.module.insertAdjacentHTML('beforeend', htmlList.join(''));

      views_factory_cards_offer_map__WEBPACK_IMPORTED_MODULE_5__["MapOfferCard"].init();
      document.dispatchEvent(new CustomEvent('j-event-module__update'));
      document.dispatchEvent(new CustomEvent('j-event-favorites-components-section__get-favorites-products', {
        detail: {
          fromMemory: true
        }
      }));
    } else {
      _this.module.innerHTML = "\n                <div style=\"margin-top: 20px; font-style: italic;\">\n                    \u0412 \u0432\u0438\u0434\u0438\u043C\u043E\u0439 \u043E\u0431\u043B\u0430\u0441\u0442\u0438 \u043A\u0430\u0440\u0442\u044B <span style=\"font-weight: 800;\">\u0442\u043E\u0432\u0430\u0440\u043E\u0432 \u043D\u0435 \u043D\u0430\u0439\u0434\u0435\u043D\u043E</span>, \u043F\u043E\u043F\u0440\u043E\u0431\u0443\u0439\u0442\u0435 \u043F\u0435\u0440\u0435\u043C\u0435\u0441\u0442\u0438\u0442\u044C \u043A\u0430\u0440\u0442\u0443!\n                </div>\n                <div style=\"margin-top: 20px;\">\n                    <span style=\"font-weight: 800;\">\u041F\u043E\u0434\u0435\u043B\u0438\u0442\u0435\u0441\u044C \u0441\u0441\u044B\u043B\u043A\u043E\u0439 \u043D\u0430 \u0441\u0430\u0439\u0442</span> \u0432 \u0441\u043E\u0446\u0438\u0430\u043B\u044C\u043D\u044B\u0445 \u0441\u0435\u0442\u044F\u0445 \u0438 \u043C\u0435\u0441\u0441\u0435\u043D\u0434\u0436\u0435\u0440\u0430\u0445, \u0447\u0442\u043E\u0431\u044B&nbsp;\u043D\u0430&nbsp;\u0441\u0430\u0439\u0442\u0435 \u0431\u044B\u043B\u043E \u0431\u043E\u043B\u044C\u0448\u0435 \u0442\u043E\u0432\u0430\u0440\u043E\u0432!\n                </div>\n            ";
    }
  });

  this.module = element;
  this.bind();
});

var list = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(document.querySelectorAll('.j-modules-common-offers-list'));

list.forEach(function (element) {
  new OffersList(element);
});

/***/ }),

/***/ "./resources/views/modules/common/offers/list/index.less":
/*!***************************************************************!*\
  !*** ./resources/views/modules/common/offers/list/index.less ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/offers/modal/index.js":
/*!**************************************************************!*\
  !*** ./resources/views/modules/common/offers/modal/index.js ***!
  \**************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var events_index__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! events/index */ "./resources/events/index.js");
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var views_factory_cards_offer_map__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! views/factory/cards/offer/map */ "./resources/views/factory/cards/offer/map/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/offers/modal/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_7__);








var CLOSE = events_index__WEBPACK_IMPORTED_MODULE_3__["EVENTS_NAMES"].COMMON.MODALS.COMMON.CLOSE;

var OffersModal = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function OffersModal(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, OffersModal);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, 'j-event-map-yandex-components-view-all__get-visible-markers-data-complete', _this.handleGetVisibleMarkersData);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, CLOSE, _this.handleClose);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleClose", function () {
    document.removeEventListener('j-event-map-yandex-components-view-all__get-visible-markers-data-complete', _this.handleGetVisibleMarkersData);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleGetVisibleMarkersData", function (e) {
    var list = e.detail.list;
    _this.module.innerHTML = '';
    var formattedData = {};
    list.forEach(function (_ref) {
      var placemark = _ref.placemark,
          placemarkData = _ref.placemarkData;
      var productId = placemarkData.offer.product.id;

      if (!formattedData[productId]) {
        formattedData[productId] = {
          placemarkList: [placemark],
          placemarkData: placemarkData
        };
        return;
      }

      formattedData[productId].placemarkList.push(placemark);
    });
    var htmlList = Object.values(formattedData).map(function (data) {
      return views_factory_cards_offer_map__WEBPACK_IMPORTED_MODULE_6__["MapOfferCard"].createMapOfferCard(data);
    });

    if (htmlList.length) {
      _this.module.insertAdjacentHTML('beforeend', htmlList.join(''));

      views_factory_cards_offer_map__WEBPACK_IMPORTED_MODULE_6__["MapOfferCard"].init();
      document.dispatchEvent(new CustomEvent('j-event-module__update'));
      document.dispatchEvent(new CustomEvent('j-event-favorites-components-section__get-favorites-products', {
        detail: {
          fromMemory: true
        }
      }));
    } else {
      _this.module.innerHTML = "\n                <div style=\"margin-top: 20px; font-style: italic;\">\n                    \u0412 \u0432\u0438\u0434\u0438\u043C\u043E\u0439 \u043E\u0431\u043B\u0430\u0441\u0442\u0438 \u043A\u0430\u0440\u0442\u044B <span style=\"font-weight: 800;\">\u0442\u043E\u0432\u0430\u0440\u043E\u0432 \u043D\u0435 \u043D\u0430\u0439\u0434\u0435\u043D\u043E</span>, \u043F\u043E\u043F\u0440\u043E\u0431\u0443\u0439\u0442\u0435 \u043F\u0435\u0440\u0435\u043C\u0435\u0441\u0442\u0438\u0442\u044C \u043A\u0430\u0440\u0442\u0443!\n                </div>\n                <div style=\"margin-top: 20px;\">\n                    <span style=\"font-weight: 800;\">\u041F\u043E\u0434\u0435\u043B\u0438\u0442\u0435\u0441\u044C \u0441\u0441\u044B\u043B\u043A\u043E\u0439 \u043D\u0430 \u0441\u0430\u0439\u0442</span> \u0432 \u0441\u043E\u0446\u0438\u0430\u043B\u044C\u043D\u044B\u0445 \u0441\u0435\u0442\u044F\u0445 \u0438 \u043C\u0435\u0441\u0441\u0435\u043D\u0434\u0436\u0435\u0440\u0430\u0445, \u0447\u0442\u043E\u0431\u044B&nbsp;\u043D\u0430&nbsp;\u0441\u0430\u0439\u0442\u0435 \u0431\u044B\u043B\u043E \u0431\u043E\u043B\u044C\u0448\u0435 \u0442\u043E\u0432\u0430\u0440\u043E\u0432!\n                </div>\n            ";
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "init", function () {
    document.dispatchEvent(new CustomEvent('j-event-map-yandex-components-view-all__get-visible-markers-data'));
  });

  this.module = element;
  this.bind();
  this.init();
});

helpers_module__WEBPACK_IMPORTED_MODULE_5__["module"].initModule('j-modules-common-offers-modal', OffersModal);

/***/ }),

/***/ "./resources/views/modules/common/offers/modal/index.less":
/*!****************************************************************!*\
  !*** ./resources/views/modules/common/offers/modal/index.less ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/profile/modal/index.js":
/*!***************************************************************!*\
  !*** ./resources/views/modules/common/profile/modal/index.js ***!
  \***************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/profile/modal/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_5__);







var OffersModal = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function OffersModal(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, OffersModal);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "init", function () {
    _this.link.href = _this.href;
  });

  this.module = element;
  this.link = this.module.querySelector('.j-modules-common-profile-modal__link');
  this.href = this.module.dataset.href;
  this.init();
});

helpers_module__WEBPACK_IMPORTED_MODULE_4__["module"].initModule('j-modules-common-profile-modal', OffersModal);

/***/ }),

/***/ "./resources/views/modules/common/profile/modal/index.less":
/*!*****************************************************************!*\
  !*** ./resources/views/modules/common/profile/modal/index.less ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/pages/favorites/shared/components/button/index.js":
/*!***********************************************************************************!*\
  !*** ./resources/views/modules/pages/favorites/shared/components/button/index.js ***!
  \***********************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/asyncToGenerator */ "./node_modules/@babel/runtime/helpers/asyncToGenerator.js");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var constants_path__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! constants/path */ "./resources/constants/path/index.js");
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/pages/favorites/shared/components/button/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_8__);









var FAVORITES = constants_path__WEBPACK_IMPORTED_MODULE_5__["PATH"].FAVORITES;

var FavoritesButton = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(function FavoritesButton(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default()(this, FavoritesButton);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "activateButton", function () {
    var isActive = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;

    if (isActive) {
      _this.button.classList.add('active');
    } else {
      _this.button.classList.remove('active');
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_6__["addEventListener"])(document, 'j-event-happened-update-favorites', _this.handleUpdateFavorites);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_6__["addEventListener"])(document, 'j-event-happened-get-favorites', _this.handleGetFavorites);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_6__["addEventListener"])(_this.button, 'click', _this.handleClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "checkIsNeedReloadPage", function () {
    if (window.location.pathname === FAVORITES) {
      window.location.reload();
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleClick", function (e) {
    var isActive = _this.button.classList.contains('active');

    if (isActive) {
      _this.sendRequest('remove');
    } else {
      _this.sendRequest('add');
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleGetFavorites", function (e) {
    var detail = e.detail;
    var list = detail.list;
    list.forEach(function (offer) {
      var id = offer.id;

      if (id === _this.id) {
        _this.activateButton();
      }
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleUpdateFavorites", function (e) {
    var _e$detail = e.detail,
        action = _e$detail.action,
        id = _e$detail.id;

    if (id === _this.id) {
      _this.activateButton(action === 'add');
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "sendRequest", /*#__PURE__*/function () {
    var _ref = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_4___default.a.mark(function _callee(action) {
      var response, _yield$response$json, data, errors;

      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_4___default.a.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.prev = 0;
              _context.next = 3;
              return fetch("/favorites/products/".concat(action, "/").concat(_this.id), {
                headers: {
                  'Accept': 'application/json'
                },
                method: 'GET'
              });

            case 3:
              response = _context.sent;
              _context.next = 6;
              return response.json();

            case 6:
              _yield$response$json = _context.sent;
              data = _yield$response$json.data;
              errors = _yield$response$json.errors;

              if (!errors) {
                if (action === 'add') {
                  _this.activateButton();

                  _this.sendUpdateMessage(action);
                } else {
                  _this.button.classList.remove('active');

                  _this.sendUpdateMessage(action);
                }

                _this.checkIsNeedReloadPage();

                document.dispatchEvent(new CustomEvent('j-event-favorites-components-section__update-favorites-products', {
                  detail: {
                    list: data
                  }
                }));
              }

              _context.next = 15;
              break;

            case 12:
              _context.prev = 12;
              _context.t0 = _context["catch"](0);
              console.error(_context.t0);

            case 15:
            case "end":
              return _context.stop();
          }
        }
      }, _callee, null, [[0, 12]]);
    }));

    return function (_x) {
      return _ref.apply(this, arguments);
    };
  }());

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "sendUpdateMessage", function (action) {
    document.dispatchEvent(new CustomEvent('j-event-happened-update-favorites', {
      detail: {
        action: action,
        id: _this.id
      }
    }));
  });

  this.module = element;
  this.id = Number(this.module.dataset.id);
  this.isUserLoggedIn = document.querySelector('.j-user__auth');
  this.button = this.module.querySelector('.j-favorites-components-button__button');

  if (!this.isUserLoggedIn) {
    return;
  }

  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_7__["module"].initModule('j-favorites-components-button', FavoritesButton);

/***/ }),

/***/ "./resources/views/modules/pages/favorites/shared/components/button/index.less":
/*!*************************************************************************************!*\
  !*** ./resources/views/modules/pages/favorites/shared/components/button/index.less ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/pages/favorites/shared/components/header-counter/index.js":
/*!*******************************************************************************************!*\
  !*** ./resources/views/modules/pages/favorites/shared/components/header-counter/index.js ***!
  \*******************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");






var FavoritesHeaderCounter = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(function FavoritesHeaderCounter(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default()(this, FavoritesHeaderCounter);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, 'j-event-happened-get-favorites', _this.handleGetFavorites);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, 'j-event-happened-update-favorites', _this.handleUpdateFavorites);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleGetFavorites", function (e) {
    var detail = e.detail;
    var list = detail.list;
    _this.count = list.length;

    _this.updateCounter();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleUpdateFavorites", function (e) {
    var detail = e.detail;
    var action = detail.action;

    if (action === 'add') {
      _this.count++;

      _this.updateCounter();
    } else {
      _this.count--;

      _this.updateCounter();
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "updateCounter", function () {
    if (_this.count) {
      _this.module.classList.add('active');

      _this.countContainer.innerHTML = _this.count;
    } else {
      _this.module.classList.remove('active');

      _this.countContainer.innerHTML = '';
    }
  });

  this.module = element;
  this.countContainer = this.module.querySelector('.j-favorites-components-header-counter__count');
  this.count = 0;
  this.bind();
});

var list = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(document.querySelectorAll('.j-favorites-components-header-counter'));

list.forEach(function (element) {
  new FavoritesHeaderCounter(element);
});

/***/ }),

/***/ "./resources/views/modules/pages/favorites/shared/components/section/index.js":
/*!************************************************************************************!*\
  !*** ./resources/views/modules/pages/favorites/shared/components/section/index.js ***!
  \************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/asyncToGenerator */ "./node_modules/@babel/runtime/helpers/asyncToGenerator.js");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");








var FavoritesSection = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(function FavoritesSection(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3___default()(this, FavoritesSection);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_6__["addEventListener"])(document, 'j-event-favorites-components-section__get-favorites-products', _this.handleGetFavoritesProducts);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_6__["addEventListener"])(document, 'j-event-favorites-components-section__update-favorites-products', _this.handleUpdateFavoritesProducts);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "fetchData", /*#__PURE__*/_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.mark(function _callee() {
    var response, _yield$response$json, data, errors;

    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.wrap(function _callee$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            _context.prev = 0;
            _context.next = 3;
            return fetch("/favorites/products", {
              headers: {
                'Accept': 'application/json'
              },
              method: 'GET'
            });

          case 3:
            response = _context.sent;
            _context.next = 6;
            return response.json();

          case 6:
            _yield$response$json = _context.sent;
            data = _yield$response$json.data;
            errors = _yield$response$json.errors;

            if (!errors) {
              _this.data = data;

              _this.sendFavoritesData();
            }

            _context.next = 15;
            break;

          case 12:
            _context.prev = 12;
            _context.t0 = _context["catch"](0);
            console.error(_context.t0);

          case 15:
          case "end":
            return _context.stop();
        }
      }
    }, _callee, null, [[0, 12]]);
  })));

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleGetFavoritesProducts", function (e) {
    var _e$detail;

    var _ref2 = (_e$detail = e.detail) !== null && _e$detail !== void 0 ? _e$detail : {},
        fromMemory = _ref2.fromMemory;

    if (fromMemory) {
      _this.sendFavoritesData();

      return;
    }

    _this.fetchData();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleUpdateFavoritesProducts", function (e) {
    var list = e.detail.list;
    console.log('list');
    console.log(list);
    _this.data = list;
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "init", function () {
    _this.fetchData();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "sendFavoritesData", function () {
    document.dispatchEvent(new CustomEvent('j-event-happened-get-favorites', {
      detail: {
        list: _this.data
      }
    }));
  });

  this.module = element;
  this.isUserLoggedIn = document.querySelector('.j-user__auth');

  if (this.isUserLoggedIn) {
    this.init();
    this.bind();
  }
});

var list = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(document.querySelectorAll('.j-favorites-components-section'));

list.forEach(function (element) {
  new FavoritesSection(element);
});

/***/ }),

/***/ "./resources/views/modules/pages/map/web/routes/index/index.js":
/*!*********************************************************************!*\
  !*** ./resources/views/modules/pages/map/web/routes/index/index.js ***!
  \*********************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_components_hint_common__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/components/hint/common */ "./resources/views/components/hint/common/index.js");
/* harmony import */ var views_components_info_common__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! views/components/info/common */ "./resources/views/components/info/common/index.js");
/* harmony import */ var views_modules_common_geo_components_button__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! views/modules/common/geo/components/button */ "./resources/views/modules/common/geo/components/button/index.js");
/* harmony import */ var views_modules_common_map_yandex_components_viewAll__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! views/modules/common/map/yandex/components/viewAll */ "./resources/views/modules/common/map/yandex/components/viewAll/index.js");
/* harmony import */ var views_modules_common_offers_list__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! views/modules/common/offers/list */ "./resources/views/modules/common/offers/list/index.js");
/* harmony import */ var views_modules_common_offers_modal__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! views/modules/common/offers/modal */ "./resources/views/modules/common/offers/modal/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/pages/map/web/routes/index/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_6__);








/***/ }),

/***/ "./resources/views/modules/pages/map/web/routes/index/index.less":
/*!***********************************************************************!*\
  !*** ./resources/views/modules/pages/map/web/routes/index/index.less ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/pages/map/web/index/index.js":
/*!******************************************************!*\
  !*** ./resources/views/pages/map/web/index/index.js ***!
  \******************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_modules_common_breadcrumbs_list__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/modules/common/breadcrumbs/list */ "./resources/views/modules/common/breadcrumbs/list/index.js");
/* harmony import */ var views_modules_common_footer_index__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! views/modules/common/footer/index */ "./resources/views/modules/common/footer/index/index.js");
/* harmony import */ var views_modules_common_header_index__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! views/modules/common/header/index */ "./resources/views/modules/common/header/index/index.js");
/* harmony import */ var views_modules_common_layout_web__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! views/modules/common/layout/web */ "./resources/views/modules/common/layout/web/index.js");
/* harmony import */ var views_modules_pages_map_web_routes_index__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! views/modules/pages/map/web/routes/index */ "./resources/views/modules/pages/map/web/routes/index/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./index.less */ "./resources/views/pages/map/web/index/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_5__);







/***/ }),

/***/ "./resources/views/pages/map/web/index/index.less":
/*!********************************************************!*\
  !*** ./resources/views/pages/map/web/index/index.less ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

/******/ });
//# sourceMappingURL=map_web_index.d302b4049c38667c52aa.bundle.js.map