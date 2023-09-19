<?php

session_start();
session_destroy();

header('Location: /src/home/home.php');