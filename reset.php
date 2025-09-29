<?php include 'session.php'?>
<?php

require __DIR__ . '/database/database.php';

$db = $db ?? ($mysqli ?? ($conn ?? null));
if (!$db) { http_response_code(500); die('DB connection not available.'); }
@$db->set_charset('utf8mb4');

$token = $_GET['token'] ?? '';
if (!preg_match('/^[a-f0-9]{64}$/', $token)) { http_response_code(400); die('Invalid token.'); }

$stmt = $db->prepare("SELECT username, user_email, expires_at, used FROM password_resets WHERE token=? LIMIT 1");
$stmt->bind_param('s', $token);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
$stmt->close();

if (!$row) { http_response_code(404); die('Token not found.'); }
if ((int)$row['used'] === 1) { http_response_code(410); die('Token already used.'); }
if (new DateTime() > new DateTime($row['expires_at'])) { http_response_code(410); die('Token expired.'); }
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <title>Reset Password • Danielle Motor Parts</title>
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
              <img src="uploads/dmp_logo.png" width="160" alt="">
              <h3 class="mt-3">Set a New Password</h3>
              <p class="text-700">for <strong><?= htmlspecialchars($row['username']) ?></strong></p>
            </div>

            <form method="post" action="/do-reset.php">
              <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
              <div class="mb-3">
                <label class="form-label" for="p1">New Password</label>
                <input class="form-control" id="p1" name="password" type="password" minlength="8" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="p2">Confirm Password</label>
                <input class="form-control" id="p2" name="password_confirm" type="password" minlength="8" required>
              </div>
              <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Update Password</button>
                <a class="btn btn-outline-secondary" href="/login.php">Back to Sign In</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="assets/js/phoenix.js"></script>
</body>
</html>
