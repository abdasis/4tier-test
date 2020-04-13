@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Jawaban Dari Siswa Bernama <b class="text-primary">{{ $nama_siswa }}</b></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Soal</th>
                      <th>Jawaban</th>
                      <th>Keyakinan Jawaban</th>
                      <th>Alasan</th>
                      <th>Keyakinan Alasan</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($jawaban as $key => $statistik)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{!! $statistik->soal !!}
                        </td>
                        <td>{{ $statistik->jawaban }}</td>
                        <td>{{ $statistik->keyakinan_jawaban }}</td>
                        <td>{{ $statistik->alasan }}</td>
                        <td>{{ $statistik->keyakinan_alasan }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
    </div>
@endsection


@section('plugin-js')
<script src="{{ url('/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection

@section('plugin-css')
<link rel="stylesheet" href="{{ url('/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection