<?php 
require_once "header.php";

    // database connection
    require_once "conn.php";
        
    $Username_s =  $_SESSION["Username"];
// $sql = "SELECT Email, Phone_Number, Path_Photo, Password FROM employees WHERE Username = ?";
$sql = "SELECT * FROM employees WHERE Username= '$Username_s' ";

    $result = mysqli_query($conn , $sql);

if(mysqli_num_rows($result) > 0 ){
   
    while($rows = mysqli_fetch_assoc($result) ){
           $Email = $rows["Email"];
           $Password = $rows["Password"];
           $Phone_Number = $rows["Phone_Number"];    

    }
}
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
 
            if( empty($_REQUEST["Phone_Number"]) ){
                $Phone_NumberErr = "<p style='color:red'> * NUMBER is required</p> ";
                $Phone_Number = "";
            }else {
                $Phone_Number = $_REQUEST["Phone_Number"];
            }


            if( empty($_REQUEST["Email"]) ){
                $EmailErr = "<p style='color:red'> * Email is required</p> ";
                $Email = "";
            }else{
                $Email = $_REQUEST["Email"];
            }

            if( empty($_REQUEST["Password"]) ){
                $PasswordErr = "<p style='color:red'> * Password is required</p> ";
                $Password = "";
            }else{
                $Password = $_REQUEST["Password"];
            }

            if( !empty(!empty($Phone_Number) && !empty($Password) && $Email) ){
            
                // database connection
                require_once "conn.php";
                $sql_select_query = "SELECT Email FROM employees WHERE Email = '$Email' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $emailErr = "<p style='color:red'> * Email Already Register</p>";
                } else{

                    
                    $sql = "UPDATE employees SET Email = '$Email', Phone_Number = '$Phone_Number', Password = '$Password' WHERE Username='$_SESSION[Username]' ";
                    
                    $result = mysqli_query($conn , $sql);
                
                }

            }
        }
?>

<div class="main-content">

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Изменить профиль</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="profile.php">Профиль</a></li>
                            <li class="breadcrumb-item active">Изменить профиль</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-center" style="margin-top: 25px;">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation" method="POST"
                            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="mb-3">
                                <label class="form-label">Почта:</label>
                                <div>
                                    <input type="email" class="form-control" value="<?php echo $Email; ?>" name="Email"
                                        required parsley-type="email" placeholder="Email" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Номер телефона:</label>
                                <div>
                                    <input data-parsley-type="number" value="<?php echo $Phone_Number; ?>"
                                        name="Phone_Number" type="text" class="form-control" required
                                        placeholder="Телефон" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Пароль:</label>
                                <div>
                                    <input data-parsley-type="password" value="<?php echo $Password; ?>" name="Password"
                                        type="password" class="form-control" required placeholder="Пароль" />
                                </div>
                            </div>

                            <div class="text-center">
                            <input type="submit" value="Сохранить" class="btn btn-success waves-effect waves-light" name="save_changes" >       
                       
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <?php
require_once "footer.php";
?>