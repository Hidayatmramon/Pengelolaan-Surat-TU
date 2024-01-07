@extends('template.navdash')
@section('dashboard')



<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Surat</h1>
        </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><b>{{ $lettertypes->letter_code }} | {{ $lettertypes->name_type }}</b></h4>
                            </div>
                            <div class="card-body">
                                {{ $lettertypes->created_at->format('d M Y') }}

                            <table>
                                <thead>
                                <tr>
                                    {{-- <th>{{ $lettertypes->receipients }}</th> --}}
                                    <th>kok</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
            </div>
        </div>
   </section>
</div>

@endsection
