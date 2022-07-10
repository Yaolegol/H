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
/******/ 		"profile_organizationInfo_index": 0
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
/******/ 	deferredModules.push(["./resources/views/pages/profile/organization-info/index/index.js","vendors"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

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

/***/ "./resources/helpers/debounce.js":
/*!***************************************!*\
  !*** ./resources/helpers/debounce.js ***!
  \***************************************/
/*! exports provided: debounce */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "debounce", function() { return debounce; });
var debounceMap = new Map();
var debounce = function debounce(callback, wait) {
  var data = debounceMap.get(callback);

  if (data) {
    var _timeoutId = data.timeoutId;

    if (_timeoutId) {
      clearTimeout(_timeoutId);
    }
  }

  var timeoutId = setTimeout(function () {
    callback();
  }, wait);
  debounceMap.set(callback, {
    timeoutId: timeoutId
  });
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
  var queryDataArray = _ref.queryDataArray,
      _ref$removeQueryWitho = _ref.removeQueryWithoutValue,
      removeQueryWithoutValue = _ref$removeQueryWitho === void 0 ? true : _ref$removeQueryWitho;
  var url = new URL(window.location);
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
        templateId: _this.templateId
      }
    }));
  });

  this.module = item;
  this.templateId = this.module.dataset.templateId;
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_5__["module"].initModule('j-components-buttons-modal-open', ButtonsModalOpen);

/***/ }),

/***/ "./resources/views/components/cards/organization/index.js":
/*!****************************************************************!*\
  !*** ./resources/views/components/cards/organization/index.js ***!
  \****************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/cards/organization/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/components/cards/organization/index.less":
/*!******************************************************************!*\
  !*** ./resources/views/components/cards/organization/index.less ***!
  \******************************************************************/
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
    var isClickedBackdrop = e.target.classList.contains('j-components-modals-base-common');

    if (isClickedBackdrop) {
      _this.sendCloseModalEvent();
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleClose", function (e) {
    _this.module.classList.remove('components-modals-base-common_show');

    document.body.classList.remove('j-style-overflow-hidden');
    _this.contentContainer.innerHTML = '';
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleCloseButtonClick", function () {
    _this.sendCloseModalEvent();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleOpen", function (e) {
    var detail = e.detail;
    var templateId = detail.templateId;
    var template = document.querySelector(".j-template[data-template-id=\"".concat(templateId, "\"]"));

    if (!template) {
      return;
    }

    _this.module.classList.add('components-modals-base-common_show');

    document.body.classList.add('j-style-overflow-hidden');
    _this.contentContainer.innerHTML = template.content.firstElementChild.outerHTML;
    helpers_module__WEBPACK_IMPORTED_MODULE_5__["module"].updateModules();
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
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var views_components_inputs_search__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! views/components/inputs/search */ "./resources/views/components/inputs/search/index.js");
/* harmony import */ var views_components_modals_layout_catalog_content__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! views/components/modals/layout/catalog/content */ "./resources/views/components/modals/layout/catalog/content/index.js");
/* harmony import */ var views_components_modals_layout_catalog_navigation__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! views/components/modals/layout/catalog/navigation */ "./resources/views/components/modals/layout/catalog/navigation/index.js");
/* harmony import */ var views_components_search_catalog__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! views/components/search/catalog */ "./resources/views/components/search/catalog/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./index.less */ "./resources/views/components/modals/layout/catalog/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_10__);





function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }









