<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #007bff;
        }
        .list-group-item {
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }
        .list-group-item:hover {
            background-color: #007bff;
            color: white;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="container text-center mt-5">
        <h1 class="mb-3">Welcome to Point of Sales System!</h1>
        <h3 class="mb-4 text-secondary">What do you want to explore?</h3>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="list-group shadow-sm">
                    <a href="{{ route('category.food-beverage') }}" class="list-group-item list-group-item-action">🥤 Food & Beverage</a>
                    <a href="{{ route('category.beauty-health') }}" class="list-group-item list-group-item-action">💄 Beauty & Health</a>
                    <a href="{{ route('category.home-care') }}" class="list-group-item list-group-item-action">🏡 Home Care</a>
                    <a href="{{ route('category.baby-kid') }}" class="list-group-item list-group-item-action">👶 Baby & Kid</a>
                    <a href="{{ route('profile') }}" class="list-group-item list-group-item-action">👤 User Profile</a>
                    <a href="{{ route('sales') }}" class="list-group-item list-group-item-action">🛒 Transaction Page</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>