<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <!-- HTML to display the surgeries data -->
  <div id="surgeries-list"></div>
</body>


<script>
  // Function to fetch surgery data
  function fetchSurgeryData() {
    // Create an AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "getSurgeries.php", true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        const response = JSON.parse(xhr.responseText); // Parse the JSON response
        if (response.success) {
          // Handle the response (you can display it in a table or log it to the console)
          console.log(response.data); // Log the surgeries data to the console (or display in HTML)
          displaySurgeries(response.data); // Call a function to display the surgeries
        } else {
          console.error("Error fetching surgeries.");
        }
      }
    };
    xhr.send();
  }

  // Function to display the surgeries in a table
  function displaySurgeries(surgeries) {
    let html = "<table class='table table-striped'><thead><tr><th>ID</th><th>Surgery Name</th><th>Price</th></tr></thead><tbody>";
    surgeries.forEach(surgery => {
      html += `<tr><td>${surgery.id}</td><td>${surgery.surgery_name}</td><td>${surgery.price}</td></tr>`;
    });
    html += "</tbody></table>";
    document.getElementById("surgeries-list").innerHTML = html;
  }

  // Trigger the AJAX call on page load or any other event
  window.onload = function() {
    fetchSurgeryData();
  };
</script>

</html>