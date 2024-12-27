<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:../manager_login.php?msg=1');
   
    }
 ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../ui-style.css">
    
</head>
<body>
            <nav>
               
                <ul class="onDesk">
                    <li class="logo"><p>Task Info</p></li>
                    <li class="onlyOnDesktop"><p>Manager</p></li>
                   
                    <li class="accountOption"><i class="fa-solid fa-user"></i></li>
                    <!-- <li onclick=show()><i class="fa-solid fa-bars"></i></li> -->
                    <button><a href="../logout.php">Log Out</a></button>

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