<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="spinner-border" style="width: 8rem; height: 8rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</body>
<script>
    const storedData = localStorage.getItem('selectedTeethData');
    if (storedData) {
        const patientData = JSON.parse(storedData);

        // Send data to support.php
        fetch('support.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(patientData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirect to invoice.php after successfully saving data in the session
                    window.location.href = 'invoice.php';
                    setTimeout(() => {
                        window.location.href = 'index.php';
                        localStorage.removeItem('selectedTeethData');
                    }, 2000);
                } else {
                    alert('Failed to save patient data in session.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    } else {
        alert('No patient data found in localStorage.');
    }
</script>

</html>