<?php

header('coontent-type:text/html;charset=utf-8');

function getInfo() {
  $username = $_POST["username"];
  echo "username:"."$username";
}

// $_POST 超全局变量
getInfo();
