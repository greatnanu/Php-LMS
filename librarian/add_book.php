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
                        <h2>Add Books Info</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="post" action="" name="form1" class="col-lg-6" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tr>
                                    <td><input type="text" class="form-control" required placeholder="Books Name" name="bn"></td>
                                </tr>
                                <tr>
                                    
                                    <td>Browse for Image<input type="file" accept="image/*" required  name="fi"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" required placeholder="Books Author Name" name="ban"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" required placeholder="Books Publication Name" name="bpn"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" required placeholder="Books Purchase date" name="bpd"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" required placeholder="Books Price" name="bp"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" required placeholder="Books Quantity" name="bq"></td>
                                </tr> 
                                <tr>
                                    <td><input type="text" class="form-control" required placeholder="Availble Quantity" name="ba"></td>
                                </tr>  
                                <tr>
                                    <td><input type="submit" class="btn btn-default submit" name="submit1" value="Insert Books Details" style="background: blue; color: white;"></td>
                                </tr> 
                                
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
    if (isset($_POST['submit1'])) {
        $tm = md5(time());
        $fnm = $_FILES['fi']["name"];
        $dst = "./books_image/".$tm.$fnm;
        $dst1 = "books_image/".$tm.$fnm;
        move_uploaded_file($_FILES['fi']["tmp_name"], $dst);
        mysqli_query($link , "insert into add_book value('','$_POST[bn] ','$dst1','$_POST[ban]','$_POST[bpn]','$_POST[bpd]','$_POST[bp]','$_POST[bq]','$_POST[bq]','$_SESSION[librarian]')");
?>
<script type="text/javascript">
    alert("Book Insert Successfully");
</script>
<?php
    }
?>
<?php
include 'footer.php';
?>