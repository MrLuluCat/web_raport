<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Bordered Table</h2>
        <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="col-sm-1 text-center align-middle" rowspan="2">No.</th>
                    <th class="col-md-2 text-center align-middle" rowspan="2">Mata Pelajaran</th>
                    <th class="col-sm-1 text-center align-middle" rowspan="2">KKM</th>
                    <th class="col-md-2 text-center align-middle" colspan="2">Nilai</th>
                    <th class="col-sm-2 text-center align-middle" rowspan="2">Deskripsi Kemajuan Belajar</th>
                </tr>
                <tr>
                    <th class="text-center">Angka</th>
                    <th class="text-center">Huruf</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Matematika</td>
                    <td>75</td>
                    <td>85</td>
                    <td>Delapan Puluh Lima</td>
                    <td>Tuntas</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Bahasa Inggris</td>
                    <td>70</td>
                    <td>80</td>
                    <td>Delapan Puluh Lima</td>
                    <td>Tuntas</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Biologi</td>
                    <td>80</td>
                    <td>90</td>
                    <td>Delapan Puluh Lima</td>
                    <td>Tuntas</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>