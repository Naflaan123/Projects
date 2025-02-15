<?php
// Include FPDF library from the specified path
require('C:\Users\user\Downloads\fpdf186\fpdf.php'); // Adjust the path if needed

// Create a new PDF document
$pdf = new FPDF();
$pdf->AddPage();

// Set title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Client Report', 0, 1, 'C');

// Set font for the table header
$pdf->SetFont('Arial', 'B', 12);

// Column widths
$headerWidths = [30, 70, 30, 60]; // Adjusted widths for better fit
$headerTitles = ['Client ID', 'Client Name', 'Gender', 'Email'];

// Create table header
foreach ($headerTitles as $i => $title) {
    $pdf->Cell($headerWidths[$i], 10, $title, 1, 0, 'C'); // Center align the header
}
$pdf->Ln(); // Move to next line

// Set font for the table body
$pdf->SetFont('Arial', '', 12);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit_x";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from tblclient
$sql = "SELECT userid, username, gender, email FROM tblclient"; // Added Gender to the SQL query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell($headerWidths[0], 10, $row['userid'], 1);
        $pdf->Cell($headerWidths[1], 10, $row['username'], 1);
        $pdf->Cell($headerWidths[2], 10, $row['gender'], 1);
        $pdf->Cell($headerWidths[3], 10, $row['email'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No clients found', 1, 1, 'C');
}

// Close the database connection
$conn->close();

// Output the PDF to the browser
$pdf->Output('D', 'client_report.pdf'); // 'D' for download
?>
