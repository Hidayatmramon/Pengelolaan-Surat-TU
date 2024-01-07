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
                    <h4>Create Data Surat</h4>
                </div>

                <form action="{{ route('datasurat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if(Session::get('created'))
                        <div class="alert alert-success mt-3">
                            {{ Session::get('created') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="letter_perihal" class="form-label">Perihal</label>
                                <input type="text" class="form-control" placeholder="Perihal apa" aria-label="letter_perihal" name="letter_perihal" id="perihal">
                            </div>
                            <div class="col-md-6">
                                <label for="letter_type_id" class="form-label">Klasifikasi Surat</label>
                                <select class="form-select" aria-label="Klasifikasi Surat" name="letter_type_id" id="letter_type_id">
                                    @foreach ($lettertypes as $item)
                                    <option value="{{ $item->letter_code }}">{{ $item->letter_code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="textarea" class="form-label">Isi Surat</label>
                            <textarea name="content" id="textarea" class="form-control"></textarea>
                        </div>

                        <fieldset class="mb-3">
                            <legend class="card-header">Peserta</legend>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Peserta (Ceklis jika 'ya')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{ $item->name }}" id="receipients" name="receipients[]">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </fieldset>

                        {{-- <div class="mb-3">
                            <label for="lampiran" class="form-label">Lampiran</label>
                            <input class="form-control" type="file" id="lampiran" name="attachment">
                        </div> --}}

                        <div class="mb-3">
                            <label for="notulis" class="form-label">Notulis</label>
                            <select class="form-select" aria-label="Notulis" name="notulis" id="notulis">
                                @foreach ($users as $name)
                                    <option value="{{ $name->name }}">{{ $name->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end">


                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#textarea'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection
