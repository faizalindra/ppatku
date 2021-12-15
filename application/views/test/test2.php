<!DOCTYPE html>
<html>

<head>
	<title>test</title>
	<link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<script src="<?= base_url('assets/vendor/jquery/jquery.js') ?>"></script>
</head>

<body>

	<h1>JavaScript Strings</h1>
	<h2>The split() Method</h2>

	<p>split() splits a string into an array of substrings, and returns the array: <?php echo $data[1], $data[2]?></p>

	<p id="demo"></p>
	<p id="uji" class="uji"></p>
	<p id="tester"></p>
	<p><?php echo base_url(); ?></p>


	<table id="example" class="table table-striped" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Name</th>
				<th>Position</th>
				<th>Office</th>
				<th>Age</th>
				<th>Start date</th>
				<th>Salary</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Tiger Nixon</td>
				<td>System Architect</td>
				<td>Edinburgh</td>
				<td id="testing" data-value="1">61</td>
				<td>2011/04/25</td>
				<td>$3,120</td>
			</tr>
			<tr>
				<td>Garrett Winters</td>
				<td>Director</td>
				<td>Edinburgh</td>
				<td>63</td>
				<td>2011/07/25</td>
				<td>$5,300</td>
			</tr>
			<tr>
				<td>Ashton Cox</td>
				<td>Technical Author</td>
				<td>San Francisco</td>
				<td>66</td>
				<td>2009/01/12</td>
				<td>$4,800</td>
			</tr>
			<tr>
				<td>Cedric Kelly</td>
				<td>Javascript Developer</td>
				<td>Edinburgh</td>
				<td>22</td>
				<td>2012/03/29</td>
				<td>$3,600</td>
			</tr>
			<tr>
				<td>Jenna Elliott</td>
				<td>Financial Controller</td>
				<td>Edinburgh</td>
				<td>33</td>
				<td>2008/11/28</td>
				<td>$5,300</td>
			</tr>
			<tr>
				<td>Brielle Williamson</td>
				<td>Integration Specialist</td>
				<td>New York</td>
				<td>61</td>
				<td>2012/12/02</td>
				<td>$4,525</td>
			</tr>
			<tr>
				<td>Herrod Chandler</td>
				<td>Sales Assistant</td>
				<td>San Francisco</td>
				<td>59</td>
				<td>2012/08/06</td>
				<td>$4,080</td>
			</tr>

		</tbody>
	</table>
	<script type="text/javascript" src="<?= base_url('assets/vendor/datatables/jquery.dataTables.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
	<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet" type="text/css">

	<script>
		$(document).ready(function() {
			// var table = $('#example').dataTable({});
			testr();
			// uji();



			document.getElementById("demo").innerHTML = uniq;


			function testr() {
				var id = document.getElementById('testing').getAttribute('data-value');
				// alert(id);
				$.ajax({
					method: 'GET',
					url: '<?php base_url(); ?>uji',
					async: true,
					dataType: 'json',
					data: {
						id: id
					},
					success: function(data) {
						var arrjb = 'AJB,Peningkatan Hak,Pengeringan';
						var array_jb = [];
						var hasil = arrjb.split(","); //mengubah string menjadi array
						for (i = 0; i < hasil.length; i++) {
							// var c =c+i
							// arrayy= [c]
							switch (hasil[i]) {
								case "AJB":
									arrayy = ['5', '7', '8', '10', '13'];
									break;
								case "Hibah":
									arrayy = ['5', '7', '8', '10', '13'];
									break;
								case "APHB":
									arrayy = ['5', '7', '8', '10', '13'];
									break;
								case "Pemecahan":
									arrayy = ['5', '9'];
									break;
								case "APHT":
									arrayy = ['5', '6', '16'];
									break;
								case "SKMHT":
									arrayy = ['15'];
									break;
								case "Konversi":
									arrayy = ['1', '10', '11'];
									break;
								case "Ganti Nama":
									arrayy = ['5', '8'];
									break;
								case "Pengeringan":
									arrayy = ['2', '3', '4'];
									break;
								case "Peningkatan Hak":
									arrayy = ['14'];
									break;
								case "Waris":
									arrayy = ['5', '10', '12'];
									break;
							}
							//mengabungkan array
							array_jb = array_jb.concat(arrayy);
						}
						//mengurutkan array dari kecil ke besar
						array_jb.sort(function(a, b) {
							return a - b
						});

						//menghapus duplikat value dari array
						var uniq = array_jb.reduce(function(a, b) {
							if (a.indexOf(b) < 0) a.push(b);
							return a;
						}, []);
						var html = "";

						for (i = 0; i < uniq.length; i++) {
							// summ = summ + i;
							switch (uniq[i]) {
								case uniq[i] = '1':
									if (data.ukur == 0 || data.ukur == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/ukur">Ukur </button>';
									} else if (data.ukur == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/ukur">Ukur </button>';
									} else if (data.ukur == 3) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/ukur">Ukur </button>';
									};
									break;
								case uniq[i] = '2':
									if (data.pert_teknis == 0 || data.pert_teknis == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/tematik">Tematik </button>';
									} else if (data.pert_teknis == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/tematik">Tematik </button>';
									} else if (data.pert_teknis == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/tematik">Tematik </button>';
									};
									break;
								case uniq[i] = '3':
									if (data.perijinan == 0 || data.perijinan == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/perijinan">Perijinan </button>';
									} else if (data.perijinan == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/perijinan">Perijinan </button>';
									} else if (data.perijinan == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/perijinan">Perijinan </button>';
									};
									break;
								case uniq[i] = '4':
									if (data.pengeringan == 0 || data.pengeringan == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/pengeringan">Pengeringan </button>';
									} else if (data.pengeringan == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/pengeringan">Pengeringan </button>';
									} else if (data.pengeringan == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/pengeringan">Pengeringan </button>';
									}
									break;
								case uniq[i] = '5':
									if (data.cek_plot == 0 || data.cek_plot == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/cek_plot">Cek Plot </button>';
									} else if (data.cek_plot == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/cek_plot">Cek Plot </button>';
									} else if (data.cek_plot == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/cek_plot">Cek Plot </button>';
									};
									break;
								case uniq[i] = '6':
									if (data.cek_sertipikat == 0 || data.cek_sertipikat == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/cek">Cek Sertipikat </button>';
									} else if (data.cek_sertipikat == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/cek">Cek Sertipikat </button>';
									} else if (data.cek_sertipikat == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/cek">Cek Sertipikat </button>';
									};
									break;
								case uniq[i] = '7':
									if (data.roya == 0 || data.roya == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/roya">Roya </button>';
									} else if (data.roya == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/roya">Roya </button>';
									} else if (data.roya == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/roya">Roya </button>';
									};
									break;
								case uniq[i] = '8':
									if (data.ganti_nama == 0 || data.ganti_nama == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/ganti_nama">Ganti Nama </button>';
									} else if (data.ganti_nama == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/ganti_nama">Ganti Nama </button>';
									} else if (data.ganti_nama == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/ganti_nama">Ganti Nama </button>';
									};
									break;
								case uniq[i] = '9':
									if (data.tapak_kapling == 0 || data.tapak_kapling == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/tapak_kapling">Tapak Kapling </button>';
									} else if (data.tapak_kapling == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/tapak_kapling">Tapak Kapling </button>';
									} else if (data.tapak_kapling == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/tapak_kapling">Tapak Kapling </button>';
									};
									break;
								case uniq[i] = '10':
									if (data.bayar_pajak == 0 || data.bayar_pajak == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/pajak">Bayar Pajak </button>';
									} else if (data.bayar_pajak == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/pajak">Bayar Pajak </button>';
									} else if (data.bayar_pajak == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/pajak">Bayar Pajak </button>';
									};
									break;
								case uniq[i] = '11':
									if (data.konversi == 0 || data.konversi == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/konversi">Konversi </button>';
									} else if (data.konversi == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/konversi">Konversi </button>';
									} else if (data.konversi == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/konversi">Konversi </button>';
									};
									break;
								case uniq[i] = '12':
									if (data.waris == 0 || data.waris == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/waris">Waris </button>';
									} else if (data.waris == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/waris">Waris </button>';
									} else if (data.waris == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/waris">Waris </button>';
									};
									break;
								case uniq[i] = '13':
									if (data.balik_nama == 0 || data.balik_nama == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/balik_nama">Balik Nama </button>';
									} else if (data.balik_nama == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/balik_nama">Balik Nama </button>';
									} else if (data.balik_nama == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/balik_nama">Balik Nama </button>';
									};
									break;
								case uniq[i] = '14':
									if (data.peningkatan_hak == 0 || data.peningkatan_hak == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/peningkatan_hak">Peningkatan Hak </button>';
									} else if (data.peningkatan_hak == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/peningkatan_hak">Peningkatan Hak </button>';
									} else if (data.peningkatan_hak == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/peningkatan_hak">Peningkatan Hak </button>';
									};
									break;
								case uniq[i] = '15':
									if (data.skmht == 0 || data.skmht == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/skmht">SKMHT </button>';
									} else if (data.skmht == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/skmht">SKMHT </button>';
									} else if (data.skmht == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/skmht">SKMHT </button>';
									};
									break;
								case uniq[i] = '16':
									if (data.ht == 0 || data.ht == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/ht">HT </button>';
									} else if (data.ht == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/ht">HT </button>';
									} else if (data.ht == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/ht">HT </button>';
									};
									break;
								case uniq[i] = '17':
									if (data.ganti_blangko == 0 || data.ganti_blangko == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/ganti_blangko">Ganti Blangko </button>';
									} else if (data.ganti_blangko == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/ganti_blangko">Ganti Blangko </button>';
									} else if (data.ganti_blangko == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/ganti_blangko">Ganti Blangko </button>';
									};
									break;
								case uniq[i] = '18':
									if (data.iph == 0 || data.iph == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/iph">IPH </button>';
									} else if (data.iph == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/iph">IPH </button>';
									} else if (data.iph == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/iph">IPH </button>';
									};
									break;
								case uniq[i] = '19':
									if (data.znt == 0 || data.znt == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/znt">ZNT </button>';
									} else if (data.znt == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/znt">ZNT </button>';
									} else if (data, znt == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/znt">ZNT </button>';
									};
									break;
								case uniq[i] = '20':
									if (data.pajak_konv == 0 || data.pajak_konv == null) {
										html += '<button type="button" class="btn btn-secondary btn-rounded href="<?php base_url(); ?>proses/pajak_konv">Bayar Pajak Konversi </button>';
									} else if (data.pajak_konv == 1) {
										html += '<button type="button" class="btn btn-warning btn-rounded href="<?php base_url(); ?>proses/pajak_konv">Bayar Pajak Konversi </button>';
									} else if (data.pajak_konv == 2) {
										html += '<button type="button" class="btn btn-success btn-rounded href="<?php base_url(); ?>proses/pajak_konv">Bayar Pajak Konversi </button>';
									};
									break;
							}
						}
						document.getElementById("tester").innerHTML = html;
					},
					error: function() {
						alert('gagal');
					}
				});
			}

		});
	</script>

</body>

</html>