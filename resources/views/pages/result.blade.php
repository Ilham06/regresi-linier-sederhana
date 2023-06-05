@extends('layouts.main')

@section('content')
    <div class="row d-flex">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    Data Perhitungan
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" width="15%">No</th>
                                <th scope="col">X</th>
                                <th scope="col">Y</th>
                                <th scope="col">x</th>
                                <th scope="col">y</th>
                                <th scope="col">xy</th>
                                <th scope="col">x<sup>2</sup></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $value['X'] }}</td>
                                    <td>{{ $value['Y'] }}</td>
                                    <td>{{ $value['x'] }}</td>
                                    <td>{{ $value['y'] }}</td>
                                    <td>{{ $value['xy'] }}</td>
                                    <td>{{ $value['x2'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Kesimpulan
                </div>
                <div class="card-body">
                    <p>Nilai b : {{ $b }}</p>
                    <p>Nilai a : {{ $a }}</p>
                    <hr>
                    <p>Persamaa regresi : </p>
                    <p> = Y = a + bx</p>
                    <p> = {{ $a }} + {{ $b }} * {{ $X }}</p>
                    <p> = {{ $result }}</p>
                    <hr>
                    <p>
                        Jadi, prediksi nilai Y jika nilai X nya {{ $X }} adalah {{ $result }}.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
