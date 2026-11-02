<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penghitung Nilai Mahasiswa</title>
</head>
<body>

    <h2>Penghitung Nilai Mahasiswa</h2>

    <form id="formNilai">
        <label>Nama Mahasiswa: </label><br>
        <input type="text" id="nama" required><br><br>

        <label>NIM: </label><br>
        <input type="text" id="nim" required><br><br>

        <label>Nilai Tugas:</label><br>
        <input type="number" id="tugas" min="0" max="100" step="any" required><br><br>

        <label>Nilai UTS:</label><br>
        <input type="number" id="uts" min="0" max="100" step="any" required><br><br>

        <label>Nilai UAS:</label><br>
        <input type="number" id="uas" min="0" max="100" step="any" required><br><br>

        <button type="submit">Hitung Nilai</button>
    </form>

    <h3>Hasil Perhitungan</h3>

    <div id="hasil"></div>

    <script>
        function hitungNilaiAkhir(tugas, uts, uas) {
            return (tugas * 0.3) + (uts * 0.3) + (uas * 0.4);
        }

        function tentukanGrade(nilai) {
            if (nilai >= 85) {
                return "A";
            } else if (nilai >= 75) {
                return "B";
            } else if (nilai >= 65) {
                return "C";
            } else if (nilai >= 50) {
                return "D";
            } else {
                return "E";
            }
        }

        function tentukanStatus(nilai) {
            if (nilai >= 65) {
                return "Lulus";
            } else {
                return "Tidak Lulus";
            }
        }

        function tentukanPredikat(nilai) {
            if (nilai >= 85) {
                return "Sangat Baik";
            } else if (nilai >= 75) {
                return "Baik";
            } else if (nilai >= 65) {
                return "Cukup";
            } else {
                return "Kurang";
            }
        }

        document.getElementById("formNilai").addEventListener("submit", function(event) {
            event.preventDefault();

            let nama = document.getElementById("nama").value.trim();
            let nim = document.getElementById("nim").value.trim();
            let tugas = Number(document.getElementById("tugas").value);
            let uts = Number(document.getElementById("uts").value);
            let uas = Number(document.getElementById("uas").value);

            if (
                nama === "" || nim === "" ||
                !Number.isFinite(tugas) ||
                !Number.isFinite(uts) ||
                !Number.isFinite(uas) ||
                tugas < 0 || tugas > 100 ||
                uts < 0 || uts > 100 ||
                uas < 0 || uas > 100
            ) {
                alert("Isi data dengan benar. Nilai harus 0 sampai 100.");
                return;
            }

            let nilaiAkhir = hitungNilaiAkhir(tugas, uts, uas);
            let grade = tentukanGrade(nilaiAkhir);
            let status = tentukanStatus(nilaiAkhir);
            let predikat = tentukanPredikat(nilaiAkhir);

            document.getElementById("hasil").innerHTML = "";

            let data = [
                "Nama: " + nama,
                "NIM: " + nim,
                "Nilai Tugas: " + tugas,
                "Nilai UTS: " + uts,
                "Nilai UAS: " + uas,
                "Nilai Akhir: " + nilaiAkhir.toFixed(2).replace(".", ","),
                "Grade: " + grade,
                "Predikat: " + predikat,
                "Status: " + status
            ];

            data.forEach(function(item) {
                let paragraf = document.createElement("p");
                paragraf.textContent = item;
                document.getElementById("hasil").appendChild(paragraf);
            });
        });
    </script>

</body>
</html>