

<body>
    <div class="conts">
        <button id="insert" data-url="man_insert.php">Create Manager</button>
     
            <ul class="man_dets">
                <li><p>Manager1</p></li>
                <li><p>Manager2</p></li>
                <li><p>Manager3</p></li>
                <li><p>Manager4</p></li>
                <li><p>Manager5</p></li>
                <li><p>Manager7</p></li>
                <li><p>Manager8</p></li>
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