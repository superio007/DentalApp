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
                                        <td class="text-center">${row.name}</td>
                                        <td class="text-center">${row.age}</td>
                                        <td class="text-center">${row.sex}</td>
                                        <td class="text-center">${row.phone}</td>
                                        <td class="text-center">${row.serious_illness || 'N/A'}</td>
                                        <td class="text-center">Dr Bhavesh</td>
                                        <td class="text-center">${row.reason || 'N/A'}</td>
                                        <td>
                                            <button class="btn btn-primary">Invoice</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary">Prescription</button>
                                        </td>
                                    </tr>
                                `;
                                tableBody.append(tableRow);
                            });
                        } else {
                            alert("No more records to display.");
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
        });
    </script>
</body>

</html>