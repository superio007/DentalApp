<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>

<body>
    <style>
        #overlay {
            position: fixed;
            /* Use fixed to prevent scrolling issues */
            z-index: 9999;
            background-color: white;
            width: 100vw;
            height: 100vh;
            transition: transform 0.5s ease, opacity 0.5s ease;
        }

        #overlay.hidden {
            transform: translateY(-100%);
            opacity: 0;
        }
    </style>
    <div id="overlay">
        <div class="d-grid align-content-center justify-content-center" style="height: 100vh;">
            <div>
                <img src="./images/logo.png" alt="Logo" style="width: 50rem;">
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button id="enter" class="btn btn-primary rounded">Enter</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const overlay = document.getElementById("overlay");
            const enterButton = document.getElementById("enter");

            enterButton.addEventListener("click", () => {
                overlay.classList.add("hidden");
                setTimeout(() => overlay.remove(), 500); // Fallback for transition
            });
        });
    </script>
</body>

</html>