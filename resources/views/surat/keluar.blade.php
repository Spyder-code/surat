@extends('layouts.app')

@section('content')
<div class="col-lg-12">
   @if (Session::has('message'))
   <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
      {{ Session::get('message') }}</div>
   @endif
</div>

<div class="row" style="margin-top: 20px;">
   <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <div class="card-title">
               <h4>Surat Masuk</h4>
            </div>
            <div class="table-responsive">

            </div>
         </div>

      </div>

   </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {
   $('#table').DataTable();

});
</script>
@stop