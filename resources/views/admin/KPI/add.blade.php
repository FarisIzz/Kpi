<div class="row justify-content-end">
    <div class="col-auto">
        <button type="button" class="btn btn-success mb-3" onclick="openAddPopup()">Add New</button>

        <!-- Popup untuk tambah KPI -->
        <div class="popup-overlay" id="addPopupOverlay" style="display: none;">
            <div class="popup-form">
                <form action="{{ route('kpi.store') }}" method="POST">
                    @csrf
                    <!-- Form fields for adding a new KPI -->
                    <label for="teras">Teras:</label>
                    <input type="text" id="addTeras" name="teras" required><br><br>
                
                    <label for="so">SO:</label>
                    <input type="text" id="addSO" name="so" required><br><br>
                
                    <label for="pernyataan_kpi">Pernyataan KPI:</label>
                    <input type="text" id="addPernyataanKpi" name="pernyataan_kpi" required><br><br>

                    <label for="sasaran">Sasaran:</label>
                    <input type="text" id="addSasaran" name="sasaran" required><br><br>
                
                    <label for="jenis_sasaran">Jenis Sasaran:</label>
                    <input type="text" id="addJenisSasaran" name="jenis_sasaran" required><br><br>
                
                    <!-- Submit button -->
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success me-2" type="submit">Add</button>
                        <button class="btn btn-danger" onclick="closeAddPopup()" type="button">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 

