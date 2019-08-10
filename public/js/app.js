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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /home/kryme/Documents/Baza/resources/js/app.js: Unexpected token (38:0)\n\n\u001b[0m \u001b[90m 36 | \u001b[39mlet routes \u001b[33m=\u001b[39m [\u001b[0m\n\u001b[0m \u001b[90m 37 | \u001b[39m    { path\u001b[33m:\u001b[39m \u001b[32m'/dashboard'\u001b[39m\u001b[33m,\u001b[39m component\u001b[33m:\u001b[39m require(\u001b[32m'./components/dashboard.vue'\u001b[39m)\u001b[33m.\u001b[39m\u001b[36mdefault\u001b[39m }\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 38 | \u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    | \u001b[39m\u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 39 | \u001b[39m    { path\u001b[33m:\u001b[39m \u001b[32m'/county'\u001b[39m\u001b[33m,\u001b[39m component\u001b[33m:\u001b[39m require(\u001b[32m'./components/County.vue'\u001b[39m)\u001b[33m.\u001b[39m\u001b[36mdefault\u001b[39m }\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 40 | \u001b[39m    { path\u001b[33m:\u001b[39m \u001b[32m'/ward'\u001b[39m\u001b[33m,\u001b[39m component\u001b[33m:\u001b[39m require(\u001b[32m'./components/Ward.vue'\u001b[39m)\u001b[33m.\u001b[39m\u001b[36mdefault\u001b[39m }\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 41 | \u001b[39m\u001b[33m===\u001b[39m\u001b[33m===\u001b[39m\u001b[33m=\u001b[39m\u001b[0m\n    at Parser.raise (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:6325:17)\n    at Parser.unexpected (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:7642:16)\n    at Parser.parseExprAtom (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8841:20)\n    at Parser.parseExprSubscripts (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8412:23)\n    at Parser.parseMaybeUnary (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8392:21)\n    at Parser.parseExprOps (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8267:23)\n    at Parser.parseMaybeConditional (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8240:23)\n    at Parser.parseMaybeAssign (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8187:21)\n    at Parser.parseExprListItem (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:9491:18)\n    at Parser.parseExprList (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:9465:22)\n    at Parser.parseExprAtom (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8770:32)\n    at Parser.parseExprSubscripts (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8412:23)\n    at Parser.parseMaybeUnary (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8392:21)\n    at Parser.parseExprOps (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8267:23)\n    at Parser.parseMaybeConditional (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8240:23)\n    at Parser.parseMaybeAssign (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:8187:21)\n    at Parser.parseVar (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:10480:26)\n    at Parser.parseVarStatement (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:10299:10)\n    at Parser.parseStatementContent (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:9896:21)\n    at Parser.parseStatement (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:9829:17)\n    at Parser.parseBlockOrModuleBlockBody (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:10405:25)\n    at Parser.parseBlockBody (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:10392:10)\n    at Parser.parseTopLevel (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:9758:10)\n    at Parser.parse (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:11270:17)\n    at parse (/home/kryme/Documents/Baza/node_modules/@babel/parser/lib/index.js:11306:38)\n    at parser (/home/kryme/Documents/Baza/node_modules/@babel/core/lib/transformation/normalize-file.js:170:34)\n    at normalizeFile (/home/kryme/Documents/Baza/node_modules/@babel/core/lib/transformation/normalize-file.js:138:11)\n    at runSync (/home/kryme/Documents/Baza/node_modules/@babel/core/lib/transformation/index.js:44:43)\n    at runAsync (/home/kryme/Documents/Baza/node_modules/@babel/core/lib/transformation/index.js:35:14)\n    at process.nextTick (/home/kryme/Documents/Baza/node_modules/@babel/core/lib/transform.js:34:34)\n    at process._tickCallback (internal/process/next_tick.js:61:11)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/kryme/Documents/Baza/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /home/kryme/Documents/Baza/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });