@extends('template.navdash')
@section('dashboard')



<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data User</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Staff TU</h4>
                    <div class="card-header-form">
                        <form method="GET" action="{{ route('staff.search') }}">
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
                                        <a href="{{route('staff.create')}}" class="btn btn-primary">Create</a>
                    <div class="table-responsive my-3 table-no-wrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @foreach ($users as $index => $item)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['role'] }}</td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('staff.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                                        <form class="ml-2" action="{{ route('staff.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin?')" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach


                        </table>
                        <div class="d-flex justify-content-center">
                        {{ $users-> links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
