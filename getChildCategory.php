<?php
require_once 'vendor/autoload.php';

use App\Controllers\TaskController;

$controller = new TaskController();
$parentID = isset($_GET['parentID']) ? $_GET['parentID'] : null;
// echo ($parentID);
if ($parentID !== null) {
    $childCategories = $controller->getChildCategoryDetails($parentID);
    echo json_encode($childCategories);
}

