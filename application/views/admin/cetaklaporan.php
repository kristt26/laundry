<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .line-title {
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>
</head>

<body>
  <img src="assets/img/logo.jpg" style="position: absolute; width: 60px; height: auto;">
  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          SEKOLAH TINGGI ILMU KOMPUTER DAN INFORMATIKA
          <br>MAKASSAR INDONESIA
        </span>
      </td>
    </tr>
  </table>

  <hr class="line-title">
  <p align="center">
    LAPORAN DATA MAHASISWA <br>
    <b>Angkatan 2018</b>
  </p>
  <table class="table table-bordered">
    <tr>
      <th>#</th>
      <th>Nim</th>
      <th>Nama</th>
      <th>Jurusan</th>
    </tr>
    <?php $no = 1; foreach ($data as $row): ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $row['nim'] ?></td>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['jurusan'] ?></td>
    </tr>
    <?php endforeach ?>
  </table>
  <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
  <script type="text/javascript">
      var doc = new jsPDF();
          var specialElementHandlers = {
              '#editor': function (element, renderer) {
              return true;
          }
      };

      $('#konvert').click(function () {   
          doc.fromHTML($('#konten').html(), 15, 15, {
              'width': 170,
                  'elementHandlers': specialElementHandlers
          });
          doc.save('contoh-file.pdf');
      });
  </script>
</body>

</html>