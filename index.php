<?php

$page = (isset($_GET['page']) ? $_GET['page'] : '');

switch ($page) {
  case "home":
    include("assets/views/home.php");
    break;
  case "edit":
    include("assets/views/edit.php");
    break;
  case "create";
    include("assets/views/create.php");
    break;
  default:
    include("assets/views/home.php");
}
