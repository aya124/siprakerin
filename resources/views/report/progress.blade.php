@extends('adminlte::page')

@section('title', 'Cetak Rekap Laporan & Sertifikat')

@section('content_header')
<h1>Cetak Rekap Laporan & Sertifikat</h1>
@stop

@section('content')

<div class="">
    @role(['admin', 'kps', 'wali-kelas'])
    <div class="panel panel-primary">
      <div class="panel-heading">Cetak Rekap Laporan & Sertifikat</div>
        <div class="panel-body">
            <form id="cetak" action="{{route('report.recap')}}" class="form-horizontal" >
                 <div class="form-group col-md-4">
                    <label>Cetak berdasarkan tanggal:</label></br>
                    <label class="control-label">Dari</label>
                    <input type="date" class="dateselect" id="startdate" required="required" name="start"/>
                </div><br/>
                <div class="form-group col-md-4">
                    <label class="control-label">Hingga</label>
                    <input type="date" class="dateselect" id="enddate" required="required" name="end"/>
                </div>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </form>
            </div>
        </div>
        @endrole
     </div>

@section('css')
<link rel="stylesheet" href="datepicker.css">
@stop

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/js/adminlte.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
	$(function () {
	$('.dateselect1').datepicker({
    // format: 'dd-mm-yyyy',
    // startDate: '-3d'
});
    $('.dateselect2').datepicker({
    // format: 'dd-mm-yyyy',
    // startDate: '-3d'
});
    var a,b;
    $('form').on('submit',function(e){
        e.preventDefault();
        a = new Date($('.startdate').val()).getTime();
        b = new Date($('.enddate').val()).getTime();
        if(b < a){
             $('#test').html('Input tanggal tidak sesuai!');
        }else{
            this.submit();
        }
    });
});
</script>
@stop
