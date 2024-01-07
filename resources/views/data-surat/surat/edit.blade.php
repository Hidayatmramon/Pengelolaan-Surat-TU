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
                    <h4>Edit Data Surat</h4>
                </div>

                <form action="{{ route('datasurat.update', $letters['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    @if ($errors->any())
                    <ul class="alert alert-danger p-3">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="letter_perihal" class="form-label">Perihal</label>
                                <input type="text" class="form-control" placeholder="Perihal apa" aria-label="letter_perihal" name="letter_perihal" id="perihal" value="{{ $letters['letter_perihal'] }}">
                            </div>

                            <div class="col-md-6">
                            </div>
                        </div>



                        <div class="mb-3">
                            <label for="textarea" class="form-label">Isi Surat</label>
                            <textarea name="content" id="textarea" class="form-control">{{ $letters['content'] }}</textarea>
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
                                                @php
                                                    $receipientsArray = explode(',', $letters['receipients']);
                                                @endphp
                                                <input class="form-check-input" type="checkbox" id="receipients_{{ $item->id }}" name="receipients[]" value="{{ $item->name }}" @if(in_array($item->name, $receipientsArray)) checked @endif>
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
