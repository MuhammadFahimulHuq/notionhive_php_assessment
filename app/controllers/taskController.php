<?php

namespace App\Controllers;

use App\Services\TaskService;



class TaskController
{

    private $taskService;
    public function __construct()
    {
        $this->taskService = new TaskService();

    }
    public function index()
    {
        require 'views/index.php';
    }
    public function indexTask1()
    {
        $ordersCategories = $this->taskService->fetchAllOrderCategory();
        $allCategories = $this->taskService->fetcthAllCategory();

        $data = [
            'ordersCategories' => $ordersCategories,
            'allCategories' => $allCategories
        ];
        require 'views/task1.php';
    }
    public function indexTask2()
    {
        $allCategories = $this->taskService->fetchAllParentCategory();

        $totalCategory = array_reduce($allCategories, fn($carry, $number) => $carry + $number['total_item']);

        require 'views/task2.php';
    }

    public function getChildCategoryDetails($query)
    {

        $parentID = isset($query['parentID']) ? $query['parentID'] : null;

        $childCategories = $this->taskService->fetchSingleChildCategory($parentID);


        echo json_encode($childCategories);

    }

}