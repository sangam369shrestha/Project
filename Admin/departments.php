
<?php 
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'project_task_management_system';
    try {
        $conn = new mysqli($host, $user, $pass, $db);
        $sql = "SELECT  * FROM department";
        $result = $conn->query($sql);
    } catch (\Throwable $th) {
        echo "Error: " . $th->getMessage();
    }
?>

<body>
    <div class="main-dep">
        <div class="btn">
            <button id="create-department">Create Department</button>
        </div>
        
        <div class="dep-details">
            <h2>Department Details</h2>
            <ul class="departments">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li><p>" . htmlspecialchars($row['name']) . "</p></li>";
                    }
                } else {
                    echo "<li>No items found</li>";
                }
                ?>
            </ul>
        </div>
    </div>
 