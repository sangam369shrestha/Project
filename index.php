<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="jquery-3.7.1 (1).js"></script> -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script>
        $(document).ready(function(){
            $(".log_in").click(function(){
                 $(".cat").toggle();
            })
        })
    </script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            min-height: 100vh;
            width:100%;
            background-color: #417ec8;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-size: cover;
            background-repeat: no-repeat;
        }
        nav{
            width: 100%;
            position: fixed;
            background-color:rgb(86, 88, 93);
            box-shadow: 2px, 3px, 3px, 2px, black;
            border-bottom: 1px solid;
        }
        nav ul{
            width: 100%;
            list-style: none;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        nav ul .hideOnMobile{
            height: 80px; 
        }
        /* nav .navigation .def{
            margin-right: 20%;
            display: flex;
            align-items: center;
        } */
        .def p{
            font-family: cursive;
            font-size: 20px;
        }
        nav .navigation .hideOnMobile:hover{
            background-color: antiquewhite;
            cursor: pointer;
            transition: all 0.2s ease-out;
        }
        nav li:first-child{
            margin-right: auto;
            margin-left: 3%;
            border: 2px solid;
            font-weight: bold;
        }
        li p{
            font-size: 20px;
        }
        nav .logo:hover{
            background-color: none;
        }
        nav li:last-child{
            display: none;
        }
        nav ul li a{
            height: 100%;   
            text-decoration: none;
            color: black;
            display: flex;
            align-items: center;
            padding: 0 30px;
        }
        nav .navigation .log {
            margin: 0 100px 0 90px;
            display: flex;
            place-items: center;
        }
        .log button{
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            background-color: rgb(134, 159, 180);
            font-size: 18px;
        }
        .log button:hover{
            background-color: rgb(66, 138, 179);
            cursor: pointer;
            border: none;
        }
        .sidebar{
            position: fixed;
            height: 100vh;
            top: 0;
            right: 0;
            width: 250px;
            background-color: rgba(119, 145, 187, 0.823);
            backdrop-filter: blur(10px);
            z-index: 999;
            box-shadow: -10px, 0, 10px black;
            display: none;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
        }
        .sidebar .showOnMobile{
            width: 100%;
        }
        .showOnMobile:hover{
            background-color: bisque;
            transition: all 0.5s ease;
        }
        .sidebar i{
            padding: 4px 8px 4px 8px;
            border-radius: 2px;
        }
        .sidebar i:hover{
            background-color:bisque;
        }
        .cat{
            position: fixed;
            top: 10%;
            right: 5%;
            display: none;
            border: 1px solid;
            width: 150px;
            place-items: center;
            z-index: 0;
        }
        .cat .cate{
            list-style: none;
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        .cat .cate .log{
            height: 30px;
            width: 100%;
            border: 1px solid;
        }
        .ident{
            height: 30px;
            display: grid;
            place-items: center;
        }
        .log a{
            text-decoration: none;
            width: 100%;
            height: 35px;
            background-color: antiquewhite;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @media(max-width:800px) {
            .hideOnMobile{
                display: none;
            }
            nav li:last-child{
                display: block;
            }
            nav li:last-child:hover{
                background-color: antiquewhite;
                box-shadow: 10px, 10px, 10px blue;
            }
            .def{
                display: none;
            }
        }
        @media(max-width: 400px) {
            .sidebar{
                width: 100%;
            }
            .sidebar:first-child{
                display: flex;
                justify-content:flex-end;
            }
            .navigation .log{
                width: 50px;
                margin-inline: 2px;
            }
            /* .def{
                display: none;  
            } */
        }
    </style>
</head>
<body>
    <div class="mn">
        <nav>
            <ul class="sidebar">
                <li onclick=hideSideBar()><a href="#"><i class="fa-solid fa-xmark"></i></a></li>
                <li class="showOnMobile"><a href="#">Home</a></li>
                <li class="showOnMobile"><a href="#">About</a></li>
                <li class="showOnMobile"><a href="#">Services</a></li>
                <li class="showOnMobile"><a href="#">Gallery</a></li>
            </ul>
            <ul class="navigation">
                <li class="logo"><p>Task Info</p></li>
                <!-- <li class="def">
                    <p>A task management system</p>
                </li> -->
                <li class="hideOnMobile"><a href="#">Home</a></li>
                <li class="hideOnMobile"><a href="#">About</a></li>
                <li class="hideOnMobile"><a href="#">Services</a></li>
                <li class="hideOnMobile"><a href="#">Gallery</a></li>
                <li class="log"><button class="log_in">Log in</button></li>
                <li onclick=showsidebar()><a href="#"><i class="fa-solid fa-bars"></i></a></li>
            </ul>
        </nav>
        <div class="cat">
            <ul class="cate">
                <li class="ident">As</li>
                <li class="log"><a href="admin_login.php">Admin</a></li>
                <li class="log"><a href="manager_login.php">Manager</a></li>
                <li class="log"><a href="employee_login.php">Employee</a></li>
            </ul>
        </div>
    </div>
    <script>
        function showsidebar(){
            const sidebar = document.querySelector(".sidebar");
            sidebar.style.display="flex";
        }
        function hideSideBar(){
            const bar = document.querySelector(".sidebar")
            bar.style.display = "none";
        }
        // function showLogCategory(){
        //     const log_in = document.querySelector('cate');
        //     log_in.style.display = "block";
        // }
    </script>
</body>
</html>