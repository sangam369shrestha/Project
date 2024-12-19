
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin-style.css">
    
</head>
<body>
   
        
            <nav>
                <ul class="onmob">
                    <li onclick=hide()><i class="fa-solid fa-xmark"></i></li>
                    <li class="onM"><a href="#">Home</a></li>
                    <li class="onM"><a href="man_insert.php">Register Manager</a></li>
                    <li class="onM"><a href="department_register.php">Create Department</a></li>
                </ul>
                <ul class="onDesk">
                    <li class="logo"><p>Task Info</p></li>
                    <li class="onlyOnDesktop"><p>Admin Dashboard</p></li>
                    <li class="onlyOnDesktop"><a href="man_insert.php" name="reg">Register Manager</a></li>
                    <li class="onlyOnDesktop"><a href="department_register.php">Create Department</a></li>
                    
                    <li class="accountOption"><i class="fa-solid fa-user"></i></li>
                    <li onclick=show()><i class="fa-solid fa-bars"></i></li>
                </ul>
            </nav>
       
            <script>
                function show() {
                    var x = document.querySelector('.onmob');
                    x.style.display = "flex";
                }
                function hide(){
                    var x = document.querySelector('.onmob');
                    x.style.display = "none";
                }
                $(document).ready(function(){
                    $('.accountOption').click(function(){
                        $('.accOption').toggle();
                    });
                });
            </script>
    
        
        
</body>
</html>