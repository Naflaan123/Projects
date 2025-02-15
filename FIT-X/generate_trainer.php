<?php
// Include FPDF library from the specified path
require('C:\Users\user\Downloads\fpdf186\fpdf.php'); // Adjust the path if needed

// Create a new PDF document
$pdf = new FPDF();
$pdf->AddPage();

// Set title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Trainer Report', 0, 1, 'C');

// Add a line break
$pdf->Ln(10);

// Set font for the paragraph text
$pdf->SetFont('Arial', '', 12);

// Add detailed information about tbltrainers
$paragraph = "The Trainer Report provides an organized overview of all trainers currently registered in the Fit-X system. "
           . "The tbltrainers table contains essential information that is pivotal to managing trainer-client interactions, "
           . "ensuring that clients receive specialized training according to their goals and needs.\n\n"
           . "This report includes the following details for each trainer:\n"
           . "- Trainer ID: A unique identifier assigned to each trainer in the system.\n"
           . "- Name: The full name of the trainer, which clients recognize during sessions.\n"
           . "- Specialization: The area of expertise of each trainer, such as strength training, cardio, or flexibility, "
           . "allowing clients to select a trainer who best matches their fitness requirements.\n\n"
           . "These details enable administrators to efficiently manage trainer assignments, track areas of specialization, "
           . "and enhance client satisfaction by offering specific expertise. This report supports Fit-X's commitment to providing "
           . "tailored fitness programs that align with clients' personal goals.\n\n"
           . "The table on the following page provides a comprehensive view of each trainer's information, useful for internal tracking, "
           . "client assignments, and business analysis.";

$pdf->MultiCell(0, 10, $paragraph);

// Add a line break before starting the table on a new page
$pdf->Ln(10);

// Add a new page for the table
$pdf->AddPage();

// Set font for the table header
$pdf->SetFont('Arial', 'B', 12);

// Set fill color for header row (light blue)
$pdf->SetFillColor(173, 216, 230); // Light blue color

// Create table header with fill color
$pdf->Cell(40, 10, 'Trainer ID', 1, 0, 'C', true);
$pdf->Cell(80, 10, 'Name', 1, 0, 'C', true);
$pdf->Cell(60, 10, 'Specialization', 1, 0, 'C', true);
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

// Fetch data from tbltrainers
$sql = "SELECT UserID, Username, Specialization FROM tbltrainers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 10, $row['UserID'], 1);
        $pdf->Cell(80, 10, $row['Username'], 1);
        $pdf->Cell(60, 10, $row['Specialization'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No trainers found', 1, 1, 'C');
}

// Close the database connection
$conn->close();

// Output the PDF to the browser
$pdf->Output('D', 'trainer_report.pdf'); // 'D' for download
?>
