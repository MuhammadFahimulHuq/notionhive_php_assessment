<?php include 'inc/header.php' ?>



<div class="w-20 mt-5 mx-auto" style="cursor: pointer">
    <p id="all_categories_button" class="pe-auto">All Categories (<span
            style="font-weight:500"><?= $totalCategory ?></span>) </p>
    <ul class="px-4" id="category_list">
        <?php foreach ($allCategories as $index => $data): ?>
            <li key="<?= $index ?>" onclick="getChildCategories(<?= $data['id'] ?>,<?= $index ?>)">
                <?= $data['name'] ?> (<span style="font-weight:500"><?= $data['total_item'] ?></span>)
            </li>
            <div id="childContainer<?= $index ?>" class="px-2"></div>
        <?php endforeach ?>
        </>

</div>
<script>
    document.getElementById('all_categories_button').addEventListener('click', function () {
        let categoryList = document.getElementById('category_list');
        if (categoryList.style.display === 'none') {
            categoryList.style.display = 'block';
        } else {
            categoryList.style.display = 'none';
        }
    });
    let childContainers = {};
    function getChildCategories(parentID, index) {
        // AJAX request to fetch child categories
        if (!childContainers[index]) {
            fetch('getChildCategory?parentID=' + parentID)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    return response.json();
                })
                .then(childCategories => {
                    // Example: Display child categories dynamically

                    let childCategoryList = document.createElement('ul');
                    childCategoryList.classList.add('child-categories');

                    childCategories.forEach(category => {
                        let childCategoryElement = document.createElement('li');
                        childCategoryElement.textContent = category.name + ' (' + category.total_item + ')';
                        childCategoryList.appendChild(childCategoryElement);
                    });

                    // Append child category list to the DOM
                    document.getElementById(`childContainer${index}`).appendChild(childCategoryList);

                })
                .catch(error => console.error('Error fetching child categories:', error));
            childContainers[index] = true;
        } else {
            let childContainer = document.getElementById(`childContainer${index}`);
            childContainer.innerHTML = '';
            childContainers[index] = false;

        }
    }


</script>
<?php include 'inc/footer.php' ?>