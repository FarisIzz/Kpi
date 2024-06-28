<!-- resources/views/kpi-form.blade.php -->
<div class="popup-overlay" id="popupOverlay" style="display:none;">
    <div class="popup-form">
        <form id="kpiForm" action="" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="_method" id="formMethod">
            <label for="teras">Teras:</label>
            <input type="text" id="teras" name="teras" required><br><br>

            <label for="so">SO:</label>
            <input type="text" id="so" name="so" required><br><br>

            <label for="pernyataan_kpi">Pernyataan KPI:</label>
            <input type="text" id="pernyataan_kpi" name="pernyataan_kpi" required><br><br>

            <label for="sasaran">Sasaran:</label>
            <input type="text" id="sasaran" name="sasaran" required><br><br>

            <label for="jenis_sasaran">Jenis Sasaran:</label>
            <input type="text" id="jenis_sasaran" name="jenis_sasaran" required><br><br>

            <button class="btn btn-success" type="submit" id="formSubmitButton">Save</button>
            <button class="btn btn-danger" type="button" onclick="closePopup()">Close</button>
        </form>
    </div>
</div>

<script>
     
</script>
