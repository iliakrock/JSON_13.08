<?php

require_once "functions.php";

$action = $_GET['action'] ?? 'main';

switch ($action) {
    case "create":
        if (empty($_POST['name']) || empty($_POST['phone'])) {
            die("Name and phone should not be empty");
        }
        createContact($_POST['name'], $_POST['phone']);
        break;
    case "main":
    default:
        showTableForm();
        showContactBook();
        break;
}
