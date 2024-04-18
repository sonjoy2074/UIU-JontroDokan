<?php 

    $item_image = "";
    $item_image = "";
    
    if (isset($_GET['delete'])) {
        // Perform delete action
        $item_id = $_GET['delete'];

        $sql = "DELETE FROM `lab_item_order` WHERE `lab_item_id` = {$item_id}";
        $del_res = mysqli_query($connect, $sql);

        $sql = "DELETE FROM `lab_items` WHERE `item_id` = {$item_id}";
        
        $del_res = mysqli_query($connect, $sql);
        if (!$del_res) {
            die("Query failed" . mysqli_error($connect));
            }
      }else if (isset($_GET['update'])) {
        
        $item_id = $_GET['update'];
      }else if(isset($_GET['edit_item'])){
        $item_id = $_GET['item_id'];
      }
?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Products
    </div>
    <div class="card-body">

        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Net Units</th>
                    <th>Available Units</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>Id</th>
                    <th>Product Name</th>
                    <th>Available Units</th>
                    <th>Net Units</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $query = "SELECT * FROM `lab_items`";
                $response = mysqli_query($connect, $query);

                $count_row = mysqli_num_rows($response);
                if ($count_row == 0) {
                ?>

                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>


                    <?php
                } else {
                    while ($rows = mysqli_fetch_assoc($response)) {
                        $item_id = $rows['item_id'];
                        $item_name = $rows['item_name'];
                        $net_units = $rows['unit_history'];
                        $available_units = $rows['available_units'];
                        $image = $rows['item_image'];
                        $tag = $rows['tag'];
                        $item_details = $rows['item_details'];
                        

                    ?>
                        <tr>
                            <td><?php echo $item_id; ?></td>
                            <td><?php echo $item_name; ?></td>
                            <td><?php echo $net_units; ?></td>
                            <td><?php echo $available_units; ?></td>
                            <td><img src="../lab_support/image/<?php echo $image; ?>" alt="no_img" style="height: 50px; width:50px;"></td>
                            <td><?php echo $tag; ?></td>

                            <td colspan="2" class="text-center">
                                <a class="btn btn-sm btn-primary" type="submit" name="item_edit" href="../admin/labSupport.php?edit_item=edit_item&item_id=<?php echo $item_id; ?>">Edit</a>

                                <a class="btn btn-sm btn-success ms-2" type="submit" name="item_update" href="../admin/labSupport.php?update=<?php echo $item_id; ?>"> Update</a>
                                
                                <a class="btn btn-sm btn-danger ms-2" type="submit" name="item_delete" href="../admin/labSupport.php?delete=<?PHP echo $item_id ?>"> Delete</a>
                                
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>

            </tbody>
        </table>
        <?php
        if (isset($_GET['update']) ) {
            $item_id = $_GET['update'];
            if(isset($_POST['update_available_units_submit'])){
        
                $available_units = $_POST['available_units'];
                try{
                $sql = "UPDATE lab_items SET available_units={$available_units} WHERE item_id = '{$item_id}'";
                
                
                
                $del_res = mysqli_query($connect, $sql);
                }
                catch (mysqli_sql_exception $e) { 
                var_dump($e);
                exit; 
                } 
                header("Refresh:0");
            }
            include "update_lab_item.php";
        }else if(isset($_GET['edit_item'])){
            $item_id = $_GET['item_id'];
            include "edit_lab_item.php";

        }
            
        ?>
    </div>
</div>

