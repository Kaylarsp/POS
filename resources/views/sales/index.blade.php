<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS (Point of Sales) System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .pos-container {
            background-color: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #0d6efd;
        }
    </style>
</head>

<body>
    <div class="container text-center mt-5">
        <h1 class="mb-4">🛒 Halaman Transaksi POS</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="pos-container shadow-sm">
                    <h4 class="mb-3">Masukkan Data Transaksi</h4>
                    <form>
                        <div class="mb-3">
                            <label for="product" class="form-label">Pilih Produk</label>
                            <select class="form-select" id="product">
                                <option selected>-- Pilih Produk --</option>
                                <option value="1">Cafe Latte</option>
                                <option value="2">Sheet Mask</option>
                                <option value="3">Vacuum Cleaner</option>
                                <option value="4">Disposable Diapers</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="quantity" placeholder="Masukkan jumlah">
                        </div>
                        <button type="submit" class="btn btn-success w-100">🛍 Proses Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
