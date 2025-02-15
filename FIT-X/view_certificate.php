<?php
if (isset($_GET['certificate'])) {
    // Sanitize the input to avoid directory traversal attacks
    $certificate = basename($_GET['certificate']); // Get the base name to prevent any path manipulation

    // Define the correct path to the certificate file
    $file_path = "certificates/uploads/jj/" . $certificate; // Correct path to the certificate directory

    // Check if the file exists
    if (file_exists($file_path)) {
        // Set the appropriate header for the image type
        $image_info = getimagesize($file_path);
        header('Content-Type: ' . $image_info['mime']);
        readfile($file_path); // Output the image
        exit;
    } else {
        echo "Certificate not found.";
    }
} else {
    echo "No certificate specified.";
}
?>
