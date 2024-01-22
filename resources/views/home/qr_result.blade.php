@extends('layouts.master')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Generated QR Code</h2>
                {!! $qrCode !!}
            </div>
            <div class="col-md-6">
                <h2>QR Code Value</h2>
                <p>{{ $qrCodeValue }}</p>
            </div>
        </div>
    </div>
</main>
@endsection
