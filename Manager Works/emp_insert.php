
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="conten">
    <p class="back"><i class="fa-solid fa-angle-left"> Back</i></p>
    <form id="dataForm">
        <fieldset>
            <div class="inf">
                <div class="detl">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required><br><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="contact">Contact:</label>
                    <input type="number" id="contact" name="contact" required><br><br>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required><br><br>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required><br><br>
                </div>
                <div class="off-detl">
                    <label for="department">Department:</label>
                    <input type="text" id="department" name="department" required><br><br>

                    <label for="dep_id">Department ID:</label>
                    <input type="number" id="dep_id" name="dep_id" required><br><br>

                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required><br><br>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required><br><br>
                </div>
            </div>
        <button type="submit">Submit</button>
        </fieldset>
        
    </form>
    </div>

    <p id="responseMessage"></p>

    <script>
        $(document).ready(function () {
            $("#dataForm").on("submit", function (e) {
                e.preventDefault();

                $.ajax({
                    url: "add_emp.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        $("#responseMessage").html(response);
                    },
                    error: function () {
                        $("#responseMessage").text("An error occurred.");
                    }
                });
            });

        });
    </script>
</body>
</html>
