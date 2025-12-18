<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Smart Login Portal</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(120deg, #1d2671, #c33764);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: "Segoe UI", sans-serif;
    }

    .login-box {
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      max-width: 900px;
      width: 100%;
    }

    .left-panel {
      background: linear-gradient(135deg, #1d2671, #c33764);
      color: #fff;
      padding: 60px 30px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
    }

    .left-panel h2 {
      font-weight: bold;
    }

    .right-panel {
      padding: 40px 30px;
    }

    .nav-tabs .nav-link {
      color: #555;
      font-weight: 600;
    }

    .nav-tabs .nav-link.active {
      color: #c33764;
    }

    .form-control {
      border-radius: 30px;
      padding: 12px 20px;
    }

    .btn-login {
      border-radius: 30px;
      padding: 10px;
      font-weight: 600;
      background: linear-gradient(120deg, #1d2671, #c33764);
      color: #fff;
      border: none;
    }

    .btn-login:hover {
      opacity: 0.9;
    }

    .error-msg {
      color: red;
      font-size: 14px;
      margin-left: 10px;
    }
  </style>
</head>
<body>

<?php
$emailmsg="";
$pasdmsg="";
$msg="";
$ademailmsg="";
$adpasdmsg="";

if(!empty($_REQUEST['ademailmsg'])){ $ademailmsg=$_REQUEST['ademailmsg']; }
if(!empty($_REQUEST['adpasdmsg'])){ $adpasdmsg=$_REQUEST['adpasdmsg']; }
if(!empty($_REQUEST['emailmsg'])){ $emailmsg=$_REQUEST['emailmsg']; }
if(!empty($_REQUEST['pasdmsg'])){ $pasdmsg=$_REQUEST['pasdmsg']; }
if(!empty($_REQUEST['msg'])){ $msg=$_REQUEST['msg']; }
?>

<div class="login-box row no-gutters">

  <!-- Left Info Panel -->
  <div class="col-md-5 left-panel d-none d-md-block">
    <h2>Welcome to EWU Library</h2>
    <p class="mt-3">Your digital gateway to books, knowledge, and academic resources.</p>
  </div>

  <!-- Right Login Panel -->
  <div class="col-md-7 right-panel">
    <h4 class="text-center text-danger mb-3"><?php echo $msg; ?></h4>

    <ul class="nav nav-tabs justify-content-center mb-4" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#admin">Admin Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#student">Student Login</a>
      </li>
    </ul>

    <div class="tab-content">

      <!-- Admin Login -->
      <div id="admin" class="tab-pane fade show active">
        <form action="loginadmin_server_page.php" method="get">
          <div class="form-group">
            <input type="text" name="login_email" class="form-control" placeholder="Admin Email">
            <span class="error-msg"><?php echo $ademailmsg; ?></span>
          </div>
          <div class="form-group">
            <input type="password" name="login_pasword" class="form-control" placeholder="Password">
            <span class="error-msg"><?php echo $adpasdmsg; ?></span>
          </div>
          <button type="submit" class="btn btn-login btn-block">Login as Admin</button>
        </form>
      </div>

      <!-- Student Login -->
      <div id="student" class="tab-pane fade">
        <form action="login_server_page.php" method="get">
          <div class="form-group">
            <input type="text" name="login_email" class="form-control" placeholder="Student Email">
            <span class="error-msg"><?php echo $emailmsg; ?></span>
          </div>
          <div class="form-group">
            <input type="password" name="login_pasword" class="form-control" placeholder="Password">
            <span class="error-msg"><?php echo $pasdmsg; ?></span>
          </div>
          <button type="submit" class="btn btn-login btn-block">Login as Student</button>
        </form>
      </div>

    </div>
  </div>
</div>

</body>
</html>
