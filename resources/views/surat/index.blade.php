@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable();

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  {{-- <div class="col-lg-2">
    <div class="d-sm-flex">
      <a href="{{ route('buku.create') }}" class="btn btn-primary btn-rounded m-1"><i class="fa fa-plus"></i> Tambah Buku</a>
      <a href="{{ route('export.excel',['name'=>$type]) }}" class="btn btn-success btn-rounded m-1"><i class="fa fa-download"></i> Export Excel</a>
      @if ($type==4)
        <a href="{{ route('export.doc.custom',['from' =>$from ,'to'=>$to]) }}" class="btn btn-info btn-rounded m-1"><i class="fa fa-download"></i> Export Word</a>
      @else
        <a href="{{ route('export.doc',['name' =>$type]) }}" class="btn btn-info btn-rounded m-1"><i class="fa fa-download"></i> Export Word</a>
      @endif
    </div>
  </div> --}}
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <div class="card-title">
                    <h4>Surat Masuk</h4>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped wrapper" id="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tanggal</th>
                          <th>Pemohon</th>
                          <th>Jenis Surat</th>
                          <th>Kepentingan Surat</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                          <td>{{ $item->user->nama}}</td>
                          <td>{{ $item->jenis->nama}}</td>
                          <td>{{ $item->perihal}}</td>
                          <td>
                            <div class="btn-group dropdown">
                              <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                <a class="dropdown-item" href=""> Download surat </a>
                                <a class="dropdown-item" href=""> Edit </a>
                                <form action="" class="pull-left"  method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                                </button>
                              </form>
                              </div>
                            </div>
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
@endsection