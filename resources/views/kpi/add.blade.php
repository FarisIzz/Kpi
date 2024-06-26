<!DOCTYPE html>
<html>
<head>
    <title>Add New KPI</title>
</head>
<body>

<h2>Add New KPI</h2>

<form action="{{ route('admin.add-kpi') }}" method="POST">
    @csrf
    <label for="teras">Teras:</label>
    <input type="text" id="teras" name="teras" required><br><br>

    <label for="so">SO:</label>
    <input type="text" id="so" name="so" required><br><br>

    <label for="negeri">Negeri:</label>
    <input type="number" id="negeri" name="negeri" required><br><br>

    <label for="pemilik">Pemilik:</label>
    <input type="text" id="pemilik" name="pemilik" required><br><br>

    <label for="kpi">KPI:</label>
    <input type="text" id="kpi" name="kpi" required><br><br>

    <label for="pernyataan_kpi">Pernyataan KPI:</label>
    <input type="text" id="pernyataan_kpi" name="pernyataan_kpi" required><br><br>

    <label for="sasaran">Sasaran:</label>
    <input type="text" id="sasaran" name="sasaran" required><br><br>

    <label for="jenis_sasaran">Jenis Sasaran:</label>
    <input type="text" id="jenis_sasaran" name="jenis_sasaran" required><br><br>

    <label for="pencapaian">Pencapaian:</label>
    <input type="text" id="pencapaian" name="pencapaian" required><br><br>

    <label for="peratus_pencapaian">Peratus Pencapaian:</label>
    <input type="text" id="peratus_pencapaian" name="peratus_pencapaian" required><br><br>

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" required><br><br>

    <button type="submit">Add KPI</button>
</form>

</body>
</html>
