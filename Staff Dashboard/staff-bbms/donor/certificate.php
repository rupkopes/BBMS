<?php
require_once '../../vendor/autoload.php';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "blood_bank_management_system";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if donor ID is provided in the URL
if (isset($_GET['donor_id'])) {
    $donor_id = $_GET['donor_id'];

    // Fetch donor details from the database
    $sql = "SELECT * FROM donors WHERE id = $donor_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of the donor
        $row = $result->fetch_assoc();
        $donor_name = $row['name'];
        $donor_blood_group = $row['blood_group'];

        // Create new PDF document
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Blood Donation Certificate');
        $pdf->SetSubject('Certificate');
        $pdf->SetKeywords('Certificate, Blood Donation');

        // Set margins
        // $pdf->SetMargins(10, 10, 10);

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 18);

        // Add Google Fonts import
$google_fonts_import = "<style>@import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');</style>";
$pdf->writeHTML($google_fonts_import, true, false, true, false, '', false, false, false, false, '');


        // Add image template
        $image_file = 'certificate.png'; // Change this to the path of your image file
        $pdf->Image($image_file, 20, 10, 1200, 0, '', '', '', false, 300);

        // Generate the certificate content with CSS styling

//  certificate_content1

        $left_margin_width = 54; // Adjust this value as needed
        $bottom_margin_height = 6; // Adjust this value as needed

        $left_margin_html = str_repeat('&nbsp;', $left_margin_width);
        $bottom_margin_html = str_repeat('<br>', $bottom_margin_height);

        $certificate_content1 = "
<div style='font-family: Arial, sans-serif; font-size: 14px; color: #333;'>
    <div><strong>&nbsp;$bottom_margin_html$left_margin_html$donor_name ,</strong></div>
</div>
";

//  certificate_content2

        $left_margin_widths = 52; // Adjust this value as needed
        $bottom_margin_heights = 9; // Adjust this value as needed

        $left_margin_htmls = str_repeat('&nbsp;', $left_margin_widths);
        $bottom_margin_htmls = str_repeat('<br>', $bottom_margin_heights);

        $certificate_content2 = "
<div style='font-family: Arial, sans-serif; font-size: 16px; color: #333;'>
<div><strong>&nbsp;$bottom_margin_htmls$left_margin_htmls$donor_blood_group,</strong></div>
</div>
";

 // Add today's date
 $today_date = date("Y-m-d");

//  certificate_content3
 $left_margin_width = 22; // Adjust this value as needed
 $bottom_margin_height = 16; // Adjust this value as needed

 $left_margin_html = str_repeat('&nbsp;', $left_margin_width);
 $bottom_margin_html = str_repeat('<br>', $bottom_margin_height);

 $certificate_content3 = "
 <div style='font-family: Arial, sans-serif; font-size: 16px; color: #333;'>
     <div><strong>&nbsp;$bottom_margin_html$left_margin_html$today_date</strong></div>
 </div>
 ";

        // Output certificate content with CSS styling
        $pdf->writeHTML($certificate_content1, true, false, true, false, '', false, false, false, false, '');

        $pdf->writeHTMLCell(0, 0, 0, 3, $certificate_content2, 0, 0, false, true, '', true);

        $pdf->writeHTML($certificate_content3, true, false, true, false, '', false, false, false, false, '');
        
        // Close and output PDF document
        $pdf->Output('certificate.pdf', 'I');
    } else {
        echo "Donor not found";
    }
} else {
    echo "Donor ID not provided";
}

// Close connection
$conn->close();
