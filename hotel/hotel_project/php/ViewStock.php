<?php
include 'db.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchKeyword = mysqli_real_escape_string($con, $_POST["SearchKeyword"]);

    $sql = "SELECT * FROM Stock WHERE description LIKE '%$searchKeyword%'
            OR supCode LIKE '%$searchKeyword%'
            OR Qty LIKE '%$searchKeyword%'
            OR `update` LIKE '%$searchKeyword%'";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Error in the SQL Query: " . mysqli_error($con));
    }

    // Display search results
    echo "<h2>Search Results</h2>";
    echo "<table><tr><th>Description</th><th>Cost Price</th><th>Retail Price</th><th>Supplier</th><th>Reorder Level</th><th>Supplier's Stock Code</th><th>Quantity</th><th>Date of Update</th></tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>" . $row['description'] . "</td><td>" . $row['cost'] . "</td><td>" . $row['retail'] . "</td><td>" . $row['supplier'] . "</td><td>" . $row['reorder'] . "</td><td>" . $row['supCode'] . "</td><td>" . $row['Qty'] . "</td><td>" . $row['update'] . "</td></tr>";
    }

    echo "</table>";

    mysqli_close($con);
}
?>
