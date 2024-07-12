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

    public function indexTask1(): array
    {
        $ordersCategories = $this->taskService->fetchAllOrderCategory();
        $allCategories = $this->taskService->fetcthAllCategory();

        $data = [
            'ordersCategories' => $ordersCategories,
            'allCategories' => $allCategories
        ];
        return $data;
    }
    public function indexTask2()
    {
        $allCategories = $this->taskService->fetchAllParentCategory();

        return $allCategories;
    }

    public function getChildCategoryDetails($parentID)
    {
        $childCategories = $this->taskService->fetchSingleChildCategory($parentID);
        return $childCategories;
    }
}