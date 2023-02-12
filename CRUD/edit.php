<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit</title>
</head>
<body>
    <div class="container">

<?php
    require "../classlist.php";

    if(isset($_GET["edit_id"])) {
        $edit_id = $_GET["edit_id"];
        
    }

    switch($edit_id) {
        case "role":

            echo   '<div class="mt-5 num">
                        <h3 class="text-center">Change Password</h3>
                        <form action=""  method="POST">
                            <div class="form-group mb-3 mt-6">
                                <label  for="brand_name">User name</label>
                                <input type="text" class="form-control" id="brand_name" name="user_name" value="'.$_GET["user_name"].'" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category_code">Current Password</label>
                                <input type="text" class="form-control" id="country" name="current_password">
                            </div>
                            <div class="form-group mb-3">
                                <label for="category_code">New Password</label>
                                <input type="text" class="form-control" id="country" name="new_password">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2" name="save" value="save">Save</button>
                            <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=role">Back</a></button>
                            <span><?php echo $mes ?></span>
                        </form>
                    </div>';

            $p = new role;
            if(isset($_GET["role_id"])) {
                $p->role_id = $_GET["role_id"];
            }
            if(isset($_GET["user_name"])) {
                $p->user_name = $_GET["user_name"];
            }
            if(isset($_POST["save"])) {
                if(isset($_POST["current_password"]) && isset($_POST["new_password"]) ) {
                    $p->password_hash = sha1($_POST["current_password"]);
                    $p->new_password_hash = sha1($_POST["new_password"]);
                    if($p->check_current_pass()) {   //kiem tra current password
                        if($p->regexp($_POST["new_password"])) {
                            $p->edit();
                            header("location: dashboard.php?select=role");
                        } else {
                            echo "password chi su dung chu thuong, chu hoa , chu so va @";
                        }
                    } else {
                        echo "password hien tai khong chinh xac";
                    }
                    
                } else {
                    echo "Nhap day du thong tin";
                }
            }
            break;

            case "branch":
                $p = new branch;
                $mes = '';
                if(isset($_GET["branch_id"])) {
                    $p->branch_id = $_GET["branch_id"];
                }
                if(isset($_POST["save"])) {
                    if(isset($_POST["name"])) {
                        $p->name = $_POST["name"];
                    }
                    if(isset($_POST["address"])) {
                        $p->address = $_POST["address"];
                    }
                    if(isset($_POST["hotline"])) {
                        $p->hotline = $_POST["hotline"];
                    }
                    if($p->name != "" && $p->address != "" && $p->hotline != "") {
                        $p->edit();
                        header("location: dashboard.php?select=branch");
                    } else {
                        $mes = "please input full information";
                    }
                }

                echo   '<div class="mt-5 num">
                            <h3 class="text-center">Edit Branch</h3>
                            <form action=""  method="POST">
                                <div class="form-group mb-3 mt-6">
                                    <label  for="brand_name">Branch name</label>
                                    <input type="text" class="form-control"  name="name" value="'.$_GET["name"].'" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category_code">Address</label>
                                    <input type="text" class="form-control"  name="address" value="'.$_GET["address"].'">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category_code">Hotline</label>
                                    <input type="text" class="form-control"  name="hotline" value="'.$_GET["hotline"].'">
                                </div>

                                <button type="submit" class="btn btn-primary mb-2" name="save" value="save">Save</button>
                                <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=branch">Back</a></button>
                                <span>'.$mes.'</span>
                            </form>
                        </div>';

                        
        
    }





?>


    </div>
</body>
</html>



