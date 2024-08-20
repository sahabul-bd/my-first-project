<?php    


include '../master/header.php';

$user_info_query = 'SELECT * FROM users';
$user_info=mysqli_query($db , $user_info_query);


?>
    <?php  if(isset($_SESSION["msg_login"])) { ?>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body text-center text-success">
                            <h3> <?= $_SESSION["msg_login"] ?> </h3>
                        </div>
                    </div>
                </div>
            </div>
    <?php } ;  unset($_SESSION["msg_login"])?>
                        <div class="row">
                            <div class="col">
                                <div class="page-description">
                                    <h1>Dashboard</h1>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                        <div class="card">
                                            <div class="card-header">
                                                USER INFORMATION
                                            </div>
                                         <div class="card-body" style="overflow-y:scroll; height:400px">  
                                        <div class="example-content">
                                                <table class="table">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <?php    
                                                            $num = 1;
                                                            $id=$_SESSION["author_id"];
                                                            foreach ($user_info as $user)  :
                                                                if($user['ID']== $id){
                                                                    continue;
                                                                }
                                                            
                                                            ?>
                                                            <th scope="row"><?= $num++; ?></th>
                                                            <td><?= $user['Name']?></td>
                                                            <td><?= $user['Email']?></td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                    </tbody>

                                                    <?php   
                                                     endforeach ;
                                                    
                                                    ?>
                                                </table>
                                            </div>
                                    </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>



<?php  
include '../master/footer.php';
?>