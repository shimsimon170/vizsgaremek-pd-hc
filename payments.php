<?php
// payments.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Payments -Yume Neko Café</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <div class="text-center">
                <h2 class="mb-4">Payment</h2>
                <p class="mb-3">Meow! We're processing your payment. Grab a coffee while you wait ☕🐾</p>

                <div class="spinner-border text-warning mb-4" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

                <div>
                    <button class="btn btn-cozy me-2" data-bs-toggle="modal" data-bs-target="#successModal">Simulate Success</button>
                    <button class="btn btn-cancel" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="successModalLabel">Payment Successful</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Thank you! Your payment went through purrr-fectly. 🐱
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="cancelModalLabel">Payment Cancelled</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Oops! Your payment was cancelled. Maybe a cat walked across the keyboard? 🐾
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
 
    <style>
        body {
            background-image: url('bg/catcafebg.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #4b3d33;
        }

        .card {
            background-color: rgba(255, 250, 243, 0.8); 
            border: none;
            border-radius: 15px;
            width: 80%; 
            margin: 0 auto; 
            padding: 20px; 
        }

        .btn-cozy {
            background-color: #a97449;
            color: white;
            border: none;
        }

        .btn-cozy:hover {
            background-color: #92613d;
        }

        .btn-cancel {
            background-color: #c66b4e;
            color: white;
            border: none;
        }

        .btn-cancel:hover {
            background-color: #aa583e;
        }

        .modal-header.bg-success,
        .btn-success {
            background-color: #7e5a3a !important;
            color: white;
        }

        .modal-header.bg-danger,
        .btn-danger {
            background-color: #a94c3f !important;
            color: white;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
