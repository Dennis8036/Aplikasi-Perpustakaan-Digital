<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Buku</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        .card {
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table {
            min-width: 1300px;
        }
    </style>
    <!-- Include jsPDF and jsPDF-AutoTable library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.21/jspdf.plugin.autotable.min.js"></script>
    <!-- Include SheetJS for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    <button onclick="printAllColumns()" class="btn btn-success">Print</button>
                    <button onclick="printPDF()" class="btn btn-danger">Print PDF</button>
                    <button onclick="downloadExcel()" class="btn btn-primary">Download Excel</button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="laporanBuku">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($buku as $buku) {
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $buku->nama_kategori ?></td>
                                        <td><?= $buku->judul ?></td>
                                        <td><?= $buku->penulis ?></td>
                                        <td><?= $buku->penerbit ?></td>
                                        <td><?= $buku->tahunterbit ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to print the table
        function printAllColumns() {
            var printTable = '<table class="table">';
            printTable += '<thead><tr><th>No</th><th>Kategori</th><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun Terbit</th></tr></thead><tbody>';

            var rows = document.querySelectorAll('table tbody tr');
            rows.forEach(function (row) {
                var nomor = row.querySelector('td:nth-child(1)').textContent;
                var kategori = row.querySelector('td:nth-child(2)').textContent;
                var judul = row.querySelector('td:nth-child(3)').textContent;
                var penulis = row.querySelector('td:nth-child(4)').textContent;
                var penerbit = row.querySelector('td:nth-child(5)').textContent;
                var tahun_terbit = row.querySelector('td:nth-child(6)').textContent;

                printTable += `<tr><td>${nomor}</td><td>${kategori}</td><td>${judul}</td><td>${penulis}</td><td>${penerbit}</td><td>${tahun_terbit}</td></tr>`;
            });

            printTable += '</tbody></table>';
            var newWindow = window.open('', '', 'width=800,height=600');
            newWindow.document.write('<html><head><title>Print Laporan Buku</title>');
            newWindow.document.write('<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid black; padding: 8px; text-align: left; }</style>');
            newWindow.document.write('</head><body>');
            newWindow.document.write(printTable);
            newWindow.document.write('</body></html>');
            newWindow.document.close();

            setTimeout(function() {
                newWindow.focus();
                newWindow.print();
                newWindow.close();
            }, 500);
        }

        // Function to print the table as PDF and open in a new tab
        function printPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            var table = document.getElementById("laporanBuku");
            var rows = table.querySelectorAll("tbody tr");
            
            var tableData = [];
            rows.forEach(function(row) {
                var columns = row.querySelectorAll("td");
                var data = [
                    columns[0].innerText,
                    columns[1].innerText,
                    columns[2].innerText,
                    columns[3].innerText,
                    columns[4].innerText,
                    columns[5].innerText
                ];
                tableData.push(data);
            });

            const columns = ["No", "Kategori", "Judul", "Penulis", "Penerbit", "Tahun Terbit"];
            
            doc.autoTable({
                head: [columns],
                body: tableData,
                startY: 20,
            });

            var pdfOutput = doc.output('bloburl');
            window.open(pdfOutput, '_blank');
        }

        // Function to download the table as Excel file
        function downloadExcel() {
            var table = document.getElementById("laporanBuku");
            
            // Convert table HTML to Excel format using SheetJS
            var wb = XLSX.utils.table_to_book(table, {sheet: "Laporan Buku"});
            
            // Write the Excel file and download it
            XLSX.writeFile(wb, "laporan_buku.xlsx");
        }
    </script>
</body>
</html>
