<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if (isset($_GET['lookup']) && $_GET['lookup'] === 'cities') {

    $raw_country = $_GET['country'];
    $country = htmlspecialchars($raw_country, ENT_QUOTES, 'UTF-8');
    // Fetch data
    $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    $cities = '<table>';
    $cities .= '<tr>';
      $cities .='<th>Name</th>';
      $cities .='<th >District</th>';
      $cities .='<th >Population</th>';
    $cities .= '</tr>';

   foreach ($results as $row){

    $cities .= '<tr>';
    $cities .= '<td>' . $row['name'] . '</td>';
    $cities .= '<td>' . $row['district'] . '</td>';
    $cities .= '<td>' . $row['population'] . '</td>';
    $cities .= '</tr>';
   }
   $cities .= '</table>';
   echo json_encode($cities);
   exit;
}

elseif(isset($_GET['country'])) {
    $raw_country = $_GET['country'];
    $country = htmlspecialchars($raw_country, ENT_QUOTES, 'UTF-8');
    // Fetch data
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    
     $country_list = '<table>';
     $country_list .= '<tr>';
     $country_list .= '<th>Country Name</th>';
     $country_list .= '<th>Continent</th>';
     $country_list .= '<th>Independence Year</th>';
     $country_list .= '<th>Head of State</th>';
     $country_list .= '</tr>';
     
     foreach ($results as $row) {
         $country_list .= '<tr>';
         $country_list .= '<td>' . $row['name'] . '</td>';
         $country_list .= '<td>' . $row['continent'] . '</td>';
         $country_list .= '<td>' . $row['independence_year'] . '</td>';
         $country_list .= '<td>' . $row['head_of_state'] . '</td>';
         $country_list .= '</tr>';
     }
 
     $country_list .= '</table>';
    echo json_encode($country_list);
    exit;
}
?>
