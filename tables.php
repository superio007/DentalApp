<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Patient Table with Pagination</title>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <h1 class="text-center my-3">Patient List</h1>
    <div class="container">
        <table class="table table-striped border table-hover">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Patient Name</th>
                    <th scope="col" class="text-center">Age</th>
                    <th scope="col" class="text-center">Sex</th>
                    <th scope="col" class="text-center">Phone Number</th>
                    <th scope="col" class="text-center">Medical History</th>
                    <th scope="col" class="text-center">Doctor Name</th>
                    <th scope="col" class="text-center">Notes</th>
                    <th>Invoice</th>
                    <th>precrisption</th>
                </tr>
            </thead>
            <tbody id="patientTableBody">
                <!-- Dynamic Rows Will Be Injected Here -->
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary" id="prevBtn" disabled>Back</button>
            <button class="btn btn-primary" id="nextBtn">Next</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let offset = 0; // Initial offset
            const limit = 12; // Number of rows per page

            // Function to fetch and display data
            function loadPatientData() {
                $.ajax({
                    url: 'fetch_patient_data.php', // PHP file to fetch data
                    method: 'GET',
                    data: {
                        offset: offset,
                        limit: limit
                    }, // Pass offset and limit as parameters
                    dataType: 'json',
                    success: function(data) {
                        const tableBody = $('#patientTableBody');
                        tableBody.empty(); // Clear existing rows

                        // Populate table rows dynamically
                        if (data.length > 0) {
                            data.forEach((row, index) => {
                                const tableRow = `
                                    <tr>
                                        <td class="text-center">${offset + index + 1}</td>
                                        <td class="text-center">${row.name || 'N/A'}</td>
                                        <td class="text-center">${row.age || 'N/A'}</td>
                                        <td class="text-center">${row.sex || 'N/A'}</td>
                                        <td class="text-center">${row.phone || 'N/A'}</td>
                                        <td class="text-center">${row.serious_illness || 'N/A'}</td>
                                        <td class="text-center">Dr Bhavesh</td>
                                        <td class="text-center">${row.reason || 'N/A'}</td>
                                        <td>
                                            <button class="btn btn-primary invoice" data-patient-id="${row.patient_id}">Invoice</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary prescription" data-patient-id="${row.patient_id}">Prescription</button>
                                        </td>
                                    </tr>
                                `;
                                tableBody.append(tableRow);
                            });
                        } else {
                            const tableRow = `
                                    <tr>
                                        <td colspan="10" class="text-center">No Data Available!</td>
                                    </tr>
                                `;
                            tableBody.append(tableRow);
                        }

                        // Enable/Disable buttons based on offset
                        $('#prevBtn').prop('disabled', offset === 0);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Load initial data
            loadPatientData();

            // Handle Next button click
            $('#nextBtn').on('click', function() {
                offset += limit;
                loadPatientData();
            });

            // Handle Back button click
            $('#prevBtn').on('click', function() {
                if (offset >= limit) {
                    offset -= limit;
                    loadPatientData();
                }
            });

            // Handle Invoice button click
            $('table').on('click', '.invoice', function() {
                const patientId = $(this).data('patient-id');
                $.ajax({
                    url: 'fetchAndStorePatientData.php', // PHP script URL
                    method: 'POST',
                    data: {
                        patient_id: patientId,
                        type: "invoice",
                    },
                    success: function(response) {
                        processPatientData(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('An error occurred while processing the request.');
                    }
                });
            });

            // Handle Prescription button click
            $('table').on('click', '.prescription', function() {
                const patientId = $(this).data('patient-id');
                $.ajax({
                    url: 'fetchAndStorePatientData.php', // PHP script URL
                    method: 'POST',
                    data: {
                        patient_id: patientId,
                        type: "prescription",
                    },
                    success: function(response) {
                        processprescriptionData(response);
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('An error occurred while processing the request.');
                    }
                });
            });
            // to process prescription data
            function processprescriptionData(data) {
                $.ajax({
                    url: 'generateprescriptionSession.php', // PHP script URL
                    method: 'POST',
                    contentType: 'application/json', // Specify JSON format
                    data: JSON.stringify(data), // Send data as a JSON string
                    success: function(response) {
                        console.log(response); // Log the response
                        // alert('Prescription Generated successfully!');
                        window.location.href = 'Generateprescription.php';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('An error occurred while generating the invoice.');
                    }
                });
            }
            // to process invoice data
            function processPatientData(data) {
                $.ajax({
                    url: 'generateInvoiceSession.php', // PHP script URL
                    method: 'POST',
                    contentType: 'application/json', // Specify JSON format
                    data: JSON.stringify(data), // Send data as a JSON string
                    success: function(response) {
                        console.log(response); // Log the response
                        alert('Invoice generated successfully!');
                        window.location.href = 'GenerateInvoice.php';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('An error occurred while generating the invoice.');
                    }
                });
            }


        });
    </script>
</body>

</html>