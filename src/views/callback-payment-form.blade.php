<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>پرداخت شما با موفقیت انجام شد</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">

</head>

<body class="bg-light" style="font-family: IRANSans">

<div class="container">
    <div class="row">
        <div class="col-md-8"
             style="display: table;margin: 0 auto;margin-top: 50px;padding: 15px;direction: rtl;text-align: center;">
            <div class="alert alert-success">
                <h1 style="padding: 15px;">پرداخت شما با موفقیت انجام شد</h1>
                <p>نام و نام خانوادگی:{{$payment->fullName}}</p>
                <p>کدپیگیری:{{\Payment::convertToPersianNumber($payment->transaction_code)}}</p>
                <p>مبلغ پرداختی:{{\Payment::convertToPersianNumber($payment->price)}}تومان</p>
                <p>توضیحات:{{\Payment::convertToPersianNumber($payment->description)}}</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>