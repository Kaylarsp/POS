<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-card {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .profile-card:hover {
            transform: scale(1.02);
        }

        h1 {
            color: #6f42c1;
        }
    </style>
</head>

<body>
    <div class="container text-center mt-5">
        <h1 class="mb-4">👤 Profil Pengguna</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="profile-card shadow-sm">
                    <h3>Nama: <span class="text-primary">{{ $name }}</span></h3>
                    <h4>ID: <span class="text-secondary">{{ $id }}</span></h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>