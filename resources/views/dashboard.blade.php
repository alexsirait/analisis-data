@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('charts/bootstrap.min.css') }}">
<div class="wrappers">
    <div class="wrapper_content">
        <body style="background-color: hsl(252, 29%, 97%);">
            <div class="row m-0">
                <div class="row m-0 p-0">
                    <!-- Card Umur -->
                    <div class="col-lg-4">
                        <div class="card h-100 rounded-4 border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="px-3 py-2 rounded-1 text-white d-inline-block" style="background-color: #6A6BFB;">Umur</h6>
                                <div id="chartUmur"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Gender -->
                    <div class="col-lg-4 mt-3 mt-lg-0">
                        <div class="card h-100 rounded-4 border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="px-3 py-2 rounded-1 text-white d-inline-block" style="background-color: #6A6BFB;">Gender</h6>
                                <div class="d-flex flex-column justify-content-evenly" style="height: calc(100% - 44px);">
                                    <div>
                                        <div class="d-flex align-items-end justify-content-between mb-2" style="color: #FC307B;">
                                            <h4 class="m-0 fw-bold" id="dataPerempuan">40%</h4>
                                            <h6 class="m-0 fw-bold">Perempuan</h6>
                                        </div>
                                        <div class="w-100 bg-secondary-subtle rounded" style="height: 16px;">
                                            <div id="dataPerempuanChart" class="position-relative rounded" style="height: 16px; width: 40%; background-color:#FC307B ;">
                                                <div class="rounded-circle bg-white border border-4 position-absolute top-50 start-100 translate-middle" style="height: 30px; width: 30px; border-color: #FC307B !important;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-end justify-content-between mb-2 text-primary">
                                            <h4 class="m-0 fw-bold" id="dataLaki">60%</h4>
                                            <h6 class="m-0 fw-bold">Laki-laki</h6>
                                        </div>
                                        <div class="w-100 bg-secondary-subtle rounded" style="height: 16px;">
                                            <div id="dataLakiChart" class="position-relative rounded bg-primary" style="height: 16px; width: 60%;">
                                                <div class="rounded-circle bg-white border border-4 border-primary position-absolute top-50 start-100 translate-middle" style="height: 30px; width: 30px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Pekerjaan -->
                    <div class="col-lg-4 mt-3 mt-lg-0">
                        <div class="card h-100 rounded-4 border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="px-3 py-2 rounded-1 text-white d-inline-block" style="background-color: #6A6BFB;">Pekerjaan</h6>
                                <div class="d-flex flex-column justify-content-around" style="height: calc(100% - 50px);">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-5">
                                            <div class="bg-primary rounded-circle" style="width: 20px; height: 20px;"></div>
                                            <h5 class="m-0 text-secondary">Mahasiswa</h5>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <h5 class="m-0 bg-secondary-subtle py-1 px-2 rounded d-inline-block" id="mhsOrang">17</h5>
                                            <h5 class="m-0 text-primary">Orang</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-5">
                                            <div class="bg-primary rounded-circle" style="width: 20px; height: 20px;"></div>
                                            <h5 class="m-0 text-secondary">Dosen</h5>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <h5 class="m-0 bg-secondary-subtle py-1 px-2 rounded d-inline-block" id="dosenOrang">17</h5>
                                            <h5 class="m-0 text-primary">Orang</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-5">
                                            <div class="bg-primary rounded-circle" style="width: 20px; height: 20px;"></div>
                                            <h5 class="m-0 text-secondary">Staff</h5>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <h5 class="m-0 bg-secondary-subtle py-1 px-2 rounded d-inline-block" id="staffOrang">17</h5>
                                            <h5 class="m-0 text-primary">Orang</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Domisili -->
                    <div class="col-lg-7 mt-3">
                        <div class="card h-100 rounded-4 border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="px-3 py-2 rounded-1 text-white d-inline-block" style="background-color: #6A6BFB;">Domisili</h6>
                                <div id="chartMapIndonesia" style="height: calc(100% - 42px);"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Jenis Essay -->
                    <div class="col-lg-5 mt-3">
                        <div class="card h-100 rounded-4 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex gap-3 align-items-center">
                                    <h6 class="px-3 py-2 rounded-1 text-white d-inline-block" style="background-color: #6A6BFB;">Jenis Essay</h6>
                                    <h6 class="px-3 py-1 rounded-pill text-secondary d-inline-block" style="background-color: #E9E7FD; font-size: 14px;">Word Frequency</h6>
                                </div>
                                <div class="p-4">
                                    <table class="table table-borderless text-center">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary border-3 border-white text-white w-50">Kata</th>
                                                <th class="bg-primary border-3 border-white text-white">Jumlah Kata</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="bg-primary text-white border-end" id="top1Fre">PENAMBAHAN</th>
                                                <th class="bg-primary text-white border-start" id="top1Count">14 Kata</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-white border-end" id="top2Fre">KEBERSIHAN</th>
                                                <th class="bg-primary text-white border-start" id="top2Count">11 Kata</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-white border-end" id="top3Fre">AC</th>
                                                <th class="bg-primary text-white border-start" id="top3Count">7 Kata</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-white border-end" id="top4Fre">RAME</th>
                                                <th class="bg-primary text-white border-start" id="top4Count">6 Kata</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-white border-end" id="top5Fre">RAME</th>
                                                <th class="bg-primary text-white border-start" id="top5Count">6 Kata</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="fw-bold bg-green200 rounded p-2">Positive Sentiment</span>
                                        <div class="fw-bold p-2 h4" id="PositiveF">10%</div>
                                    </div>
                                    <div>
                                        <span class="fw-bold bg-gray100 rounded p-2">Neutral Sentiment</span>
                                        <div class="fw-bold p-2 h4" id="NeutralF">10%</div>
                                    </div>
                                    <div>
                                        <span class="fw-bold bg-red100 rounded p-2">Negative Sentiment</span>
                                        <div class="fw-bold p-2 h4" id="NegativeF">10%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Jenis Opsi -->
                    <div class="col-lg-4 mt-3">
                        <div class="card h-100 rounded-4 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex gap-3 align-items-center">
                                    <h6 class="px-3 py-2 rounded-1 text-white d-inline-block" style="background-color: #6A6BFB;">Jenis Opsi</h6>
                                    <h6 class="px-3 py-1 rounded-pill text-secondary d-inline-block" style="background-color: #E9E7FD; font-size: 14px;">Jenis Kebersihan</h6>
                                </div>
                                <div id="chartOpsi"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Jenis Check Box -->
                    <div class="col-lg-4 mt-3">
                        <div class="card h-100 rounded-4 border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="px-3 py-2 rounded-1 text-white d-inline-block" style="background-color: #6A6BFB;">Jenis Check Box</h6>
                                <div class="d-flex flex-column justify-content-between mt-2" style="height: calc(100% - 50px);">
                                    <div>
                                        <p class="m-0 fw-semibold text-secondary" id="boxTop1">Batam</p>
                                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-primary" id="percentageBoxTop1" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="m-0 fw-semibold text-secondary" id="boxTop2">Batu Aji</p>
                                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-primary" id="percentageBoxTop2" style="width: 70%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="m-0 fw-semibold text-secondary" id="boxTop3">Nagoya</p>
                                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-primary" id="percentageBoxTop3" style="width: 90%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="m-0 fw-semibold text-secondary" id="boxTop4">Nongsa</p>
                                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-primary" id="percentageBoxTop4" style="width: 60%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="m-0 fw-semibold text-secondary" id="boxTop5">Bengkong</p>
                                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-primary" id="percentageBoxTop5" style="width: 50%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Jenis Essay -->
                    <div class="col-lg-4 mt-3">
                        <div class="card h-100 rounded-4 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex gap-3 align-items-center">
                                    <h6 class="px-3 py-2 rounded-1 text-white d-inline-block" style="background-color: #6A6BFB;">Jenis Essay</h6>
                                    <h6 class="px-3 py-1 rounded-pill text-secondary d-inline-block" style="background-color: #E9E7FD; font-size: 14px;">Word Cloud</h6>
                                </div>
                                <div id="chartWordCloud" style="height: calc(100% - 42px);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="">
                <div class="row m-0 p-0">
                    <!-- Card Jenis Opsi -->
                    <div class="col-lg-4 mt-3">
                        <div class="card rounded-4 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex gap-3 align-items-center">
                                    <h6 class="px-3 py-2 rounded-1 text-white d-inline-block" style="background-color: #6A6BFB;">Jenis Opsi</h6>
                                    <h6 class="px-3 py-1 rounded-pill text-secondary d-inline-block" style="background-color: #E9E7FD; font-size: 14px;">Jenis Ruang</h6>
                                </div>
                                <div id="chartOpsi2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Jenis Check Box -->
                    <!-- Card Jenis Opsi -->
                    <div class="col-lg-4 mt-3">
                        <div class="card rounded-4 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex gap-3 align-items-center">
                                    <h6 class="px-3 py-2 rounded-1 text-white d-inline-block" style="background-color: #6A6BFB;">Jenis Opsi</h6>
                                    <h6 class="px-3 py-1 rounded-pill text-secondary d-inline-block" style="background-color: #E9E7FD; font-size: 14px;">Jenis Pelayanan</h6>
                                </div>
                                <div id="chartOpsi3"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Jenis Check Box -->
                    <!-- Card Jenis Opsi -->
                    <div class="col-lg-4 mt-3">
                        <div class="card rounded-4 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex gap-3 align-items-center">
                                    <h6 class="px-3 py-2 rounded-1 text-white d-inline-block" style="background-color: #6A6BFB;">Jenis Opsi</h6>
                                    <h6 class="px-3 py-1 rounded-pill text-secondary d-inline-block" style="background-color: #E9E7FD; font-size: 14px;">Jenis Makanan</h6>
                                </div>
                                <div id="chartOpsi4"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Jenis Check Box -->
                </div>
            </div>
        
            <script src="{{ asset('charts/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('charts/jquery-3.7.1.min.js') }}"></script>
            <script src="{{ asset('charts/apexcharts.min.js') }}"></script>
            <script src="{{ asset('charts/anychart-base.min.js') }}"></script>
            <script src="{{ asset('charts/anychart-tag-cloud.min.js') }}"></script>
            <script src="{{ asset('charts/anychart-map.min.js') }}"></script>
            <script src="{{ asset('charts/indonesia.js') }}"></script>
            <script src="{{ asset('charts/proj4.js') }}"></script>
            <!-- Script Chart Bar -->
            <script>
                let options = {
                    series: [{
                        name: 'UMUR',
                        data: [0]
                    }],
                    chart: {
                        type: 'bar',
                        height: '100%',
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                            position: 'bottom',
                            offsetX: -10,
                            offsetY: 0
                            }
                        }
                    }],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            distributed: true ,
                            colors: {
                                backgroundBarColors: ['#d9d9d9'],
                                backgroundBarOpacity: 0.3,
                            },
                        },
                    },
                    colors: ['#363D5E', '#FBB217', '#F5821E', '#923740', '#35405A'],
                    xaxis: {
                        categories: [''],
                        labels: {
                            style: {
                                fontWeight: 600,
                            },
                        },
                    },
                    yaxis:{
                        labels: {
                            style: {
                                fontSize: '12px',
                                fontWeight: 600,
                            },
                        },
                    },
                    legend: {
                        show: false,
                    },
                    fill: {
                        opacity: 1
                    }
                };
                let chartUmur = new ApexCharts(document.querySelector("#chartUmur"), options);
                chartUmur.render();
            </script>
            <script>
                $.ajax({
                    type: "GET",
                    url: "{{ route('umur') }}",
                    dataType: "JSON",
                    success: function (RES) {
                        const newCategories = RES.map(item => item.umur);
                        const newSeriesData = RES.map(item => item.jumlah_umur);

                        chartUmur.updateSeries([{
                            name: 'UMUR',
                            data: newSeriesData
                        }]);

                        chartUmur.updateOptions({
                            xaxis: {
                                categories: newCategories
                            }
                        });
                    }
                });
            </script>
            <script>
                $.ajax({
                    type: "GET",
                    url: "{{ route('gender') }}",
                    dataType: "JSON",
                    success: function (RES) {
                        const lakiLakiData = RES.find(item => item.gender === "Laki-Laki");
                        const persentaseLakiLaki = lakiLakiData ? lakiLakiData.persentase : null;
                        $("#dataLaki").text(persentaseLakiLaki+"%")
                        $("#dataLakiChart").css("width", persentaseLakiLaki+"%");

                        const perempuanData = RES.find(item => item.gender === "Perempuan");
                        const persentaseperempuan = perempuanData ? perempuanData.persentase : null;
                        $("#dataPerempuan").text(persentaseperempuan+"%")
                        $("#dataPerempuanChart").css("width", persentaseperempuan+"%");
                    }
                });
            </script>
        
            <!-- Script Chart Pie -->
            <script>
                $.ajax({
                    type: "GET",
                    url: "{{ route('jenisKebersihan') }}",
                    dataType: "JSON",
                    success: function (data) {
                        const sortedKeys = Object.keys(data).sort((a, b) => {
                            const order = {
                                "Sangat Baik": 0,
                                "Baik": 1,
                                "Cukup": 2,
                                "Kurang": 3,
                                "Sangat Kurang": 4
                            };
                            return order[a] - order[b];
                        });

                        const newSeriesData = sortedKeys.map(key => data[key]);
                        let optionsPie = {
                            series: newSeriesData,
                            chart: {
                            width: 400,
                            type: 'pie',
                        },
                        labels: ['Sangat Baik', 'Baik', 'Cukup', 'Kurang', 'Sangat Kurang'],
                        markers: {
                            shape: 'square',
                            size: 8
                        },
                        legend: {
                            position: 'right',
                            horizontalAlign: 'center',
                            itemMargin: {
                                vertical: 4
                            },
                            markers: {
                                width: 14,
                                height: 14,
                                radius: 0,
                            },
                        },
                        responsive: [
                            {
                                breakpoint: 1400,
                                options: {
                                    chart: {
                                    width: 380
                                    },
                                    legend: {
                                    position: 'right'
                                    }
                                }
                            },
                            {
                                breakpoint: 480,
                                options: {
                                    chart: {
                                    width: 300
                                    },
                                    legend: {
                                    position: 'bottom'
                                    }
                                }
                            }
                        ]
                        };
                
                        let chartPie = new ApexCharts(document.querySelector("#chartOpsi"), optionsPie);
                        chartPie.render();
                    }
                });
            </script>
            <!-- Script Chart Pie -->
            <script>
                $.ajax({
                    type: "GET",
                    url: "{{ route('jenisRuang') }}",
                    dataType: "JSON",
                    success: function (data) {
                        const sortedKeys = Object.keys(data).sort((a, b) => {
                            const order = {
                                "Sangat Luas": 0,
                                "Luas": 1,
                                "Cukup": 2,
                                "Kurang": 3,
                                "Sangat Kurang": 4
                            };
                            return order[a] - order[b];
                        });

                        const newSeriesData = sortedKeys.map(key => data[key]);
                        let optionsPie = {
                            series: newSeriesData,
                            chart: {
                            width: 400,
                            type: 'pie',
                        },
                        labels: ['Sangat Luas', 'Luas', 'Cukup', 'Kurang', 'Sangat Kurang'],
                        markers: {
                            shape: 'square',
                            size: 8
                        },
                        legend: {
                            position: 'right',
                            horizontalAlign: 'center',
                            itemMargin: {
                                vertical: 4
                            },
                            markers: {
                                width: 14,
                                height: 14,
                                radius: 0,
                            },
                        },
                        responsive: [
                            {
                                breakpoint: 1400,
                                options: {
                                    chart: {
                                    width: 380
                                    },
                                    legend: {
                                    position: 'right'
                                    }
                                }
                            },
                            {
                                breakpoint: 480,
                                options: {
                                    chart: {
                                    width: 300
                                    },
                                    legend: {
                                    position: 'bottom'
                                    }
                                }
                            }
                        ]
                        };
                
                        let chartPie = new ApexCharts(document.querySelector("#chartOpsi2"), optionsPie);
                        chartPie.render();
                    }
                });
            </script>
            <!-- Script Chart Pie -->
            <script>
                $.ajax({
                    type: "GET",
                    url: "{{ route('jenisPelayanan') }}",
                    dataType: "JSON",
                    success: function (data) {
                        const sortedKeys = Object.keys(data).sort((a, b) => {
                            const order = {
                                "Sangat Memuaskan": 0,
                                "Memuaskan": 1,
                                "Cukup": 2,
                                "Kurang Memuaskan": 3,
                                "Sangat Kurang Memuaskan": 4
                            };
                            return order[a] - order[b];
                        });

                        const newSeriesData = sortedKeys.map(key => data[key]);
                        let optionsPie = {
                            series: newSeriesData,
                            chart: {
                            width: 400,
                            type: 'pie',
                        },
                        labels: ['Sangat Puas', 'Puas', 'Cukup', 'Kurang Puas', 'Sangat Kurang Puas'],
                        markers: {
                            shape: 'square',
                            size: 8
                        },
                        legend: {
                            position: 'right',
                            horizontalAlign: 'center',
                            itemMargin: {
                                vertical: 4
                            },
                            markers: {
                                width: 14,
                                height: 14,
                                radius: 0,
                            },
                        },
                        responsive: [
                            {
                                breakpoint: 1400,
                                options: {
                                    chart: {
                                    width: 380
                                    },
                                    legend: {
                                    position: 'right'
                                    }
                                }
                            },
                            {
                                breakpoint: 480,
                                options: {
                                    chart: {
                                    width: 300
                                    },
                                    legend: {
                                    position: 'bottom'
                                    }
                                }
                            }
                        ]
                        };
                
                        let chartPie = new ApexCharts(document.querySelector("#chartOpsi3"), optionsPie);
                        chartPie.render();
                    }
                });
            </script>
            <!-- Script Chart Pie -->
            <script>
                $.ajax({
                    type: "GET",
                    url: "{{ route('jenisMakanan') }}",
                    dataType: "JSON",
                    success: function (data) {
                        const sortedKeys = Object.keys(data).sort((a, b) => {
                            const order = {
                                "Sangat Puas": 0,
                                "Puas": 1,
                                "Cukup": 2,
                                "Kurang": 3,
                                "Sangat Kurang": 4
                            };
                            return order[a] - order[b];
                        });

                        const newSeriesData = sortedKeys.map(key => data[key]);
                        let optionsPie = {
                            series: newSeriesData,
                            chart: {
                            width: 400,
                            type: 'pie',
                        },
                        labels: ['Sangat Puas', 'Puas', 'Biasa Saja', 'Kurang', 'Sangat Kurang'],
                        markers: {
                            shape: 'square',
                            size: 8
                        },
                        legend: {
                            position: 'right',
                            horizontalAlign: 'center',
                            itemMargin: {
                                vertical: 4
                            },
                            markers: {
                                width: 14,
                                height: 14,
                                radius: 0,
                            },
                        },
                        responsive: [
                            {
                                breakpoint: 1400,
                                options: {
                                    chart: {
                                    width: 380
                                    },
                                    legend: {
                                    position: 'right'
                                    }
                                }
                            },
                            {
                                breakpoint: 480,
                                options: {
                                    chart: {
                                    width: 300
                                    },
                                    legend: {
                                    position: 'bottom'
                                    }
                                }
                            }
                        ]
                        };
                
                        let chartPie = new ApexCharts(document.querySelector("#chartOpsi4"), optionsPie);
                        chartPie.render();
                    }
                });
            </script>
        
            <!-- Script Chart Word Cloud -->
            <script>
                $.ajax({
                    type: "GET",
                    url: "{{ route('wordCloud') }}",
                    dataType: "JSON",
                    success: function (RES) {
                        anychart.onDocumentReady(function () {
                            let data = RES[0].combined_column;
                
                            chart = anychart.tagCloud();
                
                            chart.angles([0]);
                
                            chart.data(data, {mode: "by-word"});
                
                            chart.container("chartWordCloud");
                
                            chart.draw();
                        });
                    }
                });
            </script>
        
            <!-- Script Chart Map Indonesia -->
            <script>
            $.ajax({
                type: "GET",
                url: "{{ route('provinsi') }}",
                dataType: "JSON",
                success: function (RES) {
                    var Aceh = RES.find(item => item.provinsi == "Aceh");
                    Aceh = Aceh ? Aceh.jumlah_provinsi : 0;

                    var KalimantanTimur = RES.find(item => item.provinsi == "Kalimantan Timur");
                    KalimantanTimur = KalimantanTimur ? KalimantanTimur.jumlah_provinsi : 0;

                    var JawaBarat = RES.find(item => item.provinsi == "Jawa Barat");
                    JawaBarat = JawaBarat ? JawaBarat.jumlah_provinsi : 0;

                    var JawaBarat = RES.find(item => item.provinsi == "Jawa Barat");
                    JawaBarat = JawaBarat ? JawaBarat.jumlah_provinsi : 0;

                    var JawaTengah = RES.find(item => item.provinsi == "Jawa Tengah");
                    JawaTengah = JawaTengah ? JawaTengah.jumlah_provinsi : 0;

                    var Bengkulu = RES.find(item => item.provinsi == "Bengkulu");
                    Bengkulu = Bengkulu ? Bengkulu.jumlah_provinsi : 0;

                    var Banten = RES.find(item => item.provinsi == "Banten");
                    Banten = Banten ? Banten.jumlah_provinsi : 0;

                    var Jakarta = RES.find(item => item.provinsi == "Jakarta");
                    Jakarta = Jakarta ? Jakarta.jumlah_provinsi : 0;

                    var KalimantanBarat = RES.find(item => item.provinsi == "Kalimantan Barat");
                    KalimantanBarat = KalimantanBarat ? KalimantanBarat.jumlah_provinsi : 0;

                    var Lampung = RES.find(item => item.provinsi == "Lampung");
                    Lampung = Lampung ? Lampung.jumlah_provinsi : 0;

                    var SulawesiSelatan = RES.find(item => item.provinsi == "Sulawesi Selatan");
                    SulawesiSelatan = SulawesiSelatan ? SulawesiSelatan.jumlah_provinsi : 0;

                    var BangkaBelitung = RES.find(item => item.provinsi == "Bangka Belitung");
                    BangkaBelitung = BangkaBelitung ? BangkaBelitung.jumlah_provinsi : 0;

                    var Bali = RES.find(item => item.provinsi == "Bali");
                    Bali = Bali ? Bali.jumlah_provinsi : 0;

                    var JawaTimur = RES.find(item => item.provinsi == "Jawa Timur");
                    JawaTimur = JawaTimur ? JawaTimur.jumlah_provinsi : 0;

                    var KalimantanSelatan = RES.find(item => item.provinsi == "Kalimantan Selatan");
                    KalimantanSelatan = KalimantanSelatan ? KalimantanSelatan.jumlah_provinsi : 0;

                    var NusaTenggaraTimur = RES.find(item => item.provinsi == "Nusa Tenggara Timur");
                    NusaTenggaraTimur = NusaTenggaraTimur ? NusaTenggaraTimur.jumlah_provinsi : 0;

                    var SulawesiTenggara = RES.find(item => item.provinsi == "Sulawesi Tenggara");
                    SulawesiTenggara = SulawesiTenggara ? SulawesiTenggara.jumlah_provinsi : 0;

                    var SulawesiBarat = RES.find(item => item.provinsi == "Sulawesi Barat");
                    SulawesiBarat = SulawesiBarat ? SulawesiBarat.jumlah_provinsi : 0;

                    var KepulauanRiau = RES.find(item => item.provinsi == "Kepulauan Riau");
                    KepulauanRiau = KepulauanRiau ? KepulauanRiau.jumlah_provinsi : 0;

                    var Gorontalo = RES.find(item => item.provinsi == "Gorontalo");
                    Gorontalo = Gorontalo ? Gorontalo.jumlah_provinsi : 0;

                    var Jambi = RES.find(item => item.provinsi == "Jambi");
                    Jambi = Jambi ? Jambi.jumlah_provinsi : 0;

                    var KalimantanTengah = RES.find(item => item.provinsi == "Kalimantan Tengah");
                    KalimantanTengah = KalimantanTengah ? KalimantanTengah.jumlah_provinsi : 0;

                    var IndonesiaBagianBarat = RES.find(item => item.provinsi == "Indonesia Bagian Barat");
                    IndonesiaBagianBarat = IndonesiaBagianBarat ? IndonesiaBagianBarat.jumlah_provinsi : 0;

                    var SumateraUtara = RES.find(item => item.provinsi == "Sumatera Utara");
                    SumateraUtara = SumateraUtara ? SumateraUtara.jumlah_provinsi : 0;

                    var Riau = RES.find(item => item.provinsi == "Riau");
                    Riau = Riau ? Riau.jumlah_provinsi : 0;

                    var SulawesiUtara = RES.find(item => item.provinsi == "Sulawesi Utara");
                    SulawesiUtara = SulawesiUtara ? SulawesiUtara.jumlah_provinsi : 0;

                    var TidakkodedalamsistempembagianwilayahIndonesia = RES.find(item => item.provinsi == "Tidak ada kode ini dalam sistem pembagian wilayah Indonesia");
                    TidakkodedalamsistempembagianwilayahIndonesia = TidakkodedalamsistempembagianwilayahIndonesia ? TidakkodedalamsistempembagianwilayahIndonesia.jumlah_provinsi : 0;

                    var SumateraBarat = RES.find(item => item.provinsi == "Sumatera Barat");
                    SumateraBarat = SumateraBarat ? SumateraBarat.jumlah_provinsi : 0;

                    var Yogyakarta = RES.find(item => item.provinsi == "Yogyakarta");
                    Yogyakarta = Yogyakarta ? Yogyakarta.jumlah_provinsi : 0;

                    var Maluku = RES.find(item => item.provinsi == "Maluku");
                    Maluku = Maluku ? Maluku.jumlah_provinsi : 0;

                    var NusaTenggaraBarat = RES.find(item => item.provinsi == "Nusa Tenggara Barat");
                    NusaTenggaraBarat = NusaTenggaraBarat ? NusaTenggaraBarat.jumlah_provinsi : 0;

                    var SulawesiTengah = RES.find(item => item.provinsi == "Sulawesi Tengah");
                    SulawesiTengah = SulawesiTengah ? SulawesiTengah.jumlah_provinsi : 0;

                    var SulawesiTengah = RES.find(item => item.provinsi == "Sulawesi Tengah");
                    SulawesiTengah = SulawesiTengah ? SulawesiTengah.jumlah_provinsi : 0;

                    var Papua = RES.find(item => item.provinsi == "Papua");
                    Papua = Papua ? Papua.jumlah_provinsi : 0;


                    anychart.onDocumentReady(function() {
                        let map = anychart.map();

                        let datadaerah = [
                            {"id":"ID.AC","value":"Aceh"},
                            {"id":"ID.KI","value":"KalimantanTimur"},
                            {"id":"ID.JR","value":"JawaBarat"},
                            {"id":"ID.JT","value":"JawaTengah"},
                            {"id":"ID.BE","value":"Bengkulu"},
                            {"id":"ID.BT","value":"Banten"},
                            {"id":"ID.JK","value":"Jakarta"},
                            {"id":"ID.KB","value":"KalimantanBarat"},
                            {"id":"ID.LA","value":"Lampung"},
                            {"id":"ID.SL","value":"SulawesiSelatan"},
                            {"id":"ID.BB","value":"BangkaBelitung"},
                            {"id":"ID.BA","value":"Bali"},
                            {"id":"ID.JI","value":"JawaTimur"},
                            {"id":"ID.KS","value":"KalimantanSelatan"},
                            {"id":"ID.NT","value":"NusaTenggaraTimur"},
                            {"id":"ID.SE","value":"SulawesiTenggara"},
                            {"id":"ID.SR","value":"SulawesiBarat"},
                            {"id":"ID.KR","value":"KepulauanRiau"},
                            {"id":"ID.GO","value":"Gorontalo"},
                            {"id":"ID.JA","value":"Jambi"},
                            {"id":"ID.KT","value":"KalimantanTengah"},
                            {"id":"ID.IB","value":"IndonesiaBagianBarat"},
                            {"id":"ID.SU","value":"SumateraUtara"},
                            {"id":"ID.RI","value":"Riau"},
                            {"id":"ID.SW","value":"SulawesiUtara"},
                            {"id":"ID.133","value":"TidakkodedalamsistempembagianwilayahIndonesia"},
                            {"id":"ID.SB","value":"SumateraBarat"},
                            {"id":"ID.YO","value":"Yogyakarta"},
                            {"id":"ID.MA","value":"Maluku"},
                            {"id":"ID.NB","value":"NusaTenggaraBarat"},
                            {"id":"ID.SG","value":"SulawesiTengah"},
                            {"id":"ID.ST","value":"SulawesiTengah"},
                            {"id":"ID.PA","value":"Papua"}
                        ];
                
                        let dataSet = [
                            {"id":"ID.AC","value":Aceh},
                            {"id":"ID.KI","value":KalimantanTimur},
                            {"id":"ID.JR","value":JawaBarat},
                            {"id":"ID.JT","value":JawaTengah},
                            {"id":"ID.BE","value":Bengkulu},
                            {"id":"ID.BT","value":Banten},
                            {"id":"ID.JK","value":Jakarta},
                            {"id":"ID.KB","value":KalimantanBarat},
                            {"id":"ID.LA","value":Lampung},
                            {"id":"ID.SL","value":SulawesiSelatan},
                            {"id":"ID.BB","value":BangkaBelitung},
                            {"id":"ID.BA","value":Bali},
                            {"id":"ID.JI","value":JawaTimur},
                            {"id":"ID.KS","value":KalimantanSelatan},
                            {"id":"ID.NT","value":NusaTenggaraTimur},
                            {"id":"ID.SE","value":SulawesiTenggara},
                            {"id":"ID.SR","value":SulawesiBarat},
                            {"id":"ID.KR","value":KepulauanRiau},
                            {"id":"ID.GO","value":Gorontalo},
                            {"id":"ID.JA","value":Jambi},
                            {"id":"ID.KT","value":KalimantanTengah},
                            {"id":"ID.IB","value":IndonesiaBagianBarat},
                            {"id":"ID.SU","value":SumateraUtara},
                            {"id":"ID.RI","value":Riau},
                            {"id":"ID.SW","value":SulawesiUtara},
                            {"id":"ID.133","value":TidakkodedalamsistempembagianwilayahIndonesia},
                            {"id":"ID.SB","value":SumateraBarat},
                            {"id":"ID.YO","value":Yogyakarta},
                            {"id":"ID.MA","value":Maluku},
                            {"id":"ID.NB","value":NusaTenggaraBarat},
                            {"id":"ID.SG","value":SulawesiTengah},
                            {"id":"ID.ST","value":SulawesiTengah},
                            {"id":"ID.PA","value":Papua}
                            ];
                
                        series = map.choropleth(dataSet);
                
                        series.geoIdField('id');
                
                        series.colorScale(anychart.scales.linearColor('#DEEBF7', '#0087E4'));
                
                        map.geoData(anychart.maps['indonesia']);
                
                        map.container('chartMapIndonesia');
                
                        map.draw();
                
                        let legend = map.legend();
                        legend.enabled(true);
                        legend.itemsFormatter(function () {
                            let items = [];
                            let addedValues = {};
                            let noDataAdded = false;
                
                            dataSet.sort((a, b) => b.value - a.value);
                
                            dataSet.forEach(data => {
                                if (!(data.value in addedValues)) {
                                    let objIndex = datadaerah.find(item => item.id == data.id);
                                    if (data.value > 0) {
                                        items.push({
                                            text: data.value.toString() + " (" + objIndex.value + ")",
                                            iconFill: series.colorScale().valueToColor(data.value)
                                        });
                                    } else {
                                        items.push({
                                            text: "No Data",
                                            iconFill: series.colorScale().valueToColor(0)
                                        });
                                        noDataAdded = true;
                                    }
                                    addedValues[data.value] = true;
                                }
                            });
                
                            if (!noDataAdded) {
                                items.push({
                                    text: "No Data",
                                    iconFill: series.colorScale().valueToColor(0)
                                });
                            }
                
                            return items;
                        });
                
                        legend.position('right');
                        legend.itemsLayout('vertical');
                    });
                }
            });
            </script>
            <script>
                $.ajax({
                    type: "GET",
                    url: "{{ route('pekerjaan') }}",
                    dataType: "JSON",
                    success: function (RES) {
                        $("#mhsOrang").text(RES.mhs[0].count);
                        $("#dosenOrang").text(RES.dosen[0].count);
                        $("#staffOrang").text(RES.staff[0].count);
                    }
                });
            </script>
            <script>
                $.ajax({
                    type: "GET",
                    url: "{{ route('wordFrequency') }}",
                    dataType: "JSON",
                    success: function (data) {
                        const sortedKeys = Object.keys(data).sort((a, b) => data[b] - data[a]);
                        const top5 = sortedKeys.slice(0, 5).map(key => ({ key, value: data[key] }));

                        $("#top1Fre").text(top5[0].key.toUpperCase());
                        $("#top1Count").text(top5[0].value+" Kata");

                        $("#top2Fre").text(top5[1].key.toUpperCase());
                        $("#top2Count").text(top5[1].value+" Kata");

                        $("#top3Fre").text(top5[2].key.toUpperCase());
                        $("#top3Count").text(top5[2].value+" Kata");

                        $("#top4Fre").text(top5[3].key.toUpperCase());
                        $("#top4Count").text(top5[3].value+" Kata");

                        $("#top5Fre").text(top5[4].key.toUpperCase());
                        $("#top5Count").text(top5[4].value+" Kata");
                    }
                });
            </script>
            <script>
                $.ajax({
                    type: "GET",
                    url: "{{ route('checkBox') }}",
                    dataType: "JSON",
                    success: function (data) {
                        const sortedKeys = Object.keys(data).sort((a, b) => data[b] - data[a]);
                        const top5 = sortedKeys.slice(0, 5).map(key => ({ key, value: data[key] }));
                        console.log(top5[0].value.provinsi);
                        console.log(top5[0].value.persentase);
                        
                        $("#boxTop1").text(top5[0].value.provinsi);
                        $("#percentageBoxTop1").css("width", top5[0].value.persentase+"%");

                        $("#boxTop2").text(top5[1].value.provinsi);
                        $("#percentageBoxTop2").css("width", top5[1].value.persentase+"%");

                        $("#boxTop3").text(top5[2].value.provinsi);
                        $("#percentageBoxTop3").css("width", top5[2].value.persentase+"%");

                        $("#boxTop4").text(top5[3].value.provinsi);
                        $("#percentageBoxTop4").css("width", top5[3].value.persentase+"%");

                        $("#boxTop5").text(top5[4].value.provinsi);
                        $("#percentageBoxTop5").css("width", top5[4].value.persentase+"%");

                    }
                });
            </script>
            <script>
                $.ajax({
                    type: "GET",
                    url: "{{ route('wordCloud') }}",
                    dataType: "JSON",
                    success: function (RES) {
                        let paragraf = RES[0].combined_column;
                        const kataPositif = ["baik", "senang", "bagus", "ceria", "berhasil", "bersih", "nyaman", "efisien", "terang"];
                        const kataNegatif = ["terlambat", "curiga", "menjengkelkan", "tidak", "negatif", "kecil", "tidak ada", "dilemari", "tidak pernah", "salah"];
                        const kataNetral = ["dan", "serta", "dan", "dll", "atau", "belum", "tidak", "itu"];

                        let countPositif = 0;
                        let countNegatif = 0;
                        let countNetral = 0;

                        const lowerParagraf = paragraf.toLowerCase();

                        kataPositif.forEach(kata => {
                            if (lowerParagraf.includes(kata)) {
                                countPositif++;
                            }
                        });

                        kataNegatif.forEach(kata => {
                            if (lowerParagraf.includes(kata)) {
                                countNegatif++;
                            }
                        });

                        kataNetral.forEach(kata => {
                            if (lowerParagraf.includes(kata)) {
                                countNetral++;
                            }
                        });

                        const totalKataKunci = countPositif + countNegatif + countNetral;

                        const persentasePositif = (countPositif / totalKataKunci) * 100;
                        const persentaseNegatif = (countNegatif / totalKataKunci) * 100;
                        const persentaseNetral = (countNetral / totalKataKunci) * 100;

                        console.log(`Persentase sentimen positif: ${persentasePositif.toFixed(2)}%`);
                        console.log(`Persentase sentimen negatif: ${persentaseNegatif.toFixed(2)}%`);
                        console.log(`Persentase sentimen netral: ${persentaseNetral.toFixed(2)}%`);
                        $("#PositiveF").text(`${persentasePositif.toFixed(2)}%`)
                        $("#NeutralF").text(`${persentaseNetral.toFixed(2)}%`)
                        $("#NegativeF").text(`${persentaseNegatif.toFixed(2)}%`)
                    }
                });
            </script>
        </body>
    </div>
</div>
@endsection
@section('script')
@endsection