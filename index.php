<?php include 'session.php'?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="static/img/logo.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-md-4"></div>

            <div class="col-12 col-md-4">
                <h4 class="fw-bold text-secondary text-center mb-5 mt-5"><img src="static/img/dmp_logo.png" alt=""></h4>
                
                        <div class="mb-3">
                            <label class="form-label">Email or Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div style="height: 50px;">
                            <button type="submit" class="btn w-100 btn-primary btn" id="login_btn">Login</button>
                            <button type="submit" id="loading" class="btn btn-primary w-100 disabled" style="display: none">
                                <div class="spinner-grow spinner-grow-sm m-1" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                        </div>
                        <div class="alert alert-danger text-center error" role="alert" style="display: none">
                        Please check your login Credentials
                        </div>
                        <div class="alert p-2 alert-secondary text-center success" id="loading" role="alert" style="display: none">
                        
                        </div>


            <div class="col-12 col-md-4">

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="jquery/login.js"></script>
</body>
</html>
