<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <div class="d-flex">
                        <div class="cryp-icon bg-primary mr-2">
                            <i class="fas fa-mail-bulk"></i>
                        </div>
                        <p class="mb-0  mt-1 font-weight-semibold">Surat Masuk</p>
                    </div>
                </div>
                <div class="d-flex mt-2 mb-1">
                    <div>
                        <h3 class="mb-1">{{ $surat_masuk }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <div class="d-flex">
                        <div class="cryp-icon bg-secondary mr-2">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <p class="mb-0  mt-1 font-weight-semibold">Surat Keluar</p>
                    </div>
                </div>
                <div class="d-flex mt-2 mb-1">
                    <div>
                        <h3 class="mb-1">{{ $surat_keluar }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <div class="d-flex">
                        <div class="cryp-icon bg-info mr-2">
                            <i class="fas fa-users"></i>
                        </div>
                        <p class="mb-0 mt-1 font-weight-semibold">Pegawai</p>
                    </div>
                </div>
                <div class="d-flex mt-2 mb-1">
                    <div>
                        <h3 class="mb-1">{{ $pegawai }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <div class="d-flex">
                        <div class="cryp-icon bg-warning mr-2">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <p class="mb-0 mt-1 font-weight-semibold">Dokumen</p>
                    </div>
                </div>
                <div class="d-flex mt-2 mb-1">
                    <div>
                        <h3 class="mb-1">{{ $dokumen }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="card-header">
                    <h5>Statistik Agama</h5>
                    <p>Data Pegawai Berdasarkan Agama</p>
                </div>
                <div class="ht-200 ht-sm-300" id="flotPie1"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="card-header">
                    <h5>Statistik Perkawinan</h5>
                    <p>Data Pegawai Berdasarkan Perkawinan</p>
                </div>
                <div class="ht-200 ht-sm-300" id="flotPie2"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6">
        <div class="card mg-b-20">
            <div class="card-header">
                <h5>Statistik Jenis Kelamin</h5>
            </div>
            <div class="card-body">
                <div class="morris-wrapper-demo" id="morrisBar1"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mg-b-20 overflow-hidden">
            <div class="card-header">
                <div>
                    <label class="main-content-label mb-0">Table Pendidikan</label>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mg-b-0">
                        <tbody>
                            @foreach($pendidikan as $data)
                            <tr>
                                <td>
                                    <h6 class="mg-b-0 tx-inverse">{{ $data->nama }}</h6>
                                </td>
                                <td>
                                    <h6 class="mg-b-0 tx-inverse">{{ $data->pegawais->count() }}</h6>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('admin.script')
<!-- Flot js -->
<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>

<!-- Morris js -->
<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/plugins/morris.js/morris.min.js') }}"></script>
<script>
    const piechartagama = async () => {
        let data = await fetch('/api/admin/getagamapiechart').then(data => data.json())
        let options = {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }
                }
            },
            grid: {
                hoverable: false,
                clickable: true
            }
        }

        function labelFormatter(label, series) {
            return '<div style="font-size:8pt; text-align:center; padding:2px; color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
        }
        $("#flotPie1").plot(data, options).data('plot')
    }
    const piechartperkawinan = async () => {
        let data = await fetch('/api/admin/getperkawinanpiechart').then(data => data.json())
        let options = {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.5,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }
                }
            },
            grid: {
                hoverable: false,
                clickable: true
            }
        }

        function labelFormatter(label, series) {
            return '<div style="font-size:8pt; text-align:center; padding:2px; color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
        }
        $("#flotPie2").plot(data, options).data('plot')
    }
    const morrisjeniskelamin = async () => {
        let morrisData = await fetch('/api/admin/getjeniskelaminmorris').then(data => data.json())
        console.log(morrisData)

        new Morris.Bar({
            element: 'morrisBar1',
            data: morrisData,
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Laki Laki', 'Perempuan'],
            barColors: ['#ea614c', '#00cccc'],
            gridTextSize: 11,
            hideHover: 'auto',
            resize: true
        });

    }

    setTimeout(() => {
        piechartperkawinan()
        piechartagama()
        morrisjeniskelamin()
    }, 1)
</script>
@endpush