/**
 * Created by nhancao on 5/18/16.
 */
angular.module('app.services', [])
    .service('sUtils', function ($indexedDB, $mdToast, localStorageService, mBase) {

        this.getToday = function () {
            return this.formatDateTime(moment());
        };

        this.isBetweenDateTime = function (dateLeft, dateRight) {
            return moment().isBetween(moment(dateLeft), moment(dateRight));
        };

        this.formatDateTime = function (date) {
            return moment(date).format('YYYY-MM-DD HH:mm:ss');
        };

        this.parseIntObj = function (obj, attArr) {
            angular.forEach(attArr, function (value, key) {
                obj[value] = parseInt(obj[value]);
            });
            return obj;
        };

        this.showSimpleToast = function (msg) {
            $mdToast.show(
                $mdToast.simple()
                    .textContent(msg)
                    .position('top right')
                    .hideDelay(3000)
            );
        };

        this.isLocalEmpty = function () {
            if (!this.isValue(this.getLocal().get(mBase.KEYSTORAGE.EXPIRETIME))) return true;
        };

        this.isLocalExpired = function () {
            var expireTimeout = mBase.expireTimeout;
            var expireTime = this.getLocal().get(mBase.KEYSTORAGE.EXPIRETIME);
            return moment().isAfter(moment(expireTime).add(expireTimeout, mBase.expireTimeoutUnit));
        };

        this.findArray = function (array, value) {
            var find = false;
            for (var j = 0; j < array.length; j++) {
                if (array[j] == value) {
                    find = true;
                    break;
                }
            }
            return find;
        };

        this.getLocal = function () {
            return localStorageService
        };

        this.getStore = function (funcStore) {
            $indexedDB.openStore(mBase.dbname, funcStore);
        };


        /**
         * Check obj is String not empty, blank, null or undefine
         * @param obj
         * @returns {boolean}
         */
        this.isValue = function (obj) {
            return !(!obj || 0 === obj.length || /^\s*$/.test(obj));

        };

        this.countObjectLength = function (obj) {
            return Object.keys(obj).length;
        };
    })
    .service('sApiCall', function ($http, $q, mBase) {

        //User API
        this.getAllUser = function () {
            return httpPromise("GET", mBase.host + "/api/user/getuser", false);
        };

        this.insertUser = function (form_data) {
            return httpPromise("POST", mBase.host + "/api/user/insertUser", false, form_data);
        };

        this.updateUser = function (form_data) {
            return httpPromise("POST", mBase.host + "/api/user/updateUser", false, form_data);
        };

        this.deleteUser = function (form_data) {
            return httpPromise("POST", mBase.host + "/api/user/deleteUser", false, form_data);
        };

        this.deleteMultiUser = function (uid_arr) {
            var form_data = uid_arr;
            return httpPromise("POST", mBase.host + "/api/user/deleteMultiUser", false, form_data);
        };

        //Make promise
        var httpPromise = function (method, url, ignoreLoadingBar, data) {
            if (ignoreLoadingBar === undefined) ignoreLoadingBar = true;
            var defer = $q.defer();
            var req = {
                method: method,
                url: url,
                data: data,
                ignoreLoadingBar: ignoreLoadingBar
            };

            $http(req).then(function (response) {
                if (typeof response.data === 'object') {
                    defer.resolve(response.data);
                } else {
                    defer.reject(response.data);
                }
            }, function (error) {
                defer.reject(error);
            });
            return defer.promise;
        };

        this.makePromise = function (obj) {
            return $q(function (resolve, reject) {
                resolve(obj);
            });
        }
    })
    .factory('sBlankFactory', function () {

    })
    .service('sBlankService', function () {

    })


;