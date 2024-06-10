<!-- app/views/welcome.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= env('APP_NAME') ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="jumbotron">
            <h1 class="display-4"><?= env('APP_NAME') ?></h1>
            <p class="lead"><?= env('APP_DESC')?></p>
            <hr class="my-4">
            <p><strong>It is a great OOP Oriented Framework in PHP</strong><hr class="my-4">
              Welcome to the PROTON framework. You can now create and develop web applications and application interfaces very easily. It supports most databases such as MySql & PostegrsSQL & Sqlite & MongooDB.</p>
            <a href="#" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>