@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Konfigurasi Lokasi Kantor
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                    @if (Session::get('success'))
                                        <div class="alert alert-success">
                                            {{Session::get('success')}}
                                        </div>
                                        @endif
                                        @if (Session::get('warning'))
                                        <div class="alert alert-warning">
                                            {{Session::get('warning')}}
                                        </div>
                                        @endif
                        <form action="/konfigurasi/updatelokasikantor" method="post">
                            @csrf
                            <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5"></path>
                                <path d="M9 4v13"></path>
                                <path d="M15 7v5.5"></path>
                                <path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z"></path>
                                <path d="M19 18v.01"></path>
                                </svg>
                                </span>
                                <input type="text" value="{{$lok_kantor->lokasi_kantor}}" id="lokasi_kantor" class="form-control" placeholder="Lokasi Kantor" name="lokasi_kantor">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-radar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M21 12h-8a1 1 0 1 0 -1 1v8a9 9 0 0 0 9 -9"></path>
                                <path d="M16 9a5 5 0 1 0 -7 7"></path>
                                <path d="M20.486 9a9 9 0 1 0 -11.482 11.495"></path>
                                </svg>
                                </span>
                                <input type="text" value="{{$lok_kantor->radius}}" id="radius" class="form-control" placeholder="Radius Absen" name="radius">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                            <path d="M7 9l5 -5l5 5"></path>
                            <path d="M12 4l0 12"></path>
                            </svg>
                            Update</button>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection