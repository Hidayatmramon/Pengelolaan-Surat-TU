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
                    <h4>Create Data Klasifikasi Surat</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('klasifikasi.store') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                        <ul class="alert alert-danger p-3">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="letter_code">Kode Surat</label>
                                    <input name="letter_code" id="letter_code" type="text" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_type">Klasifikasi Surat</label>
                                    <input name="name_type" id="name_type" type="text" class="form-control" value="" />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
