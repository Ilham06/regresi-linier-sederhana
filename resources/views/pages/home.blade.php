@extends('layouts.main')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            @if (session('info'))
                <div class="alert alert-info mb-3">
                    {{ session('info') }}
                </div>
            @endif
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Data X dan Y
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" width="15%">No</th>
                                <th scope="col">X</th>
                                <th scope="col">Y</th>
                                <th scope="col" width="10%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $value->x }}</td>
                                    <td>{{ $value->y }}</td>
                                    <td>
                                        <form onclick="return confirm('hapus data?')" method="post"
                                            action="{{ route('data.destroy', $value->id) }}" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger btn-icon btn-inline"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
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
            <div class="mt-2">
                <form method="post" action="{{ route('data.calculate') }}" class="d-inline">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="forecast" type="text" class="form-control @error('forecast') is-invalid @enderror"
                            placeholder="Nilai Y yang akan di prediksi">
                        <button type="submit" class="btn btn-success" type="button">Hitung</button>
                    </div>

                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Tambah Data
                </div>
                <div class="card-body">
                    <form action="{{ route('data.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="x" class="form-label">Nilai X</label>
                            <input name="x" type="number" class="form-control @error('x') is-invalid @enderror"
                                id="x">
                            @error('x')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="y" class="form-label">Nilai Y</label>
                            <input name="y" type="number" class="form-control @error('y') is-invalid @enderror"
                                id="y">
                            @error('y')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
