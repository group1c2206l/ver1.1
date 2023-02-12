<?php
    require "../classlist.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php
            if(isset($_GET["select"])) {
                $select = $_GET["select"];
                switch($select) {
                    case "role":
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center">Add new roles</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label  for="user_name">User name</label>
                                            <input type="text" class="form-control" id="user_name" name="user_name">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category_code">Password</label>
                                            <input type="password" class="form-control" id="password_hash" name="password_hash">
                                        </div>

                                        <button type="submit" class="btn btn-primary mb-2" name="save" value="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=role">Back</a></button>
                                        <span><?php echo $mes ?></span>
                                    </form>
                                </div>';
                        if(isset($_POST["save"])) {
                            if(isset($_POST["user_name"]) && isset($_POST["password_hash"])) {
                                $r = new role;
                                $r->user_name = $_POST["user_name"];
                                $r->password_hash = sha1($_POST["password_hash"]);
                                $r->addnew();
                                header("location: dashboard.php?select=role");
                            }
                        }
                    break;

                    case "branch":
                        echo   '<div class="mt-5 num">
                                    <h3 class="text-center">Add new Branch</h3>
                                    <form action=""  method="POST">
                                        <div class="form-group mb-3 mt-6">
                                            <label for="category_name">Branch name</label>
                                            <input type="text" class="form-control" id="category_name" name="branch_name">
                                        </div>
                                        <div class="form-group mb-3 mt-6">
                                            <label for="category_name">Address</label>
                                            <input type="text" class="form-control" id="category_name" name="address">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category_code">Hotline</label>
                                            <input type="text" class="form-control" id="category_code" name="hotline">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2" name="save">Save</button>
                                        <button  class="btn btn-primary mb-2"> <a class="text-light" href="dashboard.php?select=branch">Back</a></button>
                                        <span><?php echo $mes ?></span>
                                    </form>
                                </div>';
                        if(isset($_POST["save"])) {
                            if(isset($_POST["branch_name"]) && isset($_POST["address"]) && isset($_POST["hotline"])) {
                                
                                $b = new branch;
                                $b->name = $_POST["branch_name"];
                                $b->address = $_POST["address"];
                                $b->hotline = $_POST["hotline"];
                                $b->addnew();
                                header("location: dashboard.php?select=branch");
                            }
                        }
                    break;

                }
            }
        ?>
    </div>
</body>
</html>
