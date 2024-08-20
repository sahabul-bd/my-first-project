<?php   

include "../master/header.php";


?>
    <?php  if(isset($_SESSION["msg_update"])) { ?>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body text-center text-success">
                            <h3> <?= $_SESSION["msg_update"] ?> </h3>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ;  unset($_SESSION["msg_update"])?>

        <div class="row">
            <div class="col-8">
                <div class="card" style="margin-left:300px;">
                    <div class="card-header">
                        UPDATE YOUR EMAIL

                    </div>
                    <div class="card-body">
                        <form action="../settings/manage_setting.php"  method="POST">
                            <div class="example-content">
                                <label for="exampleInputEmail1" class="form-label"></label>
                                <input type="text" name="new_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <?php  if (isset($_SESSION['emailError'])) : ?>
                                <div id="emailHelp" class="form-text text-danger"><?=$_SESSION['emailError']?></div>
                                <?php endif ; unset($_SESSION['emailError']) ?>
                            </div>
                             <button type="submit" name="update_btn_email" class="btn btn-primary m-r-xs mt-3"><i class="material-icons">add</i>Add</button>
 
                        </form>
                    </div>
                </div>
            </div>
        </div>


<?php   

include "../master/footer.php";

?>