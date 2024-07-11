<!-- Popup untuk edit KPI -->
<div class="popup-overlay" id="editPopupOverlay" style="display: none;">
    <div class="popup-form">
        <form id="editKpiForm" action="" method="POST">
            @csrf
            @method('PUT')
            <!-- Form fields for editing KPI -->
            <label for="editTeras">Teras:</label>
            <input type="text" id="editTeras" name="teras" required><br><br>
        
            <label for="editSO">SO:</label>
            <input type="text" id="editSO" name="so" required><br><br>
        
            <label for="editPernyataanKpi">Pernyataan KPI:</label>
            <input type="text" id="editPernyataanKpi" name="pernyataan_kpi" required><br><br>

            <label for="editSasaran">Sasaran:</label>
            <input type="text" id="editSasaran" name="sasaran" required><br><br>
        
            <label for="editJenisSasaran">Jenis Sasaran:</label>
            <input type="text" id="editJenisSasaran" name="jenis_sasaran" required><br><br>
        
            <!-- Submit button -->
            <div class="d-flex justify-content-end">
                <button class="btn btn-success me-2" type="submit">Update</button>
                <button class="btn btn-danger" onclick="closeEditPopup()" type="button">Close</button>
            </div>
        </form>
    </div>
</div>