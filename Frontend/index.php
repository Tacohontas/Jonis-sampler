<?php

$page = (isset($_GET['page']) ? $_GET['page'] : '');

switch ($page) {
  case "home":
    include("views/home.php");
    break;
  case "edit":
    include("views/edit.php");
    break;
  case "create";
    include("views/create.php");
    break;
  default:
    include("views/home.php");
}
