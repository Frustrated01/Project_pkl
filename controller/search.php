<?php

include 'conn.php';

// Ambil data dari parameter GET
$searchValue = $_GET['q'];

// Query pencarian
$sql = "SELECT * FROM users WHERE username LIKE '%$searchValue%'";
$result = $conn->query($sql);

// Tampilkan hasil pencarian
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>" . $row['username'] . "</p>";
    }
} else {
    echo "<p>No results found</p>";
}

$conn->close();
?>
