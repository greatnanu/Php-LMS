<?php
session_start();
if (!isset($_SESSION['librarian'])) {
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
    
}
include'header.php';
include'../student/connection.php';
?>
<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Display and Search Books</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form name="form1" action="" method="post">
                            <input type="text" name="t1" class="form-control" placeholder="Enter Book Name">
                            <input type="submit" name="submit1" value="Search Books" class="btn btn-default">
                            
                        </form>
                        <?php 
                        if (isset($_POST['submit1'])) {
                            $res = mysqli_query($link , "select * from add_book where books_name like ('$_POST[t1]%') ");
                            echo '<table class = "table table-bordered">';
                            echo '<tr><th> Book Image </th>';
                            echo '<th> Book Name </th>';
                            echo '<th> Author Name </th>';
                            echo '<th> Publication Name </th>';
                            echo '<th> Purchase Date </th>';
                            echo '<th> Book Price</th>';
                            echo '<th> Book Quantity </th>';
                            echo '<th> Availble Quantity </th>';
                            echo '<th> Delete Books  </th></tr>';
                            while ($row = mysqli_fetch_array($res)) {
                                echo '<tr><td>  '?><img src="<?php echo $row['books_image'];?>" height = "100" width = "100" > <?php echo '</td>';
                                echo '<td> '.$row['books_name'].'</td>';
                                echo '<td> '.$row['books_author_name'].' </td>';
                                echo '<td>  '.$row['books_publication_name'].'</td>';
                                echo '<td>  '.$row['books_purchase_date'].'</td>';
                                echo '<td> '.$row['books_price'].' </td>';
                                echo '<td> '.$row['books_qty'].'</td>';
                                echo '<td> '.$row['availble_qty'].'</td>';
                                echo '<td> ';?>
                                <a href="delete_books.php?id=<?php echo $row['id']?>" class= "btn btn-danger">Delete Books</a>
                                <?php echo '</td></tr>';
                                
                            }
                            echo '</table>';
                            
                        }else{
                            $res = mysqli_query($link , "select * from add_book ");
                            echo '<table class = "table table-bordered">';
                            echo '<tr><th> Book Image </th>';
                            echo '<th> Book Name </th>';
                            echo '<th> Author Name </th>';
                            echo '<th> Publication Name </th>';
                            echo '<th> Purchase Date </th>';
                            echo '<th> Book Price</th>';
                            echo '<th> Book Quantity </th>';
                            echo '<th> Availble Quantity </th>';
                            echo '<th> Delete Books  </th></tr>';
                            while ($row = mysqli_fetch_array($res)) {
                                echo '<tr><td>  '?><img src="<?php echo $row['books_image'];?>" height = "100" width = "100" > <?php echo '</td>';
                                echo '<td> '.$row['books_name'].'</td>';
                                echo '<td> '.$row['books_author_name'].' </td>';
                                echo '<td>  '.$row['books_publication_name'].'</td>';
                                echo '<td>  '.$row['books_purchase_date'].'</td>';
                                echo '<td> '.$row['books_price'].' </td>';
                                echo '<td> '.$row['books_qty'].'</td>';
                                echo '<td> '.$row['availble_qty'].'</td>';
                                echo '<td> ';?>
                                <a href="delete_books.php?id=<?php echo $row['id']?>" class= "btn btn-danger">Delete Books</a>
                                <?php echo '</td></tr>';
                                
                            }
                            echo '</table>';
                            
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include 'footer.php';
?>