@extends('layout')
@section('title', 'KPI')
@section('body')

@include('sidebar')
<div class="container">
    <div class="main">
        <main class="content px-2 py-4">
            <div class="container-fluid">
                <h3 class="fw-bold fs-4 ms-2 mb-3">Key Performance Index(KPI)</h3>
                <div class="custom-bg-white border border-grey border-2 p-3 rounded shadow">
                    @include('admin.KPI.add')   
                    <div class="table-responsive table-responsive-sm">
                        <table class="table mt-3 p-3">
                            <thead>
                                <tr class="border border-dark table-success text-start">
                                    <th>Bil</th>
                                    <th>Teras</th>
                                    <th>SO</th>                          
                                    <th>KPI</th>
                                    <th>Pernyataan KPI</th>
                                    <th>Sasaran</th>
                                    <th>Jenis Sasaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($addKpis as $addKpi)
                                    <tr class="border table-light border-dark">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $addKpi->teras }}</td>
                                        <td>{{ $addKpi->SO }}</td>
                                        <td>{{ $addKpi->kpi }}</td>
                                        <td>{{ $addKpi->pernyataan_kpi }}</td>
                                        <td>{{ $addKpi->sasaran }}</td>
                                        <td>{{ $addKpi->jenis_sasaran }}</td>
                                        <td>
                                            <button onclick="openEditPopup({{ json_encode($addKpi) }})" class="btn btn-warning">Edit</button>
                                            @include('admin.KPI.delete')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </main>
    </div>
</div>      



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

<script>
    function openAddPopup() {
        document.getElementById('addPopupOverlay').style.display = 'block';
    }

    function closeAddPopup() {
        document.getElementById('addPopupOverlay').style.display = 'none';
    }

    function openEditPopup(addKpi) {
        document.getElementById('editKpiForm').action = `/admin/addKpi/update/${addKpi.id}`;
        document.getElementById('editTeras').value = addKpi.teras;
        document.getElementById('editSO').value = addKpi.SO;
        document.getElementById('editPernyataanKpi').value = addKpi.pernyataan_kpi;
        document.getElementById('editSasaran').value = addKpi.sasaran;
        document.getElementById('editJenisSasaran').value = addKpi.jenis_sasaran;
        document.getElementById('editPopupOverlay').style.display = 'block';
    }

    function closeEditPopup() {
        document.getElementById('editPopupOverlay').style.display = 'none';
    }
</script>
@endsection
