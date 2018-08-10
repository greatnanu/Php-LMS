<?php
session_start();
if (!isset($_SESSION['librarian'])) {
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
    
}
include'../student/connection.php';
include'header.php';
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
                        <h2>Return Books</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form name="form1" method="post" action="">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <select name="enr" class="form-control">
                                            <?php
                                                $res = mysqli_query($link ,"select student_enrollment from issue_books where books_return_date =''");
                                                while ($row= mysqli_fetch_array($res)) {
                                                    echo '<option>'.$row["student_enrollment"].'</option>';
                                                    
                                                }

                                            ?>
                                        </select>
                                    </td>
                                    <td><input type="submit" name="submit1" value="Search" class="form-control" style="background: blue ;color: white"></td>
                                </tr>
                                
                            </table>
                            
                        </form>
                        <?php
                        if (isset($_POST['submit1'])) {
                            $res = mysqli_query($link , "select * from issue_books where student_enrollment = '$_POST[enr]'");
                            echo '<table class="table table-bordered"><tr>';
                            echo '<th> Student Enrollment</th>';
                            echo '<th> Student Name</th>';
                            echo '<th> Student Sem</th>';
                            echo '<th> Student Contact</th>';
                            echo '<th> Student Email</th>';
                            echo '<th> Books Name</th>';
                            echo '<th> Book Issue date</th>';
                            echo '<th> Return Book</th>';
                            echo '</tr>';
                            while ($row  = mysqli_fetch_array($res)) {
                                echo '<tr><td>'.$row["student_enrollment"].'</td>';
                                echo '<td>'.$row["student_name"].'</td>';
                                echo '<td>'.$row["student_sem"].'</td>';
                                echo '<td>'.$row["student_contact"].'</td>';
                                echo '<td>'.$row["student_email"].'</td>';
                                echo '<td>'.$row["books_name"].'</td>';
                                echo '<td>'.$row["books_issue_date"].'</td>';
                                echo '<td>';?><a href="return.php?id=<?php echo $row["id"]?>" class= " ">Return Book</a><?php echo '</td>';

                                
                            }
                            
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