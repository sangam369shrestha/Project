

    <?php include_once 'admin_head.php'; ?>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function()[
            $("#submit").click(function(){
                var name = $("#name").val();
                var age = $("#age").val();
                var gender = $("#gender").val();
                var dob = $("#dob").val();
                var exp = $("#exp").val();
                $.ajax({
                    url : 'save_managers.php',
                    method: 'post',
                    data: formData,
                    success: 
                })
                    
            })
        ])
    </script>
</head>
<body>
    <div class="mn">
        <form action="" method="post">
            <p class="form-title">Register Manager</p>
            <fieldset>
                    <input type="text" name="name" id="name" placeholder="  Enter full name">
                    <input type="email" name="email" id="email" placeholder="  Enter email id">
                    <input type="number" name="contact" id="contact" placeholder="  Enter contact">
                    <input type="text" name="address" id="address" placeholder="  Enter address">
                    <div class="dob">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="dob" id="dob">
                    </div>

                     <div class="skills">
                        <label for="skill">Skills: </label>
                        <div class="skills_data">
                            <input type="radio" name="skill[]" id="skill">HTML
                            <input type="radio" name="skill[]" id="skill">CSS
                            <input type="radio" name="skill[]" id="skill">Javascript
                            <input type="radio" name="skill[]" id="skill">React
                            <input type="radio" name="skill[]" id="skill">Node JS
                            <input type="radio" name="skill[]" id="skill">PHP
                        </div>
                        
                    </div>
                    <div class="exp">
                        <label for="experience">Experience: </label>
                        <select name="experience" id="experience">
                            <option value="">Fresher</option>
                            <option value="">0-6 Months</option>
                            <option value="">6 Months - 1 Year</option>
                            <option value="">1-2Years</option>
                            <option value="">3-4Years</option>
                            <option value="">More</option>
                        </select>
                    </div>
                   
                    <input type="text" name="username" id="username" placeholder="  Enter username">
                    <input type="password" name="passsword" id="password" placeholder="  Enter password">
                    <div class="btns">
                        <input type="submit" value="Register" name="register" id="register">
                        <input type="reset" value="Reset" name="reset" id="reset">
                    </div>
            </fieldset>
        </form>

<?php include 'admin-footer.php'; ?>