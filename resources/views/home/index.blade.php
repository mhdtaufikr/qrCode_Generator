@extends('layouts.master')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-2">
                        <h1 class="page-header-title">
                            {{-- <div class="page-header-icon"><i data-feather="file"></i></div> --}}
                            <label id="lblGreetings"></label>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card">
           <div class="card-header text-dark">Generate QR Code</div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-generate-qr">
                    Open Import Modal
                </button>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-generate-qr" tabindex="-1" aria-labelledby="modal-generate-qr-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-generate-qr-label">Generate QR Codes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('generate.qr') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="file" class="form-control" id="csvFile" name="excel-file" accept=".xlsx">
                            <p class="text-danger">* File must be in xlsx format</p>
                        </div>

                        @error('excel-file')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Generate QR Codes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var myDate = new Date();
        var hrs = myDate.getHours();

        var greet;

        if (hrs < 12)
            greet = 'Good Morning';
        else if (hrs >= 12 && hrs <= 17)
            greet = 'Good Afternoon';
        else if (hrs >= 17 && hrs <= 24)
            greet = 'Good Evening';

        document.getElementById('lblGreetings').innerHTML =
            '<b>' + greet + '</b> and welcome to Generate QR Code!';
    </script>
</main>
@endsection