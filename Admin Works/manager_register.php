

    <?php include_once 'admin_head.php'; ?>
    <script src="jquery.js"></script>
    
</head>
<body>
    <div class="mn">
        <form action="" method="post" id="manager-form">
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
                    <div class="gend">
                        <label for="gender">Gender</label>
                        <input type="radio" name="gender" id="gender">Male
                        <input type="radio" name="gender" id="gender">Female

                    </div>
                    
                    <div class="exp">
                        <label for="experience">Experience: </label>
                        <select name="experience" id="experience">
                            <option value="" name = 'experiences'>Fresher</option>
                            <option value="" name = 'experiences'>0-6 Months</option>
                            <option value="" name = 'experiences'>6 Months - 1 Year</option>
                            <option value="" name = 'experiences'>1-2Years</option>
                            <option value="" name = 'experiences'>3-4Years</option>
                            <option value="" name = 'experiences'>More</option>
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

        <script>
        $(document).ready(function()[
            $('#manager-form').on("submit", function(e){
                e.preventDefault();

                $.ajax({
                    url : 'add_man.php',
                    type: "POST",
                    data: $(this).serialize();
                    success: function(response) {
                        // Display server response
                        $("#responseMessage").html(response);
                    },
                    error: function() {
                        $("#responseMessage").text("An error occurred.");
                    }
                })
                
            })
            // function displayMessages(messages, type) {
            //     const messageBox = $('#messages');
            //     messageBox.empty(); // Clear previous messages
            //     messages.forEach(msg => {
            //         messageBox.append(`<p class="${type}">${msg}</p>`);
            //     });
            // }
        ])
    </script>

<?php include 'admin-footer.php'; ?>