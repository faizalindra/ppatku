<!DOCTYPE html>
<html>

<head>
    <title>Dynamic Select Option using Codeigniter and Ajax</title>
    <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">

        <div class="row justify-content-md-center">
            <div class="col col-lg-6">
                <h3>Product Form:</h3>
                <form>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="">No Selected</option>
                            <?php foreach ($kecamatan as $row) : ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sub Category</label>
                        <select class="form-control" id="sub_category" name="sub_category" required>
                            <option>No Selected</option>

                        </select>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/vendor/jquery/jquery-3.3.1.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js.map')?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#desa').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('wilayah/get_desa'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id + '>' + data[i].nama + '</option>';
                        }
                        $('#desa').html(html);

                    }
                });
                return false;
            });

        });
    </script>
</body>

</html>