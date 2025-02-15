<?php
// Include FPDF library from the specified path
require('C:\Users\user\Downloads\fpdf186\fpdf.php'); // Adjust the path if needed

// Create a new PDF document
$pdf = new FPDF();
$pdf->AddPage();

// Set title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Payment Report', 0, 1, 'C');

// Add a line break
$pdf->Ln(10);

// Set font for the paragraph text
$pdf->SetFont('Arial', '', 12);

// Add a detailed paragraph about tblpayment
$paragraph = "The payment report provides a comprehensive overview of the transactions recorded in the Fit-X system. "
           . "Each entry in the tblpayment table is carefully managed to ensure accurate tracking of payments made by clients. "
           . "The report includes essential information such as the unique Payment ID, the Client Name who made the payment, "
           . "the type of workout for which the payment was made, the exact Amount paid, and the Payment Method utilized for the transaction. "
           . "\n\nThis payment information is vital for both financial management and business planning purposes within the Fit-X system. "
           . "The workout type field allows administrators to analyze which types of workouts are most frequently paid for, "
           . "aiding in marketing and development efforts for specific fitness plans. The inclusion of payment amounts enables the business "
           . "to monitor revenue streams, evaluate client spending habits, and determine pricing strategies based on client demands."
           . "\n\nIn addition, the detailed recording of payment methods offers insight into clients' preferred ways of payment, helping "
           . "to inform future decisions on payment options provided by Fit-X. All of these data points together contribute to the organization’s "
           . "financial analysis, forecasting, and client management efforts, enabling Fit-X to offer a more customized and efficient service to its clients."
           . "\n\nThe following table provides a breakdown of each transaction, allowing administrators to view the specifics of each payment "
           . "recorded in the system. This structured data is critical for audits, customer service inquiries, and any operational reviews conducted within Fit-X.";

$pdf->MultiCell(0, 10, $paragraph);

// Add a line break before starting the table on a new page
$pdf->Ln(10);

// Add a new page for the table
$pdf->AddPage();

// Set font for the table header
$pdf->SetFont('Arial', 'B', 12);

// Adjusted column widths and titles to fit page
$headerWidths = [28, 45, 50, 25, 42];
$headerTitles = ['Payment ID', 'Client Name', 'Workout Type', 'Amount', 'Payment Method'];

// Set fill color for the header
$pdf->SetFillColor(173, 216, 230); // Light lavender color

// Create table header
foreach ($headerTitles as $i => $title) {
    $pdf->Cell($headerWidths[$i], 10, $title, 1, 0, 'C', true); // Center align the header and fill
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

// Fetch data from tblpayment
$sql = "SELECT paymentid, userid, workout_type, amount, paymentmethod FROM tblpayment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell($headerWidths[0], 10, $row['paymentid'], 1);
        $pdf->Cell($headerWidths[1], 10, $row['userid'], 1);
        $pdf->Cell($headerWidths[2], 10, $row['workout_type'], 1);
        $pdf->Cell($headerWidths[3], 10, $row['amount'], 1);
        $pdf->Cell($headerWidths[4], 10, $row['paymentmethod'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No payment records found', 1, 1, 'C');
}

// Close the database connection
$conn->close();

// Output the PDF to the browser
$pdf->Output('D', 'payment_report.pdf'); // 'D' for download
?>
