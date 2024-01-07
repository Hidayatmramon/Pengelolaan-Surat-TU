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
                    <h4>Create Data Guru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('guru.store') }}" method="POST">
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
                                    <label for="name">Name</label>
                                    <input name="name" id="name" type="text" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" id="email" type="text" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" id="password" type="password" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="guru">guru</option>
                                    </select>
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
