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
                        <h2>Students Owing This Book</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                            $res= mysqli_query($link , "select * from issue_books where books_name = '$_GET[books_name]' && books_return_date = ''");
                            echo '<table class = "table table-bordered">';
                            echo '<tr><th> Student Name</th>';
                            echo '<th> Student Enrollment </th>';
                            echo '<th> Books Name </th>';
                            echo '<th> Student Email </th>';
                            echo '<th> Student Contact </th>';
                            echo '<th> Student Book Issue date</th></tr>';
                            while ($row = mysqli_fetch_array($res)) {
                                echo '<tr><td>' .$row["student_name"].'</td>';
                                echo '<td> ' .$row["student_enrollment"].'</td>';
                                echo '<td> ' .$row["books_name"].'</td>';
                                echo '<td> ' .$row["student_email"].'</td>';
                                echo '<td> ' .$row["student_contact"].'</td>';
                                echo '<td>' .$row["books_issue_date"].'</td></tr>';
                                
                                
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