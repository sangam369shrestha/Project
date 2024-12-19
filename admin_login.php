<?php 
// die('test');
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
    session_start();
    if (isset($_SESSION['username'])){
        header('location:Admin Works/admin_main.php');
    }
    if (isset($_GET['msg']) && $_GET['msg'] == 1) {
        $err['failed'] = 'Please login to continue...';
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $err = [];
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
        } else {
            $err['failed'] = 'Please fill out the field';
        }
        if(count($err)==0){
            try{
            
                $conn = new mysqli('localhost', 'root', '', 'project_task_management_system');
                $query = "select * from admin where username = '$username' and password = '$password' ";
                $result = mysqli_query($conn, $query);
                print_r($result);
              
                
                if(mysqli_num_rows($result) == 1){
                    $user = mysqli_fetch_assoc($result);
                    session_start();
                    $_SESSION['username'] = $user['username'];
                    // $_SESSION['user'] == $user;
                    // if (isset($_POST['remember'])) {
                    //     setcookie('username',$user['username'],time()+(7*24*60*60));
                    //     setcookie('password',$user['password'],time()+(7*24*60*60));
                    // }
                    header('location:Admin Works/admin_main.php');
                    
                } else {
                    
                    $err['failed'] = "Invalid username or password";
                    
                }
            } catch(Exception $ex){
                die ('Error message: '.$ex->getMessage());
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            min-height: 100vh;
            background-color: #417ec8;
        }
        .conn{
            width: 100%;
            height: 100vh;
            display: grid;
            place-items: center;    
        }
        form{
            width: 300px;
        }
        form fieldset{
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: none;
            background-color:skyblue;
            border-radius: 10px;
            box-shadow: 4px 4px 4px darkblue;
        }
        fieldset:hover{
            box-shadow: 10px 10px 10px darkblue;
            transition: 0.3s;
        }
        p{
            margin-block: 50px;
            width: 80%;
            display: flex;
            justify-content: center;
            border-bottom: 2px solid;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
        }
        fieldset input[type=text]{
            width: 80%;
            color: darkblue;
            height: 40px;
            margin-top: 30px;
            border: none;
            background-color: skyblue;
            border-bottom: 1px solid;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
        }
        input[type=password]{
            width: 80%;
            margin-block: 30px;
            height: 40px;
            border: none;
            color: darkblue;
            background-color: skyblue;
            border-bottom: 1px solid;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
        }
        input[type=password]:focus, input[type=text]:focus{
            outline: none;
            border-bottom: 1px solid;
        }
        #login{
            width: 80%;
            height: 40px;
            margin-block: 50px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            border: none;
            border-radius: 10px;
            background-color: dodgerblue;
        }
        #login:hover{
            background-color: royalblue;
            cursor: pointer;
            transition: 0.5s;
            font-weight: bold;
        }
        .err{
            margin-block: 5%;
            color: red;
            font-family: verdana;
        }
    </style>
</head>
<body>
    <div class="conn">
    
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <fieldset>
                <p>Login Admin</p>
                <input type="text" name="username" id="username" placeholder="Enter your username">
                <input type="password" name="password" id="password" placeholder="Enter your password">
                <!-- <div class="rm">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div> -->
                <input type="submit" value="Log In" name="log-in" id="login">
                <span class="err"><?php echo isset($err['failed'])?$err['failed']:''; ?></span>
            </fieldset>
        </form>
    </div>
</body>
</html>

<!-- 
    register manager,
    login manager,
    manager dashboard,
    register employee,
    login employee,
    employee dashboard,
    create task,
-->