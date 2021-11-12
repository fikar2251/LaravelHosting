<div class="modal" id="modaldemo1">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Upload Document</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" id="FormUploadFilePegawai" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_file">Nama File</label>
                        <input type="text" class="form-control" name="nama_file" id="nama_file">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_file">Tanggal</label>
                        <input type="datetime" class="form-control" readonly name="tanggal_file" id="tanggal_file" value="{{ Carbon\Carbon::now()->format('Y-m-d H:i:s') }}">
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" multiple class="form-control" name="file[]" id="file">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="SubmitUploadFilePegawai()" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modaldemo2">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Comment Preview</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover" id="datatablecomment">
                        <thead>
                            <tr>
                                <th width="100px">Foto</th>
                                <th>Pegawai</th>
                                <th>Comment</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <hr>
                <form action="" id="FormComment" method="post">
                    <input type="hidden" name="file_pegawai_id" id="file_pegawai_id">
                    <input type="hidden" name="pegawai_id" id="pegawai_id" value="{{ auth()->user()->pegawai->id }}">
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" class="form-control" id="comment" cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="SubmitComment()" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modaldemo3">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Access Preview</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatableaccess">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody id="ThisForLoopAccess"></tbody>
                    </table>
                </div>
                <hr>
                <form id="FormAccess" method="post">
                    <input type="hidden" name="file_id" id="file_id">
                    <div class="form-group">
                        <label for="access">Acccess</label>
                        <select name="access[]" id="access" multiple="multiple" class="form-control select2">
                        </select>
                    </div>
                </form>
                <button type="button" onclick="SubmitAccess()" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

