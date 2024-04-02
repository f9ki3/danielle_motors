<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Loading Animation</title>
<style>
body, html {
  /* background-color: #1c2020; */
  height: 100%;
  position: relative;
  overflow: hidden;
}

.loader {
  margin: 0 auto;
  width: 60px;
  height: 50px;
  text-align: center;
  font-size: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translateY(-50%) translateX(-50%);
}
.loader > div {
  height: 100%;
  width: 8px;
  display: inline-block;
  float: left;
  margin-left: 2px;
  animation: delay 0.8s infinite ease-in-out;
}
.loader .bar1 {
  background-color: #754fa0;
}
.loader .bar2 {
  background-color: #09b7bf;
  animation-delay: -0.7s;
}
.loader .bar3 {
  background-color: #90d36b;
  animation-delay: -0.6s;
}
.loader .bar4 {
  background-color: #f2d40d;
  animation-delay: -0.5s;
}
.loader .bar5 {
  background-color: #fcb12b;
  animation-delay: -0.4s;
}
.loader .bar6 {
  background-color: #ed1b72;
  animation-delay: -0.3s;
}

@keyframes delay {
  0%, 40%, 100% {
    transform: scaleY(0.05);
  }
  20% {
    transform: scaleY(1);
  }
}
</style>
</head>
<body>

<div id="loading" class="loader">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
  <div class="bar4"></div>
  <div class="bar5"></div>
  <div class="bar6"></div>
</div>

<?php
// Include your PHP code here
// include("store_stocks_add.php");
?>

</body>
</html>
