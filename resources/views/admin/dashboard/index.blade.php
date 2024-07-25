@extends('layout')
@section('title', 'JABATAN PENJARA MALAYSIA ')
@section('body')
<style>
     .small-text {
        font-size: 0.75rem; /* Mengurangkan saiz font */
        white-space: nowrap; /* Mengelakkan pembungkusan teks */
        text-overflow: ellipsis; /* Menambah ellipsis jika teks melebihi lebar sel */
        overflow: hidden; /* Mengelakkan teks melimpah keluar dari sel */
    }

    .small-button {
        font-size: 0.75rem; /* Saiz font kecil */
        white-space: nowrap; /* Elakkan pembungkusan teks */
        padding: 0.25rem 0.5rem; /* Padding yang lebih kecil */
        text-overflow: ellipsis; /* Tambah ellipsis jika teks melebihi lebar butang */
        overflow: hidden; /* Elakkan teks melimpah keluar dari butang */
    }
</style>
@include('sidebar')
<div class="container">
    <div class="main">
        <main class="content px-2 py-4">
            <div class="container-fluid">
                <div class="custom-bg-white border border-grey border-2 p-3 rounded shadow">
                    <div class="row align-items-center mb-3">
                        <div class="col-auto">
                            <h5 class="ms-2">ADMIN DASHBOARD</h5>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <div class="btn-group">
                                <a href="{{ route('admin.kpi') }}" class="btn btn-primary small-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle me-2" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                    </svg>
                                    <span class="ms-2">MODIFY KPI</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-sm">
                        <table class="table mt-3 p-3">
                            <thead>
                                <tr>
                                    <th class="text-secondary small-text">BIL</th>
                                    <th class="text-secondary small-text">TERAS</th>
                                    <th class="text-secondary small-text">SO</th>
                                    <th class="text-secondary small-text">NEGERI</th>
                                    <th class="text-secondary small-text">PEMILIK</th>
                                    <th class="text-secondary small-text">KPI</th>
                                    <th class="text-secondary small-text">PERNYATAAN KPI</th>
                                    <th class="text-secondary small-text">SASARAN</th>
                                    <th class="text-secondary small-text">PENCAPAIAN</th>
                                    <th class="text-secondary small-text">PERATUS PENCAPAIAN</th>
                                    <th class="text-secondary small-text">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($addKpis as $index => $addkpi)
                                    @php
                                        $rowClass = '';
                                        if ($addkpi->peratus_pencapaian >= 80) {
                                            $rowClass = 'bg-success text-light';
                                        } elseif ($addkpi->peratus_pencapaian >= 50) {
                                            $rowClass = 'bg-warning text-dark';
                                        } else {
                                            $rowClass = 'bg-danger text-light';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="small-text text-secondary">{{ $index + 1 }}</td>
                                        <td class="small-text">{{ $addkpi->teras }}</td>
                                        <td class="small-text">{{ $addkpi->SO }}</td>
                                        <td class="small-text">{{ $addkpi->negeri }}</td>
                                        <td class="small-text">{{ $addkpi->pemilik }}</td>
                                        <td class="small-text">{{ $addkpi->kpi }}</td>
                                        <td class="small-text">{{ $addkpi->pernyataan_kpi }}</td>
                                        <td class="small-text">{{ $addkpi->sasaran }}</td>
                                        <td class="small-text">{{ $addkpi->pencapaian }}</td>
                                        <td class="small-text">{{ number_format($addkpi->peratus_pencapaian, 2) }}</td>
                                        <td class="small-text">{{ $addkpi->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <span class="me-2 text-small">Peratus Pencapaian Keseluruhan:</span>
                            @php
                                $statusClass = '';
                                if ($overallAchievement >= 80) {
                                    $statusClass = 'bg-success text-light';
                                    $statusText = 'Hijau';
                                } elseif ($overallAchievement >= 50) {
                                    $statusClass = 'bg-warning text-dark';
                                    $statusText = 'Kuning';
                                } else {
                                    $statusClass = 'bg-danger text-light';
                                    $statusText = 'Merah';
                                }
                            @endphp
                            <span class="badge {{ $statusClass }} me-2">{{ number_format($overallAchievement, 2) }}</span>
                            <span class="badge {{ $statusClass }}">{{ $statusText }}</span>
                        </div>
                    </div> 
                    </div> 
                </div>
            </div>
        </main>
    </div>
</div>      


@endsection


