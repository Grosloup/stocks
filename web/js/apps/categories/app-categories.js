
var app = angular
    .module("app", [])
    .config(
        [
            "$interpolateProvider","$httpProvider",
            function ($interpolateProvider,$httpProvider) {
                $interpolateProvider.startSymbol("{§");
                $interpolateProvider.endSymbol("§}");
                $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
            }
        ]
    );
app.value(
    "urls",
    {
        getAllCategories:"/api/categories",
        newCategory:"/api/category/create"
    }
);

app.controller("MainCtrl",function($scope,$http,urls){
    $scope.categories = [];
    $scope.newCat = {};
    $scope.showSelect = false;
    $scope.showTree = false;

    function findById(arr, id){
        var r = null;
        _e_.forEach(arr, function(i,it){
            if(it.has("id")){

                if(it.get("id") == id){
                    r = it;
                }
            }
        });
        return r;
    }

    $scope.save = function(){
        var c = $scope.newCat;
        var parent_id = null;
        if(c.parent){
            parent_id = c.parent.get("id");
        }
        $http
            .post(urls.newCategory,{"name": c.name, "parent_id": parent_id})
            .success(function(resp){
                var c = new Category({id:resp.last_id, name: $scope.newCat.name});
                if($scope.newCat.parent){
                    c.set("parent_id", $scope.newCat.parent.get("id"));

                    c.parent = $scope.newCat.parent;

                }
                $scope.categories.push(c);
                $scope.showTree = true;
                $scope.showSelect = true;


            });

    };

    $http.get(urls.getAllCategories).success(function(resp, status, headers){
        if(resp.status == "ok"){
            var col = [];
            _e_.forEach(resp.datas, function(index, item){
                var c = new Category({name: item.name, id:item.id});
                if(item.hasOwnProperty("parent_id")){
                    c.set("parent_id", item.parent_id);
                }
                col.push(c) ;

            });
            _e_.forEach(col, function(i, item){

                if(item.has("parent_id")){
                    var parent = findById(col, item.get("parent_id"));
                    if(parent){
                        item._parent = parent;
                        parent.addChild(item);
                    }

                }
            });

            $scope.categories = col;
            $scope.showTree = true;
            $scope.showSelect = true;
        } else if(resp.status == "error"){

        }
    }).error(function(resp,status){
            //console.log("error " + status);
        });

});
