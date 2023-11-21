<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// Check if 'country' parameter is set
if(isset($_GET['country'])) {
     
    $raw_country = $_GET['country'];
    $country = htmlspecialchars($raw_country, ENT_QUOTES, 'UTF-8');

    // Fetch data for the specified country
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    $country_list = '<ul>';
    foreach ($results as $row) {
        $country_list .= '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
    $country_list .= '</ul>';

    echo json_encode($country_list);
    exit;
}
?>