var Catalog = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(function Catalog(_item) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_2___default()(this, Catalog);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(_this.module, 'mouseover', _this.handleMouseOver);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_4__["addEventListener"])(document, 'j-event-modules-common-catalog__check-is-active-hidden', _this.handleCheckIsActiveHidden);
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

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "handleMouseOver", function (e) {
    var target = e.target;
    var navigationItem = target.closest('.j-components-catalog-navigation-item');

    if (navigationItem) {
      var itemId = navigationItem.dataset.itemId;

      _this.setActiveItem(itemId);
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "init", function () {
    _this.setContentItemsData();

    _this.setNavigationItemList();

    _this.setActiveItem(_this.initialSelectedItemId);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "isActiveNavigationItemHidden", function () {
    return _this.selectedNavigationItem.classList.contains('hidden');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "selectContentItem", function (id) {
    var selectedItem = _this.contentItemList.find(function (item) {
      return item.dataset.itemId === id;
    });

    if (selectedItem) {
      _this.selectedContentItem = selectedItem;

      _this.selectedContentItem.classList.add('selected');
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "selectNavigationItem", function (id) {
    var selectedItem = _this.navigationItemList.find(function (item) {
      return item.dataset.itemId === id;
    });

    if (selectedItem) {
      _this.selectedNavigationItem = selectedItem;

      _this.selectedNavigationItem.classList.add('selected');
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "setActiveItem", function (id) {
    _this.unselectNavigationItem();

    _this.selectNavigationItem(id);

    _this.unselectContentItem();

    _this.selectContentItem(id);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "setContentItemsData", function () {
    _this.contentItemsData = _this.contentItemList.reduce(function (acc, element) {
      var itemId = element.dataset.itemId;

      var categoryList = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(element.querySelectorAll('.j-components-catalog-content-item__category'));

      var formattedCategoryList = categoryList.map(function (element) {
        var value = element.dataset.value;
        return {
          element: element,
          value: value
        };
      });
      return _objectSpread(_objectSpread({}, acc), {}, _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()({}, itemId, {
        element: element,
        list: formattedCategoryList
      }));
    }, {});
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "setNavigationItemList", function () {
    _this.catalogList = _this.navigationItemList.reduce(function (acc, element) {
      var _element$dataset = element.dataset,
          itemId = _element$dataset.itemId,
          itemValue = _element$dataset.itemValue;
      return [].concat(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(acc), [{
        elements: {
          content: _this.contentItemsData[itemId],
          navigation: {
            element: element,
            value: itemValue
          }
        },
        id: itemId
      }]);
    }, []);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "unselectContentItem", function () {
    if (_this.selectedContentItem) {
      _this.selectedContentItem.classList.remove('selected');
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_3___default()(this, "unselectNavigationItem", function () {
    if (_this.selectedNavigationItem) {
      _this.selectedNavigationItem.classList.remove('selected');
    }
  });

  this.module = _item;
  this.initialSelectedItemId = 0;
  this.contentItemList = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(this.module.querySelectorAll('.j-components-catalog-content-item'));
  this.navigationItemList = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(this.module.querySelectorAll('.j-components-catalog-navigation-item'));
  this.selectedContentItem = null;
  this.selectedNavigationItem = null;
  this.init();
  this.bind();
});

helpers_module__WEBPACK_IMPORTED_MODULE_5__["module"].initModule('j-modules-common-catalog', Catalog);

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

/***/ "./resources/views/modules/common/catalog/modal/components/buttons/content/index.js":
/*!******************************************************************************************!*\
  !*** ./resources/views/modules/common/catalog/modal/components/buttons/content/index.js ***!
  \******************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/catalog/modal/components/buttons/content/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/common/catalog/modal/components/buttons/content/index.less":
/*!********************************************************************************************!*\
  !*** ./resources/views/modules/common/catalog/modal/components/buttons/content/index.less ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/common/catalog/modal/components/buttons/navigation/index.js":
/*!*********************************************************************************************!*\
  !*** ./resources/views/modules/common/catalog/modal/components/buttons/navigation/index.js ***!
  \*********************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/catalog/modal/components/buttons/navigation/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/common/catalog/modal/components/buttons/navigation/index.less":
/*!***********************************************************************************************!*\
  !*** ./resources/views/modules/common/catalog/modal/components/buttons/navigation/index.less ***!
  \***********************************************************************************************/
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
/* harmony import */ var views_modules_common_catalog_modal_components_buttons_content__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! views/modules/common/catalog/modal/components/buttons/content */ "./resources/views/modules/common/catalog/modal/components/buttons/content/index.js");
/* harmony import */ var views_modules_common_catalog_modal_components_buttons_navigation__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! views/modules/common/catalog/modal/components/buttons/navigation */ "./resources/views/modules/common/catalog/modal/components/buttons/navigation/index.js");
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
/* harmony import */ var views_modules_pages_favorites_shared_components_header_counter__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! views/modules/pages/favorites/shared/components/header-counter */ "./resources/views/modules/pages/favorites/shared/components/header-counter/index.js");
/* harmony import */ var views_modules_pages_favorites_shared_components_section__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! views/modules/pages/favorites/shared/components/section */ "./resources/views/modules/pages/favorites/shared/components/section/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/header/index/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_7__);









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
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/asyncToGenerator */ "./node_modules/@babel/runtime/helpers/asyncToGenerator.js");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_1__);
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
/* harmony import */ var helpers_toggle__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! helpers/toggle */ "./resources/helpers/toggle.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/header/search/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_9__);











var Search = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(function Search(_element) {
  var _this = this,
      _this$CSRFContainer;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3___default()(this, Search);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(_this.searchInput, 'input', _this.handleSearchInputInput);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(_this.searchInput, 'focus', _this.handleSearchInputFocus);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(_this.searchInput, 'blur', _this.handleSearchInputBlur);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(_this.clearButton, 'mousedown', _this.handleClearButtonMouseDown);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(_this.clearButton, 'click', _this.handleClearButtonClick);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_7__["addEventListener"])(_this.mobileSearchButton, 'click', _this.handleMobileSearchButtonClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "clearModuleClasses", function () {
    _this.module.classList.remove('j-style-header-search__has-value');

    _this.module.classList.remove('j-style-header-search__has-results');

    _this.module.classList.remove('j-style-header-search__no-results');

    _this.module.classList.remove('j-style-header-search__has-categories-results');

    _this.module.classList.remove('j-style-header-search__has-sellers-results');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "clearSearchResults", function () {
    _this.searchResultsCategoriesResultContainer.innerHTML = '';
    _this.searchResultsSellersResultContainer.innerHTML = '';
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "getCatalogSearchDataList", function (searchValue) {
    var regexp = new RegExp(searchValue, 'gi');
    return _this.searchElementsList.reduce(function (acc, element, arr) {
      var href = element.href,
          textContent = element.textContent;
      var isMatch = regexp.test(textContent);

      if (isMatch) {
        return [].concat(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_1___default()(acc), [{
          href: href,
          textContent: textContent
        }]);
      } else {
        return acc;
      }
    }, []);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "getCatalogSearchLayout", function (catalogSearchDataList) {
    var layoutArray = catalogSearchDataList.map(function (catalogData) {
      var href = catalogData.href,
          textContent = catalogData.textContent;
      return "<div>\n                       <a href=\"".concat(href, "\">").concat(textContent, "</a>\n                    </div>");
    });
    return layoutArray.join('');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "getSearchSellersLayout", function (data) {
    var layoutArray = data.map(function (responseUserData) {
      var organizationsList = responseUserData.organizationsList,
          userData = responseUserData.userData;
      var link = userData.link,
          title = userData.title;
      var userLink = "<div>\n                                 <a href=\"".concat(link, "\">").concat(title, "</a>\n                              </div>");
      var linksArray = [userLink];
      organizationsList.forEach(function (organizationData) {
        var organizationLink = "<div>\n                                             <a href=\"".concat(link, "\">").concat(organizationData.title, "</a>\n                                          </div>");
        linksArray.push(organizationLink);
      });
      return linksArray.join('');
    });
    return layoutArray.join('');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleClearButtonClick", function (e) {
    _this.searchInput.value = '';

    _this.clearSearchResults();

    _this.clearModuleClasses();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleClearButtonMouseDown", function (e) {
    e.preventDefault();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleMobileSearchButtonClick", function (e) {
    _this.module.classList.add('j-style-header-search__mobile-show');

    _this.searchInput.focus();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleSearchInputBlur", function (e) {
    setTimeout(function () {
      _this.module.classList.remove('j-style-header-search__focus');

      _this.module.classList.remove('j-style-header-search__mobile-show');
    }, 100);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleSearchInputFocus", function (e) {
    _this.module.classList.add('j-style-header-search__focus');
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleSearchInputInput", function (e) {
    var value = _this.searchInput.value;

    if (value) {
      Object(helpers_debounce__WEBPACK_IMPORTED_MODULE_6__["debounce"])(_this.inputDebounce, 1000);
    }

    Object(helpers_toggle__WEBPACK_IMPORTED_MODULE_8__["toggleClass"])(_this.module, 'j-style-header-search__has-value', value);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "inputDebounce", /*#__PURE__*/_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.mark(function _callee() {
    var searchValue, _yield$_this$sendRequ, data, errors, isCategorySet, isSellersSet;

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
              isCategorySet = _this.setSearchCategory(searchValue);
              isSellersSet = _this.setSearchSellers(data);
              Object(helpers_toggle__WEBPACK_IMPORTED_MODULE_8__["toggleClass"])(_this.module, 'j-style-header-search__no-results', !isCategorySet && !isSellersSet);
              Object(helpers_toggle__WEBPACK_IMPORTED_MODULE_8__["toggleClass"])(_this.module, 'j-style-header-search__has-results', isCategorySet || isSellersSet);
              Object(helpers_toggle__WEBPACK_IMPORTED_MODULE_8__["toggleClass"])(_this.module, 'j-style-header-search__has-categories-results', isCategorySet);
              Object(helpers_toggle__WEBPACK_IMPORTED_MODULE_8__["toggleClass"])(_this.module, 'j-style-header-search__has-sellers-results', isSellersSet);
            }

          case 9:
          case "end":
            return _context.stop();
        }
      }
    }, _callee);
  })));

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "sendRequest", /*#__PURE__*/function () {
    var _ref2 = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_0___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.mark(function _callee2(searchValue) {
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
      return _ref2.apply(this, arguments);
    };
  }());

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "setSearchCategory", function (searchValue) {
    var catalogSearchDataList = _this.getCatalogSearchDataList(searchValue);

    var catalogSearchLayout = _this.getCatalogSearchLayout(catalogSearchDataList);

    if (catalogSearchLayout) {
      _this.searchResultsCategoriesResultContainer.innerHTML = catalogSearchLayout;
      return true;
    }

    return false;
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "setSearchSellers", function (data) {
    var sellersLayout = _this.getSearchSellersLayout(data);

    if (sellersLayout) {
      _this.searchResultsSellersResultContainer.innerHTML = sellersLayout;
      return true;
    }

    return false;
  });

  this.module = _element;
  this.searchInput = this.module.querySelector('.j-header-search__input');
  this.clearButton = this.module.querySelector('.j-header-search__clear-button');
  this.mobileSearchButton = this.module.querySelector('.j-header-search__mobile-search-button');
  this.CSRFContainer = document.querySelector('.j-csrf-token');
  this.CSRFValue = (_this$CSRFContainer = this.CSRFContainer) === null || _this$CSRFContainer === void 0 ? void 0 : _this$CSRFContainer.dataset.value;
  this.searchElementsList = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_1___default()(document.querySelectorAll('.j-header-catalog__search-element'));
  this.searchResultsCategoriesResultContainer = this.module.querySelector('.j-header-search__search-results-categories-result-container');
  this.searchResultsSellersResultContainer = this.module.querySelector('.j-header-search__search-results-sellers-result-container');
  this.bind();
});

var list = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_1___default()(document.querySelectorAll('.j-header-search'));

list.forEach(function (element) {
  new Search(element);
});

/***/ }),

/***/ "./resources/views/modules/common/header/search/index.less":
/*!*****************************************************************!*\
  !*** ./resources/views/modules/common/header/search/index.less ***!
  \*****************************************************************/
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
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/layout/web/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_1__);



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
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var helpers_module__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! helpers/module */ "./resources/helpers/module.js");
/* harmony import */ var helpers_query__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! helpers/query */ "./resources/helpers/query.js");
/* harmony import */ var views_components_buttons_modal_open__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! views/components/buttons/modal/open */ "./resources/views/components/buttons/modal/open/index.js");
/* harmony import */ var views_components_modals_base_common__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! views/components/modals/base/common */ "./resources/views/components/modals/base/common/index.js");
/* harmony import */ var views_components_modals_layout_catalog__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! views/components/modals/layout/catalog */ "./resources/views/components/modals/layout/catalog/index.js");
/* harmony import */ var views_modules_common_location_components_modal_components_buttons_content__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! views/modules/common/location/components/modal/components/buttons/content */ "./resources/views/modules/common/location/components/modal/components/buttons/content/index.js");
/* harmony import */ var views_modules_common_location_components_modal_components_buttons_navigation__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! views/modules/common/location/components/modal/components/buttons/navigation */ "./resources/views/modules/common/location/components/modal/components/buttons/navigation/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/location/components/modal/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_11__);













