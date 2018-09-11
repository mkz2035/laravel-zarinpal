
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>فرم پرداخت</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">

</head>

<body class="bg-light" style="font-family: IRANSans">

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>پرداخت شما</h2>
    </div>

    <div class="row">
        <div class="col-md-8 order-md-1" style="display: table;margin: 0 auto;">
            <form class="needs-validation" action="{{route('payment.redirectBank')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="fullname" style="float: right">نام و نام خانوادگی</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email" style="float: right">ایمیل</label>
                        <input type="text" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="price" style="float: right">مبلغ(تومان)</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description" style="float: right">توضیحات</label>
                        <textarea style="height: 200px;" type="text" class="form-control" id="description" name="description" required></textarea>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">پرداخت</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1"><a href="http://mostafa-kz.ir">written by mostafa karimzadeh</a></p>
    </footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
</html>
