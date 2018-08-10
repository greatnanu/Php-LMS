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
                        <h2>Plain Page</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                            $res= mysqli_query($link , "select * from student_registration");
                            echo '<table class = "table table-bordered">';
                            echo '<tr><th> First Name </th>';
                            echo '<th> Last Name </th>';
                            echo '<th> User Name </th>';
                            echo '<th> Email </th>';
                            echo '<th> Contact </th>';
                            echo '<th> Sem </th>';
                            echo '<th> Enrollment Number </th>';
                            echo '<th> Status </th>';
                            echo '<th> Approve</th>';
                            echo '<th> Deny </th></tr>';
                            while ($row = mysqli_fetch_array($res)) {
                                echo '<tr><td>' .$row["firstname"].'</td>';
                                echo '<td> ' .$row["lastname"].'</td>';
                                echo '<td> ' .$row["username"].'</td>';
                                echo '<td> ' .$row["email"].'</td>';
                                echo '<td> ' .$row["contact"].'</td>';
                                echo '<td>' .$row["sem"].'</td>';
                                echo '<td> ' .$row["enrollment"].'</td>';
                                echo '<td> ' .$row["status"].'</td>';
                                echo '<td>';?> <a class="btn btn-success" href="approve.php?id=<?php echo $row['id'];?>">Approve</a> <?php echo'</td>';
                                echo '<td>';?> <a class="btn btn-danger" href="deny.php?id=<?php echo $row['id'];?>">Deny</a> <?php echo'</td></tr>';
                                
                                
                            }
                            echo '</table>';
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