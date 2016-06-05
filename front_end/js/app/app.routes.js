/**
 * Created by nhancao on 5/18/16.
 */
angular.module('app.routes', [])

    // This project uses AngularUI Router which uses the concept of states
    // Learn more here: https://github.com/angular-ui/ui-router
    .config(function($stateProvider, $urlRouterProvider) {
        // For any unmatched url, send to /user
        $urlRouterProvider.otherwise("/user");

        $stateProvider
            .state('user', {
                url: "/user",
                templateUrl: "front_end/partials/p_user/p_user.html",
                controller: 'cUser'
            })
    })


;