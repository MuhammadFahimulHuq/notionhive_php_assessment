<?php include 'inc/header.php' ?>



<div class="d-flex justify-content-evenly mt-5">
    <div>
        <h3>All Order Category with total items</h3>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Total Items</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['ordersCategories'] as $category): ?>
                    <tr>

                        <td><?= $category['name'] ?></td>
                        <td><?= $category['total_items'] ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div>
        <h3>All Category with total items</h3>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Total Items</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['allCategories'] as $category): ?>
                    <tr>

                        <td><?= $category['name'] ?></td>
                        <td><?= $category['total_items'] ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>



<?php include 'inc/footer.php' ?>