<?php

$conn = mysqli_connect('localhost', 'root', '', 'easyfarm');

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}