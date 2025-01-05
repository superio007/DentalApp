<?php
session_start();
require_once('vendor/tecnickcom/tcpdf/tcpdf.php');

function getFormattedDate($date = null) {
    return $date ? date('d F Y', strtotime($date)) : date('d F Y');
}

// Check session or default data
$formData = $_SESSION['patientData'] ?? [
    'name' => 'Omprakash Rai',
    'sex' => 'Male',
    'age' => 40,
    'patientId' => 'T24072',
    'address' => '123 Sample Address, City, State'
];
$gender = ($formData['sex'] == 'Male') ? 'M' : 'F';

// Dynamic Data

    $treatmentData = $_SESSION['TreatmentData'];
$invoiceData = [
    'clinic' => [
        'name' => 'Shree Sai Dental Lounge',
        'phone1' => '7505132263',
        'phone2' => '8355894900',
        'email' => 'bhaveshbhalim09@outlook.com',
        'address' => 'Next to Shastri Nagar Naka, Pokharan Rd no 1, Shastri Nagar, Thane west 400606'
    ],
    'billTo' => [
        'name' => $formData['name'],
        'age_sex' => "{$formData['age']}/$gender",
        'patient_id' => $formData['patientId'],
        'address' => $formData['address']
    ]
];

// Calculate total and generate table rows
$total = 0;
$tableRows = '';
foreach ($treatmentData as $row) {
    if (is_numeric($row['selectedOptions'][0])) {
        $total += $row['selectedOptions'][0];
    }
    $tableRows .= '<tr>
        <td>' . getFormattedDate() . '</td>
        <td>' . $row['toothId'] . '</td>
        <td>₹ ' . $row['selectedOptions'][0] . '</td>
    </tr>';
}

// Initialize TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(15, 27, 15);
$pdf->SetAutoPageBreak(true, 10);
$pdf->AddPage();
$pdf->SetFont('dejavusans', '', 12);

// Generate HTML
$html = '
<style>
    table { border-collapse: collapse; width: 100%; }
    table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
</style>
<h1 style="text-align:center;">' . $invoiceData['clinic']['name'] . '</h1>
<p>
    <strong>Dr. Bhavesh Suresh Bhalim BDS A-55138</strong><br>
    Dr. Jay Yashwant Pawshe BDS A-53661<br>
    ' . $invoiceData['clinic']['address'] . '<br>
    Phone: ' . $invoiceData['clinic']['phone1'] . ', ' . $invoiceData['clinic']['phone2'] . '<br>
    E-mail: ' . $invoiceData['clinic']['email'] . '
</p>

<h3>TREATMENT</h3>
<p>
    <strong>Treatment Done:</strong> Dental Implants, Fluoride Treatments<br>
    <strong>Date:</strong> ' . getFormattedDate() . '
</p>

<h3>BILL TO:</h3>
<p>
    <strong>Name:</strong> ' . $invoiceData['billTo']['name'] . '<br>
    <strong>Age/Sex:</strong> ' . $invoiceData['billTo']['age_sex'] . '<br>
    <strong>Patient ID:</strong> ' . $invoiceData['billTo']['patient_id'] . '<br>
    <strong>Address:</strong> ' . $invoiceData['billTo']['address'] . '
</p>

<table>
    <tr>
        <th>Date</th>
        <th>Tooth No.</th>
        <th>Amount</th>
    </tr>
    ' . $tableRows . '
</table>

<p><strong>Total:</strong> ₹ ' . number_format($total, 2) . '</p>
<p style="text-align:center; font-size:16px;">Thank you!!</p>
';

// Write HTML content to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF
$pdfOutput = $pdf->Output('invoice.pdf', 'S'); // Save the PDF to a string
file_put_contents('invoice.pdf', $pdfOutput); // Save the PDF to a file on the server

// Send the file for download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="invoice.pdf"');
header('Content-Length: ' . filesize('invoice.pdf'));
readfile('invoice.pdf');

// Clean up the file after download
unlink('invoice.pdf');

// Redirect to the index page
header('Location: index.php');
exit();

