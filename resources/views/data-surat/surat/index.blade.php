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
                    <h4>Data Surat</h4>
                    <div class="card-header-form">
                        <form method="GET" action="{{ route('datasurat.search') }}">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari Nama..." name="search" value="{{ request('search') }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('datasurat.create')}}" class="btn btn-primary">Create</a>
                    <a href="{{route('datasurat.downloadexcel')}}" class="btn btn-info">Excel Klasifikasi Surat</a>
                    <div class="table-responsive my-3 table-no-wrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Perihal</th>
                                    <th scope="col">Tanggal Keluar</th>
                                    <th scope="col">Penerima Surat</th>
                                    <th scope="col">Notulis</th>
                                    <th scope="col">Hasil Rapat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @php $no = 1; @endphp
                            @foreach ($letters as $index => $item)
                            <tbody>
                                    <tr>
                                        <th scope="row">
                                        {{ $index + $letters->firstItem() }}</th>
                                        <td>{{ $item['letter_type_id'] }}</td>
                                        <td>{{ $item['letter_perihal'] }}</td>
                                        <td>{{ $item['created_at'] }}</td>
                                        <td>{{ $item['receipients'] }}</td>
                                        <td>{{ $item['notulis'] }}</td>
                                        <td class="align-items-center">
                                            <a href="" class="btn btn-info d">dd</a>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <a href="{{-- route('klasifikasi.show',$item->id) --}}" class="btn btn-primary mr-2">Lihat</a>
                                            <a href="{{ route('datasurat.edit', $item->id) }}" class="btn btn-warning mr-2">Edit</a>
                                            <form class="ml-2"
                                                action="{{ route('datasurat.destroy', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                              <input type="hidden" name="_method" value="DELETE"> <button onclick="return confirm('Yakin?')" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach

                        </table>
                        <div class="d-flex justify-content-center">
                        {{ $letters-> links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
