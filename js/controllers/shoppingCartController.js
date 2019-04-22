app.controller('shoppingCartController', function($http, $scope) {
    $scope.loadProduct = function(){
      $http.get('fetch.php').success(function(data) {
          $scope.products = data;
      });
    };

    $scope.cartes = [];

    $scope.fetchChart = function(){
      $http.get('fetch_cart.php').success(function(data) {
            $scope.cartes = data;
      });
    };

    $scope.setTotals = function() {
        var total = 0;
        for(var count=0; count < $scope.cartes.length; count++)
        {
           var item = $scope.cartes[count];
           total = total + (item.product_quantity * item.product_price);
        }
        return total;
    };

    $scope.addtoCart = function(product){
        $http({
          method: "POST",
          url: "add_item.php",
          data: product
        }).success(function(data) {
            $scope.fetchChart();
        });
    };
});
