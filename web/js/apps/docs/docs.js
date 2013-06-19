var app = angular
    .module("app", ["ngResource"])
    .config(
        [
            "$interpolateProvider","$routeProvider",
            function ($interpolateProvider, $routeProvider) {
                $interpolateProvider.startSymbol("{§");
                $interpolateProvider.endSymbol("§}");

                $routeProvider
                    .when("/tree",
                    {
                        templateUrl:"/js/apps/docs/pages/tree.html"
                    })
                    .when("/sluggable",
                    {
                        templateUrl:"/js/apps/docs/pages/sluggable.html"
                    })
                    .when("/timestampable",
                    {
                        templateUrl:"/js/apps/docs/pages/timestampable.html"
                    })
                    .otherwise({redirectTo:"/tree"})
            }
        ]
    );
app.directive("markdown", function($http){
    var converter = new Showdown.converter();
    return {
        restrict: "E",
        link: function(scope,element, attrs){
            $http.get(attrs.url).success(function(response){
                var htmlText = converter.makeHtml(response);
                element.html(htmlText);
            });


        }
    }
});
app.controller("MainCtrl",function($scope,$http){

});
