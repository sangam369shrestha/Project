<?php include_once 'manager_head.php' ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Function to load content via AJAX
        function loadContent(url) {
            $("#tabContent").html("<p>Loading content...</p>"); // Show loading text
            $.ajax({
                url: url,
                method: "GET",
                success: function (data) {
                    $("#tabContent").html(data); // Insert content into tabContent
                },
                error: function () {
                    $("#tabContent").html("<p>Error loading content. Please try again.</p>");
                }
            });
        }

        // Load content for the first tab by default
        loadContent($(".tab-link.active").data("url"));

        // Handle tab click events
        $(".tab-link").on("click", function () {
            $(".tab-link").removeClass("active"); // Remove active class from all tabs
            $(this).addClass("active"); // Add active class to the clicked tab
            loadContent($(this).data("url")); // Load content for the clicked tab
        });
    });
</script>

<div class="cont">
    <div class="tab_buttons">
        <ul class="tab_lists">
            <li><button class="tab-link active" data-url="department_details.php">Dashboard</button></li>
            <li><button class="tab-link" data-url="employee_details.php">Employees</button></li>
            <li><button class="tab-link" data-url="projects.php">Projects</button></li>
        </ul>
    </div>
    <div id="tabContent">
        <!-- Content will load here dynamically -->
    </div>
</div>

<?php include '../footer.php'; ?>