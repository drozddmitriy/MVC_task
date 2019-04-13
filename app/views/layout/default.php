<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/public/styles/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/styles/footer.css">
    <script type="text/javascript" src="/public/scripts/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="/public/scripts/popper.min.js"></script>
    <script type="text/javascript" src="/public/scripts/bootstrap.js"></script>
    <script type="text/javascript" src="/public/scripts/checkbox.js"></script>
    <script type="text/javascript" src="/public/scripts/form.js"></script>
    <script type="text/javascript" src="/public/scripts/inputdate.js"></script>
    <script type="text/javascript" src="/public/scripts/priority.js"></script>
    <title>Ruby</title>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Manage my tasks</h1>
        <p class="lead">The milk chocolate melts in your mouth, not in your hand.</p>
        <?php if (isset($_SESSION['account']['id'])): ?>
            <a href="/logout" class="btn btn-sm btn-outline-secondary" role="button" aria-disabled="true">logout</a>
            <div>
                <strong>Name user: <?php echo $_SESSION['account']['login']; ?></strong>
            </div>
        <?php else: ?>
            <a href="/login" class="btn btn-sm btn-outline-secondary" role="button" aria-disabled="true">login</a>
            <a href="/register" class="btn btn-sm btn-outline-secondary" role="button" aria-disabled="true">register</a>
        <?php endif; ?>
    </div>
</div>
<div class="container content">
    <div class="row justify-content-center">
        <div class="content-inside col-7">

            <?php echo $content; ?>

        </div>
    </div>
</div>

<footer class="footer page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2019p Copyright:
        <a href="#">Bootstrap.com</a>
    </div>
</footer>

</body>
</html>