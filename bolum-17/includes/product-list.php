<table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 35px;">id</th>
                    <th>title</th>
                    <th>price</th>
                    <th>description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($product->getProducts() as $item) : ?>

                    <tr>
                        <td><?php echo $item->id ?></td>
                        <td><?php echo $item->title ?></td>
                        <td><?php echo $item->price ?></td>
                        <td><?php echo $item->description ?></td>
                        <td style="width: 121px;">
                            <a href="edit-product.php?id=<?php echo $item->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete-product.php?id=<?php echo $item->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>