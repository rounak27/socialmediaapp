<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Social Mda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 60px 0;
            text-align: center;
        }
        .cta {
            padding: 60px 0;
            text-align: center;
        }
        .cta h2 {
            color: #007bff;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }
        .cta p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 30px;
        }
        .btn-lg {
            padding: 15px 40px;
            font-size: 1.2rem;
            border-radius: 30px;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Welcome to Social Mda</h1>
        <p>A social media platform for sharing and connecting</p>
    </div>

    <div class="cta">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Login</h2>
                    <p>Already have an account? Login to Social Mda to connect with friends.</p>
                    <a href="/login" class="btn btn-primary btn-lg">Login</a>
                </div>
                <div class="col-md-6">
                    <h2>Register</h2>
                    <p>Don't have an account yet? Join Social Mda to start sharing your experiences.</p>
                    <a href="/register" class="btn btn-success btn-lg">Register</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
