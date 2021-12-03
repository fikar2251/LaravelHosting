<div class="row row-sm">
    <div class="col-lg-5">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="d-sm-flex">
                    <div class="mr-3">
                        <img src="{{ asset('storage/'.$pegawai->foto) }}" alt="img" class="wd-200 ie-image-5">
                    </div>
                    <div class="mt-2">
                        <h4 class="mb-1"><span class="tx-20 font-weight-bold">Selamat Datang </span> <br> {{ $pegawai->nama }}</h4>
                        <hr>
                        <p><span class="font-weight-bold">NIP </span> <br> <strong>{{ $pegawai->nip }}</strong></p>
                        <p><span class="font-weight-bold">Email </span> <br> {{ $pegawai->user->email }}</p>
                        <a class="btn btn-primary rounded-lg mt-1" href="{{ route('pegawai.profile.show',$pegawai->id) }}">Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card mg-b-20 overflow-hidden">
            <div class="card-body">
                <div class="card-header pt-0 pl-0 pr-0 d-flex">
                    <div>
                        <label class="main-content-label mb-1">INFORMASI KEPEGAWAIAN</label>
                        <span class="d-block tx-12 text-muted">Dinas Pekerjaan Umum dan penataan Ruang</span>
                    </div>
                    <div class="card-option ml-auto d-none d-md-flex">
                        <div class="btns">
                            <a class="" href=""><span>Week</span></a>
                            <a class="active" href=""><span>Month</span></a>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row row-sm flot-absolute-value">
                        <div class="col mg-t-15">
                            <p class="mg-b-5"><span class="wd-9 ht-9 bg-light d-inline-block mr-1 rounded-circle"></span> Kenaikan Berkala</p>
                            <h2 class="mb-0 tx-30">0</h2>
                        </div><!-- col-4 -->
                        <div class="col mg-t-15">
                            <p class="mg-b-5"><span class="wd-9 ht-9 bg-primary d-inline-block mr-1 rounded-circle"></span> Kenaikan Pangkat</p>
                            <h2 class="mb-0 tx-30">0</h2>
                        </div>
                        <div class="col mg-t-15">
                            <p class="mg-b-5"><span class="wd-9 ht-9 bg-primary d-inline-block mr-1 rounded-circle"></span> Terhitung Mulai Tanggal</p>
                            <h2 class="mb-0 tx-30">0</h2>
                        </div>
                        <!-- col-4 -->
                        <div class="col mg-t-15">
                            <a class="btn btn-primary mg-t-25" href="#">Get Complete Details</a>
                        </div><!-- col-4 -->
                    </div>
                </div>
            </div>
        </div>
        <div class="card mg-b-20 overflow-hidden">
            <div class="card-body">
                <div class="card-header pt-0 pl-0 pr-0 d-flex justify-content-between">
                    <div>
                        <label class="main-content-label mb-1">Absensi</label>
                        <span class="d-block tx-12 text-muted">{{ Carbon\Carbon::now()->format('Y F d') }}</span>
                    </div>
                    <div>
                        <h1 class="lead" id="txt">asd</h1>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>tanggal</th>
                        <th>masuk</th>
                        <th>selesai</th>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <p class="lead">{{ Carbon\Carbon::now()->format('Y-m-d') }}</p>
                        </td>
                        <td class="text-center"><button @if(\App\Models\Absensi::where('pegawai_id',$pegawai->id)->whereDate('tanggal',Carbon\Carbon::now()->format('Y-m-d'))->exists()) @if(\App\Models\Absensi::where('pegawai_id',$pegawai->id)->whereDate('tanggal',Carbon\Carbon::now()->format('Y-m-d'))->first()->masuk) disabled @endif @endif id="masuk" class="btn btn-primary">Absen Masuk</button></td>
                        <td class="text-center"><button @if(\App\Models\Absensi::where('pegawai_id',$pegawai->id)->whereDate('tanggal',Carbon\Carbon::now()->format('Y-m-d'))->exists()) @if(\App\Models\Absensi::where('pegawai_id',$pegawai->id)->whereDate('tanggal',Carbon\Carbon::now()->format('Y-m-d'))->first()->keluar) disabled @endif @endif id="pulang" class="btn btn-success">Absen Pulang</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="pegawai" value="{{ $pegawai->id }}">
<!-- JQuery min js -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        startTime()
    })
    $('#masuk').on('click', function() {
        $.ajax({
            url: `/api/pegawai/masuk`,
            method: 'post',
            data: {
                'masuk': $('#txt').html(),
                'pegawai': $('#pegawai').val()
            },
            success: function(response) {
                Swal.fire('Good job!',
                    response,
                    'success')
                $('#masuk').attr('disabled','disabled')
                console.log(response)
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error.responseText
                })
                console.error(error)
            }
        })
    });
    $('#pulang').on('click', function() {
        $.ajax({
            url: `/api/pegawai/pulang`,
            method: 'post',
            data: {
                'pulang': $('#txt').html(),
                'pegawai': $('#pegawai').val()
            },
            success: function(response) {
                Swal.fire('Good job!',
                    response,
                    'success')
                $('#pulang').attr('disabled','disabled')
                console.log(response)
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error.responseText
                })
                console.error(error)
            }
        })
    });
    function startTime() {
        const today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        $('#txt').html(`${h}:${m}:${s}`)
        setTimeout(startTime, 1000);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }; // add zero in front of numbers < 10
        return i;
    }
</script>
<!-- ROW-3 -->