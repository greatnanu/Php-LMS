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
                        <h2>Issue Books</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="post" action="" name="form1">
                            <table>
                                <tr>
                                    <td>
                                        <select name="enr" class="form-control selectpicker" >
                                            <?php
                                                $res= mysqli_query($link, "select enrollment from student_registration");
                                                while ($row = mysqli_fetch_array($res)) {
                                                    echo '<option>'.$row['enrollment'].'</option>';
                                                    
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    <td><input type="submit" name="submit1" class="form-control btn btn-default" value="Search" style="margin-top: 5px;"></td>
                                    <td></td>
                                </tr>
                            </table>
                        <?php
                            if (isset($_POST['submit1'])) {
                                $res = mysqli_query($link , "select * from student_registration where enrollment = '$_POST[enr]' ");
                                while ($row = mysqli_fetch_array($res)) {
                                    $firstname = $row["firstname"];
                                    $lastname = $row["lastname"];
                                    $username = $row["username"];
                                    $email = $row["email"];
                                    $contact = $row["contact"];
                                    $sem = $row["sem"];
                                    $enrollment = $row["enrollment"];
                                    $_SESSION['senrollment']=$enrollment;
                                    $_SESSION['susername']=$username;
                                    
                                }
                                
                        ?>
                            <table class="table table-bordered">
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Enrollment Number" name="enrollment" value="<?php echo  $enrollment ;?>" disabled="" ></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Student Name" name="studentname" value="<?php echo  $firstname ." ".$lastname ;?>"  required></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Student Sem" name="studentsem"value="<?php echo  $sem ;?>"  required></td>
                                </tr> 
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Student Contact" name="studentcontact" value="<?php echo  $contact ;?>" required></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Student Email" name="studentemail" value="<?php echo  $email ;?>"  required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="booksname" class="form-control selectpicker">
                                            <?php
                                                $res = mysqli_query($link, "select books_name from add_book");
                                                while ($row = mysqli_fetch_array($res)) {
                                                    echo '<option>'.$row['books_name'].'</option>';
                                                    
                                                }
                                            ?>
                                            
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Book Issue date" name="bookissuedate" value="<?php echo date("d-m-Y"); ;?>"  required></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Student UserName" name="studentusername" value="<?php echo  $username ;?>" disabled></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="form-control btn btn-default" name="submit2" value="Issue books" style="background: blue;color: white;"></td>
                                </tr>

                                
                            </table>
                        <?php
                                
                            }
                        ?>
                        </form>
                        <?php
                            if (isset($_POST['submit2'])) {
                                $qty= 0;
                                $res =mysqli_query($link, "select * from add_book where books_name ='$_POST[booksname]'");
                                while ($row= mysqli_fetch_array($res)) {
                                    $qty = $row['availble_qty'];
                                    
                                }
                                if ($qty==0) {
                                    ?>
                                    <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                        <strong style="...">
                                            Out Of Stock
                                            
                                        </strong>
                                    </div>
                                    <?php 

                                    
                                }else{
                                mysqli_query($link, "insert into issue_books value('','$_SESSION[senrollment] ','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[booksname]','$_POST[bookissuedate]','','$_SESSION[susername]')");
                                mysqli_query($link, "update add_book set availble_qty = availble_qty-1 where books_name ='$_POST[booksname]' ");
                                ?>
                                <script type="text/javascript">
                                   alert("Book issued successfully")
                                   window.location.href = window.location.href;
                                </script>
                                <?php
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