

<body>
    <div class="conts">
        <button id="insert" data-url="emp_insert.php">Create Employee</button>
     
            <ul class="man_dets">
                <li><p>Employee 1</p></li>
                <li><p>Employee 2</p></li>
                <li><p>Employee 3</p></li>
                <li><p>Employee 4</p></li>
                <li><p>Employee 5</p></li>
                <li><p>Employee 7</p></li>
                <li><p>Employee 8</p></li>
            </ul>
       
    </div>
    <script>
        $(document).ready(function(){
            function loadContent(url){
                $(".conts").html("</p> Loading Contents...</p>");
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (data) {
                        $(".conts").html(data);
                    },
                    error: function(){
                        $(".conts").html("<p>Error loading content</p>");
                    }
                });
            }
            $("#insert").on("click", function () {
                const url = $(this).data("url"); // Get the URL from data attribute
                loadContent(url);
            });
        });
    </script>
</body>
</html>