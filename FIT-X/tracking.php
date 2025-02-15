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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = 1; // Replace with the actual logged-in user's ID
    $current_weight = $_POST['current_weight'];
    $calories_intake = $_POST['calories_intake'];
    $date = date('Y-m-d');

    // Insert into the user_progress table
    $stmt = $pdo->prepare("INSERT INTO user_progress (user_id, date, weight, calories_intake) VALUES (:user_id, :date, :weight, :calories_intake)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':weight', $current_weight);
    $stmt->bindParam(':calories_intake', $calories_intake);
    $stmt->execute();

    echo "Progress recorded successfully!";
}

// Analyze user progress
function analyzeProgress($pdo, $user_id) {
    // Get the last recorded weight and calories intake
    $stmt = $pdo->prepare("SELECT weight, calories_intake, date FROM user_progress WHERE user_id = :user_id ORDER BY date DESC LIMIT 2");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $progressData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $feedback = "";

    if (count($progressData) == 2) {
        $lastEntry = $progressData[0];
        $previousEntry = $progressData[1];

        // Weight change analysis
        $weightChange = $lastEntry['weight'] - $previousEntry['weight'];
        if ($weightChange > 0) {
            $feedback .= "You've gained " . abs($weightChange) . " kg since your last entry. ";
        } elseif ($weightChange < 0) {
            $feedback .= "You've lost " . abs($weightChange) . " kg since your last entry. ";
        } else {
            $feedback .= "Your weight has remained the same since your last entry. ";
        }

        // Caloric intake analysis
        $averageCalories = ($lastEntry['calories_intake'] + $previousEntry['calories_intake']) / 2;
        $recommendedCalories = 2000; // Example recommended intake (can vary per user)

        if ($averageCalories > $recommendedCalories) {
            $feedback .= "Your average caloric intake of " . $averageCalories . " exceeds the recommended daily intake. ";
        } else {
            $feedback .= "Your average caloric intake of " . $averageCalories . " is within the recommended range. ";
        }
    } else {
        $feedback = "Not enough data to analyze your progress.";
    }

    return $feedback;
}

// Get feedback for the logged-in user
$user_id = 1; // Replace with the actual logged-in user's ID
$feedbackMessage = analyzeProgress($pdo, $user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Progress</title>
    <style>
        /* Body & Main Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #20B2AA;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            margin: 0;
        }

        h1, h2 {
            color: #20B2AA;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Form Styling */
        form {
            background-color: #333;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #20B2AA;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #555;
            border-radius: 6px;
            background-color: #222;
            color: #e0e0e0;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Button Styling */
        button {
            width: 100%;
            padding: 12px;
            background-color: #20B2AA;
            color: #333;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 15px;
        }

        button:hover {
            background-color: #e2b207;
        }

        /* Chart Container */
        #chartContainer {
            width: 100%;
            max-width: 1200px; /* Increase max-width to make it larger */
            margin-top: 20px;
            background-color: #333;
            padding: 25px; /* Slightly increase padding */
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        #progressChart {
            width: 100%;
            height: 500px; /* Increase height to make the chart larger */
        }

        /* Feedback Message Styling */
        .feedback {
            color: #20B2AA; /* Color for feedback text */
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Track Your Weekly Progress</h1>
    <form method="POST" action="">
        <label for="current_weight">Current Weight (kg):</label>
        <input type="number" step="0.1" name="current_weight" required>
        <label for="calories_intake">Caloric Intake:</label>
        <input type="number" name="calories_intake" required>
        <button type="submit">Submit</button>
        <button type="button" onclick="window.location.href='index.php'">Back</button>
    </form>

    <h2>Your Weekly Progress</h2>
    <div id="chartContainer">
        <canvas id="progressChart"></canvas>
    </div>

    <div class="feedback">
        <?php echo $feedbackMessage; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetching user progress data
        const fetchData = async () => {
            const response = await fetch('fetch_progress.php');
            return await response.json();
        };

        // Creating the bar chart
        const createChart = async () => {
            const data = await fetchData();
            const ctx = document.getElementById('progressChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.dates,
                    datasets: [
                        {
                            label: 'Weight (kg)',
                            data: data.weights,
                            backgroundColor: 'rgba(52, 152, 219, 0.7)', // Lighter blue
                            borderColor: 'rgba(52, 152, 219, 1)', // Darker blue
                            borderWidth: 1
                        },
                        {
                            label: 'Calories Intake',
                            data: data.caloriesIntake,
                            backgroundColor: 'rgba(46, 204, 113, 0.7)', // Lighter green
                            borderColor: 'rgba(46, 204, 113, 1)', // Darker green
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(200, 200, 200, 0.2)'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#20B2AA'
                            }
                        }
                    }
                }
            });
        };

        createChart();
    </script>
</body>
</html>
