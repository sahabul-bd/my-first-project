<?php   

include "../master/header.php";


?>
    <?php  if(isset($_SESSION["error"])) { ?>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body text-center text-success">
                            <h3> <?= $_SESSION["error"] ?> </h3>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ;  unset($_SESSION["error"])?>

        <div class="row">
            <div class="col-8">
                <div class="card" style="margin-left:300px;">
                    <div class="card-header">
                        UPDATE YOUR PASSWORD

                    </div>
                    <div class="card-body">
                        <form action="../settings/manage_setting.php"  method="POST">
                            <div class="example-content">
                                <label for="exampleInputEmail1" class="form-label">OLD PASSWORD</label>
                                <input type="password" name="old_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                <?php if(isset($_SESSION["old_error"])){ ?>
                                <div  class="form-text m-b-md text-danger"> <?= $_SESSION["old_error"] ?> </div>
                                <?php } unset($_SESSION["old_error"]) ?>


                                <label for="exampleInputEmail1" class="form-label">NEW PASSWORD</label>
                                <input type="text" name="new_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                <?php if(isset($_SESSION["new_error"])){ ?>
                                <div  class="form-text m-b-md text-danger"> <?= $_SESSION["new_error"] ?> </div>
                                <?php } unset($_SESSION["new_error"]) ?>

                                <label for="exampleInputEmail1" class="form-label">CONFIRM PASSWORD</label>
                                <input type="text" name="con_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                <?php if(isset($_SESSION["con_error"])){ ?>
                                <div  class="form-text m-b-md text-danger"> <?= $_SESSION["con_error"] ?> </div>
                                <?php } unset($_SESSION["con_error"]) ?>

                            </div>
                             <button type="submit" name="update_btn_pass" class="btn btn-primary m-r-xs mt-3"><i class="material-icons">add</i>Add</button>
 
                        </form>
                    </div>
                </div>
            </div>
        </div>


<?php   

include "../master/footer.php";

?>