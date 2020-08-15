<?php
require_once "functions.php";

showHTML();

if (!is_null($_POST['number'] ?? null)) {
    makeGuess();
}
