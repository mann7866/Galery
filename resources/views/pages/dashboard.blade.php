<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pinterest Grid dengan Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .grid-item {
            margin-bottom: 15px;
        }
        .grid-item img {
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row" id="pinterest-grid">
            <div class="col-md-4 col-sm-6 grid-item">
                <img src="{{ asset('images/Screenshot 2025-01-18 191242.png') }}" alt="Image">
            </div>
            <div class="col-md-4 col-sm-6 grid-item">
                <img src="{{ asset('images/Screenshot 2025-01-19 121155.png') }}" alt="Image">
            </div>
            <div class="col-md-4 col-sm-6 grid-item">
                <img src="{{ asset('images/Screenshot 2025-01-24 194548.png') }}" alt="Image">
            </div>
            <div class="col-md-4 col-sm-6 grid-item">
                <img src="{{ asset('images/Screenshot 2025-01-31 102043.png') }}" alt="Image">
            </div>
            <div class="col-md-4 col-sm-6 grid-item">
                <img src="{{ asset('images/Screenshot 2025-01-18 191242.png') }}" alt="Image">
            </div>
            <div class="col-md-4 col-sm-6 grid-item">
                <img src="{{ asset('images/Screenshot 2025-01-18 191242.png') }}" alt="Image">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
