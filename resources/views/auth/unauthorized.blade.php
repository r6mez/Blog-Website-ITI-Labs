<!DOCTYPE html>
<html>
<head>
    <title>Unauthorized Access</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h1 class="card-title">Unauthorized Access</h1>
                    </div>
                    <div class="card-body">
                        <p class="card-text">You do not have permission to access this page.</p>
                        <a href="{{ route('posts.index') }}" class="btn btn-primary">Go back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
