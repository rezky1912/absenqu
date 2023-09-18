<form action="/karyawan/{{$karyawan->nik}}/update" method="POST" id="frmKaryawan" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-12">
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
          
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
            <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
            <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
            <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
            <path d="M5 11h1v2h-1z"></path>
            <path d="M10 11l0 2"></path>
            <path d="M14 11h1v2h-1z"></path>
            <path d="M19 11l0 2"></path>
          </svg>
        </span>
        <input type="text" readonly value="{{$nik}}" id="nik" class="form-control" placeholder="NIK" name="nik">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
          
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
            <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            <path d="M16 19h6"></path>
          </svg>
        </span>
        <input type="text" value="" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
          
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-minus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
            <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.948 0 1.818 .33 2.504 .88"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            <path d="M16 19h6"></path>
          </svg>
        </span>
        <input type="text" value="" id="jabatan" class="form-control" placeholder="Jabatan" name="jabatan">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="input-icon mb-3">
        <span class="input-icon-addon">
          
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
            <path d="M15 6h6m-3 -3v6"></path>
          </svg>
        </span>
        <input type="text" value="" id="no_hp" class="form-control" placeholder="No HP" name="no_hp">
      </div>
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-12">
      <input type="file" name="foto" class="form-control">
      <input type="hidden" name="old_foto" value="{{$karyawan->foto}}">
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <select name="kode_div" id="kode_div" class="form-select mt-2">
        <option value="">Divisi</option>
        @foreach ($divisi as $d)
        <option {{Request('kode_div')==$d->kode_div ? 'selected' : ''}} value="{{$d->kode_div}}">{{$d->nama_div}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-12">
      <div class="form-group">
        <button class="btn btn-primary w-100">
          
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
            <path d="M14 4l0 4l-6 0l0 -4"></path>
          </svg>
          Simpan
        </button>
      </div>
    </div>
  </div>
</form>