var LocationModalContent = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_0___default()(function LocationModalContent(item) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, LocationModalContent);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_3__["addEventListener"])(document, 'j-event--location-common-open-modal-button__reset', _this.handleResetClick);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_3__["addEventListener"])(_this.module, 'click', _this.handleModuleClick);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleModuleClick", function (e) {
    var target = e.target;
    var isLocationButton = target.classList.contains('j-location-modal-content__location-button');

    if (isLocationButton) {
      _this.setLocationCookie(target);

      _this.setLocationQuery(target);

      document.location.reload();
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "handleResetClick", function (e) {
    console.log('reset');

    _this.resetLocationCookie();

    _this.resetLocationQuery();

    document.location.reload();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(this, "resetLocationCookie", function () {
    var now = new Date();
    document.cookie = "search-region-id=0;expires=".concat(now, ";");
    document.cookie = "search-city-id=0;expires=".concat(now, ";");
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
        searchCountryId = _target$dataset.searchCountryId,
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
        searchCountryId = _target$dataset2.searchCountryId,
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

helpers_module__WEBPACK_IMPORTED_MODULE_4__["module"].initModule('j-location-modal-content', LocationModalContent);

/***/ }),

/***/ "./resources/views/modules/common/location/components/modal/index.less":
/*!*****************************************************************************!*\
  !*** ./resources/views/modules/common/location/components/modal/index.less ***!
  \*****************************************************************************/
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







var FavoritesSection = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(function FavoritesSection(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3___default()(this, FavoritesSection);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "fetchData", /*#__PURE__*/_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.mark(function _callee() {
    var response, _yield$response$json, data, errors;

    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_5___default.a.wrap(function _callee$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            _context.prev = 0;
            _context.next = 3;
            return fetch("/api/favorites/products", {
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
              document.dispatchEvent(new CustomEvent('j-event-happened-get-favorites', {
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
  })));

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "init", function () {
    _this.fetchData();
  });

  this.module = element;
  this.isUserLoggedIn = document.querySelector('.j-user__auth');

  if (this.isUserLoggedIn) {
    this.init();
  }
});

var list = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(document.querySelectorAll('.j-favorites-components-section'));

list.forEach(function (element) {
  new FavoritesSection(element);
});

/***/ }),

/***/ "./resources/views/modules/pages/profile/common/components/body/index/index.js":
/*!*************************************************************************************!*\
  !*** ./resources/views/modules/pages/profile/common/components/body/index/index.js ***!
  \*************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/pages/profile/common/components/body/index/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/pages/profile/common/components/body/index/index.less":
/*!***************************************************************************************!*\
  !*** ./resources/views/modules/pages/profile/common/components/body/index/index.less ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/pages/profile/common/components/container/card/index.js":
/*!*****************************************************************************************!*\
  !*** ./resources/views/modules/pages/profile/common/components/container/card/index.js ***!
  \*****************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/pages/profile/common/components/container/card/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/pages/profile/common/components/container/card/index.less":
/*!*******************************************************************************************!*\
  !*** ./resources/views/modules/pages/profile/common/components/container/card/index.less ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/pages/profile/common/components/header/index.js":
/*!*********************************************************************************!*\
  !*** ./resources/views/modules/pages/profile/common/components/header/index.js ***!
  \*********************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/pages/profile/common/components/header/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/views/modules/pages/profile/common/components/header/index.less":
/*!***********************************************************************************!*\
  !*** ./resources/views/modules/pages/profile/common/components/header/index.less ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/pages/profile/routes/organization-info/index/index.js":
/*!***************************************************************************************!*\
  !*** ./resources/views/modules/pages/profile/routes/organization-info/index/index.js ***!
  \***************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_modules_pages_profile_common_components_body_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/modules/pages/profile/common/components/body/index */ "./resources/views/modules/pages/profile/common/components/body/index/index.js");
/* harmony import */ var views_modules_pages_profile_common_components_container_card__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! views/modules/pages/profile/common/components/container/card */ "./resources/views/modules/pages/profile/common/components/container/card/index.js");
/* harmony import */ var views_modules_pages_profile_common_components_header__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! views/modules/pages/profile/common/components/header */ "./resources/views/modules/pages/profile/common/components/header/index.js");
/* harmony import */ var views_components_cards_organization__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! views/components/cards/organization */ "./resources/views/components/cards/organization/index.js");





/***/ }),

/***/ "./resources/views/pages/profile/organization-info/index/index.js":
/*!************************************************************************!*\
  !*** ./resources/views/pages/profile/organization-info/index/index.js ***!
  \************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_modules_common_header_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/modules/common/header/index */ "./resources/views/modules/common/header/index/index.js");
/* harmony import */ var views_modules_common_layout_web__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! views/modules/common/layout/web */ "./resources/views/modules/common/layout/web/index.js");
/* harmony import */ var views_modules_pages_profile_routes_organization_info_index__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! views/modules/pages/profile/routes/organization-info/index */ "./resources/views/modules/pages/profile/routes/organization-info/index/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./index.less */ "./resources/views/pages/profile/organization-info/index/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_3__);





/***/ }),

/***/ "./resources/views/pages/profile/organization-info/index/index.less":
/*!**************************************************************************!*\
  !*** ./resources/views/pages/profile/organization-info/index/index.less ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

/******/ });
//# sourceMappingURL=profile_organizationInfo_index.7af3e01ff0c4d2d55c5f.bundle.js.map