
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persistent Sidebar</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="mains">
        <div class="sidebar">
            <ul class="side">
                <li class="icons"><i class="fa-solid fa-circle-user"></i></li>
                <li><p class="side-opt" data-url="dashboard.php">Dashboard</p></li>
                <li><p class="side-opt" data-url="admins.php">Admins</p></li>
                <li><p class="side-opt" data-url="departments.php">Departments</p></li>
                <li><p class="side-opt" data-url="managers.php">Managers</p></li>
                <!-- <li><p class="side-opt" data-url="projects.php">Projects</p></li> -->
                <li><button id="log-out">Log out</button></li>
            </ul>
        </div>
        <div id="main-content"></div>
    </div>
    
    <script>
        $(document).ready(function() {
            // Function to load content via AJAX
            function loadContentURL(url) {
                $("#main-content").html("<p>Loading content...</p>"); // Show loading text
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(data) {
                        $("#main-content").html(data); // Insert content into #main-content
                    },
                    error: function() {
                        $("#main-content").html("<p>Error loading content. Please try again.</p>");
                    }
                });
            }

            // On page load, check sessionStorage for the last clicked URL
            let lastUrl = sessionStorage.getItem("lastClickedUrl");
            if (lastUrl) {
                // If there is a saved URL, load it and highlight the corresponding button
                loadContentURL(lastUrl);
                $(`.side-opt[data-url='${lastUrl}']`).addClass("active");
            } else {
                // If no URL is saved, load the default (first) page
                let defaultUrl = $(".side-opt").first().data("url");
                loadContentURL(defaultUrl);
                $(".side-opt").first().addClass("active");
            }

            // Handle button clicks
            $(".side-opt").on("click", function() {
                $(".side-opt").removeClass("active"); // Remove active class from all buttons
                $(this).addClass("active"); // Add active class to the clicked button
                let url = $(this).data("url"); // Get the URL from the button
                loadContentURL(url); // Load the content
                sessionStorage.setItem("lastClickedUrl", url); // Save the clicked URL in sessionStorage
            });
        });
    </script>
</body>
</html>
