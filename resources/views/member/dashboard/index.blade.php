@extends('layouts.public')

@section('content-header')
    <section class="section">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-4">
                            <h3 class="mb-3">Member Dashboard</h3>
                            <p>Selamat datang, {{ auth()->user()->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
