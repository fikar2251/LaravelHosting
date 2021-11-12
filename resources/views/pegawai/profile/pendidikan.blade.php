    <div class="card-body">
        <a class="modal-effect btn btn-sm btn-dark mb-4" data-effect="effect-scale" data-toggle="modal" href="#modaldemo7">Add Riwayat Pendidikan</a>
        <div class="table-responsive">
            <table class="table table-striped" id="datatablependidikan">
                <thead>
                    <tr>
                        <th>Tingkat Pendidikan</th>
                        <th>Nm sekolah / Universitas</th>
                        <th>Lokasi</th>
                        <th>Jurusan</th>
                        <th>Nomor Ijazah</th>
                        <th>Tanggal Ijazah</th>
                        <th>Nama Kepsek / Rektor</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card-body border-top">
        <label class="main-content-label tx-13 mg-b-20">Personal Details</label>
        <div class="table-responsive">
            <table class="table row table-borderless mb-0">
                <tbody class="col-lg-12 col-xl-6 p-0">
                    <tr>
                        <td class="border-top-0 pt-0"><span class="font-weight-semibold">Nama Lengkap :</span>{{ $pegawai->nama }}</td>
                    </tr>
                    <tr>
                        <td class="border-top-0"><span class="font-weight-semibold">Nik :</span> {{ $pegawai->nik }}</td>
                    </tr>
                    <tr>
                        <td class="border-top-0"><span class="font-weight-semibold">Tanggal Lahir :</span> {{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->format('Y M d') }}</td>
                    </tr>
                    <tr>
                        <td class="border-top-0 pt-0"><span class="font-weight-semibold">Tempat Lahir :</span>{{ $pegawai->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <td class="border-top-0"><span class="font-weight-semibold">Agama :</span> {{ $pegawai->agama->nama }}</td>
                    </tr>
                    <tr>
                        <td class="border-top-0"><span class="font-weight-semibold">Pendidikan Terakhir </span> {{ $pegawai->pendidikan->nama }}</td>
                    </tr>
                </tbody>
                <tbody class="col-lg-12 col-xl-6 p-0 border-top-0">
                    <tr>
                        <td class="border-top-0 pt-0"><span class="font-weight-semibold">NIP Pegawai :</span> {{ $pegawai->nip }}</td>
                    </tr>
                    <tr>
                        <td class="border-top-0"><span class="font-weight-semibold">Email :</span> {{ $pegawai->user->email }}</td>
                    </tr>
                    <tr>
                        <td class="border-top-0"><span class="font-weight-semibold">No HP :</span> {{ $pegawai->no_hp }}</td>
                    </tr>
                    <tr>
                        <td class="border-top-0"><span class="font-weight-semibold">Status Pernikahan :</span> {{ $pegawai->status_pernikahan->nama }}</td>
                    </tr>
                    <tr>
                        <td class="border-top-0"><span class="font-weight-semibold">Jenis Kelamin :</span> {{ $pegawai->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td class="border-top-0"><span class="font-weight-semibold">Tanggal TMT :</span> {{ $pegawai->tmt }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body border-top">
        <label class="main-content-label tx-13 mg-b-20">Work & Education</label>
        <div class="main-profile-work-list d-md-flex">
            <div class="media">
                <div class="media-logo bg-success-transparent text-success">
                    <i class="icon ion-logo-whatsapp"></i>
                </div>
                <div class="media-body">
                    <h6>Web Designer at <a href="">Spruko</a></h6><span>2018 - present</span>
                    <p>Past Work: Spruko, Inc.</p>
                </div>
            </div>
            <div class="media">
                <div class="media-logo bg-danger-transparent text-danger">
                    <i class="icon ion-logo-buffer"></i>
                </div>
                <div class="media-body">
                    <h6>Studied at <a href="">University</a></h6><span>2004-2008</span>
                    <p>Graduation: Bachelor of Science in Computer Science</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body border-top">
        <label class="main-content-label tx-13 mg-b-20">Skills</label>
        <div class="skill-tags">
            <ul class="list-unstyled mb-0">
                <li><a href="#">HTML5</a></li>
                <li><a href="#">CSS</a></li>
                <li><a href="#">Java Script</a></li>
                <li><a href="#">Photo Shop</a></li>
                <li><a href="#">Php</a></li>
                <li><a href="#">Wordpress</a></li>
                <li><a href="#">Sass</a></li>
                <li><a href="#">Angular</a></li>
            </ul>
        </div>
    </div>
    <div class="card-body border-top">
        <label class="main-content-label tx-13 mg-b-20">Contact</label>
        <div class="main-profile-contact-list d-md-flex">
            <div class="media">
                <div class="media-icon bg-primary-transparent text-primary">
                    <i class="icon ion-md-phone-portrait"></i>
                </div>
                <div class="media-body">
                    <span>Mobile</span>
                    <div>
                        +245 354 654
                    </div>
                </div>
            </div>
            <div class="media">
                <div class="media-icon bg-success-transparent text-success">
                    <i class="icon ion-logo-slack"></i>
                </div>
                <div class="media-body">
                    <span>Slack</span>
                    <div>
                        @spruko.w
                    </div>
                </div>
            </div>
            <div class="media">
                <div class="media-icon bg-info-transparent text-info">
                    <i class="icon ion-md-locate"></i>
                </div>
                <div class="media-body">
                    <span>Current Address</span>
                    <div>
                        San Francisco, CA
                    </div>
                </div>
            </div>
        </div><!-- main-profile-contact-list -->
    </div>