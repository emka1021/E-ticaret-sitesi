</tbody>
</table>
<h3 class="text-center text-success">Tüm Ürünler</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Ürün ID</th>
            <th>Ürün Adı</th>
            <th>Ürün Resmi</th>
            <th>Ürün Fiyatı</th>
            <th>Satış Durumu</th>
            <th>Düzenle</th>
            <th>Sil</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>
        <?php
        $get_products = "SELECT * FROM `products`";
        $result = mysqli_query($con, $get_products);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $number++;
            ?>
            
            <tr class='text-center'>
               <td><?php echo $number;?></td>
               <td><?php echo $product_title;?></td>
               <td><img src='./product_images/<?php echo $product_image1;?>' class='product_img'/></td>
               <td><?php echo $product_price;?></td>
               <td><?php 
                              echo "Satılmadı";

               ?></td>
               <td><a href='index.php?edit_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
               <td><a href='index.php?delete_product=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>