<div class="row justify-content-end">
    <div class="col-auto">
        <button class="btn btn-success mb-2" onclick="openPopup()">Add New</button>

        <!-- Popup overlay -->
        <div class="popup-overlay" id="popupOverlay">
            <div class="popup-form">
                <form action="{{ route('admin.add-kpi') }}" method="POST">
                    @csrf
                    <!-- Form fields for adding a new KPI -->
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
                
                    <!-- Submit button -->
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success me-2" type="submit">Add</button>
                        <button class="btn btn-danger" onclick="closePopup()" type="submit">Close</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div> 