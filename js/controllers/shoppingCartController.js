app.controller('shoppingCartController', function($scope, $http) {
    $scope.loadProduct = function(){
      $http.get('fetch.php').success(function(data) {
          $scope.products = data;
      })
    };

    $scope.carts = [];

    $scope.fetchCart = function(){
      $http.get('fetch_cart.php').success(function(data) {
            $scope.carts = data;
      })
    };

    $scope.setTotals = function() {
        var total = 0;

        for(var count = 0; count < $scope.carts.length; count++)
        {
           var item = $scope.carts[count];
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
            $scope.fetchCart();
        });
    };

    $scope.removeItem = function(id) {
      $http({
        method: "POST",
        url: "remove_item.php",
        data:id
      }).success(function(data){
        $scope.fetchCart();
      });
    };
});
