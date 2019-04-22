<!DOCTYPE html>
<html>

  <head>
    <title>App de Compra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular-route.min.js"></script>
    <script src="js/vendor/angular.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:700" rel="stylesheet">
  </head>

  <body>
      <br/>
      <h3 style="text-align: center; font-size: 7vh">Bienvenido a la Tienda</h3>
      <br />
      <div class="container" ng-app="shoppingCart" ng-controller="shoppingCartController" ng-init="loadProduct()">
        <div class="row" style="padding-top: 10vh; display: flex; justify-content: space-around">
          <div class="col-md-3"  ng-repeat="product in products" style=" background-color: rgba(26,26,26,0.1); border: 1px solid rgba(159, 159, 159, 0.7); border-radius: 0.5vh; height: 55vh; margin:3vh 3vh;">
            <div class="imgContainer" style="background-color: white; position: relative; border: 1px solid rgba(159, 159, 159, 0.7); height: 35vh; top: 3vh;">
              <img ng-src="img/{{ product.image }}" class="img-responsive" width="250vh" height="300vh" style="padding: 3vh"/><br />
              <h4 class="text" style="padding-top: 3vh; color: rgba(26,26,26,0.8)">{{ product.name }}</h4>
              <h4 class="text-danger">{{ product.price | currency : "€" }}</h4>
              <input style="font-size: 2vh; font-family: 'Nunito', sans-serif;color: #1a1a1a;background-color: rgba(51,220,251,0.7); border:rgba(51,220,251,0.7)" class="btn btn-success form-control" type="button" name="añadir" value="Añadir"/>
             </div>
          </div>
        </div>
        <br />

        <h3 align="center">Tu carrito</h3>
        <div class="table-responsive" id="order_table">
          <table class="table table-bordered table-striped">
            <tr>
              <th width="40%">Product Name</th>
              <th width="10%">Quantity</th>
              <th width="20%">Price</th>
              <th width=15%>Total</th>
              <th width="5%">Action</th>
            </tr>
            <tr ng-repeat="cart in cartt">
              <td>{{ cart.product_name }}</td>
              <td>{{ cart.product_quantity }}</td>
              <td>{{ cart.product_price }}</td>
              <td>{{ cart.product_quantity *  cart.product_price }}</td>
              <td><button type="button" name="remove_product" class="btn btn-danger btn-xs">Remove</button>
             </td>
            </tr>
            <tr>
              <td colspan="3" align="right">Total</td>
              <td colspan="2">{{ setTotals() }}</td>
            </tr>
          </table>
    </div>
  </div>

    <!-- Modules -->
    <script src="js/app.js"></script>

    <!-- Controllers -->
    <script src="js/controllers/shoppingCartController.js"></script>
</body>

</html>
