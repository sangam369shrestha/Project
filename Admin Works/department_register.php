<?php include_once 'admin_head.php'; ?>

<body>
    <div class="mn">
        <form action="" method="post" id="department-details">
            <fieldset>
                <div class="frm-grp">
                    <label for="name">Department Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="frm-grp">
                    <textarea name="description" id="description"></textarea>
                </div>
                <div class="frm-grp">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address">
                </div>
                <div class="frm-grp">
                    <input type="radio" name="status" id="status">Active
                    <input type="radio" name="status" id="status">Inactive
                </div>
                <div class="frm-grp">
                    <input type="submit" value="Register" name="register">
                    <input type="reset" value="Reset" name="reset">
                </div>
            </fieldset>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $('#department-details').on('reset', function(e){
                e.preventDefault();
                $.ajax({
                    $url : 'department_register.php',
                    type : 'post',
                    data : $(this).serialize();
                    $success: function(response){
                        const result = JSON.parse(response); // Parse JSON response
                        displayMessages(result.messages, result.status);
                        if (result.status === 'success') {
                            $('#manager-form')[0].reset(); // Reset form fields
                        }
                    },
                    error: function (xhr, status, error) {
                        displayMessages(['An error occurred: ' + error], 'error');
                    }
                })
            })
        })
    </script>
</body>