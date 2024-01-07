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
                    <h4>Data Klasifikasi</h4>
                    <div class="card-header-form">
                        <form method="GET" action="{{ route('klasifikasi.search') }}">
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
                    <a href="{{route('klasifikasi.create')}}" class="btn btn-primary">Create</a>
                    <a href="{{route('klasifikasi.downloadexcel')}}" class="btn btn-info">Excel Klasifikasi Surat</a>
                    <div class="table-responsive my-3 table-no-wrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode surat</th>
                                    <th scope="col">Klasifikasi Surat</th>
                                    <th scope="col">Surat Tertaut</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @php $no = 1; @endphp
                            @foreach ($lettertypes as $index => $item)

                            <tbody>
                                    <tr>
                                        <th scope="row">
                                        {{ $index + $lettertypes->firstItem() }}</th>
                                        <td>{{ $item['letter_code'] }}</td>
                                        <td>{{ $item['name_type'] }}</td>
                                        <td>{{ $item->letters->count() }}</td>
                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('klasifikasi.show',$item->id) }}" class="btn btn-primary mr-2">Lihat</a>
                                            <a href="{{ route('klasifikasi.edit', $item->id) }}" class="btn btn-warning mr-2">Edit</a>
                                            <form class="ml-2"
                                                action="{{ route('klasifikasi.destroy', $item->id) }}"
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
                        {{ $lettertypes-> links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
