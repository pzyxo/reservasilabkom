<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="images/logo-cafe.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="script/style.css">
    <script src="script/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="script/main.js"></script>
    <title>Lab-or - Because We All Are</title>
</head>

    <!-- navbar -->
    <?= $this->include('users/template/nav'); ?>
    <!-- navbar -->

    <!-- main content -->
<?= $this->renderSection('index'); ?>
<?= $this->renderSection('explore'); ?>
<?= $this->renderSection('about'); ?>
    <!-- main content  -->

</html>
