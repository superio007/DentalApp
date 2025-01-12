<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Prescription</title>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/ed4167ae3c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php
    if (isset($_GET['patientId'])) {
        $patientId = $_GET['patientId'];
    }
    ?>
    <div class="container py-3">
        <h1 class="text-center text-uppercase mb-3">Select Prescription</h1>
        <form>
            <div class="d-flex justify-content-center">
                <div class="mb-3" style="position: relative;">
                    <input
                        style="height:4rem; width:50rem;"
                        type="text"
                        name="prescription"
                        id="prescription"
                        class="form-control"
                        placeholder="Enter Medicine"
                        onkeyup="searchPrescription(this.value)">
                    <div
                        class="border bg-white overflow-auto"
                        style="width: 50rem; max-height: 20rem; position: absolute; display: none;"
                        id="hidden">
                        <!-- Results will be appended here -->
                    </div>
                </div>
                <div>
                    <button
                        style="height:4rem; width:5rem; background-color: #2e4a71;"
                        name="submit"
                        id="Search"
                        class="btn">
                        <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                    </button>
                </div>
            </div>
        </form>
        <form action="" method="post">
            <div class="my-3">
                <h2 class="text-center">Medicine Table</h2>
                <input type="hidden" name="patientId" value="<?php echo $patientId; ?>">
                <table class="table table-striped">
                    <thead>
                        <td class="text-center">Id</td>
                        <td class="text-center">Medicine</td>
                        <td class="text-center">Dosage</td>
                        <td class="text-center">Timing</td>
                        <td class="text-center">Duration</td>
                    </thead>
                    <tbody id="MedicineTable">

                    </tbody>
                </table>
                <p id="saveToDb" class="btn btn-primary px-4 py-2">Submit</p>
            </div>
        </form>
    </div>

    <script>
        function searchPrescription(query) {
            if (query.length === 0) {
                $('#hidden').hide();
                return;
            }

            $.ajax({
                url: 'search_prescription.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function(data) {
                    $('#hidden').html(data).show();
                }
            });
        }

        function selectMedicine(medicine) {
            $('#prescription').val(medicine);
            $('#hidden').hide();
        }
        document.getElementById("Search").addEventListener("click", function(e) {
            e.preventDefault();
            const query = document.getElementById("prescription").value;

            $.ajax({
                url: 'fetch_medicines.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function(data) {
                    // Parse the received data
                    const response = JSON.parse(data);

                    // Retrieve the current medicines array from localStorage
                    let existingData = JSON.parse(localStorage.getItem('medicines')) || [];

                    // Filter out duplicates by checking if an item already exists
                    const newData = response.filter(item => !existingData.some(existing => existing.id === item.id));

                    // Append new data to the existing array
                    existingData = [...existingData, ...newData];

                    // Store the updated array back into localStorage
                    localStorage.setItem('medicines', JSON.stringify(existingData));

                    // Populate the table with the updated data
                    populateTable(existingData);
                    document.getElementById("prescription").value = '';
                },
                error: function() {
                    alert('Error fetching data from the database.');
                }
            });
        });
        document.getElementById("saveToDb").addEventListener("click", function(e) {
            e.preventDefault();
            const storedData = localStorage.getItem("medicines");
            const patientId = "<?php echo $patientId; ?>";

            if (storedData && patientId) {
                $.ajax({
                    url: 'store_prescriptions.php',
                    method: 'POST',
                    data: {
                        medicines: storedData,
                        patientId: patientId
                    },
                    success: function(response) {
                        const res = JSON.parse(response);
                        if (res.status === "success") {
                            alert("Data saved successfully!");
                            window.location.href = "index.php";
                        } else {
                            alert(res.message);
                        }
                    },
                    error: function() {
                        alert("An error occurred while saving data.");
                    }
                });
            } else {
                alert("No data to save or patient ID missing.");
            }
        });


        function populateTable(data) {
            const tableBody = document.getElementById("MedicineTable");
            tableBody.innerHTML = ""; // Clear existing rows

            data.forEach((item, index) => {
                const row = `
            <tr>
                <td class="text-center">${index + 1}</td>
                <td class="text-center">${item.medicine}</td>
                <td class="text-center">${item.dosage}</td>
                <td class="text-center">${item.timing}</td>
                <td class="text-center">${item.duration}</td>
            </tr>
        `;
                tableBody.innerHTML += row;
            });
        }

        // Load table from localStorage on page load
        document.addEventListener("DOMContentLoaded", function() {
            const storedData = localStorage.getItem("medicines");
            if (storedData) {
                populateTable(JSON.parse(storedData));
            }
        });
    </script>
</body>

</html>