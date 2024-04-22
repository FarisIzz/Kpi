@extends('layout')
@section('title', 'Tahanan Radikal')
@section('body')
<table  style="border: 2px solid black;">
    <thead>
        <tr style="border: 2px solid black;">
            <th style="border: 2px solid black;">Kod</th>
            <th style="border: 2px solid black;">Tajuk KPI</th>
            <th style="border: 2px solid black;">Sasaran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td style="border: 2px solid black;">{{ $item->Kod }}</td>
            <td style="border: 2px solid black;">{{ $item->Tajuk_KPI }}</td>
            <td style="border: 2px solid black;">{{ $item->Sasaran_KPI }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection