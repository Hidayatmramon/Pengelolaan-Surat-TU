@extends('template.navdash')
@section('dashboard')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Surat</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Klasifikasi</h4>
                </div>
            <form action="{{ route('klasifikasi.update', $lettertypes['id']) }}" method="post" class="card p-5">
                @csrf
                @method('PATCH')

                @if ($errors->any())
                <ul class="alert alert-danger p-3">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="mb-3 row">
                    <label for="letter_type" class="col-sm-2 col-form-label">Kode Surat:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="letter_type" name="letter_code" value="{{ $lettertypes['letter_code'] }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name_type" class="col-sm-2 col-form-label">Klasfikasi Surat:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_type" name="name_type" value="{{ $lettertypes['name_type'] }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
            </form>
        </div>
    </section>
</div>

@endsection
