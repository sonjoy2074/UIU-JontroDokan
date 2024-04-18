<?php
function insert_category ($connect){
        if (isset($_POST['add'])) {
          $title = $_POST['cat_title'];
          // echo "<h1> {$title} </h1>";

          if ($title == "" || empty($title)) {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
      category name field cannot be empty or null
      </div>";
          } else {
            $query = "insert into post_categories(cat_title) ";
            $query .= "value('{$title}')";

            $res = mysqli_query($connect, $query);
            if ($res) {
              echo "<div class=\"alert alert-success\" role=\"alert\">
      {$title} added to categories!
      </div>";
            } else {
              die("query failed" . mysqli_error($connect));
            }
          }
        }
}


function update_category($connect)
{
  if(isset($_POST['update']))
  {
    $ed_cat_id = $_POST['update'];
    $ed_cat_title = $_POST['ed_cat_title'];

    $ed_query = "update post_categories set cat_title = '{$ed_cat_title}' where cat_id = {$ed_cat_id} ";

    $update_query = mysqli_query($connect, $ed_query);

    if(!$update_query)
    {
      die("query failed!" . mysqli_error($connect));
    }
  }
}


function delete_category($connect)
{
  if (isset($_GET['delete'])) {
    $del_cat_id = $_GET['delete'];
    // echo "<h1> {$del_cat_id} </h1>";

    $del_query = "delete from post_categories where cat_id = {$del_cat_id}";

    $del_res = mysqli_query($connect, $del_query);
    if (!$del_res) {
      die("Query failed" . mysqli_error($connect));
    }
  }
}
?>