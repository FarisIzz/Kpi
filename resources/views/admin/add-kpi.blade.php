@extends('layout')
@section('title', 'Admin Dashboard')
@section('body')
    @include('sidebar')
    <div class="container">
        <div class="main">
            <main class="content px-2 py-4">
                <div class="container-fluid">
                    <h3 class="fw-bold fs-4">Key Performance Index(KPI)</h3>
                    <a href="=" class="btn btn-primary mb-2">Add New</a><br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Teras</th>
                                <th>SO</th>
                                <th>Negeri</th>
                                <th>Pemilik</th>
                                <th>KPI</th>
                                <th>Pernyataan KPI</th>
                                <th>Sasaran</th>
                                <th>Jenis Sasaran</th>
                                <th>Pencapain</th>
                                <th>Peratus Pencapaian</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($addKpis as $addKpi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $addKpi->teras }}</td>
                                    <td>{{ $addKpi->so }}</td>
                                    <td>{{ $addKpi->negeri }}</td>
                                    <td>{{ $addKpi->pemilik }}</td>
                                    <td>{{ $addKpi->kpi}}</td>
                                    <td>{{ $addKpi->pernyataan_kpi}}</td>
                                    <td>{{ $addKpi->sasaran}}</td>
                                    <td>{{ $addKpi->jenis_sasaran}}</td>
                                    <td>{{ $addKpi->pencapaian}}</td>
                                    <td>{{ $addKpi->peratus_pencapaian}}</td>
                                    <td>{{ $addKpi->status}}</td>
                                    <td>
                                        {{-- <a href="{{ route('addKpis.edit', $addKpi->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('addKpis.destroy', $addKpi->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button> --}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </main>
        </div>
    </div>       
@endsection
