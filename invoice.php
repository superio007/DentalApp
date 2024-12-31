<?php
require_once('vendor/tecnickcom/tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Disable default header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Shree Sai Dental Lounge');
$pdf->SetTitle('Invoice');
$pdf->SetSubject('Invoice');

// Set margins
$pdf->SetMargins(15, 27, 15);

// Set auto page breaks
$pdf->SetAutoPageBreak(true, 10);

// Add a page
$pdf->AddPage();

// Use Unicode font
$pdf->SetFont('dejavusans', '', 12);

// Dynamic Data (Example Array)
$invoiceData = [
    'clinic' => [
        'name' => 'Shree Sai Dental Lounge',
        'phone1' => '7505132263',
        'phone2' => '8355894900',
        'email' => 'bhaveshbhalim09@outlook.com',
        'address' => 'Next to Shastri Nagar Naka, Pokharan Rd no 1, Shastri Nagar, Thane west 400606'
    ],
    'billTo' => [
        'name' => 'Omprakash Rai',
        'age_sex' => '40/M',
        'patient_id' => 'T24072',
        'address' => '123 Sample Address, City, State'
    ],
    'treatment' => [
        'treatment_name' => 'Root Canal Treatment c 46',
        'date' => 'December 16, 2024'
    ],
    'table_data' => [
        ['date' => 'Oct 23, 2024', 'tooth_no' => '24 25', 'work_done' => 'Root Canal Treatment', 'amount' => 4000, 'payment' => 1500, 'balance' => 2500],
        ['date' => 'Oct 26, 2024', 'tooth_no' => '24 25', 'work_done' => 'Zirconia', 'amount' => 9000, 'payment' => 4500, 'balance' => 4500]
    ],
    'remittance' => [
        'amount_due' => 7000
    ]
];

// Create the HTML for the Invoice
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
    <strong>Treatment Done #:</strong> ' . $invoiceData['treatment']['treatment_name'] . '<br>
    <strong>Date:</strong> ' . $invoiceData['treatment']['date'] . '
</p>

<h3>BILL TO:</h3>
<p>
    <strong>Name #:</strong> ' . $invoiceData['billTo']['name'] . '<br>
    <strong>Age/Sex #:</strong> ' . $invoiceData['billTo']['age_sex'] . '<br>
    <strong>Patient ID #:</strong> ' . $invoiceData['billTo']['patient_id'] . '<br>
    <strong>Address:</strong> ' . $invoiceData['billTo']['address'] . '
</p>

<table>
    <tr>
        <th>Date</th>
        <th>Tooth No.</th>
        <th>Work Done #</th>
        <th>Amount</th>
        <th>Payment</th>
        <th>Balance</th>
    </tr>';

// Add Table Rows
foreach ($invoiceData['table_data'] as $row) {
    $html .= '<tr>
        <td>' . $row['date'] . '</td>
        <td>' . $row['tooth_no'] . '</td>
        <td>' . $row['work_done'] . '</td>
        <td>₹ ' . number_format($row['amount'], 2) . '</td>
        <td>₹ ' . number_format($row['payment'], 2) . '</td>
        <td>₹ ' . number_format($row['balance'], 2) . '</td>
    </tr>';
}

$html .= '</table>
<p><strong>Total:</strong> ₹ ' . number_format($invoiceData['remittance']['amount_due'], 2) . '</p>

<h3>REMITTANCE</h3>
<p>
    <strong>Patient Name:</strong> ' . $invoiceData['billTo']['name'] . '<br>
    <strong>Age/Sex:</strong> ' . $invoiceData['billTo']['age_sex'] . '<br>
    <strong>Patient ID:</strong> ' . $invoiceData['billTo']['patient_id'] . '<br>
    <strong>Treatment #:</strong> ' . $invoiceData['treatment']['treatment_name'] . '<br>
    <strong>Date:</strong> ' . $invoiceData['treatment']['date'] . '<br>
    <strong>Amount Due:</strong> ₹ ' . number_format($invoiceData['remittance']['amount_due'], 2) . '
</p>

<p style="text-align:center; font-size:16px;">Thank you!!</p>
';

// Write HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF as a file download
$pdf->Output('invoice.pdf', 'I');
