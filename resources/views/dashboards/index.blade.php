@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="alert alert-info">
        <h5> 
            <i class="icon fas fa-cloud-sun"></i> Selamat Pagi.. Ikbal Akbar
        </h5>
        Selamat Datang di Website Sistem Informasi Manajemen Aset 
    </div>
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info text-white p-3 rounded">
                <div class="inner">
                    <h3>10</h3>
                    <p>Total Aset</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-home"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success text-white p-3 rounded">
                <div class="inner">
                    <h3>9</h3>
                    <p>Aset Berwujud</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-desktop"></i>
                </div>
                <a href="http://192.168.2.115/simaset/aset_wujud" class="small-box-footer text-white">Selengkapnya 
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger text-white p-3 rounded">
                <div class="inner">
                    <h3>1</h3>
                    <p>Aset Dihapuskan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-trash-a"></i>
                </div>
                <a href="http://192.168.2.115/simaset/aset_dihapuskan" class="small-box-footer text-white">Selengkapnya 
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- Small boxes (Stat box) -->
    <!-- /.row (main row) -->
</div>
@endsection
