@extends('layout')
@section('title', 'Admin Dashboard')
@section('body')

@include('sidebar')
    <div class="container">
        <div class="main">
            <main class="content px-2 py-4">
                <div class="container-fluid">
                    <h3 class="fw-bold fs-4 ms-2 mb-3">Key Performance Index(KPI)</h3>
                    <div class="custom-bg-white border border-grey border-2 p-3 rounded shadow">                     
                       @include('kpi.add')   
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($addKpis as $addKpi)
                                        <tr class="border table-light border-dark">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $addKpi->teras }}</td>
                                            <td>{{ $addKpi->SO }}</td>
                                            <td>{{ $addKpi->kpi}}</td>
                                            <td>{{ $addKpi->pernyataan_kpi}}</td>
                                            <td>{{ $addKpi->sasaran}}</td>
                                            <td>{{ $addKpi->jenis_sasaran}}</td>
                                            <td>
                                                <button onclick="openEditPopup({{ $addKpi }})" class="btn btn-warning">Edit</button>
                                                @include('kpi.delete')
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
    
    @include('kpi.edit')
    <script>
        function openEditPopup(addKpi) {
            document.getElementById('kpiForm').action = `/admin/add-kpi/${addKpi.id}`;
            document.getElementById('formSubmitButton').innerText = 'Update';
            document.getElementById('teras').value = addKpi.teras;
            document.getElementById('so').value = addKpi.SO;
            document.getElementById('pernyataan_kpi').value = addKpi.pernyataan_kpi;
            document.getElementById('sasaran').value = addKpi.sasaran;
            document.getElementById('jenis_sasaran').value = addKpi.jenis_sasaran;
            document.getElementById('popupOverlay').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popupOverlay').style.display = 'none';
        }
    </script>
@endsection
