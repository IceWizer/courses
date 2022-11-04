<?php
ini_set('display_errors', 'on');

require_once '../repositories/ListeDeCourses.php';

// Check label is exist
if (!empty($_POST["label"]))
{
    ListeDeCourses::insert($_POST["label"]);
}

header("Location: ./");