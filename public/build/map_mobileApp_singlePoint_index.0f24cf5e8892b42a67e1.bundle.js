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
/******/ 		"map_mobileApp_singlePoint_index": 0
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
/******/ 	deferredModules.push(["./resources/views/pages/map/mobileApp/singlePoint/index.js","vendors"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

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

/***/ "./resources/views/modules/common/map/yandex/components/add-marker/index.js":
/*!**********************************************************************************!*\
  !*** ./resources/views/modules/common/map/yandex/components/add-marker/index.js ***!
  \**********************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var helpers_events__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! helpers/events */ "./resources/helpers/events.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/common/map/yandex/components/add-marker/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_6__);








var MapYandexComponentsAddMarker = /*#__PURE__*/_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(function MapYandexComponentsAddMarker(element) {
  var _this = this;

  _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_3___default()(this, MapYandexComponentsAddMarker);

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "addInitialMarker", function () {
    if (_this.markerLat && _this.markerLng) {
      _this.addMarkerFromClick([_this.markerLat, _this.markerLng]);
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "addMarkerFromClick", function (coords) {
    if (_this.marker) {
      _this.removeMarkerFromMap(_this.marker);
    }

    _this.marker = _this.addMarkerToMap(coords);

    _this.setLatLngInputsValues(coords);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "addMarkerToMap", function (coords) {
    var markerInstance = new ymaps.Placemark(coords);

    _this.mapInstance.geoObjects.add(markerInstance);

    return markerInstance;
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "addMarkerFromCheckbox", function (_ref) {
    var lat = _ref.lat,
        lng = _ref.lng,
        value = _ref.value;
    _this.checkboxesMap[value] = _this.addMarkerToMap([lat, lng]);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "bind", function () {
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_5__["addEventListener"])(document, 'j-event__need-update-map-marker', _this.handleUpdateMarker);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_5__["addEventListener"])(document, 'j-event-map__check-ready-status', _this.handleCheckMapReadyStatus);
    Object(helpers_events__WEBPACK_IMPORTED_MODULE_5__["addEventListener"])(document, 'j-event-modules-common-geo-components-button__update-geo', _this.handleUpdateGeo);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleCheckMapReadyStatus", function () {
    _this.sendInitMessage();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleClickOnMap", function (e) {
    var coords = e.get('coords');

    _this.addMarkerFromClick(coords);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleUpdateGeo", function (e) {
    _this.geo = e.detail.position;

    _this.showGeoCoordinates();
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "handleUpdateMarker", function (e) {
    var detail = e.detail;
    var coords = detail.coords,
        isChecked = detail.isChecked,
        value = detail.value;
    var lat = coords.lat,
        lng = coords.lng;

    if (isChecked) {
      _this.addMarkerFromCheckbox({
        lat: lat,
        lng: lng,
        value: value
      });
    } else {
      _this.removeMarkerFromCheckbox(value);
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "init", function () {
    window.ymaps.ready(function () {
      _this.checkboxesMap = {};

      _this.initMap();

      _this.addInitialMarker();

      _this.sendInitMessage();
    });
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "initMap", function () {
    _this.mapInstance = new ymaps.Map(_this.mapContainer, {
      center: [62.395570, 104.432320],
      controls: ['zoomControl'],
      zoom: 2
    });

    _this.mapInstance.options.set('dragCursor', 'arrow');

    _this.mapInstance.events.add('click', _this.handleClickOnMap);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "removeMarkerFromCheckbox", function (value) {
    var markerInstance = _this.checkboxesMap[value];

    if (markerInstance) {
      _this.removeMarkerFromMap(markerInstance);
    }
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "removeMarkerFromMap", function (markerInstance) {
    _this.mapInstance.geoObjects.remove(markerInstance);
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "sendInitMessage", function () {
    document.dispatchEvent(new CustomEvent('j-event-map__ready'));
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "setLatLngInputsValues", function (_ref2) {
    var _ref3 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_ref2, 2),
        lat = _ref3[0],
        lng = _ref3[1];

    _this.latInput.value = lat;
    _this.lngInput.value = lng;
  });

  _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_4___default()(this, "showGeoCoordinates", function () {
    var coords = _this.geo.coords;
    var latitude = coords.latitude,
        longitude = coords.longitude;

    _this.mapInstance.setCenter([latitude, longitude], 15, {
      duration: 1000
    });
  });

  this.module = element;
  this.mapContainer = this.module.querySelector('.j-map-yandex-components-add-marker__map-container');
  this.latInput = this.module.querySelector('.j-map-yandex-components-add-marker__lat-input');
  this.lngInput = this.module.querySelector('.j-map-yandex-components-add-marker__lng-input');
  this.markerLat = Number(this.module.dataset.markerLat);
  this.markerLng = Number(this.module.dataset.markerLng);
  this.bind();
  this.init();
});

var list = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(document.querySelectorAll('.j-map-yandex-components-add-marker'));

list.forEach(function (element) {
  new MapYandexComponentsAddMarker(element);
});

/***/ }),

/***/ "./resources/views/modules/common/map/yandex/components/add-marker/index.less":
/*!************************************************************************************!*\
  !*** ./resources/views/modules/common/map/yandex/components/add-marker/index.less ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/modules/pages/map/mobileApp/singlePoint/index.js":
/*!**************************************************************************!*\
  !*** ./resources/views/modules/pages/map/mobileApp/singlePoint/index.js ***!
  \**************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_modules_common_map_yandex_components_add_marker__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/modules/common/map/yandex/components/add-marker */ "./resources/views/modules/common/map/yandex/components/add-marker/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.less */ "./resources/views/modules/pages/map/mobileApp/singlePoint/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./resources/views/modules/pages/map/mobileApp/singlePoint/index.less":
/*!****************************************************************************!*\
  !*** ./resources/views/modules/pages/map/mobileApp/singlePoint/index.less ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./resources/views/pages/map/mobileApp/singlePoint/index.js":
/*!******************************************************************!*\
  !*** ./resources/views/pages/map/mobileApp/singlePoint/index.js ***!
  \******************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var views_modules_pages_map_mobileApp_singlePoint__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! views/modules/pages/map/mobileApp/singlePoint */ "./resources/views/modules/pages/map/mobileApp/singlePoint/index.js");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.less */ "./resources/views/pages/map/mobileApp/singlePoint/index.less");
/* harmony import */ var _index_less__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_index_less__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./resources/views/pages/map/mobileApp/singlePoint/index.less":
/*!********************************************************************!*\
  !*** ./resources/views/pages/map/mobileApp/singlePoint/index.less ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

/******/ });
//# sourceMappingURL=map_mobileApp_singlePoint_index.0f24cf5e8892b42a67e1.bundle.js.map