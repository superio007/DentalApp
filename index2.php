<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <style>
    .teeth {
      position: absolute;
      background: transparent;
      border-radius: 50%;
    }
  </style>
</head>

<body>
  <div id="teeth" class="container">
    <h1 class="text-center">Teeth</h1>
    <div
      id="teeth-map"
      class="container d-grid justify-content-center"
      style="width: 1116px; position: relative; height: 556px">
      <img src="./images/dentalChart.jpeg" alt="" />
      <div
        class="modal fade"
        id="toothModal"
        tabindex="-1"
        aria-labelledby="toothModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="toothModalLabel">Teeth Details</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 300px;overflow-y: scroll;">
              <h6>Select applicable options:</h6>
              <form id="toothForm">
                <!-- Checkboxes will be injected here -->
              </form>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary" id="submitBtn">
                Submit
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Interactive teeth as divs -->
      <span>
        <div
          id="tooth-11"
          class="teeth"
          style="right: 35.04rem; top: 4.5rem; width: 32px; height: 45px"></div>
        <div
          id="tooth-12"
          class="teeth"
          style="right: 37.25rem; top: 5rem; width: 20px; height: 35px"></div>
        <div
          id="tooth-13"
          class="teeth"
          style="right: 38.8rem; top: 5rem; width: 25px; height: 36px"></div>
        <div
          id="tooth-14"
          class="teeth"
          style="right: 40.5rem; top: 5rem; width: 30px; height: 35px"></div>
        <div
          id="tooth-15"
          class="teeth"
          style="right: 42.5rem; top: 5rem; width: 29px; height: 35px"></div>
        <div
          id="tooth-16"
          class="teeth"
          style="right: 44.3rem; top: 5.3rem; width: 39px; height: 31px"></div>
        <div
          id="tooth-17"
          class="teeth"
          style="right: 46.8rem; top: 5.5rem; width: 37px; height: 28px"></div>
        <div
          id="tooth-18"
          class="teeth"
          style="right: 49.4rem; top: 5.5rem; width: 30px; height: 28px"></div>
      </span>
      <span>
        <div
          id="tooth-21"
          class="teeth"
          style="right: 32.4rem; top: 4rem; width: 30px; height: 51px"></div>
        <div
          id="tooth-22"
          class="teeth"
          style="right: 30.8rem; top: 5rem; width: 23px; height: 35px"></div>
        <div
          id="tooth-23"
          class="teeth"
          style="right: 29rem; top: 5rem; width: 25px; height: 36px"></div>
        <div
          id="tooth-24"
          class="teeth"
          style="right: 27.1rem; top: 5rem; width: 28px; height: 35px"></div>
        <div
          id="tooth-25"
          class="teeth"
          style="right: 25.2rem; top: 5rem; width: 29px; height: 35px"></div>
        <div
          id="tooth-26"
          class="teeth"
          style="right: 22.7rem; top: 5.3rem; width: 40px; height: 31px"></div>
        <div
          id="tooth-27"
          class="teeth"
          style="right: 20.25rem; top: 5.5rem; width: 37px; height: 28px"></div>
        <div
          id="tooth-28"
          class="teeth"
          style="right: 17.8rem; top: 5.5rem; width: 36px; height: 28px"></div>
      </span>
      <span>
        <div
          id="tooth-41"
          class="teeth"
          style="right: 34.9rem; top: 17.1rem; width: 22px; height: 40px"></div>
        <div
          id="tooth-42"
          class="teeth"
          style="right: 36.3rem; top: 17.4rem; width: 25px; height: 35px"></div>
        <div
          id="tooth-43"
          class="teeth"
          style="right: 37.96rem; top: 17.199rem; width: 29px; height: 45px"></div>
        <div
          id="tooth-44"
          class="teeth"
          style="right: 39.9rem; top: 17.19rem; width: 30px; height: 40px"></div>
        <div
          id="tooth-45"
          class="teeth"
          style="right: 41.7rem; top: 17.3rem; width: 29px; height: 40px"></div>
        <div
          id="tooth-46"
          class="teeth"
          style="right: 43.7rem; top: 17.3rem; width: 45px; height: 33px"></div>
        <div
          id="tooth-47"
          class="teeth"
          style="right: 46.6rem; top: 17.5rem; width: 40px; height: 28px"></div>
        <div
          id="tooth-48"
          class="teeth"
          style="right: 49.2rem; top: 17.5rem; width: 34px; height: 28px"></div>
      </span>
      <span>
        <div
          id="tooth-31"
          class="teeth"
          style="right: 33.4rem; top: 16.99rem; width: 20px; height: 42px"></div>
        <div
          id="tooth-32"
          class="teeth"
          style="right: 31.6rem; top: 17.2rem; width: 24px; height: 39px"></div>
        <div
          id="tooth-33"
          class="teeth"
          style="right: 29.7rem; top: 17.3rem; width: 28px; height: 43px"></div>
        <div
          id="tooth-34"
          class="teeth"
          style="right: 27.9rem; top: 17.3rem; width: 28px; height: 43px"></div>
        <div
          id="tooth-35"
          class="teeth"
          style="right: 25.9rem; top: 17.4rem; width: 29px; height: 35px"></div>
        <div
          id="tooth-36"
          class="teeth"
          style="right: 22.9rem; top: 17.3rem; width: 46px; height: 33px"></div>
        <div
          id="tooth-37"
          class="teeth"
          style="right: 20.45rem; top: 17.5rem; width: 37px; height: 28px"></div>
        <div
          id="tooth-38"
          class="teeth"
          style="right: 17.99rem; top: 17.5rem; width: 34px; height: 28px"></div>
      </span>
      <span>
        <div
          id="tooth-51"
          class="teeth"
          style="right: 34.9rem; top: 10.4rem; width: 25px; height: 25px"></div>
        <div
          id="tooth-52"
          class="teeth"
          style="right: 36.5rem; top: 10.5rem; width: 22px; height: 22px"></div>
        <div
          id="tooth-53"
          class="teeth"
          style="right: 38rem; top: 10.3rem; width: 28px; height: 25px"></div>
        <div
          id="tooth-54"
          class="teeth"
          style="right: 39.8rem; top: 10.6rem; width: 28px; height: 20px"></div>
        <div
          id="tooth-55"
          class="teeth"
          style="right: 41.9rem; top: 10.5rem; width: 35px; height: 25px"></div>
      </span>
      <span>
        <div
          id="tooth-61"
          class="teeth"
          style="right: 32.9rem; top: 10.4rem; width: 28px; height: 27px"></div>
        <div
          id="tooth-62"
          class="teeth"
          style="right: 31.4rem; top: 10.5rem; width: 23px; height: 24px"></div>
        <div
          id="tooth-63"
          class="teeth"
          style="right: 29.7rem; top: 10.5rem; width: 25px; height: 24px"></div>
        <div
          id="tooth-64"
          class="teeth"
          style="right: 27.9rem; top: 10.56rem; width: 27px; height: 22px"></div>
        <div
          id="tooth-65"
          class="teeth"
          style="right: 25.3rem; top: 10.5rem; width: 36px; height: 23px"></div>
      </span>
      <span>
        <div
          id="tooth-71"
          class="teeth"
          style="right: 33.5rem; top: 12.7rem; width: 18px; height: 25px"></div>
        <div
          id="tooth-72"
          class="teeth"
          style="right: 32.2rem; top: 12.7rem; width: 20px; height: 24px"></div>
        <div
          id="tooth-73"
          class="teeth"
          style="right: 30.5rem; top: 12.9rem; width: 25px; height: 24px"></div>
        <div
          id="tooth-74"
          class="teeth"
          style="right: 28.3rem; top: 12.9rem; width: 33px; height: 27px"></div>
        <div
          id="tooth-75"
          class="teeth"
          style="right: 25.5rem; top: 12.9rem; width: 41px; height: 23px"></div>
      </span>
      <span>
        <div
          id="tooth-81"
          class="teeth"
          style="right: 34.9rem; top: 12.7rem; width: 17px; height: 25px"></div>
        <div
          id="tooth-82"
          class="teeth"
          style="right: 35.99rem; top: 12.7rem; width: 20px; height: 24px"></div>
        <div
          id="tooth-83"
          class="teeth"
          style="right: 37.3rem; top: 12.9rem; width: 24px; height: 24px"></div>
        <div
          id="tooth-84"
          class="teeth"
          style="right: 38.9rem; top: 12.9rem; width: 39px; height: 27px"></div>
        <div
          id="tooth-85"
          class="teeth"
          style="right: 41.4rem; top: 12.9rem; width: 41px; height: 23px"></div>
      </span>
      <script>
        //   document.querySelectorAll(".teeth").forEach((tooth) => {
        //     tooth.addEventListener("click", function () {
        //       // Reset all divs
        //       document
        //         .querySelectorAll(".teeth")
        //         .forEach((el) => (el.style.background = "transparent"));
        //       // Highlight the clicked one
        //       this.style.background = "#bcbcd28c";
        //       alert(`You clicked on ${this.id}`);
        //     });
        //   });
        // Array to store selected teeth data
        document.addEventListener('DOMContentLoaded', async () => {
          var modalData;
          try {
            modalData = await fetchSurgeryData();
            // console.log(modalData);
          } catch (error) {
            console.error('Error fetching surgeries:', error);
          }
          const selectedTeethData = [];

          async function fetchSurgeryData() {
            return new Promise((resolve, reject) => {
              const xhr = new XMLHttpRequest();
              xhr.open("GET", "getSurgeries.php", true);
              xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                  if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                      resolve(response.data);
                    } else {
                      reject("Error fetching surgeries.");
                    }
                  } else {
                    reject("Error fetching surgeries.");
                  }
                }
              };
              xhr.send();
            });
          }



          // Add event listeners to all teeth divs
          document.querySelectorAll(".teeth").forEach((tooth) => {
            tooth.addEventListener("click", function() {
              const toothId = this.id;
              // Highlight the clicked one
              document
                .querySelectorAll(".teeth")
                .forEach((el) => (el.style.background = "transparent"));
              this.style.background = "#bcbcd28c";

              // Open the modal
              const modal = new bootstrap.Modal(document.getElementById("toothModal"));
              modal.show();

              // Inject checkboxes for the selected tooth
              const form = document.getElementById("toothForm");
              // Clear previous checkboxes before injecting new ones
              form.innerHTML = "";

              // Loop through modalData and create checkboxes dynamically
              modalData.forEach((item, index) => {
                // console.log(item);
                form.innerHTML += `
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="${item.price || 'N/A'}" id="checkbox-${index + 1}" />
                    <label class="form-check-label" for="checkbox-${index + 1}">
                      ${item.surgery_name || 'No label'})
                    </label>
                  </div>
                `;
              });

              // Handle form submission
              document.getElementById("submitBtn").onclick = function() {
                const selectedOptions = [];
                const checkboxes = form.querySelectorAll(".form-check-input");

                checkboxes.forEach((checkbox, index) => {
                  if (checkbox.checked) {
                    // Add checkbox value
                    selectedOptions.push(checkbox.value);

                    // Add the corresponding label text content
                    const label = form.querySelectorAll(".form-check-label")[index];
                    if (label) {
                      selectedOptions.push(label.textContent.trim()); // Add the label text
                    }
                  }
                });

                // Push the data into the array
                selectedTeethData.push({
                  toothId: toothId,
                  selectedOptions: selectedOptions,
                });

                // Close the modal
                modal.hide();

                // Log the selected data to the console
                console.log(selectedTeethData);
              };

            });
          });
        });
      </script>
    </div>
  </div>
</body>

</html>