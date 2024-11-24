<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="my-4">Daftar Produk</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
        </tr>
        </thead>
        <tbody id="product-table-body">
        <!-- Data akan diisi oleh JavaScript -->
        </tbody>
    </table>
</div>

<!-- Menambahkan jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Script untuk melakukan fetch API -->
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/api/products',
            method: 'GET',
            success: function(data) {
                let rows = '';
                data.forEach(function(product) {
                    rows += `
                        <tr>
                            <td>${product.id}</td>
                            <td>${product.name}</td>
                            <td>${product.description}</td>
                            <td>${product.price}</td>
                        </tr>
                    `;
                });
                $('#product-table-body').html(rows);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>
</body>
</html>
