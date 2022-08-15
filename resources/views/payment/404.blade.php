<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hyper Pay Payment</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    @if(isset($res['id']))
        <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $res['id'] }}"></script>
    @endif
</head>
<body style="background-color: #161D31">
    <div class="container">
        <nav class="navbar navbar-dark" style="background-color: #283046">
            <div class="container-fluid">
              <a class="navbar-brand">
                HyperPay Payment
            </a>
            </div>
          </nav>
          <div class="card col-xl-12 col-sm-12 col-12 mb-2 mb-xl-0 mt-5" style="background-color: #283046">
            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    <h4>payment type doesn't exists!</h4>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
