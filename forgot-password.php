<?php
session_start();
// optional: include your session.php if needed
// include 'session.php';
$msg = $_SESSION['fp_msg'] ?? null;
unset($_SESSION['fp_msg']);
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Forgot Password • Danielle Motor Parts</title>
  <link href="assets/css/theme.min.css" rel="stylesheet">
  <link href="assets/css/user.min.css" rel="stylesheet">
</head>
<body>
<main class="main" id="top">
  <div class="container-fluid bg-300 dark__bg-1200">
    <div class="row flex-center min-vh-100 g-0 py-5">
      <div class="col-11 col-sm-10 col-xl-6">
        <div class="card border border-200 auth-card">
          <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
              <a class="d-flex flex-center text-decoration-none mb-3" href="/login.php">
                <img src="uploads/dmp_logo.png" alt="logo" width="160">
              </a>
              <h3 class="text-1000 mb-1">Forgot Password</h3>
              <p class="text-700">Enter your username and email to request a reset link.</p>
            </div>

            <?php if ($msg): ?>
              <div class="alert alert-info" role="alert"><?= htmlspecialchars($msg) ?></div>
            <?php endif; ?>

            <form method="post" action="/send-reset.php" autocomplete="off">
              <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" name="username" type="text" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="user_email">Email</label>
                <input class="form-control" id="user_email" name="user_email" type="email" required>
              </div>
              <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Send Reset Link</button>
                <a class="btn btn-outline-secondary" href="/login.php">Back to Sign In</a>
              </div>
            </form>

            <!-- <p class="mt-3 text-700 fs--1">
              We’ll always respond with a generic message for security.
            </p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="assets/js/phoenix.js"></script>
</body>
</html>
