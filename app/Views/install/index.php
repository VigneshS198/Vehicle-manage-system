<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter Installation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to CodeIgniter Installation</h1>

        <div class="alert alert-info">
            Please follow the steps below to set up your application.
        </div>

        <form action="/install/migrate" method="post">
            <button type="submit" class="btn btn-primary">Run Migrations</button>
        </form>

        <form action="/install/setupEnv" method="post" class="mt-3">
            <button type="submit" class="btn btn-success">Setup Environment</button>
        </form>

    </div>
</body>
</html>
