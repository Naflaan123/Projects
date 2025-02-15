<?php
// Database connection
$host = 'localhost';
$dbname = 'fit_x';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Retrieve progress data for a specific user
$user_id = 1; // Replace with the actual logged-in user's ID
$stmt = $pdo->prepare("SELECT date, weight, calories_intake FROM user_progress WHERE user_id = :user_id ORDER BY date");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Format data for JavaScript
$data = [
    'dates' => [],
    'weights' => [],
    'caloriesIntake' => []
];

foreach ($results as $row) {
    $data['dates'][] = $row['date'];
    $data['weights'][] = $row['weight'];
    $data['caloriesIntake'][] = $row['calories_intake'];
}

// Output data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
