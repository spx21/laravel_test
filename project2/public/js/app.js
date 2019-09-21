
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });
// List tasks


var app = angular.module('AssessmentCRUD', []
    , ['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
    }]);

app.controller('ProductController', ['$scope', '$http', function ($scope, $http) {
    var API_URL = "api/";
    
   $scope.product = {};
   $scope.modal_title = "Add New Product";

   $scope.products = [];
 
   // List tasks
   
   function loadProducts() {
         var url = API_URL + "Products";
        $http.get(url).then(function (response) {
            console.log(response);
            $scope.products = response.data.products;
        });
   };
   $scope.loadProducts = loadProducts;
   
    $scope.loadProducts();
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.product = {};
                $scope.modal_title = "Add New Product";
                break;
            case 'edit':
                $scope.modal_title = "Product Detail";
                $scope.id = id;
                $http.get(API_URL + 'Products/' + id)
                        .then(function(response) {
                            console.log(response);
                            $scope.product = response.data;
                            $scope.product.Price = parseFloat($scope.product.Price);
                        });
            
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

  
    $scope.save = function(modalstate, id) {
        var url = API_URL + "Products";
        var method = "POST";
        if ($scope.modal_title === "Product Detail"){
            url += "/" + $scope.product.id;
            method = "PUT";
        }
        console.log($scope.product);
        $http({
            method: method,
            url: url,
            data: $.param($scope.product),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }, function(data){
            console.log(data);
            loadProducts();
        }, function(data){

            console.log(data);
                    alert('Unable to save');
        });
        $('#myModal').modal('hide');
    }

    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want to delete this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'Products/' + id
            }, function(data){
                console.log(data);
                location.reload();
            }, function(data){

                console.log(data);
                        alert('Unable to delete');
            });
                   
                
            }
        }
            
         
}]);

