<?php

namespace App\Services;

use App\Config\Database;


class TaskService
{


    use Database;

    public function fetchAllOrderCategory()
    {

        $query = 'SELECT name , COUNT(item_category_relations.ItemNumber) AS total_items 
        FROM item 
        RIGHT JOIN item_category_relations ON item_category_relations.ItemNumber = item.Number 
        RIGHT JOIN category ON category.id = item_category_relations.categoryId 
        GROUP BY name 
        ORDER BY total_items DESC';
        return $this->executeQuery($query);

    }
    public function fetcthAllCategory()
    {
        $query = 'SELECT c.Name AS name, COUNT(icr.ItemNumber) AS total_items 
        FROM category c LEFT JOIN Item_category_relations icr ON c.Id = icr.categoryId 
        LEFT JOIN item i ON icr.ItemNumber = i.Number
        WHERE i.StockOrdered > 0 
        GROUP BY name 
        ORDER BY total_items DESC';
        return $this->executeQuery($query);

    }
    public function fetchAllParentCategory()
    {
        $query = 'SELECT category.id as id,  category.name AS name , COUNT(item_category_relations.ItemNumber) AS total_item
         FROM category LEFT JOIN catetory_relations ON category.id = catetory_relations.ParentcategoryId 
         LEFT JOIN item_category_relations ON catetory_relations.categoryId = item_category_relations.categoryId 
         LEFT JOIN item ON item_category_relations.ItemNumber = item.Number 
         GROUP BY catetory_relations.ParentcategoryId 
         ORDER BY total_item DESC';
        return $this->executeQuery($query);
    }
    public function fetchSingleChildCategory($parentID)
    {
        $query = "SELECT category.name as name , COUNT(name) as total_item
                    FROM category 
                    LEFT JOIN catetory_relations ON category.id = catetory_relations.categoryId 
                    LEFT JOIN item_category_relations ON catetory_relations.categoryId = item_category_relations.categoryId 
                    LEFT JOIN item ON item_category_relations.ItemNumber = item.Number 
                    WHERE catetory_relations.ParentcategoryId = :parentID
                    GROUP BY name
                    ORDER BY total_item DESC";


        return $this->executeQuery($query, [':parentID' => $parentID]);
    }



}