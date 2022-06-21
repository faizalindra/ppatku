<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <!-- buat heading 1 dan 2, text akses ditolak -->
        <div class="col-md-12">
            <h1>Akses Ditolak</h1>
        </div>
        <div class="row">
            <?php
            if ($this->session->userdata('role_id') == '0') {
                echo '<a href="' . base_url('notaris') . '">Kembali ke Dashboard</a>';
            } else if ($this->session->userdata('role_id') == '1') {
                echo '<a href="' . base_url('admin') . '">Kembali ke Dashboard</a>';
            } else {
                echo '<a href="' . base_url('staff') . '">Kembali ke Dashboard</a>';
            }
            ?>
        </div>
    </div>
</body>

</html>