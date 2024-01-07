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
                    <h4>Edit Data Staff</h4>
                </div>
            <form action="{{ route('staff.update', $user['id']) }}" method="post" class="card p-5">
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
                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Role:</label>
                    <div class="col-sm-10">
                        <select name="role" id="type" class="form-select">
                            <option selected disabled hidden>Pilih</option>
                            <option value="staff" {{ $user['role'] == 'staff' ? 'selected' : '' }}>staff</option>
                            <option value="guru" {{ $user['role'] == 'guru' ? 'selected' : '' }}>guru</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Silahkan diisi">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
            </form>
        </div>
    </section>
</div>

@endsection
