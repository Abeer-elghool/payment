<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $res['id'] }}"></script>
</head>

<body>
    <div>
        <!-- <h1>payments</h1> -->
        <form action="{{ route('payment.status', $type) }}" class="paymentWidgets" data-brands="VISA MASTER MADA">
        </form>
    </div>
</body>
</html>
