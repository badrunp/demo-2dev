<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="3600">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT. DEWI FALINDO | {{ $title }}</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="css/adminlte.css">
  <link rel="stylesheet" type="text/css" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    {{-- Preloader --}}
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="img/logo.png" alt="" height="100" width="100">
    </div>

    {{-- Navbar --}}
    <nav class="main-header navbar navbar-expand navbar-green">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    
      {{-- Right navbar links --}}
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        {{-- User Dropdown Menu --}}
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-th-large"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <i class="fas fa-key mr-2"></i> Change Password
            </a>
            <div class="dropdown-divider"></div>
            <form action="/logout" method="post">
              @csrf
              <button class="dropdown-item" type="submit">
                <i class="fas fa-sign-out-alt mr-2"></i>Logout
              </button>
            </form>
          </div>
        </li>
      </ul>
    </nav>
    {{-- /.navbar --}}

    {{-- Main Sidebar Container --}}
    <aside class="main-sidebar sidebar-dark-green elevation-4">
      {{-- Brand Logo --}}
      <a href="index3.html" class="brand-link text-center">
        <span class="brand-text font-weight-light">{{ date("j F, Y") }} | <span id="clock"></span></span>
      </a>

      {{-- Sidebar --}}
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center">
          <div class="info text-center">
            <a href="#" class="">USER : @auth {{ strtoupper(auth()->user()->name) }} @endauth</a>
          </div>
        </div>
        {{-- Sidebar Menu --}}
        @php
        $myRole = auth()->user()->jabatan
        @endphp
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  TRANSAKSI
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if($myRole == "Marketing-SA" || $myRole == "Administrator" || $myRole == "Direktur" || $myRole ==
                "Manager")
                <li class="nav-item">
                  <a href="estimasi" class="nav-link {{ ($active == 'Estimasi') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Estimasi
                    </p>
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a href="permit-discount" class="nav-link  {{ ($active == 'Permit-discount') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Permit Discount
                    </p>
                  </a>
                </li> --}}
                <li class="nav-item">
                  <a href="permit-estimasi-approval"
                    class="nav-link {{ ($active == 'Permit-estimasi-approval') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Permit Approval
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="estimasi-approved" class="nav-link  {{ ($active == 'Estimasi-approved') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Estimasi Approved
                    </p>
                  </a>
                </li>
                @endif
                <li class="nav-item">
                  <a href="work-order" class="nav-link {{ ($active == 'Spk') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      SPK Lapangan
                    </p>
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a href="purchase-order" class="nav-link  {{ ($active == 'Purchase-order') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Pembelian Barang
                    </p>
                  </a>
                </li> --}}
                @if($myRole == "Kordinator Lapangan" || $myRole == "Administrator" ||
                $myRole == "Direktur" || $myRole ==
                "Manager")
                <li class="nav-item">
                  <a href="progres-pekerjaan" class="nav-link {{ ($active == 'Progress') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Progres Pekerjaan
                    </p>
                  </a>
                </li>
                @endif
                <li class="nav-item">
                  <a href="pekerjaan-selesai" class="nav-link {{ ($active == 'Pekerjaan-selesai') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Pekerjaan Selesai
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="garansi" class="nav-link {{ ($active == 'Garansi') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Surat Puas / Garansi
                    </p>
                  </a>
                </li>
                @if($myRole == "Finance" || $myRole == "Marketing-SA" || $myRole == "Administrator" ||
                $myRole == "Direktur" || $myRole ==
                "Manager")
                <li class="nav-item">
                  <a href="salvage" class="nav-link {{ ($active == 'Salvage') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Salvage
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="kwitansi" class="nav-link {{ ($active == 'Kwitansi') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Kwitansi & Freepass
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pengiriman-invoice" class="nav-link {{ ($active == 'Pengiriman-invoice') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Pengiriman Invoice
                    </p>
                  </a>
                </li>
                @endif
                @if($myRole == "Finance" || $myRole == "Purchasing" || $myRole == "Administrator" ||
                $myRole == "Direktur" || $myRole ==
                "Manager")
                <li class="nav-item">
                  <a href="purchase-order" class="nav-link {{ ($active == 'Purchase-Order') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Purchase Order
                    </p>
                  </a>
                </li>
                @endif
                @if($myRole == "Finance" || $myRole == "Gudang" || $myRole == "Purchasing" || $myRole == "Administrator"
                ||
                $myRole == "Direktur" || $myRole ==
                "Manager")
                <li class="nav-item">
                  <a href="gudang" class="nav-link {{ ($active == 'Gudang') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Transaksi Gudang
                    </p>
                  </a>
                </li>
                @endif
                {{-- <li class="nav-item">
                  <a href="pengajuan-pembayaran"
                    class="nav-link {{ ($active == 'Pengajuan Pembayaran') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Pengajuan Pembayaran
                    </p>
                  </a>
                </li> --}}
                @if($myRole == "Finance" || $myRole == "Administrator" ||
                $myRole == "Direktur" || $myRole ==
                "Manager")
                <li class="nav-item">
                  <a href="pengajuan-pembayaran"
                    class="nav-link {{ ($active == 'Pengajuan Pembayaran') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Pembayaran Hutang
                    </p>
                  </a>
                </li>
                @endif
                @if($myRole == "Marketing-SA" || $myRole == "Finance" || $myRole == "Administrator" ||
                $myRole == "Direktur" || $myRole ==
                "Manager")
                <li class="nav-item">
                  <a href="pembayaran-piutang" class="nav-link {{ ($active == 'Pembayaran Piutang') ? 'active' : '' }}"">
                  <i class=" nav-icon far fa-circle"></i>
                    <p>
                      Pembayaran Piutang
                    </p>
                  </a>
                </li>
                @endif
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  LAPORAN
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="laporan-kerja" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Laporan Pekerjaan
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="lead-time" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Pengingat Lead Time
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="laporan-oprasional" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Laporan Oprasional
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="laporan-keuangan" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Laporan Keuangan
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  MASTER DATA
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                @if($myRole == "Marketing-SA" || $myRole == "Administrator" ||
                $myRole == "Direktur" || $myRole ==
                "Manager")
                <li class="nav-item">
                  <a href="customer" class="nav-link {{( $active == 'customer') ? 'active': ''}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Data Customer
                    </p>
                  </a>
                </li>
                @endif
                @if($myRole == "Administrator" ||
                $myRole == "Direktur" || $myRole ==
                "Manager")
                <li class="nav-item">
                  <a href="asuransi" class="nav-link {{( $active == 'asuransi') ? 'active': ''}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Data Asuransi
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="user" class="nav-link {{( $active == 'user') ? 'active': ''}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Data User
                    </p>
                  </a>
                </li>
                @endif
                @if($myRole == "Purchasing" || $myRole == "Administrator" ||
                $myRole == "Direktur" || $myRole ==
                "Manager")
                <li class="nav-item">
                  <a href="supplier" class="nav-link {{( $active == 'supplier') ? 'active': ''}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Data Supplier
                    </p>
                  </a>
                </li>
                @endif
                @if($myRole == "Administrator" ||
                $myRole == "Direktur" || $myRole ==
                "Manager")
                <li class="nav-item">
                  <a href="karyawan" class="nav-link {{( $active == 'karyawan') ? 'active': ''}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Data Karyawan
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="kendaraan" class="nav-link {{( $active == 'kendaraan') ? 'active': ''}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Data Kendaraan
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="service" class="nav-link {{( $active == 'service') ? 'active': ''}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Data Perbaikan/Jasa
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="sparepart" class="nav-link {{( $active == 'sparepart') ? 'active': ''}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Data Sparepart
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="material" class="nav-link {{( $active == 'material') ? 'active': ''}}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                      Data Bahan/Material
                    </p>
                  </a>
                </li>
                @endif
              </ul>
            </li>
          </ul>
        </nav>
        {{-- /.sidebar-menu --}}
      </div>
      {{-- /.sidebar --}}
    </aside>

    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
      {{-- Main content --}}
      <section class="content">
        @yield('content')
      </section>
      {{-- /.content --}}
    </div>
    {{-- /.content-wrapper --}}
  </div>
  {{-- ./wrapper --}}

  {{-- REQUIRED SCRIPTS --}}
  {{-- jQuery --}}
  <script src="plugins/jquery/jquery.min.js"></script>
  {{-- Bootstrap --}}
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  {{-- overlayScrollbars --}}
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  {{-- AdminLTE App --}}
  <script src="js/adminlte.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script type="text/javascript" src="plugins/datatables-bs4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/select2/js/select2.full.min.js"></script>
  <script>
    var pageURL = window.location.href;
    let myRole = '{{auth()->user()->jabatan}}'
  var lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
  const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: false,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  $(function(){
  startTime()
  function startTime() {
    const today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    $('#clock').text(h + ":" + m + ":" + s);
    setTimeout(startTime, 1000);
  }

  

  function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
  }

  function resetAll(check = "success"){
    // $("#tbMaterialMasuk").find('tbody tr').remove()
    if(check != "failed"){
      $("table").find('tbody tr').remove()
      $("#tbMaterialKeluarProgres").find('tbody tr').remove()
      $("#tbSalvagePart").find('tbody tr').remove()
      $('#form-input').hide();
      $('#form-input_2').hide();
      $('#form-input_3').hide();
      $('#form-input_4').hide();
      $('#form-input_5').hide();
      $('#form-input_6').hide();
      $('#form-input-or').hide();
      $('#form-input-oldCustomer').hide();
      $('#form-input-dp').hide();
      $('#form-input-pelunasan').hide();
      $('#form-input-tagihan').hide();
      $(":input").removeClass("is-invalid")
      $('.totalMaterial').text(0)
      $('.totalMaterialMasuk').text(0)
      $('.totalPPNMaterial').text(0)
      $('.totalDiscMaterial').text(0)
      $('.totalDiscMaterialMasuk').text(0)
      $('.totalJasaPart').text(0)
      $('.totalPPNPart').text(0)
      $('.totalDiscPart').text(0)
      $('.grandTotalPart').text(0)
      $('#totalJasaPartMasuk').text(0)
      $('#totalPPNPartMasuk').text(0)
      $('#totalDiscPartMasuk').text(0)
      $('#grandTotalPartMasuk').text(0)
      $("#tbPengajuanMaterial").find('tbody tr').remove()
      $("#tbMaterialMasuk").find('tbody tr').remove()
      $("#tbPengajuanMaterial").find('tbody tr').remove()
      $('#form_1 #totalMaterial').text(0);
      $('#form_2 #totalMaterial').text(0);
      $('#form_3 #totalMaterial').text(0);
      $('#form_4 #totalMaterial').text(0);
      $("#tbListPersetujuanPembayaran2").find('tbody tr').remove()
      $("#tbListPersetujuanPembayaran").find('tbody tr').remove()
    }
    // $('.select2').val(null).trigger('change')
    // $('.totalMaterial').text(0)
    // $('.totalMaterialMasuk').text(0)
    // $('.totalPPNMaterial').text(0)
    // $('.totalDiscMaterial').text(0)
    // $('.totalDiscMaterialMasuk').text(0)
  }

  const form = [];
  $("form[id^='form_']").each(function() {
    form.push(this.id);
  });
  $(form).each(function(key, value) {
    $('#' + value).submit(function(e) {
      const action = $('#' + value).find('input[id="action"]').val()
      const tb = $('#' + value).find('input[id="table"]').val()
      console.log({action, tb});
      e.preventDefault()
        $.ajax({
          url: action,
          type: "POST",
          data: new FormData(this),
          processData: !1,
          contentType: !1,
          cache: !1,
          async: !1,
          dataType: "JSON",
          success: function(e) {
            console.log(e);
            switch (e.msg) {
              case "Success Create":
                $('#' + value).find("#key").val("")
                $('#' + value)[0].reset()
                $('.select2').val("")
                // $('#action').val(action)
                // $('#table').val(tb)
                // if(lastURLSegment == "progres-pekerjaan"){
                //   $("#progres_kerja").addClass("active")
                //   $("#request_material").removeClass("active")
                //   $("#request_sukucadang").removeClass("active")
                //   $(".progres_kerja").addClass("active")
                //   $(".request_material").removeClass("active")
                //   $(".request_sukucadang").removeClass("active")
                // }
                resetAll()
                eval(tb)
                Toast.fire({
                  icon: 'success',
                  title: 'Input Data Success',
                });
                break;
              case "Success Update":
                $('#' + value).find("#key").val(null)
                resetAll()
                $('.select2').val("")
                eval(tb)
                $('.modal').modal('hide')
                Toast.fire({
                  icon: 'success',
                  title: 'Update Data Success',
                });
                break;
            }
          },
          error: function (e) {
            resetAll("failed")
            // $('#' + value)[0].reset()
            // $('#' + value).find("#key").val(null)
            switch (e.responseJSON.msg) {
              case "Failed Create":
                Toast.fire({
                  icon: 'error',
                  title: 'Input Data Failed',
                });
                break;
              case "Failed Update":
                Toast.fire({
                  icon: 'error',
                  title: 'Update Data Failed',
                });
                break;
              default:
                Toast.fire({
                  icon: 'error',
                  title: e.responseJSON.msg ? e.responseJSON.msg : 'Maaf ada kesalahan!',
                });
            }
            const errors = e.responseJSON.errors;
            $(":input").removeClass("is-invalid")
            $.each(errors, function(key, value) {
              $("#" + key).addClass("is-invalid")
              $("input[name=" + key + "]").addClass("is-invalid")
              $("textarea[name=" + key + "]").addClass("is-invalid")
              $("select[name=" + key + "]").addClass("is-invalid")
              $("#" + key + "-error").text(value)
            });
          },
        });
    });
  })
    
    $("#selectNoEstimasi").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No Estimasi',
      ajax: {
        url: '{{ route('estimations-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_estimasi,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
        const id = $('#selectNoEstimasi').val();
        $.ajax({
          type: 'POST',
          url: '/estimasi/'+id,
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'patch'
          },
          dataType: 'JSON',
          success: function(res){
            $.each(res,function(key,value){
              if(value != null){
                $('#'+key).val(value)
              }
            })
            editDataEstimasiService(res.no_estimasi)
            editDataEstimasiPart(res.no_estimasi)
          }
        });
    });

    $("#selectNoPo").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No Po',
      ajax: {
        url: '{{ route('estimations-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_estimasi,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
        const id = $('#selectNoPo').val();
        $.ajax({
          type: 'POST',
          url: '/estimasi/'+id,
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'patch'
          },
          dataType: 'JSON',
          success: function(res){
            $.each(res,function(key,value){
              $('#'+key).val(value)
            })
            editDataEstimasiService(res.no_estimasi)
            editDataEstimasiPart(res.no_estimasi)
          }
        });
    });

    $("#selectNoApproved").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No Approved',
      ajax: {
        url: '{{ route('approved-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_estimasi_approved,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
        const id = $('#selectNoApproved').val();
        $.ajax({
          type: 'POST',
          url: '/estimasi-approved/'+id,
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'patch'
          },
          dataType: 'JSON',
          success: function(res){
            console.log("id");
            $.each(res,function(key,value){
              $('#'+key).val(value)
            })
            $('[name=no_spk]').val(res.no_estimasi_approved)
            $('#no_po').val(res.no_estimasi_approved)
            getDataSpkService(res.no_estimasi_approved)
            if(lastURLSegment == "purchase-order"){
              getDataPoPart(res.no_estimasi_approved) 
            }else if(lastURLSegment == "salvage"){
               getDataSalvagePart2(res.no_estimasi_approved) 
            }else{
              getDataSpkPart(res.no_estimasi_approved) 
            }
          }
        });
    });

    $("#selectNoPap").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No PAP',
      ajax: {
        url: '{{ route('pap-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_pap,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
      const form = $(this).closest("form").attr('id');
      const id = $('#'+form +' .selectNoPap').val();
      const id2 = $('#'+form +' #selectNoPap').val();
      // console.log(id);
        $("#"+form+ " #id_print_pap").val(id2)
    });

    $("#selectNoPpc").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No PPC',
      ajax: {
        url: '{{ route('ppc-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_ppc,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
      const form = $(this).closest("form").attr('id');
      const id = $('#'+form +' .selectNoPpc').val();
        $("#"+form+ " #id_print_ppc").val(id)
    });

    $("#selectNoVp").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No VP',
      ajax: {
        url: '{{ route('vp-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_vp,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
      const form = $(this).closest("form").attr('id');
      // const id = $('#'+form +' .selectNoPpc').val();
      const id = $('#'+form +' #selectNoVp').val();
        $("#"+form+ " #id_print_vp").val(id)
    });

    $("#selectNoPp").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No PP',
      ajax: {
        url: '{{ route('pp-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_pp,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
      const form = $(this).closest("form").attr('id');
      const id = $('#'+form +' .selectNoPp').val();
      const id2 = $('#'+form +' #selectNoPp').val();
      // console.log(id);
      $("#"+form+ " #id_print_pp").val(id2)
    });

    $(".selectNoSpk").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No Spk',
      ajax: {
        url: '{{ route('spk-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_spk,
                id: item.estimation_approved_id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
        const form = $(this).closest("form").attr('id');
        const id = $('#'+form +' .selectNoSpk').val();
        getDataSpkItem(form, id)
    });

    $(".selectNoSpk_2").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No Spk',
      ajax: {
        url: '{{ route('spk-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_spk,
                id: item.estimation_approved_id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
        const form = $(this).closest("form").attr('id');
        const id = $('#'+form +' .selectNoSpk_2').val();
        getDataSpkItem(form, id)
    });



    $(".selectNoApproved").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No Approved',
      ajax: {
        url: '{{ route('approved-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_estimasi_approved,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
        const form = $(this).closest("form").attr('id');
        const id = $('#'+form +' .selectNoApproved').val();
        $.ajax({
          type: 'POST',
          url: '/estimasi-approved/'+id,
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'patch'
          },
          dataType: 'JSON',
          success: function(res){
            $.each(res,function(key,value){
              if(value != null){
                $('#'+form+ ' #'+key).val(value)
              }
            })
            $('[name=no_spk]').val(res.no_estimasi_approved)
            $('#no_po').val(res.no_estimasi_approved)
            getDataSpkService(res.no_estimasi_approved)
            if(lastURLSegment == "purchase-order"){
              getDataPoPart(res.no_estimasi_approved) 
            }else if(lastURLSegment == "gudang"){
              // console.log(res);
              getDataPoPart(res.no_estimasi_approved) 
              getDataIncomingPart(res.no_estimasi_approved) 
              getDataPartOut(res.no_estimasi_approved) 
            }else if(lastURLSegment == "salvage"){
              getDataSalvagePart2(res.no_estimasi_approved) 
            }else if(lastURLSegment == "pembayaran-piutang"){
              editDataEstimasiService(res.no_estimasi_approved)
              editDataEstimasiPart(res.no_estimasi_approved)
              if(res.pembayaran_piutang){
                $("#form_1 #key").val(res.pembayaran_piutang.id)
              }
              getKwitansiInvoice(res.pembayaran_piutang || {})
            }else{
              getDataSpkPart(res.no_estimasi_approved) 
            }
          }
        });
    });
});

function getKwitansiInvoice(data = {}){
  // return;
  count=$('#tbKwitansiInvoice tbody tr').length + Number(1);
  $("#tbKwitansiInvoice").find('tbody').html(`
    <tr id="row_part_${n}">
      <td>${data.tgl_kwitansi}</td>
      <td><span class="text-sm">${data.no_kwitansi}</span><input type="hidden" value="${data.total}" id="total_tagihan"></td>
      <td><input type="date" class="form-control" id="tanggal_penerimaan" name="tanggal_penerimaan" value="${data?.tanggal_penerimaan ? data.tanggal_penerimaan : ''}"></td>
      <td><select class="form-control" name="rekening_penerima" id="rekening_penerima">
          <option value="">Pilih Rekening</option>
          <option value="mandiri" ${data?.rekening_penerima=="mandiri" && 'selected' }>BANK MANDIRI</option>
          <option value="permata" ${data?.rekening_penerima=="permata" && 'selected' }>BANK PERMATA</option>
          <option value="bca" ${data?.rekening_penerima=="bca" && 'selected' }>BANK BCA</option>
        </select></td>
        <td><input type="number" class="form-control" name="jumlah" placeholder="Jumlah" id="jumlah" value="${data?.jumlah ? data.jumlah : ''}" oninput="handleChangeJumlah()"></td>
        <td><input type="text" class="form-control" name="status" id="status" value="${data?.status ? data.status : 'Belum Lunas'}" readonly></td>
    </tr>
  `)
  handleChangeJumlah()
  n++
}

// function getKwitansiInvoice(id, data = {}){
//      $.ajax({
//       type : 'GET',
//       url : '/pengiriman-invoice/kwitansi-invoice/'+id.split("/").join("_"),
//       data:{
//         _toke: '{{ csrf_token() }}'
//       },
//       dataType: 'JSON',
//       success: function(res){
//         console.log(res);
//         //  $("#tbKwitansiInvoice").find('tbody tr').remove()
//         // <td>${res.map(item => `<span style="font-size: 12px;">- ${item.no_kwitansi}</span><br>`).join(" ")}</td>
//       if(res?.length > 0){
//         let noTagihan = "Kwitansi tagihan belum ada.";
//         let total = 0;
//         res.forEach(item => {
//           if(item.no_kwitansi.split("/")[2] == "INV-ASS"){
//             noTagihan = item.no_kwitansi
//             total+= item.total_tagihan
//           }
//         })

//         count=$('#tbKwitansiInvoice tbody tr').length + Number(1);
//         $("#tbKwitansiInvoice").find('tbody').html(`
//           <tr id="row_part_${n}">
//             <td>${res[0].tgl_buat} <input type="hidden" name="no_invoice" value="${res[0].no_invoice}"></td>
//             <td><span class="text-sm">${noTagihan}</span><input type="hidden" value="${total}" id="total_tagihan"></td>
//             <td><input type="date" class="form-control" id="tanggal_penerimaan" name="tanggal_penerimaan" value="${data?.tanggal_penerimaan ? data.tanggal_penerimaan : ''}"></td>
//             <td><select class="form-control" name="rekening_penerima" id="rekening_penerima">
//                 <option value="">Pilih Rekening</option>
//                 <option value="mandiri" ${data?.rekening_penerima=="mandiri" && 'selected' }>BANK MANDIRI</option>
//                 <option value="permata" ${data?.rekening_penerima=="permata" && 'selected' }>BANK PERMATA</option>
//                 <option value="bca" ${data?.rekening_penerima=="bca" && 'selected' }>BANK BCA</option>
//               </select></td>
//               <td><input type="number" class="form-control" name="jumlah" placeholder="Jumlah" id="jumlah" value="${data?.jumlah ? data.jumlah : ''}" oninput="handleChangeJumlah()"></td>
//               <td><input type="text" class="form-control" name="status" id="status" value="${data?.status ? data.status : 'Belum Lunas'}" readonly></td>
//           </tr>
//         `)
//         handleChangeJumlah()
//         n++
//       }else{
//         $("#tbKwitansiInvoice").find('tbody').html(`
//           <tr>
//             <td colspan="6" align="center">Pengiriman Kwitansi/Invoice Belum Ada!</td>
//           </tr>
//         `)
//       }
//       }
//     })
// }

function handleChangeJumlah(){
  let grandTotal = parseInt($("#total_tagihan").val());
  let jumlah = parseInt($("#jumlah").val());
  let status = $("#status");

  if(jumlah > grandTotal){
    status.val("Lebih bayar")
  }else if(jumlah == grandTotal){
    status.val("Lunas")
  }else{
    status.val("Belum Lunas")
  }
}

  function getNoPolisi(id){
    $.ajax({
      type : 'GET',
      url : '/kendaraan/no_polisi/'+id,
      data:{
        _toke: '{{ csrf_token() }}'
      },
      dataType: 'JSON',
      success: function(res){
        $.each(res,function(key,value){
          $('#selectNoPolisi').append('<option value='+value.id+'>'+value.no_polisi+'</option>')
        })
      }
    })
  }
  function getMobilById(id){
    $.ajax({
      type : 'GET',
      url : '/kendaraan/'+id,
      data : {_toke: '{{ csrf_token() }}'},
      dataType: 'JSON',
      success:function(res){
        $.each(res[0],function(key,value){
          $('#'+key).val(value)
        })
      }
    })
  }
  
  function confirmDelete(url, id, nm, tb) {
    Swal.fire({
      title: 'Are you sure ?',
      text: "You want to delete ( " + decodeURI(nm) + " ) !",
      customClass: 'swal-wide',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#32afa9',
      cancelButtonColor: '#d8345f',
      confirmButtonText: 'Yes, sure!',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: url+id,
          data: {
            id: id,
            _token: "{{ csrf_token() }}",
            _method: "delete"
          },
          dataType: "JSON",
          success: function(e) {
            console.log(e);
            switch (e.msg) {
              case "Success Delete":
                eval(tb)
                Toast.fire({
                  icon: 'success',
                  title: 'Delete Data Success',
                });
                break;
            }
          },
          error: function (e) {
            switch (e.responseJSON.msg) {
              case "Failed Delete":
                Toast.fire({
                  icon: 'error',
                  title: 'Input Data Failed',
                });
                break;
              default:
                Toast.fire({
                  icon: 'error',
                  title: e.responseJSON.msg ? e.responseJSON.msg : 'Input Data Failed',
                });
            }
          },
        })
      }
    })
  }

  function editData(url, id, more = null) {
    let fullUrl;
    if(more != null){
      fullUrl = `${url+id}?no_polisi=${more}`
    }else{
      fullUrl = url+id 
    }
    // console.log(fullUrl);
      $.ajax({
        url: fullUrl,
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          console.log(e);
          $("#form_1 #btn-submit").text('UPDATE DATA');
          $("#form_1 #key").val(id)
          $('#form-input').show();
          $("#form_1 #no_polisi_old").val(e.no_polisi)
          $.each(e, function(key, value) {
            $("#form_1 input[name=" + key + "]").val(value)
            $("#form_1 select[name=" + key + "]").val(value)
            $("#form_1 textarea[name=" + key + "]").val(value)
          });
        }
      });
    }

    function destroyValueForm(){
      $(".selectNoApproved").prop("disabled", false)
      $(".selectNoSpk").prop("disabled", false)
      $("#tbEstPerbaikan").find('tbody tr').remove()
      $("#tbEstPart").find('tbody tr').remove()
      // const action = $('#action').val()
      // const tb = $('#table').val()
      $('#form-input').find('form')[0].reset();
      $('#key').val('')
      // $('#action').val(action)
      // $('#table').val(tb)
    }
    
    let no = 0
    function addRowPerbaikan(){
      count=$('#tbEstPerbaikan tbody tr').length + Number(1);
      $("#tbEstPerbaikan").find('tbody')
        .append($('<tr id="row_jasa_'+no+'">')
          .append('<td align="center"><div id="snum'+no+'">'+ count +'</div><input type="hidden" name="id_est_service[]" id="id_est_service" value=""></td>')
          .append('<td><select class="form-control service-list" name="kd_service[]" data-select2-id="'+no+'" style="width:100%" onchange=selectService("row_jasa_'+no+'")></select></td>')
          .append('<td><small id="nm_service"></small></td>')
          .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_service[]" id="qty_service" oninput=hitungJasa("row_jasa_'+no+'")></td>')
          .append('<td><input type="text" class="form-control text-right" oninput=hitungJasa("row_jasa_'+no+'") name="harga_service[]" id="harga_service" readonly></td>')
          .append('<td><input type="text" class="form-control text-right" oninput=hitungJasa("row_jasa_'+no+'") name="subTotalService[]" id="subTotalService" readonly></td>')
          .append('<td><input type="text" class="form-control text-right" oninput=hitungJasa("row_jasa_'+no+'") name="plusPPNService[]" id="plusPPNService" readonly></td>')
          .append('<td><div class="input-group"><input type="text" class="form-control text-right" oninput=hitungJasa("row_jasa_'+no+'") name="disconService[]" id="disconService" value="0" '+(lastURLSegment == "estimasi" ? 'readonly' : ''  )+'><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscService" id="afterDiscService"></td>')
          .append('<td><input type="text" class="form-control text-right" name="jumlahService[]" id="jumlahService" readonly></td>')
          .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPerbaikan"><i class="fa fa-times"></i></button></td>')
        .append('</tr>')
      );no++
      select2Service()
    }
    function select2Service(){
      $("[id^='row_jasa_']").each(function(key, value) {
        $('#'+this.id+' .service-list').select2({
          theme: 'bootstrap4',
          placeholder: 'Pilih Service',
          ajax: {
            url: '{{ route('service-list') }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                  return { 
                    text: item.kd_service,
                    id: item.id
                  }
                })
              };
            },
            cache: true
          }
        })
      })
    }
    function selectService(row){
      const id = $('#'+row+' .service-list').val()
      $.ajax({
        type: 'POST',
        url: '/service/'+id,
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: 'JSON',
        success:function(res){
            $('#'+row+' #nm_service').text(res.nm_service+' ('+res.jenis_service+') '+'('+res.jenis_kendaraan+')')
            $('#'+row+' #harga_service').val(res.harga_service)
            $("[id^='row_jasa_']").each(function() {
              hitungJasa(this.id)
            });
        }
      })
      
    }

    let n = 0
    function addRowPart(){
      count=$('#tbEstPart tbody tr').length + Number(1);
      $("#tbEstPart").find('tbody')
        .append($('<tr id="row_part_'+n+'">')
          .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="id_est_part[]" id="id_est_part" value=""></td>')
          // .append('<td><select class="form-control part-list" name="kd_part[]" data-select2-id="'+n+'" onchange=selectPart("row_part_'+n+'") style="width:100%;"></select></td>')
          .append('<td><input type="text" class="form-control" name="kd_part[]"></td>')
          .append('<td><input type="text" class="form-control" name="nm_part[]"</td>')
          // .append('<td><small id="nm_part"></small></td>')
          .append('<td width="80px"><input type="number" class="form-control text-right" name="qty_part[]" id="qty_part" oninput=hitungPart("row_part_'+n+'")></td>')
          .append('<td><input type="number" class="form-control text-right" name="harga_part[]" id="harga_part" oninput=hitungPart("row_part_'+n+'")></td>')
          .append('<td><input type="text" class="form-control text-right" name="subTotalPart[]" id="subTotalPart" readonly></td>')
          .append('<td><input type="text" class="form-control text-right" name="plusPPNPart[]" id="plusPPNPart" oninput=hitungPart("row_part_'+n+'") readonly></td>')
          .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconPart[]" id="disconPart" value="0" oninput=hitungPart("row_part_'+n+'") '+(lastURLSegment == "estimasi" ? 'readonly' : ''  )+'><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscPart" id="afterDiscPart"></td>')
          .append('<td><input type="text" class="form-control text-right" name="jumlahPart[]" id="jumlahPart" readonly></td>')
          .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPart"><i class="fa fa-times"></i></button></td>')
        .append('</tr>')
      );n++
      // select2Part()
    }

    //  function addRowSalvagePart(){
    //   count=$('#tbSalvagePart tbody tr').length + Number(1);
    //   $("#tbSalvagePart").find('tbody')
    //     .append($('<tr id="row_part_'+n+'">')
    //       .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="salvage_id[]" id="salvage_id" value=""></td>')
    //       .append('<td><select class="form-control part-list" name="kd_part[]" data-select2-id="'+n+'" onchange=selectPart("row_part_'+n+'") style="width:100%;"></select></td>')
    //       .append('<td><span id="nm_part"></span></td>')
    //       .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" oninput=hitungPart("row_part_'+n+'")></td>')
    //       .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPart"><i class="fa fa-times"></i></button></td>')
    //     .append('</tr>')
    //   );n++
    //   select2Part()
    // }

    function select2Part(url = null){
      let path = url == null ? '{{ route('sparepart-list') }}' : url
       $("[id^='row_part_']").each(function(key, value) {
        $('#'+this.id+' .part-list').select2({
          theme: 'bootstrap4',
          placeholder: 'Pilih Part',
          ajax: {
            url: path,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                  return { 
                    text: item.kd_part,
                    id: item.id
                  }
                })
              };
            },
            cache: true
          }
        })
      })
    }

    function selectPart(row){
      const id = $('#'+row+' .part-list').val()
      $.ajax({
        type: 'POST',
        url: '/sparepart/'+id,
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: 'JSON',
        success:function(res){
          // console.log(res);
            $('#'+row+' #nm_part').text(res.nm_part)
            if(lastURLSegment == "purchase-order"){
              // $('#'+row+' #harga_part').val(0)
            }else{
              $('#'+row+' #harga_part').val(res.harga_part)
            }
            $("[id^='row_part_']").each(function() {
              if(lastURLSegment=='gudang'){
                hitungPart2(this.id)
              }else{
                hitungPart(this.id)
              }
            });
        }
      })
      
    }

    function addRowSalvagePart(){
      count=$('#tbSalvagePart tbody tr').length + Number(1);
      $("#tbSalvagePart").find('tbody')
        .append($('<tr id="row_part_'+n+'">')
          .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="salvage_id[]" id="salvage_id" value=""></td>')
          .append('<td><select class="form-control part-list" name="kd_part[]" data-select2-id="'+n+'" onchange=selectSalvage2("row_part_'+n+'") style="width:100%;"></select></td>')
          .append('<td><span id="nm_part"></span></td>')
          .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" oninput=hitungPart("row_part_'+n+'")></td>')
          .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPart"><i class="fa fa-times"></i></button></td>')
        .append('</tr>')
      );n++

      selectSalvage()
    }

    function selectSalvage(){
       $("[id^='row_part_']").each(function(key, value) {
        $('#'+this.id+' .part-list').select2({
          theme: 'bootstrap4',
          placeholder: 'Pilih Part',
          ajax: {
            url: '{{ route('data-salvage-list') }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                  return { 
                    text: item.kd_part,
                    id: item.id
                  }
                })
              };
            },
            cache: true
          }
        })
      })
    }

    function selectSalvage2(row){
      const id = $('#'+row+' .part-list').val()
      $.ajax({
        type: 'POST',
        url: '/data-salvage/'+id,
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: 'JSON',
        success:function(res){
            $('#'+row+' #nm_part').text(res.nm_part)
            $('#'+row+' #harga_part').val(res.harga_part)
            $("[id^='row_part_']").each(function() {
              hitungPart(this.id)
            });
        }
      })
      
    }
    
    $("#tbEstPerbaikan").on('click','#deleteRowPerbaikan',function(){
        const id = $(this).parent().parent().find('#id_est_service').val()
        const url = '/service-estimasi/'
        $(this).parent().parent().remove();
        if(id){
          $.ajax({
            type: "POST",
            url: url+id,
            data: {
              id: id,
              _token: "{{ csrf_token() }}",
              _method: "delete"
            },
            dataType: "JSON",
            success: function(e) {
              switch (e.msg) {
                case "Success Delete":
                  Toast.fire({
                    icon: 'success',
                    title: 'Delete Data Success',
                  });
                  break;
              }
            },
            error: function (e) {
              switch (e.responseJSON.msg) {
                case "Failed Delete":
                  Toast.fire({
                    icon: 'error',
                    title: 'Input Data Failed',
                  });
                  break;
              }
            },
          })
        }
        hitungJasa()
        check('tbEstPerbaikan')
    });

    $("#tbEstPart").on('click','#deleteRowPart',function(){
        const id = $(this).parent().parent().find('#id_est_part').val()
        const url = '/part-estimasi/'
        $(this).parent().parent().remove();
        if(id){
          $.ajax({
            type: "POST",
            url: url+id,
            data: {
              id: id,
              _token: "{{ csrf_token() }}",
              _method: "delete"
            },
            dataType: "JSON",
            success: function(e) {
              switch (e.msg) {
                case "Success Delete":
                  Toast.fire({
                    icon: 'success',
                    title: 'Delete Data Success',
                  });
                  break;
              }
            },
            error: function (e) {
              switch (e.responseJSON.msg) {
                case "Failed Delete":
                  Toast.fire({
                    icon: 'error',
                    title: 'Input Data Failed',
                  });
                  break;
              }
            },
          })
        }
        hitungPart()
        check('tbEstPart')
    });

    $("#tbSalvagePart").on('click','#deleteRowPart',function(){
        const id = $(this).parent().parent().find('#salvage_id').val()
        const url = '/salvage/'
        $(this).parent().parent().remove();
        if(id){
          $.ajax({
            type: "POST",
            url: url+id,
            data: {
              id: id,
              _token: "{{ csrf_token() }}",
              _method: "delete"
            },
            dataType: "JSON",
            success: function(e) {
              switch (e.msg) {
                case "Success Delete":
                  Toast.fire({
                    icon: 'success',
                    title: 'Delete Data Success',
                  });
                  break;
              }
            },
            error: function (e) {
              switch (e.responseJSON.msg) {
                case "Failed Delete":
                  Toast.fire({
                    icon: 'error',
                    title: 'Input Data Failed',
                  });
                  break;
              }
            },
          })
        }
        hitungPart()
        check('tbSalvagePart')
    });

    function check(tb){
      obj=$('#'+tb+' tbody tr').find('div');
      $.each( obj, function( key, value ) {
        id=value.id;
        $('#'+id).html(key+1);
      });
	  }

    function hitungPPN(){
      $("[id^='row_jasa_']").each(function() {
        hitungJasa(this.id)
      });
      $("[id^='row_part_']").each(function() {
        hitungPart(this.id)
      });
    }

    function hitungJasa(row){
      const qty_service = $('#'+row+' #qty_service').val()
      const harga = $('#'+row+' #harga_service').val()
      let discon = $('#'+row+' #disconService').val()
      const isPPn = $('#ppn').val()
      let ppn = 0
      const subTotal = (parseInt(qty_service) * parseInt(harga))
      if(isNaN(discon)){
        disc = 0
      }else{
        disc = subTotal * discon / 100
      }
      if(isPPn == '11%'){
        ppn = (subTotal - disc) * 11 / 100
      }
      
      const jumlah = ( subTotal + ppn) - disc
      if(isNaN(jumlah)){
        $('#'+row+' #subTotalService').val(0)
        $('#'+row+' #jumlahService').val(0)
        $('#'+row+' #plusPPNService').val(0)
        $('#'+row+' #afterDiscService').val(0)
      }else{
        $('#'+row+' #subTotalService').val(subTotal)
        $('#'+row+' #jumlahService').val(jumlah)
        $('#'+row+' #plusPPNService').val(ppn)
        $('#'+row+' #afterDiscService').val(disc)
      }
      totalJasaService()
      totalPPNService()
      totalDiscService()
      grandTotalPPN()
      percentService()
      percentPart()
      totalPPH23()
      totalPPH22()  
      grandTotalService()
      grandTotalServicePart()
      sparepart()
      grandTotal()
    }

    function hitungPart3(row){
      const qty_part = $('#'+row+' #qty_part').val()
      const harga = $('#'+row+' #harga_part').val()
      let discon = $('#'+row+' #disconPart').val()
      let isPPn = $('#'+row+' #ppn').val()
      let ppn = 0
      const subTotal = (parseInt(qty_part) * parseInt(harga))
      if(isNaN(discon)){
        disc = 0
      }else{
        disc = subTotal * discon / 100
      }
      if(isPPn == '11'){
        ppn = (subTotal - disc) * 11 / 100
      }
      
      const jumlah = ( subTotal + ppn) - disc
      if(isNaN(jumlah)){
        $('#'+row+' #subTotalPart').val(0)
        $('#'+row+' #jumlahPart').val(0)
        $('#'+row+' #plusPPNPart').val(0)
        $('#'+row+' #afterDiscPart').val(0)
      }else{
        $('#'+row+' #subTotalPart').val(subTotal)
        $('#'+row+' #jumlahPart').val(jumlah)
        $('#'+row+' #plusPPNPart').val(ppn)
        $('#'+row+' #afterDiscPart').val(disc)
      }
      totalJasaPart()
      totalPPNPart()
      totalDiscPart()
      grandTotalPart3()
      // grandTotalPPN()
      // percentService()
      // percentPart()
      // totalPPH23()
      // totalPPH22()
      // grandTotalServicePart()
      // sparepart()
      // grandTotal()
    }

    function hitungPart(row){
      const qty_part = $('#'+row+' #qty_part').val()
      const harga = $('#'+row+' #harga_part').val()
      let discon = $('#'+row+' #disconPart').val()
      const isPPn = $('#ppn').val()
      let ppn = 0
      const subTotal = (parseInt(qty_part) * parseInt(harga))
      if(isNaN(discon)){
        disc = 0
      }else{
        disc = subTotal * discon / 100
      }
      if(isPPn == '11%'){
        ppn = (subTotal - disc) * 11 / 100
      }
      
      const jumlah = ( subTotal + ppn) - disc
      if(isNaN(jumlah)){
        $('#'+row+' #subTotalPart').val(0)
        $('#'+row+' #jumlahPart').val(0)
        $('#'+row+' #plusPPNPart').val(0)
        $('#'+row+' #afterDiscPart').val(0)
      }else{
        $('#'+row+' #subTotalPart').val(subTotal)
        $('#'+row+' #jumlahPart').val(jumlah)
        $('#'+row+' #plusPPNPart').val(ppn)
        $('#'+row+' #afterDiscPart').val(disc)
      }
      totalJasaPart()
      totalPPNPart()
      totalDiscPart()
      grandTotalPPN()
      percentService()
      percentPart()
      totalPPH23()
      totalPPH22()
      grandTotalPart()
      grandTotalServicePart()
      sparepart()
      grandTotal()
    }

    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split   		= number_string.split(','),
      sisa     		= split[0].length % 3,
      rupiah     		= split[0].substr(0, sisa),
      ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
    
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
    
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function totalJasaService(){
      let totalJasa = 0
      $("[id^='subTotalService']").each(function(key, value) {
         totalJasa += parseInt(this.value)  
      });
      $('#totalJasaService').text(formatRupiah(totalJasa.toString(),'Rp. '))
    }
    function totalDiscService(){
      let totalDisc = 0
      $("[id^='afterDiscService']").each(function(key, value) {
         totalDisc += parseInt(this.value)
      });
      if(isNaN(totalDisc)){
        totalDisc = 0
      }
      $('#totalDiscService').text(formatRupiah(totalDisc.toString(),'Rp. '))
    }
    function totalPPNService(){
      let totalPPN = 0
      $("[id^='plusPPNService']").each(function(key, value) {
         totalPPN += parseInt(this.value)  
      });
      $('#totalPPNService').text(formatRupiah(totalPPN.toString(),'Rp. '))
    }

    function totalJasaPart(){
      let totalJasa = 0
      $("[id^='subTotalPart']").each(function(key, value) {
         totalJasa += parseInt(this.value)  
      });
      $('#totalJasaPart').text(formatRupiah(totalJasa.toString(),'Rp. '))
      $('.totalJasaPart').text(formatRupiah(totalJasa.toString(),'Rp. '))
      $('#totalJasaPartMasuk').text(formatRupiah(totalJasa.toString(),'Rp. '))
      if($('#totalPartRequest')){
        $('#totalPartRequest').text(formatRupiah(totalJasa.toString(),'Rp. '))
      }
    }
    
    function totalDiscPart(){
      let totalDisc = 0
      $("[id^='afterDiscPart']").each(function(key, value) {
        totalDisc += parseInt(this.value)
      });
      if(isNaN(totalDisc)){
        totalDisc = 0
      }
      $('#totalDiscPart').text(formatRupiah(totalDisc.toString(),'Rp. '))
      $('.totalDiscPart').text(formatRupiah(totalDisc.toString(),'Rp. '))
      $('#totalDiscPartMasuk').text(formatRupiah(totalDisc.toString(),'Rp. '))
      if($('#totalDiscRequest')){
        $('#totalDiscRequest').text(formatRupiah(totalDisc.toString(),'Rp. '))
      }
    }

    function totalPPNPart(){
      let totalPPN = 0
      $("[id^='plusPPNPart']").each(function(key, value) {
         totalPPN += parseInt(this.value)  
      });
      $('#totalPPNPart').text(formatRupiah(totalPPN.toString(),'Rp. '))
      if($('#totalPPNRequest')){
        $('#totalPPNRequest').text(formatRupiah(totalPPN.toString(),'Rp. '))
      }
    }

    function totalPPNPart2(){
      let totalPPN = 0
      $("[id^='afterPPNPart']").each(function(key, value) {
         totalPPN += parseInt(this.value)  
      });
      $('.totalPPNPart').text(formatRupiah(totalPPN.toString(),'Rp. '))
      $('#totalPPNPartMasuk').text(formatRupiah(totalPPN.toString(),'Rp. '))
    }

    function grandTotalPPN(){
      const ppnService = $('#totalPPNService').text().replace(/\D/g, '')
      const ppnPart = $('#totalPPNPart').text().replace(/\D/g, '')
      const total = parseInt(ppnService) + parseInt(ppnPart)
      $('#grandTotalPPN').text(formatRupiah(total.toString(),'Rp. '))
    }

    function percentService(){
      const totalHargaService = $('#totalJasaService').text().replace(/\D/g, '')
      const totalDiscService = $('#totalDiscService').text().replace(/\D/g, '')
      const total = (totalHargaService - totalDiscService) * 20 / 100
      $('#percentService').text(formatRupiah(parseInt(total).toString(),'Rp. '))
    }

    function percentPart(){
      const totalHargaService = $('#totalJasaService').text().replace(/\D/g, '')    
      const totalDiscService = $('#totalDiscService').text().replace(/\D/g, '')
      const total = (totalHargaService - totalDiscService) * 80 / 100
      $('#percentPart').text(formatRupiah(parseInt(total).toString(),'Rp. '))
    }

    function totalPPH23(){
      const totalHargaService = $('#totalJasaService').text().replace(/\D/g, '')
      const totalDiscService = $('#totalDiscService').text().replace(/\D/g, '')

      const grandtotalHargaService = (parseInt(totalHargaService) - parseInt(totalDiscService))
      const pph23 = $('#pph23').val()
      let total = 0
      if(pph23 == '80%'){
        total = parseInt((grandtotalHargaService * 80 / 100)) * 2 / 100
      }
      if(pph23 == '100%'){
        total = parseInt(grandtotalHargaService) * 2 / 100
      }
      $('#totalPPH23').text(formatRupiah(parseInt(total).toString(),'Rp. '))
    }

    function totalPPH22(){
      const totalHargaService = $('#totalJasaService').text().replace(/\D/g, '')
      const totalDiscService = $('#totalDiscService').text().replace(/\D/g, '')
      const totalHargaPart = $('#totalJasaPart').text().replace(/\D/g, '')
      const totalDiscPart = $('#totalDiscPart').text().replace(/\D/g, '')

      const material = (parseInt(totalHargaService) - parseInt(totalDiscService)) * 80 / 100
      const part = (parseInt(totalHargaPart) - parseInt(totalDiscPart))
      const totalPPH22 = material + part
      const pph22 = $('#pph22').val()
      let total = 0
      if(pph22 == '1.5%'){
        total =  parseInt(totalPPH22) * 1.5 / 100
      }
      $('#totalPPH22').text(formatRupiah(parseInt(total).toString(),'Rp. '))
    }

    function grandTotalService(){
      const totalHargaService = $('#totalJasaService').text().replace(/\D/g, '')
      const totalPPNService = $('#totalPPNService').text().replace(/\D/g, '')
      const totalDiscService = $('#totalDiscService').text().replace(/\D/g, '')

      const total = (parseInt(totalHargaService) + parseInt(totalPPNService) - parseInt(totalDiscService))
      $('#grandTotalService').text(formatRupiah(total.toString(),'Rp. '))
    }
    
    function grandTotalPart(){
      const totalHargaPart = $('#totalJasaPart').text().replace(/\D/g, '')
      const totalPPNPart = $('#totalPPNPart').text().replace(/\D/g, '')
      const totalDiscPart = $('#totalDiscPart').text().replace(/\D/g, '')

      const total = (parseInt(totalHargaPart) + parseInt(totalPPNPart) - parseInt(totalDiscPart))
      $('#grandTotalPart').text(formatRupiah(total.toString(),'Rp. '))
    }

    function grandTotalPart3(){
      const totalHargaPart = $('#totalPartRequest').text().replace(/\D/g, '')
      const totalPPNPart = $('#totalPPNRequest').text().replace(/\D/g, '')
      const totalDiscPart = $('#totalDiscRequest').text().replace(/\D/g, '')

      const total = (parseInt(totalHargaPart) + parseInt(totalPPNPart) - parseInt(totalDiscPart))
      $('#grandTotalPartRequest').text(formatRupiah(total.toString(),'Rp. '))
    }

    function grandTotalPart2(){
      const totalHargaPart = $('.totalJasaPart').text().replace(/\D/g, '')
      const totalPPNPart = $('.totalPPNPart').text().replace(/\D/g, '')
      const totalDiscPart = $('.totalDiscPart').text().replace(/\D/g, '')

      const total = (parseInt(totalHargaPart) + parseInt(totalPPNPart) - parseInt(totalDiscPart))
      $('.grandTotalPart').text(formatRupiah(total.toString(),'Rp. '))
    }

    function grandTotalPartMasuk(){
      const totalHargaPart = $('#totalJasaPartMasuk').text().replace(/\D/g, '')
      const totalPPNPart = $('#totalPPNPartMasuk').text().replace(/\D/g, '')
      const totalDiscPart = $('#totalDiscPartMasuk').text().replace(/\D/g, '')

      const total = (parseInt(totalHargaPart) + parseInt(totalPPNPart) - parseInt(totalDiscPart))
      $('#grandTotalPartMasuk').text(formatRupiah(total.toString(),'Rp. '))
    }

    function sparepart(){
      const totalHargaPart = $('#totalJasaPart').text().replace(/\D/g, '')
      const totalDiscPart = $('#totalDiscPart').text().replace(/\D/g, '')

      const total = (parseInt(totalHargaPart) - parseInt(totalDiscPart))
      $('#sparepart').text(formatRupiah(total.toString(),'Rp. '))
    }

    function grandTotalServicePart(){
      const totalService = $('#grandTotalService').text().replace(/\D/g, '')
      const totalPart = $('#grandTotalPart').text().replace(/\D/g, '')
      const total = parseInt(totalService) + parseInt(totalPart) 
      $('#grandTotalServicePart').text(formatRupiah(total.toString(),'Rp. '))
    }


    function grandTotal(){
      const sparepart = $('#sparepart').text().replace(/\D/g, '')
      const percentPart = $('#percentPart').text().replace(/\D/g, '')
      const percentService = $('#percentService').text().replace(/\D/g, '')
      const totalPPH23 = $('#totalPPH23').text().replace(/\D/g, '')
      const totalPPH22 = $('#totalPPH22').text().replace(/\D/g, '')
      const grandTotalPPN = $('#grandTotalPPN').text().replace(/\D/g, '')

      const total = parseInt(sparepart) + parseInt(percentPart) + parseInt(percentService) + parseInt(totalPPH23) + parseInt(totalPPH22) + parseInt(grandTotalPPN)
      $('#grandTotal').text(formatRupiah(total.toString(),'Rp. '))
    }
    
    // generateNoOwnrisk()
    function generateNoOwnrisk(){
      $.ajax({
        type: 'GET',
        url: '/kwitansi/generate-no-ownrisk',
        data:{ _token: '{{ csrf_token() }}'},
        dataType: 'JSON',
        success: function(res){
          $('#no_ownrisk').val(res)
        }
      })
    }
    // generateNoDownpayment()
    function generateNoDownpayment(){
      $.ajax({
        type: 'GET',
        url: '/kwitansi/generate-no-downpayment',
        data:{ _token: '{{ csrf_token() }}'},
        dataType: 'JSON',
        success: function(res){
          $('#no_downpayment').val(res)
        }
      })
    }
    // generateNoPelunasan()
    function generateNoPelunasan(){
      $.ajax({
        type: 'GET',
        url: '/kwitansi/generate-no-pelunasan',
        data:{ _token: '{{ csrf_token() }}'},
        dataType: 'JSON',
        success: function(res){
          $('#no_pelunasan').val(res)
        }
      })
    }
    // generateNoTagihan()
    function generateNoTagihan(){
      $.ajax({
        type: 'GET',
        url: '/kwitansi/generate-no-tagihan',
        data:{ _token: '{{ csrf_token() }}'},
        dataType: 'JSON',
        success: function(res){
          $('#no_tagihan').val(res)
        }
      })
    }

    generateNoEstimasi()
    function generateNoEstimasi(){
      $.ajax({
        type: 'POST',
        url: '{{ route('generateNoEstimasi') }}',
        data:{ _token: '{{ csrf_token() }}'},
        dataType: 'JSON',
        success: function(res){
          $('#no_estimasi').val(res)
        }
      })
    }

    generateNoEstimasiApproved()
    function generateNoEstimasiApproved(){
      $.ajax({
        type: 'POST',
        url: '{{ route('generateNoEstimasiApproved') }}',
        data:{ _token: '{{ csrf_token() }}'},
        dataType: 'JSON',
        success: function(res){
          $('#no_estimasi_approved').val(res)
        }
      })
    }
    
    generateNoPermitEstimasiApproval()
    function generateNoPermitEstimasiApproval(){
      $.ajax({
        type: 'POST',
        url: '{{ route('generateNoPermitEstimasiApproval') }}',
        data:{ _token: '{{ csrf_token() }}'},
        dataType: 'JSON',
        success: function(res){
          console.log(res);
          $('#no_permit_estimasi_approval').val(res)
        }
      })
    }


    generateNoPoMaterial()
    function generateNoPoMaterial(){
      $.ajax({
        type: 'POST',
        url: '{{ route('generateNoPoMaterial') }}',
        data:{ _token: '{{ csrf_token() }}'},
        dataType: 'JSON',
        success: function(res){
          $('#no_po_material').val(res)
        }
      })
    }

    function editDataEstimasi(url,id, estimation_id = null){
      $.ajax({
        url: url+id,
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          console.log(e);
          $("#btn-submit").text('UPDATE DATA');
          $("#key").val(estimation_id != null ? estimation_id : id)
          $('#form-input').show();
          $('#form-input_2').show();
          $('#form-input_3').show();
          $('#form-input_4').show();
          $('#form-input_5').show();

          $.each(e,function(key,value){
            $('#'+key).val(value)
          })

          if(lastURLSegment == "estimasi-approved"){
            $('#nama_customer').val(e.name)
            const customer = $("<option selected='selected'></option>").val(e.customer_id).text(e.name)
            $("#selectCustomer").append(customer).trigger('change')
            select2Customer()
          }else{
            const customer = $("<option selected='selected'></option>").val(e.customer_id).text(e.name)
            $(".selectCustomer").append(customer).trigger('change')
            select2Customer()
          }

          const noPolisi = $("<option selected='selected'></option>").val(e.kendaraan_id).text(e.no_polisi)
          $("#selectNoPolisi").append(noPolisi).val(e.kendaraan_id)

          const noEstimasiApv = $("<option selected='selected'></option>").val(e.estimation_id).text(e.no_estimasi)
          $("#selectNoEstimasi").append(noEstimasiApv).trigger('change')

          if(lastURLSegment == "estimasi"){
            editDataEstimasiService(e.no_estimasi)
            editDataEstimasiPart(e.no_estimasi)
          }else{
            editDataEstimasiService(e.no_estimasi_approved)
            editDataEstimasiPart(e.no_estimasi_approved)  
          }
          
          if(lastURLSegment=='permit-discount'){
            $('#status').val('Pending')
          }else if(lastURLSegment=='estimasi-approved'){
            $('#status').val('Approved')
          }
        }
      });
    } 

    select2Customer()
    function select2Customer(){
      $(".selectCustomer").select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Customer',
        ajax: {
          url: '{{ route('customer-list') }}',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                return {
                  text: item.name,
                  id: item.id
                }
              })
            };
          },
          cache: true
        }
      }).on('select2:select', function (evt) {
        const id = $(this).val();
        const form = $(this).closest("form").attr('id')
        $.ajax({
          type: 'POST',
          url: '/customer/'+id,
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'patch'
          },
          dataType: 'JSON',
          success: function(res){
            $.each(res,function(key,value){
              $('#'+form+ ' #'+key).val(value)
            })
            if(lastURLSegment == "customer"){
              $('#'+form+ ' #nm_asuransi').val(res.asuransi)
            }
            if(lastURLSegment=='permit-discount'){
              $('#status').val('Pending')
            }
            getNoPolisi(res.id)
          }
        });
      });
    }

    if((lastURLSegment == "work-order" || lastURLSegment == "progres-pekerjaan") && myRole != "Marketing-SA"){
     $(".selectPelaksana").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih Pelaksana',
      ajax: {
        url: '{{ route('karyawan-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.name,
                id: item.name
              }
            })
          };
        },
        cache: true
      }
    })
    }

    selectSupplier()
    function selectSupplier(){
      $(".selectSupplier").select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Supplier',
        ajax: {
          url: '{{ route('supplier-list') }}',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                return {
                  text: item.name,
                  id: item.id
                }
              })
            };
          },
          cache: true
        }
      }).on('select2:select', function (evt) {
        const id = $(this).val();
        const form = $(this).closest("form").attr('id')
        $("#"+form+ " #id_print_ppc").val(id)
        $("#"+form+ " #id_print_pap").val(id)
        $("#"+form+ " #id_print_pp").val(id)
        $("#"+form+ " #id_print_vp").val(id)
        // console.log(form);
        $.ajax({
          type: 'POST',
          url: '/supplier/'+id,
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'patch'
          },
          dataType: 'JSON',
          success: function(res){
            if(lastURLSegment=='gudang' || lastURLSegment == "purchase-order"){
              $("#"+form +" .alamat_supplier").val(res.alamat)
              $("#"+form + " .no_hp_supplier").val(res.phone)
              $("#"+form + " .email_supplier").val(res.email)
            }
          }
        });
      });
    }
  
    function editDataSpk(url,id,form,edit = true){
      $.ajax({
        url: url+id,
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          console.log(e);
          $("#btn-submit").text('UPDATE DATA');
          $('#'+form+ " #key").val(id)
          $('#'+form).show();
          $.each(e,function(key,value){
            $('#'+form+ ' #'+key).val(value)
            $('#'+form+ " input[name=" + key + "]").val(value)
          })
          const noSpk = $("<option selected='selected'></option>").val(e.estimation_approved_id).text(e.no_spk)
          $(".selectNoSpk").append(noSpk).trigger('change').prop("disabled", true);
          const noEstimasiApv = $("<option selected='selected'></option>").val(e.estimation_approved_id).text(e.no_estimasi_approved)
          $(".selectNoApproved").append(noEstimasiApv).trigger('change').prop("disabled", true);
          $("#selectNoApproved").append(noEstimasiApv).trigger('change')
          const mekanik_bongkar = $("<option selected='selected'></option>").val(e.mekanik_bongkar).text(e.mekanik_bongkar)
          $("#mekanik_bongkar").append(mekanik_bongkar).trigger('change')
          const mekanik_cat = $("<option selected='selected'></option>").val(e.mekanik_cat).text(e.mekanik_cat)
          $("#mekanik_cat").append(mekanik_cat).trigger('change')
          const mekanik_ketok = $("<option selected='selected'></option>").val(e.mekanik_ketok).text(e.mekanik_ketok)
          $("#mekanik_ketok").append(mekanik_ketok).trigger('change')
          const mekanik_poles = $("<option selected='selected'></option>").val(e.mekanik_poles).text(e.mekanik_poles)
          $("#mekanik_poles").append(mekanik_poles).trigger('change')
          const mekanik_pasang = $("<option selected='selected'></option>").val(e.mekanik_pasang).text(e.mekanik_pasang)
          $("#mekanik_pasang").append(mekanik_pasang).trigger('change')
          if(lastURLSegment == "purchase-order"){
            getDataSpkService(e.no_estimasi_approved)
            getDataPoPart(e.no_estimasi_approved) 
          }else if(lastURLSegment == "salvage"){
             getDataSalvagePart2(e.no_estimasi_approved, 'salvage/part') 
          }else{
            getDataSpkService(e.no_estimasi_approved)
            getDataSpkPart(e.no_estimasi_approved) 
            if(lastURLSegment == "progres-pekerjaan"){
              getDataPelaksana(e)
            }
          } 
        }
      });
    }

    function getDataPelaksana(res){
    $("#tanggal-selesai-pelaksana").html(`
    <div class="form-group">
      <h5>Checklist Final Check</h5>
  
      <div class="form-group row">
        <label class="col-sm-4">Ketok Selesai:</label>
        <div class="col-sm-8">
          <input type="date" class="form-control" id="selesai_ketok" name="selesai_ketok" value="${res.selesai_ketok || ''}" ${res.selesai_ketok != null && 'readonly'}>
          <span id="selesai_ketok-error" class="error invalid-feedback"></span>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4">Cat Selesai:</label>
        <div class="col-sm-8">
          <input type="date" class="form-control" id="selesai_cat" name="selesai_cat" value="${res.selesai_cat || ''}" ${res.selesai_cat != null && 'readonly'}>
          <span id="selesai_cat-error" class="error invalid-feedback"></span>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4">Poles Selesai:</label>
        <div class="col-sm-8">
          <input type="date" class="form-control" id="selesai_poles" name="selesai_poles" value="${res.selesai_poles || ''}" ${res.selesai_poles != null && 'readonly'}>
          <span id="selesai_poles-error" class="error invalid-feedback"></span>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4">Sparepart
          Lengkap:</label>
        <div class="col-sm-8">
          <input type="date" class="form-control" id="selesai_part" name="selesai_part" value="${res.selesai_part || ''}" ${res.selesai_part != null && 'readonly'}>
          <span id="selesai_part-error" class="error invalid-feedback"></span>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4">Selesai Tanggal:</label>
        <div class="col-sm-8">
          <input type="date" class="form-control" id="selesai_total" name="selesai_total" value="${res.selesai_total || ''}"
            ${res.selesai_total !=null && 'readonly' }>
          <span id="selesai_total-error" class="error invalid-feedback"></span>
        </div>
      </div>
    </div>
    `)
    }

    function editDataEstimasiService(id){
      $.ajax({
        url: '/service-estimasi',
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          // console.log(e);
          $("#tbEstPerbaikan").find('tbody tr').remove()
          $.each(e,function(key,value){
            count=$('#tbEstPerbaikan tbody tr').length + Number(1);
            $("#tbEstPerbaikan").find('tbody')
              .append($('<tr id="row_jasa_'+no+'">')
                .append('<td align="center"><div id="snum'+no+'">'+ count +'</div><input type="hidden" name="id_est_service[]" id="id_est_service" value="'+value.id+'"></td>')
                .append('<td><select class="form-control service-list" name="kd_service[]" data-select2-id="'+no+'" style="width:100%" onchange=selectService("row_jasa_'+no+'")></select></td>')
                .append('<td><small id="nm_service">"'+value.nm_service+' (' +value.jenis_service+ ') ' + ' (' +value.jenis_kendaraan+ ')"</small></td>')
                .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_service[]" id="qty_service" oninput=hitungJasa("row_jasa_'+no+'") value="'+value.qty+'" '+(lastURLSegment == "estimasi-approved" || lastURLSegment == "pembayaran-piutang" ? 'readonly' : ''  )+'></td>')
                .append('<td><input type="text" class="form-control text-right" oninput=hitungJasa("row_jasa_'+no+'") name="harga_service[]" id="harga_service" value="'+value.price+'" '+(lastURLSegment == "permit-estimasi-approval" ? '' : 'readonly' )+'></td>')
                .append('<td><input type="text" class="form-control text-right" oninput=hitungJasa("row_jasa_'+no+'") name="subTotalService[]" id="subTotalService" readonly></td>')
                .append('<td><input type="text" class="form-control text-right" oninput=hitungJasa("row_jasa_'+no+'") name="plusPPNService[]" id="plusPPNService" readonly></td>')
                .append('<td><div class="input-group"><input type="text" class="form-control text-right" oninput=hitungJasa("row_jasa_'+no+'") name="disconService[]" id="disconService" value="'+value.disc+'" '+(lastURLSegment == "estimasi" || lastURLSegment == "estimasi-approved" || lastURLSegment == "pembayaran-piutang" ? 'readonly' : ''  )+'><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscService" id="afterDiscService"></td>')
                .append('<td><input type="text" class="form-control text-right" name="jumlahService[]" id="jumlahService" readonly></td>')
                .append(lastURLSegment == "estimasi-approved" || lastURLSegment == "pembayaran-piutang" ? '<td>#</td>' : '<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPerbaikan"><i class="fa fa-times"></i></button></td>')
              .append('</tr>')
            ); 
            const service = $("<option selected='selected'></option>").val(value.service_id).text(value.kd_service)
            
            hitungJasa('row_jasa_'+no)
            if(lastURLSegment != 'estimasi-approved' && lastURLSegment != "pembayaran-piutang"){
            $('#row_jasa_'+no+' .service-list').append(service)
              select2Service()
            }else{
             $('#row_jasa_'+no+' .service-list').append(service).prop("disabled", true)
            }
            no++;
          })
        }
      });
    }

    function editDataEstimasiPart(id){
      $.ajax({
        url: '/part-estimasi',
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          console.log(e);
          $("#tbEstPart").find('tbody tr').remove()
          $.each(e,function(key,value){
            count=$('#tbEstPart tbody tr').length + Number(1);
            $("#tbEstPart").find('tbody')
              .append($('<tr id="row_part_'+n+'">')
                .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="id_est_part[]" id="id_est_part" value="'+value.id+'"></td>')
                // .append('<td><select class="form-control part-list" name="kd_part[]" data-select2-id="'+n+'" onchange=selectPart("row_part_'+n+'") style="width:100%;"></select></td>')
                // .append('<td><small id="nm_part">"'+value.nm_part+'"</small></td>')
                .append('<td><input type="hidden" name="part_id[]" value="'+value.part_id+'"><input type="text" class="form-control" name="kd_part[]" value="'+value.kd_part+'" '+(lastURLSegment == "permit-estimasi-approval" || lastURLSegment == "estimasi-approved" || lastURLSegment == "pembayaran-piutang" ? 'readonly' : ''  )+'></td>')
                .append('<td><input type="text" class="form-control" name="nm_part[]" value="'+value.nm_part+'" '+(lastURLSegment == "permit-estimasi-approval" || lastURLSegment == "estimasi-approved" || lastURLSegment == "pembayaran-piutang" ? 'readonly' : ''  )+'> </td>')
                .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" oninput=hitungPart("row_part_'+n+'") value="'+value.qty+'" '+(lastURLSegment == "estimasi-approved" || lastURLSegment == "pembayaran-piutang" ? 'readonly' : ''  )+'></td>')
                .append('<td><input type="text" class="form-control text-right" name="harga_part[]" id="harga_part" oninput=hitungPart("row_part_'+n+'") value="'+value.price+'" '+(lastURLSegment == "permit-estimasi-approval" || lastURLSegment == "estimasi" ? '' : 'readonly'  )+'></td>')
                .append('<td><input type="text" class="form-control text-right" name="subTotalPart[]" id="subTotalPart" readonly></td>')
                .append('<td><input type="text" class="form-control text-right" name="plusPPNPart[]" id="plusPPNPart" oninput=hitungPart("row_part_'+n+'") readonly></td>')
                .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconPart[]" id="disconPart" value="'+value.disc+'" oninput=hitungPart("row_part_'+n+'") '+(lastURLSegment == "estimasi" || lastURLSegment == "estimasi-approved" || lastURLSegment == "pembayaran-piutang" ? 'readonly' : ''  )+'><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscPart" id="afterDiscPart"></td>')
                .append('<td><input type="text" class="form-control text-right" name="jumlahPart[]" id="jumlahPart" readonly></td>')
                .append(lastURLSegment == "estimasi-approved" || lastURLSegment == "pembayaran-piutang" ? '<td>#</td>' : '<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPart"><i class="fa fa-times"></i></button></td>')
              .append('</tr>')
            ); 
            const part = $("<option selected='selected'></option>").val(value.part_id).text(value.kd_part)
            $('#row_part_'+n+' .part-list').append(part)
            hitungPart('row_part_'+n)
            // select2Part()
            n++;
          })
        }
      })
    }

    function getDataSpkPart(id, number = null, edit = false){
      let isEdit
      if(edit){
        isEdit = false
      }else{
        isEdit = lastURLSegment == "progres-pekerjaan" ? false : true 
      }
      
      $.ajax({
        url: '/wo-part/spk',
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          let i = 0;
          $(`${number == null ? '#tbSpkPart' : '#tbSpkPart_' + number}`).find('tbody tr').remove()
          $.each(e,function(key,value){
            count=$('#tbSpkPart tbody tr').length + Number(1);
            $(`${number == null ? '#tbSpkPart' : '#tbSpkPart_' + number}`).find('tbody')
              .append($('<tr id="row_part_'+n+'">')
                .append('<td align="center"><div id="pnum'+n+'">'+ Number(key + 1) +'<input type="hidden" name="id_wo_part[]" id="id_wo_part" value="'+value.id+'"></div><input type="hidden" name="kd_part['+ i +']" id="kd_part" value="'+value.part_id+'"></td>')
                .append('<td>'+value.kd_part+'</td>')
                .append('<td>'+value.nm_part+'</td>')
                .append('<td><input type="checkbox" class="form-control" name="ganti['+ i +']" id="ganti" value="1" '+(value.ganti ? "checked":"")+' onclick="return '+isEdit+'"></td>')
                .append('<td><input type="checkbox" class="form-control" name="repair['+ i +']" id="repair" value="1" '+(value.repair ? "checked":"")+' onclick="return '+isEdit+'"></td>')
                .append('<td><input type="checkbox" class="form-control" name="rek['+ i +']" id="rek" value="1" '+(value.rek ? "checked":"")+' onclick="return '+isEdit+'"></td>')
              .append('</tr>')
            ); 
            i++
            n++;
          })
        }
      });
    }

    function getDataPoPart(id){
      $.ajax({
        url: '/wo-part',
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          $("#tbSpkPart").find('tbody tr').remove()
          $.each(e,function(key,value){
            count=$('#tbSpkPart tbody tr').length + Number(1);
            $("#tbSpkPart").find('tbody')
              .append($('<tr id="row_part_'+n+'">')
                .append('<td align="center"><div id="pnum'+n+'">'+ count +'<input type="hidden" name="id_wo_part[]" id="id_wo_part" value="'+value.id+'"></div><input type="hidden" name="part_id[]" id="part_id" value="'+value.part_id+'"></td>')
                // .append('<td>'+value.kd_part+'</td>')
                .append('<td>'+value.nm_part+'</td>')
                .append('<td><select class="form-control" name="jenis_pembelian[]" id="jenis_pembelian"><option>Jenis Pembelian</option><option value="Cash">Cash</option><option value="Hutang">Hutang</option><option value="Stock">Stock</option><option value="RK">RK</option></select></td>')
                .append('<td><select class="form-control selectSupplier" data-select2-id="'+n+'" name="supplier_id[]" width="100%"></select></td>')
                .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" oninput=hitungPart("row_part_'+n+'") value="'+value.qty+'" readonly></td>')
                .append('<td><input type="text" class="form-control text-right" name="harga_part[]" id="harga_part" oninput=hitungPart("row_part_'+n+'") value="'+value.price+'" readonly><input type="hidden" class="form-control text-right" name="subTotalPart[]" id="subTotalPart" readonly></td>')
                .append('<td><input type="text" class="form-control text-right" name="plusPPNPart[]" id="plusPPNPart" oninput=hitungPart("row_part_'+n+'")></td>')
                .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconPart[]" id="disconPart" value="'+value.disc+'" oninput=hitungPart("row_part_'+n+'") readonly><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscPart" id="afterDiscPart"></td>')
                .append('<td><input type="text" class="form-control text-right" name="jumlahPart[]" id="jumlahPart" readonly></td>')
              .append('</tr>')
            ); 
            hitungPart('row_part_'+n)
            selectSupplier()
            n++;
          })
        }
      });
    }

    function getDataIncomingPart(id){
      $.ajax({
        url: '/purchase-order-part',
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          // console.log(e);
          $("#tbPartMasuk").find('tbody tr').remove()
          $.each(e,function(key,value){
            count=$('#tbPartMasuk tbody tr').length + Number(1);
            $("#tbPartMasuk").find('tbody')
              .append($('<tr id="row_part_'+n+'">')
                .append('<td align="center"><div id="pnum'+n+'">'+ count +'<input type="hidden" name="id_wo_part[]" id="id_wo_part" value="'+value.id+'"></div><input type="hidden" name="sparepart_id[]" id="sparepart_id" value="'+value.part_id+'"></td>')
                .append('<td>'+value.kd_part+'</td>')
                .append('<td>'+value.nm_part+'</td>')
                 .append('<td>'+value.jenis_pembelian+'</td>')
                .append('<td>'+value.supplier+'</td>')
                .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" oninput=hitungPart("row_part_'+n+'") value="'+value.qty+'" readonly></td>')
                .append('<td><input type="text" class="form-control text-right" name="harga_part[]" id="harga_part" oninput=hitungPart("row_part_'+n+'") value="'+value.harga_part+'" readonly><input type="hidden" class="form-control text-right" name="subTotalPart[]" id="subTotalPart" readonly></td>')
                .append('<td><input type="text" class="form-control text-right" name="plusPPNPart[]" id="plusPPNPart" oninput=hitungPart("row_part_'+n+'") readonly></td>')
                .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconPart[]" id="disconPart" value="'+value.disc+'" oninput=hitungPart("row_part_'+n+'") readonly><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscPart" id="afterDiscPart"></td>')
                .append('<td><input type="text" class="form-control text-right" name="jumlahPart[]" id="jumlahPart" readonly></td>')
                .append('<td><input class="form-control" type="checkbox" value="'+key+'" id="checkPartMasuk" name="checkPartMasuk[]"></td>')
                .append('<td><input class="form-control" type="text" id="no_faktur" name="no_faktur[]"></td>')
              .append('</tr>')
            ); 
            hitungPart('row_part_'+n)
            n++;
          })
        }
      });
    }

    function getDataPartOut(id){
      $.ajax({
        url: '/purchase-order-part',
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          $("#tbPartKeluar").find('tbody tr').remove()
          $.each(e,function(key,value){
            count=$('#tbPartKeluar tbody tr').length + Number(1);
            $("#tbPartKeluar").find('tbody')
              .append($('<tr id="row_part_'+n+'">')
                .append('<td align="center"><div id="pnum'+n+'">'+ count +'<input type="hidden" name="id_wo_part[]" id="id_wo_part" value="'+value.id+'"></div><input type="hidden" name="sparepart_id[]" id="sparepart_id" value="'+value.part_id+'"></td>')
                .append('<td>'+value.kd_part+'</td>')
                .append('<td>'+value.nm_part+'</td>')
                 .append('<td>'+value.jenis_pembelian+'</td>')
                .append('<td>'+value.supplier+'</td>')
                .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" oninput=hitungPart("row_part_'+n+'") value="'+value.qty+'" readonly></td>')
                .append('<td><input type="text" class="form-control text-right" name="harga_part[]" id="harga_part" oninput=hitungPart("row_part_'+n+'") value="'+value.price+'" readonly><input type="hidden" class="form-control text-right" name="subTotalPart[]" id="subTotalPart" readonly></td>')
                .append('<td><input type="text" class="form-control text-right" name="plusPPNPart[]" id="plusPPNPart" oninput=hitungPart("row_part_'+n+'") readonly></td>')
                .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconPart[]" id="disconPart" value="'+value.disc+'" oninput=hitungPart("row_part_'+n+'") readonly><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscPart" id="afterDiscPart"></td>')
                .append('<td><input type="text" class="form-control text-right" name="jumlahPart[]" id="jumlahPart" readonly></td>')
                .append('<td><input class="form-control" type="date" id="tgl_keluar" name="tgl_keluar[]"></td>')
                .append('<td><input class="form-control" type="text" id="penerima" name="penerima[]"></td>')
              .append('</tr>')
            ); 
            hitungPart('row_part_'+n)
            n++;
          })
        }
      });
    }

    function getDataSpkService(id, number = null, edit = false){
      let isEdit
    if(edit){
      isEdit = false
    }else{
     isEdit = lastURLSegment == "progres-pekerjaan" ? false : true 
    }
      $.ajax({
        url: '/wo-service/spk',
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          let i = 0;
          $(number == null ? '#tbSpkPerbaikan' : '#tbSpkPerbaikan_'+number).find('tbody tr').remove()
          $.each(e,function(key,value){
            count=$('#tbSpkPerbaikan tbody tr').length + Number(1);
            $(number == null ? '#tbSpkPerbaikan' : '#tbSpkPerbaikan_'+number).find('tbody')
              .append($('<tr id="row_jasa_'+no+'">')
                .append('<td align="center"><div id="pnum'+no+'">'+ Number(key + 1) +'</div><input type="hidden" name="id_wo_service[]" id="id_wo_service" value="'+value.id+'"><input type="hidden" name="kd_service['+ i + ']" id="kd_service" value="'+value.service_id+'"></td>')
                .append('<td>'+ value.nm_service +'</td>')
                .append('<td><input type="checkbox" class="form-control" name="cat['+ i +']" id="cat" value="1" '+(value.cat ? "checked":"")+' '+(lastURLSegment == "purchase-order"  ? 'disabled' : '' )+' onclick="return '+isEdit+'"></td>')
                .append('<td><input type="checkbox" class="form-control" name="sol['+ i +']" id="sol" value="1" '+(value.sol ? "checked":"")+' '+(lastURLSegment == "purchase-order"  ? 'disabled' : '' )+' onclick="return '+isEdit+'"></td>')
                .append('<td><input type="checkbox" class="form-control" name="epoxy['+ i +']" id="epoxy" value="1" '+(value.epoxy ? "checked":"")+' '+(lastURLSegment == "purchase-order"  ? 'disabled' : '' )+' onclick="return '+isEdit+'"></td>')
                .append('<td><input type="checkbox" class="form-control" name="poles['+ i +']" id="poles" value="1" '+(value.poles ? "checked":"")+' '+(lastURLSegment == "purchase-order"  ? 'disabled' : '' )+' onclick="return '+isEdit+'"></td>')
                .append('<td><input type="checkbox" class="form-control" name="ketok_ringan['+ i +']" id="ketok_ringan" value="1" '+(value.ketok_ringan ? "checked":"")+' '+(lastURLSegment == "purchase-order"  ? 'disabled' : '' )+' onclick="return '+isEdit+'"></td>')
                .append('<td><input type="checkbox" class="form-control" name="ketok_berat['+ i +']" id="ketok_berat" value="1" '+(value.ketok_berat ? "checked":"")+' '+(lastURLSegment == "purchase-order"  ? 'disabled' : '' )+' onclick="return '+isEdit+'"></td>')
                .append('<td><input type="checkbox" class="form-control" name="spesial_repair['+ i +']" id="spesial_repair" value="1" '+(value.spesial_repair ? "checked":"")+' '+(lastURLSegment == "purchase-order"  ? 'disabled' : '' )+' onclick="return '+isEdit+'"></td>')
              .append('</tr>')
            ); 
            no++;
            i++
          })
        }
      })
    }

     function getDataSalvagePart(id){
      $.ajax({
        url: '/salvage/part',
        type: "POST",
        data: {
          id: id,
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          $("#tbSalvagePart").find('tbody tr').remove()
          $.each(e,function(key,value){
            count=$('#tbSalvagePart tbody tr').length + Number(1);
            $("#tbSalvagePart").find('tbody')
             .append($('<tr id="row_part_'+n+'">')
              .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="salvage_id[]" id="salvage_id" value="'+ value.id+'"></td>')
              .append('<td><select class="form-control part-list" name="kd_part[]" data-select2-id="'+n+'" onchange=selectPart("row_part_'+n+'") style="width:100%;"></select></td>')
              .append('<td><span id="nm_part">'+ value.nm_part +'</span></td>')
              .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" value="'+value.qty+'"></td>')
              .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPart"><i class="fa fa-times"></i></button></td>')
            .append('</tr>')
            ); 
            const part = $("<option selected='selected'></option>").val(value.part_id).text(value.kd_part)
            $('#row_part_'+n+' .part-list').append(part)
            select2Part()
            n++;
          })
        }
      });
    }

     function getDataSalvagePart2(id, url = '/salvage/partsalvage'){
      $.ajax({
        url: url,
        type: "POST",
        data: {
          id: id,
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
        console.log({
          type: "part salvage",
          data: e
        });
          $("#tbSalvagePart").find('tbody tr').remove()
          $.each(e,function(key,value){
            count=$('#tbSalvagePart tbody tr').length + Number(1);
            let no_spk = value.no_estimasi ? value.no_estimasi : value.no_spk;
            $("#tbSalvagePart").find('tbody')
             .append($('<tr id="row_part_'+n+'">')
              .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="salvage_id[]" id="salvage_id" value="'+ value.id+'"></td>')
              .append('<td><input type="hidden" name="no_spk" value="'+ no_spk +'"><input type="text" name="kd_part[]" class="form-control" value="'+value.kd_part+'" readonly></td>')
              .append('<td><input type="hidden" name="part_id" value="'+ value.part_id +'"><span id="nm_part">'+ value.nm_part +'</span></td>')
              .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" value="'+value.qty+'"></td>')
              // .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPart"><i class="fa fa-times"></i></button></td>')
              .append('<td>#</td>')
            .append('</tr>')
            ); 
            const part = $("<option selected='selected'></option>").val(value.part_id).text(value.kd_part)
            $('#row_part_'+n+' .part-list').append(part)
            select2Part()
            n++;
          })
        }
      });
    }

    function addRowInvoice(){
      count=$('#tbPengirimanInvoice tbody tr').length + Number(1);
      let i = $('#tbPengirimanInvoice tbody tr').length;
      $("#tbPengirimanInvoice").find('tbody')
        .append($('<tr id="row_kwitansi_'+n+'">')
          .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="id_invoice[]" id="id_invoice" value="'+n+'"></td>')
          .append('<td><input type="hidden" name="kwitansi_id[]" id="kwitansi_id" value=""><select class="form-control kwitansi-list" name="no_kwitansi[]" data-select2-id="'+n+'" style="width:100%" onchange=selectKwitansi("row_kwitansi_'+n+'")></select></td>')
          .append('<td><span id="no_polisi"></td>')
          .append('<td><span id="no_spk"></td>')
          .append('<td><span id="asuransi"></td></td>')
          .append('<td><span id="jumlah"></td>')
          .append('<td><span id="keterangan"></td>')
          .append('<td align="center"><input type="checkbox" class="form-control" style="width: 18px; height:18px; margin-bottom:5px;" value="1" name="kwitansi['+ i +']"><input type="file" name="kwitansi_file[]"></td>')
          .append('<td align="center"><input type="checkbox" class="form-control" style="width: 18px; height:18px; margin-bottom:5px;" value="1" name="faktur_pajak['+ i +']"><input type="file" name="faktur_pajak_file[]"></td>')
          .append('<td align="center"><input type="checkbox" class="form-control" style="width: 18px; height:18px; margin-bottom:5px;" value="1" name="kwitansi_merimen['+ i +']"><input type="file" name="kwitansi_merimen_file[]"></td>')
          .append('<td align="center"><input type="checkbox" class="form-control" style="width: 18px; height:18px; margin-bottom:5px;" value="1" name="kwitansi_cmos['+ i +']"><input type="file" name="kwitansi_cmos_file[]"></td>')
          .append('<td align="center"><input type="checkbox" class="form-control" style="width: 18px; height:18px; margin-bottom:5px;" value="1" name="kwitansi_sistem['+ i +']"><input type="file" name="kwitansi_sistem_file[]"></td>')
          .append('<td align="center"><input type="checkbox" class="form-control" style="width: 18px; height:18px; margin-bottom:5px;" value="1" name="surat_puas['+ i +']"><input type="file" name="surat_puas_file[]"></td>')
          .append('<td align="center"><input type="checkbox" class="form-control" style="width: 18px; height:18px; margin-bottom:5px;" value="1" name="survey_kepuasan['+ i +']"><input type="file" name="survey_kepuasan_file[]"></td>')
          .append('<td align="center"><input type="checkbox" class="form-control" style="width: 18px; height:18px; margin-bottom:5px;" value="1" name="gesek_rangka['+ i +']"><input type="file" name="gesek_rangka_file[]"></td>')
          .append('<td align="center"><input type="checkbox" class="form-control" style="width: 18px; height:18px; margin-bottom:5px;" value="1" name="foto_epoxy['+ i +']"><input type="file" name="foto_epoxy_file[]"></td>')
          .append('<td align="center"><input type="checkbox" class="form-control" style="width: 18px; height:18px; margin-bottom:5px;" value="1" name="foto_finishing['+ i +']"><input type="file" name="foto_finishing_file[]"></td>')
          .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowKwitansi"><i class="fa fa-times"></i></button></td>')
        .append('</tr>')
      );n++; i++;
      select2Kwitansi()
    }


    $("#tbPengirimanInvoice").on('click','#deleteRowKwitansi',function(){
        const id = $(this).parent().parent().find('#id_invoice').val()
        const url = '/pengiriman-invoice/'
        $(this).parent().parent().remove();
        if(id){
          $.ajax({
            type: "POST",
            url: url+id,
            data: {
              id: id,
              _token: "{{ csrf_token() }}",
              _method: "delete"
            },
            dataType: "JSON",
            success: function(e) {
              switch (e.msg) {
                case "Success Delete":
                  Toast.fire({
                    icon: 'success',
                    title: 'Delete Data Success',
                  });
                  break;
              }
            },
            error: function (e) {
              switch (e.responseJSON.msg) {
                case "Failed Delete":
                  Toast.fire({
                    icon: 'error',
                    title: 'Input Data Failed',
                  });
                  break;
              }
            },
          })
        }
        check('tbPengirimanInvoice')
    });


    function editDataInvoice(id){
      $.ajax({
        url: '/pengiriman-invoice',
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          // console.log(e);
          $('#form-input').show()
          $("#btn-submit").text('UPDATE DATA');
          $("#tbPengirimanInvoice").find('tbody tr').remove()
          $("#key").val(id)
          $.each(e,function(key,value){
            count=$('#tbPengirimanInvoice tbody tr').length + Number(1);
            let i = $('#tbPengirimanInvoice tbody tr').length;
            $("#tbPengirimanInvoice").find('tbody')
            .append($('<tr id="row_kwitansi_'+n+'">')
              .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="id_invoice[]" id="id_invoice" value="'+value.id+'"></td>')
              .append('<td><select class="form-control kwitansi-list" name="no_kwitansi[]" data-select2-id="'+n+'" style="width:100%" onchange=selectKwitansi("row_kwitansi_'+n+'")></select></td>')
              .append('<td><span id="no_polisi">'+value.no_polisi+'</span></td>')
              .append('<td><span id="no_spk">'+value.no_spk+'</span></td>')
              .append('<td><span id="asuransi">'+value.asuransi+'</span></td></td>')
              .append('<td><span id="jumlah">'+value.jumlah+'</span></td>')
              .append('<td><span id="keterangan">'+value.keterangan+'</td>')
              .append('<td align="center"><input type="checkbox" class="form-control" value="1" name="kwitansi['+ i +']" '+(value.kwitansi === 1 ? "checked" : '')+'><input style="margin: 18px 0;" type="file" name="kwitansi_file[]"><input type="hidden" name="kwitansi_file_old[]" value="'+value.kwitansi_file+'"></br>'+(value.kwitansi_file != null ? '<form action="/pengiriman-invoice/file/download" method="post">@csrf<input type="hidden" name="file" value="'+value.kwitansi_file+'"><button class="btn btn-sm btn-success">Download File</button></form>' : '')+'</td>')
              .append('<td align="center"><input type="checkbox" class="form-control" value="1" name="faktur_pajak['+ i +']" '+(value.faktur_pajak === 1 ? "checked" : '')+'><input style="margin: 18px 0;" type="file" name="faktur_pajak_file[]"><input type="hidden" name="faktur_pajak_file_old[]" value="'+value.faktur_pajak_file+'"></br>'+(value.faktur_pajak_file != null ? '<form action="/pengiriman-invoice/file/download" method="post">@csrf<input type="hidden" name="file" value="'+value.faktur_pajak_file+'"><button class="btn btn-sm btn-success">Download File</button></form>' : '')+'</td>')
              .append('<td align="center"><input type="checkbox" class="form-control" value="1" name="kwitansi_merimen['+ i +']" '+(value.kwitansi_merimen === 1 ? "checked" : '')+'><input style="margin: 18px 0;" type="file" name="kwitansi_merimen_file[]"><input type="hidden" name="kwitansi_merimen_file_old[]" value="'+value.kwitansi_merimen_file+'"></br>'+(value.kwitansi_merimen_file != null ? '<form action="/pengiriman-invoice/file/download" method="post">@csrf<input type="hidden" name="file" value="'+value.kwitansi_merimen_file+'"><button class="btn btn-sm btn-success">Download File</button></form>' : '')+'</td>')
              .append('<td align="center"><input type="checkbox" class="form-control" value="1" name="kwitansi_cmos['+ i +']" '+(value.kwitansi_cmos === 1 ? "checked" : '')+'><input style="margin: 18px 0;" type="file" name="kwitansi_cmos_file[]"><input type="hidden" name="kwitansi_cmos_file_old[]" value="'+value.kwitansi_cmos_file+'"></br>'+(value.kwitansi_cmos_file != null ? '<form action="/pengiriman-invoice/file/download" method="post">@csrf<input type="hidden" name="file" value="'+value.kwitansi_cmos_file+'"><button class="btn btn-sm btn-success">Download File</button></form>' : '')+'</td>')
              .append('<td align="center"><input type="checkbox" class="form-control" value="1" name="kwitansi_sistem['+ i +']" '+(value.kwitansi_sistem === 1 ? "checked" : '')+'><input style="margin: 18px 0;" type="file" name="kwitansi_sistem_file[]"><input type="hidden" name="kwitansi_sistem_file_old[]" value="'+value.kwitansi_sistem_file+'"></br>'+(value.kwitansi_sistem_file != null ? '<form action="/pengiriman-invoice/file/download" method="post">@csrf<input type="hidden" name="file" value="'+value.kwitansi_sistem_file+'"><button class="btn btn-sm btn-success">Download File</button></form>' : '')+'</td>')
              .append('<td align="center"><input type="checkbox" class="form-control" value="1" name="surat_puas['+ i +']" '+(value.surat_puas === 1 ? "checked" : '')+'><input style="margin: 18px 0;" type="file" name="surat_puas_file[]"><input type="hidden" name="surat_puas_file_old[]" value="'+value.surat_puas_file+'"></br>'+(value.surat_puas_file != null ? '<form action="/pengiriman-invoice/file/download" method="post">@csrf<input type="hidden" name="file" value="'+value.surat_puas_file+'"><button class="btn btn-sm btn-success">Download File</button></form>' : '')+'</td>')
              .append('<td align="center"><input type="checkbox" class="form-control" value="1" name="survey_kepuasan['+ i +']" '+(value.survey_kepuasan === 1 ? "checked" : '')+'><input style="margin: 18px 0;" type="file" name="survey_kepuasan_file[]"><input type="hidden" name="survey_kepuasan_file_old[]" value="'+value.survey_kepuasan_file+'"></br>'+(value.survey_kepuasan_file != null ? '<form action="/pengiriman-invoice/file/download" method="post">@csrf<input type="hidden" name="file" value="'+value.survey_kepuasan_file+'"><button class="btn btn-sm btn-success">Download File</button></form>' : '')+'</td>')
              .append('<td align="center"><input type="checkbox" class="form-control" value="1" name="gesek_rangka['+ i +']" '+(value.gesek_rangka === 1 ? "checked" : '')+'><input style="margin: 18px 0;" type="file" name="gesek_rangka_file[]"><input type="hidden" name="gesek_rangka_file_old[]" value="'+value.gesek_rangka_file+'"></br>'+(value.gesek_rangka_file != null ? '<form action="/pengiriman-invoice/file/download" method="post">@csrf<input type="hidden" name="file" value="'+value.gesek_rangka_file+'"><button class="btn btn-sm btn-success">Download File</button></form>' : '')+'</td>')
              .append('<td align="center"><input type="checkbox" class="form-control" value="1" name="foto_epoxy['+ i +']" '+(value.foto_epoxy === 1 ? "checked" : '')+'><input style="margin: 18px 0;" type="file" name="foto_epoxy_file[]"><input type="hidden" name="foto_epoxy_file_old[]" value="'+value.foto_epoxy_file+'"></br>'+(value.foto_epoxy_file != null ? '<form action="/pengiriman-invoice/file/download" method="post">@csrf<input type="hidden" name="file" value="'+value.foto_epoxy_file+'"><button class="btn btn-sm btn-success">Download File</button></form>' : '')+'</td>')
              .append('<td align="center"><input type="checkbox" class="form-control" value="1" name="foto_finishing['+ i +']" '+(value.foto_finishing === 1 ? "checked" : '')+'><input style="margin: 18px 0;" type="file" name="foto_finishing_file[]"><input type="hidden" name="foto_finishing_file_old[]" value="'+value.foto_finishing_file+'"></br>'+(value.foto_finishing_file != null ? '<form action="/pengiriman-invoice/file/download" method="post">@csrf<input type="hidden" name="file" value="'+value.foto_finishing_file+'"><button class="btn btn-sm btn-success">Download File</button></form>' : '')+'</td>')
              .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPart"><i class="fa fa-times"></i></button></td>')
              .append('</tr>')
            );
            const kwitansi = $("<option selected='selected'></option>").val(value.no_kwitansi).text(value.no_kwitansi)
            $('#row_kwitansi_'+n+' .kwitansi-list').append(kwitansi)
            n++; i++;
            select2Kwitansi()
          })
        }
      })
    }

    function select2Kwitansi(){
       $("[id^='row_kwitansi_']").each(function(key, value) {
        $('#'+this.id+' .kwitansi-list').select2({
          theme: 'bootstrap4',
          placeholder: 'No Kwitansi',
          ajax: {
            url: '{{ route('kwitansi-list') }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                  return { 
                    text: item.no_kwitansi,
                    id: item.no_kwitansi
                  }
                })
              };
            },
            cache: true
          }
        })
      })
    }

    function selectKwitansi(row){
      const id = $('#'+row+' .kwitansi-list').val()
      $.ajax({
        type: 'POST',
        url: '/kwitansi',
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: 'JSON',
        success:function(res){
          console.log(res);
          $.each(res[0],function(key,value){
            $('#'+row+ ' #'+key).text(value)
            if($('#'+row+ ' #'+key)){
              $('#'+row+ ' #'+key).val(value)
            }
          })
          // $('#'+row+ ' #kwitansi_id').text(value.id)
        }, error: function (e) {
          // console.log(e);
        }
      })
    }

    function addRowPoMaterial(){
      count=$('#tbPengajuanMaterial tbody tr').length + Number(1);
      $("#tbPengajuanMaterial").find('tbody')
        .append($('<tr id="row_material_'+n+'">')
          .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value=""></td>')
          .append('<td><select class="form-control material-list" name="material_id[]" data-select2-id="'+n+'" onchange=selectMaterial("row_material_'+n+'") style="width:100%;"></select></td>')
          .append('<td><small id="nm_material"></small></td>')
          .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_material[]" id="qty_material" oninput=hitungMaterial("row_material_'+n+'")></td>')
          .append('<td><input type="text" class="form-control text-right" name="harga_material[]" id="harga_material" oninput=hitungMaterial("row_material_'+n+'")></td>')
          .append('<td><input type="text" class="form-control text-right" name="subTotalMaterial[]" id="subTotalMaterial" readonly></td>')
          // .append('<td><input type="text" class="form-control text-right" name="plusPPNMaterial[]" id="plusPPNMaterial"  value="0" oninput=hitungMaterial("row_material_'+n+'")></td>')
          .append(`
            <td>
              <select class="form-control" name="plusPPNMaterial[]" id="plusPPNMaterial" oninput="hitungMaterial('row_material_${n}')">
                <option value="0">Pilih Jenis PPN</option>
                <option value="0">Non PPN</option>
                <option value="11">PPN 11%</option>
              </select>
              <input type="hidden" name="afterPPNMaterial" id="afterPPNMaterial">
            </td>
          `)
          .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconMaterial[]" id="disconMaterial" value="0" oninput=hitungMaterial("row_material_'+n+'") '+(lastURLSegment == "estimasi" ? 'readonly' : ''  )+'><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscMaterial" id="afterDiscMaterial"></td>')
          .append('<td><input type="text" class="form-control text-right" name="jumlahMaterial[]" id="jumlahMaterial" readonly></td>')
          .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowMaterial"><i class="fa fa-times"></i></button></td>')
        .append('</tr>')
      );n++
      select2Material()
    }

    function select2Material(){
       $("[id^='row_material_']").each(function(key, value) {
        $('#'+this.id+' .material-list').select2({
          theme: 'bootstrap4',
          placeholder: 'Pilih Material',
          ajax: {
            url: '{{ route('materials-list') }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                  return { 
                    text: item.kd_material,
                    id: item.id
                  }
                })
              };
            },
            cache: true
          }
        })
      })
    }

    function addRowPoPart(){
      console.log($('#select_no_po_sparepart').text());
      let no_spk = $('#select_no_po_sparepart').text();
      if(no_spk.split('/')[1] != "FINAL-DFM"){
        alert("Pilih No. PO Terlebih Dahulu.")
        return;
      }
      count=$('#tbPengajuanPart tbody tr').length + Number(1);
      $("#tbPengajuanPart").find('tbody')
        .append($('<tr id="row_part_'+n+'">')
          .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value=""></td>')
          .append('<td><select class="form-control part-list" name="part_id[]" data-select2-id="'+n+'" onchange=selectPart("row_part_'+n+'") style="width:100%;"></select></td>')
          .append('<td><small id="nm_part"></small></td>')
          .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" value="0" oninput=hitungPart2("row_part_'+n+'")></td>')
          .append('<td><input type="text" class="form-control text-right" name="harga_part[]" id="harga_part" oninput=hitungPart2("row_part_'+n+'")></td>')
          .append('<td><input type="text" class="form-control text-right" name="subTotalPart[]" id="subTotalPart" readonly></td>')
          // .append('<td><input type="text" class="form-control text-right" name="plusPPNMaterial[]" id="plusPPNMaterial"  value="0" oninput=hitungMaterial("row_part_'+n+'")></td>')
          .append(`
            <td>
              <select class="form-control" name="plusPPNPart[]" id="plusPPNPart" oninput="hitungPart2('row_part_${n}')">
                <option value="0">Pilih Jenis PPN</option>
                <option value="0">Non PPN</option>
                <option value="11">PPN 11%</option>
              </select>
              <input type="hidden" name="afterPPNPart" id="afterPPNPart">
            </td>
          `)
          .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconPart[]" id="disconPart" value="0" oninput=hitungPart2("row_part_'+n+'")><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscPart" id="afterDiscPart"></td>')
          .append('<td><input type="text" class="form-control text-right" name="jumlahPart[]" id="jumlahPart" readonly></td>')
          .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPart" ><i class="fa fa-times"></i></button></td>')
        .append('</tr>')
      );n++
      select2Part(`sparepart/getpartestimasi?no_estimasi=${no_spk}`)
      // select2Part()
    }

    function hitungPart2(row){
      const qty_part = $('#'+row+' #qty_part').val()
      const harga = $('#'+row+' #harga_part').val()
      let discon = $('#'+row+' #disconPart').val()
      let ppn = $('#'+row+' #plusPPNPart').val()
      const subTotal = (parseInt(qty_part) * parseInt(harga))
      if(isNaN(discon)){
        disc = 0
      }else{
        disc = subTotal * discon / 100
      }
       if(ppn == "0"){
        ppn = 0
      }else{
        ppn = (subTotal - disc) * 11 / 100
      }
      
      const jumlah = (parseInt(subTotal) + parseInt(ppn)) - parseInt(disc)
      if(isNaN(jumlah)){
        $('#'+row+' #subTotalPart').val(0)
        $('#'+row+' #jumlahPart').val(0)
        $('#'+row+' #afterPPNPart').val(0)
        $('#'+row+' #afterDiscPart').val(0)
      }else{
        $('#'+row+' #subTotalPart').val(subTotal)
        $('#'+row+' #jumlahPart').val(jumlah)
        $('#'+row+' #afterPPNPart').val(ppn)
        $('#'+row+' #afterDiscPart').val(disc)
      }

      totalJasaPart()
      totalPPNPart2()
      totalDiscPart()
      grandTotalPart2()
      grandTotalPartMasuk()
      // grandTotalServicePart()
      // sparepart()
      // grandTotal()

    }

    function select2Material(){
       $("[id^='row_material_']").each(function(key, value) {
        $('#'+this.id+' .material-list').select2({
          theme: 'bootstrap4',
          placeholder: 'Pilih Material',
          ajax: {
            url: '{{ route('materials-list') }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                  return { 
                    text: item.kd_material,
                    id: item.id
                  }
                })
              };
            },
            cache: true
          }
        })
      })
    }

    function selectMaterial(row){
      const id = $('#'+row+' .material-list').val()
      $.ajax({
        type: 'POST',
        url: '/material/'+id,
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: 'JSON',
        success:function(res){
            $('#'+row+' #nm_material').text(res.nm_material)
            $('#'+row+' #harga_material').val(res.harga_material)
            $("[id^='row_material_']").each(function() {
              hitungMaterial(this.id)
            });
        }
      })
    }

    function hitungMaterial(row){
      const qty = $('#'+row+' #qty_material').val()
      const harga = $('#'+row+' #harga_material').val()
      let discon = $('#'+row+' #disconMaterial').val()
      let ppn = $('#'+row+' #plusPPNMaterial').val()
      const subTotal = (parseInt(qty) * parseInt(harga))
      if(isNaN(discon)){
        disc = 0
      }else{
        disc = subTotal * discon / 100
      }
      if(ppn == "0"){
        ppn = 0
      }else{
        ppn = (subTotal - disc) * 11 / 100
      }
      // console.log(ppn);
      
      const jumlah = (parseInt(subTotal) + parseInt(ppn)) - parseInt(disc)
      if(isNaN(jumlah)){
        $('#'+row+' #subTotalMaterial').val(0)
        $('#'+row+' #jumlahMaterial').val(0)
        $('#'+row+' #afterPPNMaterial').val(0)
        $('#'+row+' #afterDiscMaterial').val(0)
      }else{
        $('#'+row+' #subTotalMaterial').val(subTotal)
        $('#'+row+' #jumlahMaterial').val(jumlah)
        $('#'+row+' #afterPPNMaterial').val(ppn)
        $('#'+row+' #afterDiscMaterial').val(disc)
      }
      totalDiscMaterial()
      totalMaterial()
    }

    function totalDiscMaterial(){
      let totalDisc = 0
      $("[id^='afterDiscMaterial']").each(function(key, value) {
         totalDisc += parseInt(this.value)
      });
      if(isNaN(totalDisc)){
        totalDisc = 0
      }
      $('#totalDiscMaterial').text(formatRupiah(totalDisc.toString(),'Rp. '))
      $('#totalDiscMaterialMasuk').text(formatRupiah(totalDisc.toString(),'Rp. '))
      $('.totalDiscMaterial').text(formatRupiah(totalDisc.toString(),'Rp. '))
      $('.totalDiscMaterialMasuk').text(formatRupiah(totalDisc.toString(),'Rp. '))
    }

    function resetMaterial(){
      $('.totalMaterial').text(0)
      $('.totalMaterialMasuk').text(0)
      $('.totalPPNMaterial').text(0)
      $('.totalDiscMaterial').text(0)
      $('.totalDiscMaterialMasuk').text(0)
      $('.totalJasaPart').text(0)
      $('.totalPPNPart').text(0)
      $('.totalDiscPart').text(0)
      $('.grandTotalPart').text(0)
      $('#totalJasaPartMasuk').text(0)
      $('#totalPPNPartMasuk').text(0)
      $('#totalDiscPartMasuk').text(0)
      $('#grandTotalPartMasuk').text(0)
      $("#tbPengajuanMaterial").find('tbody tr').remove()
      $("#tbMaterialMasuk").find('tbody tr').remove()
      $("#tbPengajuanMaterial").find('tbody tr').remove()
      $('#form-input').hide();
      $('#form-input_2').hide();
      $('#form-input_3').hide();
      $('#form-input_4').hide();
      $('#form-input_5').hide();
      $('#form-input_6').hide();
      $('#form-input-or').hide();
      $('#form-input-oldCustomer').hide();
      $(":input").removeClass("is-invalid")
      $('.select2').val(null).trigger('change')
    }

    function resetSpk(){
      $('.select2').val(null).trigger('change')
      $(":input").removeClass("is-invalid")
      $('#form-input').hide();
      $('#form-input_2').hide();
      $('#form-input_3').hide();
      $(".selectNoSpk").val("")
      $("#selectNoSpk_2").val("")
    }

    function resetPart(){
      $('#totalJasaPartMasuk').text(0)
      $('#totalDiscPartMasuk').text(0)
      $('#totalPPNPartMasuk').text(0)
      $('#grandTotalPartMasuk').text(0)
      $("#tbPartMasuk").find('tbody tr').remove()
    }

    function totalMaterial(){
      let totalMaterial = 0
      let totalPPN = 0
      let totalDisc = 0
      $("[id^='subTotalMaterial']").each(function(key, value) {
         totalMaterial += parseInt(this.value)  
      });

      $("[id^='afterPPNMaterial']").each(function(key, value) {
         totalPPN += parseInt(this.value)  
      });

      $("[id^='afterDiscMaterial']").each(function(key, value) {
         totalDisc += parseInt(this.value)  
      });
      const total = (parseInt(totalMaterial) + parseInt(totalPPN) - parseInt(totalDisc))
      console.log({totalMaterial, totalPPN, totalDisc});
      $('.totalMaterial').text(formatRupiah(totalMaterial.toString(),'Rp. '))
      $('.totalMaterialMasuk').text(formatRupiah(total.toString(),'Rp. '))
      $('.totalPPNMaterial').text(formatRupiah(totalPPN.toString(),'Rp. '))
      $('#totalMaterial').text(formatRupiah(totalMaterial.toString(),'Rp. '))
      $('#totalMaterialMasuk').text(formatRupiah(total.toString(),'Rp. '))
      $('#totalPPNMaterial').text(formatRupiah(totalPPN.toString(),'Rp. '))

    }

    function editDataPo(url, id) {
      $("#tbPengajuanMaterial").find('tbody tr').remove()
      $.ajax({
        url: url+id,
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          console.log(e);
          $("#form_1 #btn-submit").text('UPDATE DATA');
          $("#form_1 #key").val(id)
          $('#form-input').show();
          $.each(e.po_material, function(key, value) {
            $("#form_1 input[name=" + key + "]").val(value)
            $("#form_1 select[name=" + key + "]").val(value)
            $("#form_1 textarea[name=" + key + "]").val(value)
          });
          $.each(e.po_material,function(key,value){
            $('#'+key).val(value)
          })
          const supplier = $("<option selected='selected'></option>").val(e.po_material.supplier_id).text(e.po_material.supplier)
          $(".selectSupplier").append(supplier).trigger('change')
          $.each(e.list, function(key, value) {
            count=$('#tbPengajuanMaterial tbody tr').length + Number(1);
            $("#tbPengajuanMaterial").find('tbody')
              .append($('<tr id="row_material_'+n+'">')
                .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value="'+value.id+'"></td>')
                .append('<td><select class="form-control material-list" name="material_id[]" data-select2-id="'+n+'" onchange=selectMaterial("row_material_'+n+'") style="width:100%;"></select></td>')
                .append('<td><small id="nm_material">'+value.nm_material+'</small></td>')
                .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_material[]" id="qty_material" value="'+value.qty+'" oninput=hitungMaterial("row_material_'+n+'")></td>')
                .append('<td><input type="text" class="form-control text-right" name="harga_material[]" id="harga_material" value="'+value.harga_material+'" oninput=hitungMaterial("row_material_'+n+'") readonly></td>')
                .append('<td><input type="text" class="form-control text-right" name="subTotalMaterial[]" id="subTotalMaterial" readonly></td>')
                // .append('<td><input type="text" class="form-control text-right" name="plusPPNMaterial[]" id="plusPPNMaterial"  value="'+(value.ppn ? value.ppn : 0)+'" oninput=hitungMaterial("row_material_'+n+'")></td>')
                .append(`
                <td>
                  <select class="form-control" name="plusPPNMaterial[]" id="plusPPNMaterial"
                    oninput="hitungMaterial('row_material_${n}')">
                    <option value="0">Pilih Jenis PPN</option>
                    <option value="0" ${value.ppn == "0" ? 'selected' : ''}>Non PPN</option>
                    <option value="11" ${value.ppn == "11" ? 'selected' : ''}>PPN 11%</option>
                  </select>
                  <input type="hidden" name="afterPPNMaterial" id="afterPPNMaterial">
                </td>
                `)
                .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconMaterial[]" id="disconMaterial" value="'+(value.disc ? value.disc : 0)+'" oninput=hitungMaterial("row_material_'+n+'") '+(lastURLSegment == "estimasi" ? 'readonly' : ''  )+'><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscMaterial" id="afterDiscMaterial"></td>')
                .append('<td><input type="text" class="form-control text-right" name="jumlahMaterial[]" id="jumlahMaterial" readonly></td>')
                .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowMaterial"><i class="fa fa-times"></i></button></td>')
              .append('</tr>')
            );
            const material = $("<option selected='selected'></option>").val(value.material_id).text(value.kd_material)
            $('#row_material_'+n+' .material-list').append(material)
            hitungMaterial('row_material_'+n)
            select2Material()
            n++
          })
        }
      });
    }

    $("#tbPengajuanMaterial").on('click','#deleteRowMaterial',function(){
        const id = $(this).parent().parent().find('#po_id').val()
        const url = '/gudang/po-material/'
        $(this).parent().parent().remove();
        totalDiscMaterial()
        totalMaterial()
        if(id){
          $.ajax({
            type: "POST",
            url: url+id,
            data: {
              id: id,
              _token: "{{ csrf_token() }}",
              _method: "delete"
            },
            dataType: "JSON",
            success: function(e) {
              switch (e.msg) {
                case "Success Delete":
                  Toast.fire({
                    icon: 'success',
                    title: 'Delete Data Success',
                  });
                  break;
              }
            },
            error: function (e) {
              switch (e.responseJSON.msg) {
                case "Failed Delete":
                  Toast.fire({
                    icon: 'error',
                    title: 'Input Data Failed',
                  });
                  break;
              }
            },
          })
        }
        check('tbPengajuanMaterial')
    });

    $("#tbMaterialKeluarProgres").on('click','#deleteRowMaterialProgres',function(){
        const id = $(this).parent().parent().find('#po_id').val()
        const url = '/gudang/material-out/'
        // console.log({id, url});
        // return;
        $(this).parent().parent().remove();
        totalDiscMaterial()
        totalMaterial()
        if(id){
          $.ajax({
            type: "POST",
            url: url+id,
            data: {
              id: id,
              _token: "{{ csrf_token() }}",
              _method: "delete"
            },
            dataType: "JSON",
            success: function(e) {
              switch (e.msg) {
                case "Success Delete":
                  Toast.fire({
                    icon: 'success',
                    title: 'Delete Data Success',
                  });
                  break;
              }
            },
            error: function (e) {
              switch (e.responseJSON.msg) {
                case "Failed Delete":
                  Toast.fire({
                    icon: 'error',
                    title: 'Delete Data Failed',
                  });
                  break;
              }
            },
          })
        }
        check('tbPengajuanMaterial')
    });

    $("#tbPengajuanPart").on('click','#deleteRowPart',function(){
        const id = $(this).parent().parent().find('#po_id').val()
        const url = '/gudang/po-part/'
        $(this).parent().parent().remove();
        totalJasaPart()
        totalPPNPart2()
        totalDiscPart()
        grandTotalPart2()
        if(id){
          $.ajax({
            type: "POST",
            url: url+id,
            data: {
              id: id,
              _token: "{{ csrf_token() }}",
              _method: "delete"
            },
            dataType: "JSON",
            success: function(e) {
              switch (e.msg) {
                case "Success Delete":
                  Toast.fire({
                    icon: 'success',
                    title: 'Delete Data Success',
                  });
                  break;
              }
            },
            error: function (e) {
              switch (e.responseJSON.msg) {
                case "Failed Delete":
                  Toast.fire({
                    icon: 'error',
                    title: 'Input Data Failed',
                  });
                  break;
              }
            },
          })
        }
        check('tbPengajuanPart')
    });

    $("#select_no_po_part").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No PO',
      ajax: {
        url: '{{ route('po-part-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_po,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
      $("#tbPartMasuk").find('tbody tr').remove()
        const id = $('.selectNoPoPart').val();
        $.ajax({
          type: 'POST',
          url: '/gudang/po-part/'+id,
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'patch'
          },
          dataType: 'JSON',
          success: function(e){
            console.log(e);
            $("#form_5 #btn-submit").text('UPDATE DATA');
            $("#form_5 #key").val(id)
            $.each(e.po_part, function(key, value) {
              $("#form_5 input[name=" + key + "]").val(value)
              $("#form_5 select[name=" + key + "]").val(value)
              $("#form_5 textarea[name=" + key + "]").val(value)
            });
            const supplier = $("<option selected='selected'></option>").val(e.po_part.part_id).text(e.po_part.name)
            $(".selectSupplier").append(supplier).trigger('change')
            $.each(e.list, function(key, value) {
              count=$('#tbPartMasuk tbody tr').length + Number(1);
              $("#tbPartMasuk").find('tbody')
                .append($('<tr id="row_part_masuk_'+key+'">')
                  .append('<td align="center"><div id="pnum'+key+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value="'+value.id+'"><input type="hidden" value="'+value.no_faktur+'" name="no_faktur_old[]"></td>')
                  .append('<td><input type="hidden" name="part_id[]" value="'+value.part_id+'">'+value.kd_part+'</td>')
                  .append('<td><small id="nm_part">'+value.nm_part+'</small></td>')
                  .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" value="'+value.qty+'" oninput=hitungPart2("row_part_masuk_'+key+'") readonly></td>')
                  .append('<td><input type="text" class="form-control text-right" name="harga_part[]" id="harga_part" value="'+value.harga_part+'" oninput=hitungPart2("row_part_masuk_'+key+'") readonly></td>')
                  .append('<td><input type="text" class="form-control text-right" name="subTotalPart[]" id="subTotalPart" readonly></td>')
                  .append('<td><input type="text" class="form-control text-right" name="plusPPNPart[]" id="plusPPNPart"  value="'+(value.ppn ? value.ppn : 0)+'" oninput=hitungPart2("row_part_masuk_'+key+'") readonly><input type="hidden" name="afterPPNPart" id="afterPPNPart"></td>')
                  .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconPart[]" id="disconPart" value="'+(value.disc ? value.disc : 0)+'" oninput=hitungPart2("row_part_masuk_'+key+'") readonly><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscPart" id="afterDiscPart"></td>')
                  .append('<td><input type="text" class="form-control text-right" name="jumlahPart[]" id="jumlahPart" readonly></td>')
                  .append(`<td><input class="form-control" type="checkbox" value="${key}" id="checkPartMasuk" name="checkPartMasuk[]" ${value.no_faktur && 'checked onclick="return false"'}></td>`)
                  .append(`<td><input class="form-control" type="text" id="no_faktur" name="no_faktur[]" value="${value.no_faktur ? value.no_faktur : ''}" ${value.no_faktur && 'readonly'}></td>`)
                .append('</tr>')
              );
              hitungPart2('row_part_masuk_'+key)
              // select2Material()
              n++
            })
            setTimeout(() => {
              grandTotalPart2()
            }, 2000)
          }
        });
    });

    $(".selectNoPoMaterial").select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih No PO',
      ajax: {
        url: '{{ route('po-material-list') }}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.no_po,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    }).on('select2:select', function (evt) {
      $("#tbMaterialMasuk").find('tbody tr').remove()
        const id = $('.selectNoPoMaterial').val();
        $.ajax({
          type: 'POST',
          url: '/gudang/po-material/'+id,
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'patch'
          },
          dataType: 'JSON',
          success: function(e){
            // console.log(e);
            $("#form_2 #btn-submit").text('UPDATE DATA');
            $("#form_2 #key").val(id)
            $.each(e.po_material, function(key, value) {
              $("#form_2 input[name=" + key + "]").val(value)
              $("#form_2 select[name=" + key + "]").val(value)
              $("#form_2 textarea[name=" + key + "]").val(value)
            });
            const supplier = $("<option selected='selected'></option>").val(e.po_material.supplier_id).text(e.po_material.supplier)
            $(".selectSupplier").append(supplier).trigger('change')
            $.each(e.list, function(key, value) {
              count=$('#tbMaterialMasuk tbody tr').length + Number(1);
              $("#tbMaterialMasuk").find('tbody')
                .append($('<tr id="row_material_masuk_'+key+'">')
                  .append('<td align="center"><div id="pnum'+key+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value="'+value.id+'"><input type="hidden" value="'+value.no_faktur+'" name="no_faktur_old[]"></td>')
                  .append('<td><input type="hidden" name="material_id[]" value="'+value.material_id+'">'+value.kd_material+'</td>')
                  .append('<td><small id="nm_material">'+value.nm_material+'</small></td>')
                  .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_material[]" id="qty_material" value="'+value.qty+'" oninput=hitungMaterial("row_material_masuk_'+key+'") readonly></td>')
                  .append('<td><input type="text" class="form-control text-right" name="harga_material[]" id="harga_material" value="'+value.harga_material+'" oninput=hitungMaterial("row_material_masuk_'+key+'") readonly></td>')
                  .append('<td><input type="text" class="form-control text-right" name="subTotalMaterial[]" id="subTotalMaterial" readonly></td>')
                  .append('<td><input type="text" class="form-control text-right" name="plusPPNMaterial[]" id="plusPPNMaterial"  value="'+(value.ppn ? value.ppn : 0)+'" oninput=hitungMaterial("row_material_masuk_'+key+'") readonly><input type="hidden" name="afterPPNMaterial" id="afterPPNMaterial"></td>')
                  .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconMaterial[]" id="disconMaterial" value="'+(value.disc ? value.disc : 0)+'" oninput=hitungMaterial("row_material_masuk_'+key+'") readonly><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscMaterial" id="afterDiscMaterial"></td>')
                  .append('<td><input type="text" class="form-control text-right" name="jumlahMaterial[]" id="jumlahMaterial" readonly></td>')
                  .append(`<td><input class="form-control" type="checkbox" value="${key}" id="checkMaterialMasuk" name="checkMaterialMasuk[]" ${value.no_faktur && 'checked onclick="return false"'}></td>`)
                  .append(`<td><input class="form-control" type="text" id="no_faktur" name="no_faktur[]" value="${value.no_faktur ? value.no_faktur : ''}" ${value.no_faktur && 'readonly'}></td>`)
                .append('</tr>')
              );
              hitungMaterial('row_material_masuk_'+key)
              select2Material()
              n++
            })
          }
        });
    });


    function addRowMaterialKeluar(){
      count=$('#tbMaterialKeluar tbody tr').length + Number(1);
      $("#tbMaterialKeluar").find('tbody')
        .append($('<tr id="row_material_'+n+'">')
          .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value=""></td>')
          .append('<td><select class="form-control material-list" name="material_id[]" data-select2-id="'+n+'" onchange=selectMaterial("row_material_'+n+'") style="width:100%;"></select></td>')
          .append('<td><span id="nm_material"></span></td>')
          .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_material[]" id="qty_material"></td>')
          .append('<td><input type="text" class="form-control" name="penerima[]" id="penerima"></td>')
          .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowMaterial"><i class="fa fa-times"></i></button></td>')
        .append('</tr>')
      );n++
      select2Material()
    }

    function addRowMaterialKeluarProgres(){
      count=$('#tbMaterialKeluarProgres tbody tr').length + Number(1);
      $("#tbMaterialKeluarProgres").find('tbody')
        .append($('<tr id="row_material_'+n+'">')
          .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value=""></td>')
          .append('<td><select class="form-control material-list" name="material_id[]" data-select2-id="'+n+'" onchange=selectMaterial("row_material_'+n+'") style="width:100%;"></select></td>')
          .append('<td><span id="nm_material"></span></td>')
          .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_material[]" id="qty_material"></td>')
          .append('<td><input type="date" class="form-control" name="tgl_keluar[]" id="tgl_keluar" value="{{ date('Y-m-d')}}" readonly></td>')
          .append('<td><input type="text" class="form-control" name="penerima[]" id="penerima"></td>')
          .append(`<td><input type="checkbox" class="form-control" onclick="return false"></td>`)
          .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowMaterialProgres"><i class="fa fa-times"></i></button></td>')
        .append('</tr>')
      );n++
      select2Material()
    }

    function addRowPartKeluar(){
      count=$('#tbPartKeluar tbody tr').length + Number(1);
      $("#tbPartKeluar").find('tbody')
        .append($('<tr id="row_part_'+n+'">')
          .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value=""></td>')
          .append('<td><select class="form-control part-list" name="part_id[]" data-select2-id="'+n+'" onchange=selectPart("row_part_'+n+'") style="width:100%;"></select></td>')
          .append('<td><span id="nm_part"></span></td>')
          .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_material"></td>')
          .append('<td><input type="text" class="form-control" name="penerima[]" id="penerima"></td>')
          .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowMaterial"><i class="fa fa-times"></i></button></td>')
        .append('</tr>')
      );n++
      select2Part()
    }

    $("#tbMaterialKeluar").on('click','#deleteRowMaterial',function(){
        const id = $(this).parent().parent().find('#po_id').val()
        const url = '/gudang/material-out/'
        $(this).parent().parent().remove();
        if(id){
          $.ajax({
            type: "POST",
            url: url+id,
            data: {
              id: id,
              _token: "{{ csrf_token() }}",
              _method: "delete"
            },
            dataType: "JSON",
            success: function(e) {
              switch (e.msg) {
                case "Success Delete":
                  Toast.fire({
                    icon: 'success',
                    title: 'Delete Data Success',
                  });
                  break;
              }
            },
            error: function (e) {
              switch (e.responseJSON.msg) {
                case "Failed Delete":
                  Toast.fire({
                    icon: 'error',
                    title: 'Input Data Failed',
                  });
                  break;
              }
            },
          })
        }
        check('tbMaterialKeluar')
    });
  </script>

  <script>
    tbUsers()
    function tbUsers(){
      $('#tbUsers').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: '{{ route('users-table') }}',
        columns:[
          {data:'id', name:'id'},
          {data:'username', name:'username'},
          {data:'name', name:'name'},
          {data:'jabatan', name:'jabatan'},
          {data:'id', name:'id'},
        ],
        "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(4).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editData('user/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm' onclick=confirmDelete('user/','" + data["id"] + "','" + encodeURI(data["name"]) + "','tbUsers()') title='Delete'><i class='fa fa-trash'></i></button>");
        }
      });
    }   

    tbKaryawans()
    function tbKaryawans(){
      $('#tbKaryawans').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('karyawans-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'nip', name:'nip'},
          {data:'name', name:'name'},
          {data:'jabatan', name:'jabatan'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(4).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editData('karyawan/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm' onclick=confirmDelete('karyawan/','" + data["id"] + "','" + encodeURI(data["name"]) + "','tbKaryawans()') title='Delete'><i class='fa fa-trash'></i></button>");
          }
      });
    }   

    tbSuppliers()
    function tbSuppliers(){
      $('#tbSuppliers').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('suppliers-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'name', name:'name'},
          {data:'alamat', name:'alamat'},
          {data:'phone', name:'phone'},
          {data:'no_rekening', name:'no_rekening'},
          {data:'bank', name:'bank'},
          {data:'atas_nama', name:'atas_nama'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(7).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editData('supplier/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm' onclick=confirmDelete('supplier/','" + data["id"] + "','" + encodeURI(data["name"]) + "','tbSuppliers()') title='Delete'><i class='fa fa-trash'></i></button>");
          }
      });
    }   
    
    tbAsuransis()
    function tbAsuransis(){
      $('#tbAsuransis').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('asuransis-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'nm_asuransi', nm_asuransi:'name'},
          {data:'alamat', nm_asuransi:'alamat'},
          {data:'no_telepone', nm_asuransi:'no_telepone'},
          {data:'email', nm_asuransi:'email'},
          {data:'contact_person', nm_asuransi:'contact_person'},
          {data:'mobile', nm_asuransi:'mobile'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
        console.log(data);
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' onchange='handleChangeCheckboxAsuransi(this)' id='customCheckbox[" + no + "]' value='"+data["id"]+"'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(7).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editData('asuransi/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm' onclick=confirmDelete('asuransi/','" + data["id"] + "','" + encodeURI(data["nm_asuransi"]) + "','tbAsuransis()') title='Delete'><i class='fa fa-trash'></i></button>");
          }
      });
    }   

    let checkDataAsuransi = []
    function handleChangeCheckboxAsuransi(cb){
      // console.log(cb.value);
      if(cb.checked){
        checkDataAsuransi.push(cb.value)
      }else{
        checkDataAsuransi = checkDataAsuransi.filter(v => v != cb.value)
      }

      if(checkDataAsuransi.length > 0){

        const params = checkDataAsuransi.map(v => `params[]=${v}`).join('&')

        $(".customers-card-tools").html(`
          <a class="btn btn-success btn-sm" href="/asuransi/print?${params}" target="_blank"><i class='fa fa-print'></i></a>
          <button class="btn btn-success btn-sm" onclick="$('#form-input').show(500),destroyValueForm()"><i
                class="fa fa-plus"></i> Tambah Asuransi</button>
        `)
      }else{
        $(".customers-card-tools").html(`
       <button class="btn btn-success btn-sm" onclick="$('#form-input').show(500),destroyValueForm()"><i
            class="fa fa-plus"></i> Tambah Asuransi</button>
        `)
      }
    }

    tbCustomers()
    function tbCustomers(){
      $('#tbCustomers').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('customers-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'name', name:'name'},
          {data:'alamat', name:'alamat'},
          {data:'no_hp', name:'no_hp'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='"+data["id_kendaraan"]+"' onchange='handleChangeCheckboxCustomer(this)'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editData('customer/','" + data["id"] + "','"+ data["no_polisi"] +"') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm' onclick=confirmDelete('customer/','" + data["id"] + "','" + encodeURI(data["name"]) + "','tbCustomers()') title='Delete'><i class='fa fa-trash'></i></button>");
          }
      });
    }   

    let checkDataCustomer = []
    function handleChangeCheckboxCustomer(cb){
      // console.log(cb.value);
      if(cb.checked){
        checkDataCustomer.push(cb.value)
      }else{
        checkDataCustomer = checkDataCustomer.filter(v => v != cb.value)
      }

      if(checkDataCustomer.length > 0){

        const params = checkDataCustomer.map(v => `params[]=${v}`).join('&')

        $(".customers-card-tools").html(`
          <a class="btn btn-success btn-sm" href="/customer/print?${params}" target="_blank"><i class='fa fa-print'></i></a>
          <button class="btn btn-success btn-sm" onclick="$('#form-input').show(500),destroyValueForm()"><i
              class="fa fa-plus"></i> Customer Baru</button>
          <button class="btn btn-success btn-sm" onclick="$('#form-input-oldCustomer').show(500),destroyValueForm()"><i
              class="fa fa-plus"></i> Customer Lama</button>
        `)
      }else{
        $(".customers-card-tools").html(`
          <button class="btn btn-success btn-sm" onclick="$('#form-input').show(500),destroyValueForm()"><i
              class="fa fa-plus"></i> Customer Baru</button>
          <button class="btn btn-success btn-sm" onclick="$('#form-input-oldCustomer').show(500),destroyValueForm()"><i
              class="fa fa-plus"></i> Customer Lama</button>
        `)
      }
    }
    
    tbKendaraans()
    function tbKendaraans(){
      $('#tbKendaraans').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('kendaraans-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'merk_kendaraan', name:'merk_kendaraan'},
          {data:'type_kendaraan', name:'type_kendaraan'},
          {data:'thn_kendaraan', name:'thn_kendaraan'},
          {data:'warna_kendaraan', name:'warna_kendaraan'},
          {data:'no_rangka', name:'no_rangka'},
          {data:'no_mesin', name:'no_mesin'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(8).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editData('kendaraan/edit/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm' onclick=confirmDelete('kendaraan/','" + data["id"] + "','" + encodeURI(data["no_polisi"]) + "','tbKendaraans()') title='Delete'><i class='fa fa-trash'></i></button><a href='/kendaraan/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>");
      }
      });
    }   

    tbServices()
    function tbServices(){
      $('#tbServices').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('services-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'kd_service', name:'kd_service'},
          {data:'jenis_service', name:'jenis_service'},
          {data:'jenis_kendaraan', name:'jenis_kendaraan'},
          {data:'nm_service', name:'nm_service'},
          {data:'harga_service', name:'harga_service'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(6).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editData('service/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm' onclick=confirmDelete('service/','" + data["id"] + "','" + encodeURI(data["nm_service"]) + "','tbService()') title='Delete'><i class='fa fa-trash'></i></button>");
        }
      });
    }   

    tbSpareparts()
    function tbSpareparts(){
      $('#tbSpareparts').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('spareparts-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'kd_part', name:'kd_part'},
          {data:'nm_part', name:'nm_part'},
          // {data:'harga_part', name:'harga_part'},
          {data:'stock', name:'stock'},
          // {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          // $('td', row).eq(4).html("<button class='btn btn-danger btn-sm' onclick=confirmDelete('sparepart/','" + data["id"] + "','" + encodeURI(data["nm_part"]) + "','tbSpareparts()') title='Delete'><i class='fa fa-trash'></i></button>");
          // $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editData('sparepart/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm' onclick=confirmDelete('sparepart/','" + data["id"] + "','" + encodeURI(data["nm_part"]) + "','tbSpareparts()') title='Delete'><i class='fa fa-trash'></i></button>");
        }
      });
    }   

    tbDataSalvages()
    function tbDataSalvages(){
      $('#tbDataSalvages').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('data-salvage-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'kd_part', name:'kd_part'},
          {data:'nm_part', name:'nm_part'},
          {data:'harga_part', name:'harga_part'},
          {data:'quantity', name:'quantity'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editData('data-salvage/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm' onclick=confirmDelete('data-salvage/','" + data["id"] + "','" + encodeURI(data["nm_part"]) + "','tbDataSalvages()') title='Delete'><i class='fa fa-trash'></i></button>");
        }
      });
    }   

    tbEstimations()
    function tbEstimations(){
      $('#tbEstimations').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('estimations-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_estimasi', name:'no_estimasi'},
          {data:'tgl_estimasi', name:'tgl_estimasi'},
          {data:'tgl_selesai', name:'tgl_selesai'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(6).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataEstimasi('estimasi/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('estimasi/','" + data["id"] + "','" + encodeURI(data["no_estimasi"]) + "','tbEstimations()') title='Delete'><i class='fa fa-trash'></i></button><a href='/estimasi/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>");
        }
      });
    }  

    tbPengajuanPembayaran()
    function tbPengajuanPembayaran(){
      $('#tbPengajuanPembayaran2').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('pengajuan-pembayaran-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_po', name:'no_po'},
          {data:'no_pap', name:'no_pap'},
          {data:'tanggal', name:'tanggal'},
          {data:'no_faktur', name:'no_faktur'},
          {data:'supplier', name:'supplier'},
          {data:'total', name:'total'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(7).html("<a href='/pengajuan-pembayaran/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('pengajuan-pembayaran/','" + data["id"] + "','" + encodeURI(data["no_pap"]) + "','tbPengajuanPembayaran()') title='Delete'><i class='fa fa-trash'></i></button>")
        }
      });
    }   

    tbPengajuanPembayaranCash()
    function tbPengajuanPembayaranCash(){
      $('#tbPengajuanPembayaranCash').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('pengajuan-pembayaran-cash-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_po', name:'no_po'},
          {data:'no_ppc', name:'no_ppc'},
          {data:'tanggal', name:'tanggal'},
          {data:'no_faktur', name:'no_faktur'},
          {data:'supplier', name:'supplier'},
          {data:'total', name:'total'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
        // console.log({row, data, index, aData});
          var no = index + 1
          // let no_po = '<div>'
          // data.no_po.map(item => {
          //   no_po += `<span><b>-</b> ${item.no_po}</span></br>`
          // })
          // no_po += '</div>'

          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          // $('td', row).eq(2).html(no_po);
          $('td', row).eq(7).html("<a href='/pengajuan-pembayaran-cash/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('pengajuan-cash/','" + data["id"] + "','" + encodeURI(data["no_ppc"]) + "','tbPengajuanPembayaranCash()') title='Delete'><i class='fa fa-trash'></i></button>")
        }
      });
    }   

    let domain = window.location.origin
    function handlePrintMaterialMasuk(){
        let start = $("#start_material_masuk").val()
        let end = $("#end_material_masuk").val()
        let url = `${domain}/gudang/material-masuk/print?start=${start}&end=${end}`
        window.open(url, '_blank')
    }
    function handlePrintMaterialKeluar(){
        let start = $("#start_material_keluar").val()
        let end = $("#end_material_keluar").val()
        let url = `${domain}/gudang/material-out/print/?start=${start}&end=${end}`
        window.open(url, '_blank')
    }
    function handlePrintSparepartMasuk(){
        let start = $("#start_part_masuk").val()
        let end = $("#end_part_masuk").val()
        let url = `${domain}/gudang/incoming-part/print/?start=${start}&end=${end}`
        window.open(url, '_blank')
    }
    function handlePrintSparepartKeluar(){
        let start = $("#start_part_keluar").val()
        let end = $("#end_part_keluar").val()
        let url = `${domain}/gudang/part-out/print/?start=${start}&end=${end}`
        window.open(url, '_blank')
    }

    tbPersetujuanPembayaran()
    function tbPersetujuanPembayaran(){
      $('#tbPersetujuanPembayaran').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('persetujuan-pembayaran-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_po', name:'no_po'},
          {data:'no_pp', name:'no_pp'},
          {data:'tanggal', name:'tanggal'},
          {data:'no_faktur', name:'no_faktur'},
          {data:'supplier', name:'supplier'},
          {data:'total', name:'total'},
          {data:'status', name:'status'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
        // console.log(data);
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          // $('td', row).eq(3).html(`${data.status == "tolak" ? "<p class='bg-danger' style='width: 70px;text-align:center;'>Ditolak</p>" : "<p class='bg-success' style='width: 70px;text-align:center;'>Disetujui</p>"}`);
          $('td', row).eq(6).html(`Rp. ${data.total}`);
          if(myRole == "Finance"){
            $('td', row).eq(7).html(`${data.status == 0 ? '<span>Tolak</span>' : '<span>Setuju</span>'}`);
          }else{
            $('td', row).eq(7).html(`<select class="form-control" id="status_edit"
                                        onchange="editStatusPersetujuan(${data.id},'${data.status}')">
                                        <option value="tolak" ${data.status == 0 ? "selected" : ""}>Tolak
                                          </option>
                                          <option value="setuju" ${data.status == 1 ? "selected" : ""}>Setuju
                                            </option>
                                          </select>`);
          }
          if(myRole == "Finance"){
            $('td', row).eq(8).html(`${data.status != 0 ? "<a href='/persetujuan-pembayaran/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>" : ""}<button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('persetujuan-pembayaran/','${data.id}','${encodeURI(data.no_pp)}','tbPersetujuanPembayaran()') title='Delete'><i class='fa fa-trash'></i></button>`)
          }else{
            $('td', row).eq(8).html(`<a href='${"/persetujuan-pembayaran/print/"+data["id"]}' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('persetujuan-pembayaran/','${data.id}','${encodeURI(data.no_pp)}','tbPersetujuanPembayaran()') title='Delete'><i class='fa fa-trash'></i></button>`)
          }
        }
      });
    }   

    function editStatusPersetujuan(id,status){
        $.ajax({
          type: 'POST',
          url: '/persetujuan-pembayaran/status/edit/'+id,
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'POST',
            status
          },
          dataType: 'JSON',
          success: function(res){
            switch (res.msg) {
              case "Success Update":
                eval(tbPersetujuanPembayaran())
                Toast.fire({
                  icon: 'success',
                  title: 'Update Status Success',
                });
                break;
            }
          },
          error: function (e) {
            switch (e.responseJSON.msg) {
              case "Failed Update":
                Toast.fire({
                  icon: 'error',
                  title: 'Update Data Failed',
                });
                break;
            }
          },
        });
    }
    // <button class='btn btn-secondary btn-sm mr-2' onclick=editData('persetujuan-pembayaran/','${data.id}') title='Edit'><i class='fa fa-edit'></i></button>

    tbVoucherPembayaran()
    function tbVoucherPembayaran(){
      $('#tbVoucherPembayaran').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('voucher-pembayaran-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_po', name:'no_po'},
          {data:'no_vp', name:'no_vp'},
          {data:'tanggal', name:'tanggal'},
          {data:'no_faktur', name:'no_faktur'},
          {data:'supplier', name:'supplier'},
          {data:'no_rekening', namno_e:'rekening'},
          {data:'total', name:'total'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
        // console.log({row, data, index, aData});
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(8).html("<a href='/voucher-pembayaran/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('voucher-pembayaran/','" + data["id"] + "','" + encodeURI(data["no_vp"]) + "','tbVoucherPembayaran()') title='Delete'><i class='fa fa-trash'></i></button>")
        }
      });
    }   

    tbPermitDiscounts()
    function tbPermitDiscounts(){
      $('#tbPermitDiscounts').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('permits-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_estimasi', name:'no_estimasi'},
          {data:'tgl_estimasi', name:'tgl_estimasi'},
          {data:'tgl_selesai', name:'tgl_selesai'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'status', name:'status'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          if(data['status'] == 'Pending'){
              $(row).find('td:eq(6)').css('background-color', '#dc3545').css('color', '#fff');
          }else if(data['status'] == 'Approved'){
            $(row).find('td:eq(6)').css('background-color', '#125B50').css('color', '#fff');
          }else{
            $(row).find('td:eq(6)').css('background-color', '#fc7f03').css('color', '#fff');
          }
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(7).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataEstimasi('estimasi/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('estimasi/','" + data["id"] + "','" + encodeURI(data["no_estimasi"]) + "','tbEstimations()') title='Delete'><i class='fa fa-trash'></i></button><a "+(data['status'] == 'Pending' ? "" : "href='/estimasi/print/"+data["id"]+"'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>");
        }
      });
    }   

    tbDiscountApprovals()
    function tbDiscountApprovals(){
      $('#tbDiscountApprovals').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('disc-approved-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_estimasi_approved', name:'no_estimasi_approved'},
          {data:'tgl_permit_estimasi', name:'tgl_permit_estimasi'},
          {data:'tgl_selesai', name:'tgl_selesai'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'status', name:'status'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          if(data['status'] == 'Pending'){
              $(row).find('td:eq(6)').css('background-color', '#dc3545').css('color', '#fff');
          }else if(data['status'] == 'Approved'){
            $(row).find('td:eq(6)').css('background-color', '#125B50').css('color', '#fff');
          }else{
            $(row).find('td:eq(6)').css('background-color', '#fc7f03').css('color', '#fff');
          }
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          if(myRole != "Marketing-SA"){
            $('td', row).eq(7).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataEstimasi('estimasi-approved/','" + data["id"] + "','" + data["estimation_id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('estimasi-approved/','" + data["id"] + "','" + encodeURI(data["no_estimasi"]) + "','tbDiscountApprovals()') title='Delete'><i class='fa fa-trash'></i></button><a "+(data["status"] == "Pending" && "style='display:none;'")+" "+(data['status'] == 'Pending' ? "" : "href='/estimasi/print/"+data["estimation_id"]+"?type=disc'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>");
          }else{
            $('td', row).eq(7).html("<a "+(data["status"] == "Pending" && "style='display:none;'")+" "+(data['status'] == 'Pending' ? "" : "href='/estimasi/print/"+data["estimation_id"]+"?type=disc'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>");
          }
          
        }
      });
    }   
    
    tbEstimationApproveds()
    function tbEstimationApproveds(){
      $('#tbEstimationApproveds').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('estimasi-approveds-table') }}',
      columns:[
          {data:'id', name:'id'},
          // {data:'no_estimasi_approved', name:'no_estimasi_approved'},
          {data:'no_estimasi', name:'no_estimasi'},
          {data:'tgl_estimasi', name:'tgl_estimasi'},
          {data:'tgl_selesai', name:'tgl_selesai'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'status', name:'status'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
        // console.log(data);
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
           if(data['status'] == 'Pending'){
              $(row).find('td:eq(6)').css('background-color', '#dc3545').css('color', '#fff');
          }else if(data['status'] == 'Approved'){
            $(row).find('td:eq(6)').css('background-color', '#125B50').css('color', '#fff');
          }else{
            $(row).find('td:eq(6)').css('background-color', '#fc7f03').css('color', '#fff');
          }
          $('td', row).eq(7).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataEstimasi('estimasi-approved/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('estimasi-approved/','" + data["id"] + "','" + encodeURI(data["no_estimasi"]) + "','tbEstimationApproveds()') title='Delete'><i class='fa fa-trash'></i></button><a "+(data["status"] == "Pending" || myRole == "Marketing-SA" && "style='display: none;'")+" "+(data['status'] == 'Pending' ? "" : "href='/estimasi-approved/print/"+data["id"]+"'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>");
        }
      });
    }   


    tbWorkOrders()
    function tbWorkOrders(){
      $('#tbWorkOrders').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('work-orders-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'tgl_spk', name:'tgl_spk'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'id', name:'id'},
          //  {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          let type = "spk";
          if(lastURLSegment == "progres-pekerjaan"){
            type = "progres"
          }
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          // $('td', row).eq(5).html("<a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print/"+data["id"]+"'")+" target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i> SPK</a>");
          // <a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print-po/"+data["estimation_id"]+"'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Cetak PO</a>
          if(type == "spk"){
            if(myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
              $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataSpk('work-order/','" + data["id"] + "','form-input') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('work-order/','" + data["id"] + "','" + encodeURI(data["no_estimasi"]) + "','tbWorkOrders()') title='Delete'><i class='fa fa-trash'></i></button><a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print/"+data["id"]+"?type="+type+"'")+" target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i></a>");
            }else if(myRole == "Marketing-SA"){
             $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataSpk('work-order/','" + data["id"] + "','form-input') title='Edit'><i class='fa fa-edit'></i></button><a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print/"+data["id"]+"?type="+type+"'")+" target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i></a>");
            }else{
              $('td', row).eq(5).html("<a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print/"+data["id"]+"?type="+type+"'")+" target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i></a>");
            }
          }else{
            if(myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
              $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataSpk('work-order/','" + data["id"] + "','form-input') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('work-order/','" + data["id"] + "','" + encodeURI(data["no_estimasi"]) + "','tbWorkOrders()') title='Delete'><i class='fa fa-trash'></i></button><a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print/"+data["id"]+"?type="+type+"'")+" target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i></a>");
            }else if(myRole == "Kordinator Lapangan"){
              $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataSpk('work-order/','" + data["id"] + "','form-input') title='Edit'><i class='fa fa-edit'></i></button><a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print/"+data["id"]+"?type="+type+"'")+" target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i></a>");
            }else{
              $('td', row).eq(5).html("<a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print/"+data["id"]+"?type="+type+"'")+" target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i></a>");
            }

          }
        }
      });
    }   
    
    tbWorkOrders_2()
    function tbWorkOrders_2(){
      $('#tbWorkOrders_2').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('work-orders-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'tgl_spk', name:'tgl_spk'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          // {data:'id', name:'id'},
           {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
        console.log(data);
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          // $('td', row).eq(5).html("<a href='/work-order/request-material/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i> Material</a>");
          // <a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print-po/"+data["estimation_id"]+"'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Cetak PO</a>
          if(myRole == "Kordinator Lapangan" || myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
            $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=getDataSpkItem('form_2','" + data["estimation_approved_id"] + "','form-input_2') title='Edit'><i class='fa fa-edit'></i></button><a href='/work-order/request-material/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i></a>");
          }else{
            $('td', row).eq(5).html("</button><a href='/work-order/request-material/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i></a>");
          }
        }
      });
    }   


    tbWorkOrders_3()
    function tbWorkOrders_3(){
      $('#tbWorkOrders_3').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('work-orders-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'tgl_spk', name:'tgl_spk'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          // {data:'id', name:'id'},
           {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          // $('td', row).eq(5).html("<a href='/work-order/po-internal/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i> Parts</a>");
          // <a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print-po/"+data["estimation_id"]+"'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Cetak PO</a>
          if(myRole == "Marketing-SA" || myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
            $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=getDataSpkItem('form_3','" + data["estimation_approved_id"] + "','form-input_3') title='Edit'><i class='fa fa-edit'></i></button><a href='/work-order/po-internal/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i></a>");
          }else{
            $('td', row).eq(5).html("<a href='/work-order/po-internal/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm m-1'><i class='fa fa-print'></i></a>");
          }
        }
      });
    }   

    function getDataSpkItem(form, id, modal = null){
      $.ajax({
          type: 'POST',
          url: '/estimasi-approved/'+id,
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'patch'
          },
          dataType: 'JSON',
          success: function(res){
            if(modal != null){
              $('#' + modal).show()

              const noSpk = $("<option selected='selected'></option>").val(res.estimation_approved_id).text(res.no_estimasi_approved)
              if(form == "form_2"){
                $(".selectNoSpk").append(noSpk).trigger('change').prop("disabled", true);
                $('.estimation_approved_id').val(res.estimation_approved_id)
              }else{
                $(".selectNoSpk_2").append(noSpk).trigger('change').prop("disabled", true)
                $('.estimation_approved_id').val(res.estimation_approved_id)
              }
            }
            if(form == "form_6"){
              $.each(res,function(key,value){
                $('#'+key+'-part').val(value)
              })

              getSparepartOutList(res.no_estimasi_approved)
            }else{
              if(lastURLSegment == "progres-pekerjaan" || lastURLSegment == "work-order"){
                $.each(res,function(key,value){
                  $('#'+key+'_'+form.split("_")[1]).val(value)
                })
                if(res.tgl_permintaan != null){
                  $("#tgl_permintaan").val(res.tgl_permintaan)
                }
                if(res.tanggal_permintaan != null){
                  $("#tanggal_permintaan").val(res.tanggal_permintaan)
                }
                getDataSpkService(res.no_estimasi_approved, form.split("_")[1], form == "form_3")
                getDataSpkPart(res.no_estimasi_approved, form.split("_")[1], form == "form_3")
                if(form == "form_2"){
                  getDataMaterialOut(res.estimation_approved_id)
                }else if(form == "form_3"){
                  getDataSukucadangPart(res.estimation_approved_id)
                }
                // console.log(form);
              }else{
                $.each(res,function(key,value){
                  $('#'+key).val(value)
                })
              }
            }
            $('#no_po').val(res.no_estimasi_approved)
            // getDataSpkPart(res.no_estimasi_approved)
            // $('[name=no_spk]').val(res.no_estimasi_approved)
            // $('#no_po').val(res.no_estimasi_approved)
            // getDataSpkService(res.no_estimasi_approved)
            // if(lastURLSegment == "purchase-order"){
            //   getDataPoPart(res.no_estimasi_approved) 
            // }else if(lastURLSegment == "salvage"){
            //    getDataSalvagePart2(res.no_estimasi_approved) 
            // }else{
            //   getDataSpkPart(res.no_estimasi_approved) 
            // }
          }
        });
    }

    function getSparepartOutList(id){
      $.ajax({
        url: '/work-order/part-out/list?no_estimasi='+ id,
        type: "GET",
        data: {
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(res) {
          console.log(res);
          $.each(res,function(key,value){
            let penerima = value.penerima != null ? value.penerima : ''
            let isPenerima = value.penerima != null ? true : false
            let tgl_keluar = value.tgl_keluar != null ? value.penerima : ''
            let isTgl_keluar = value.tgl_keluar != null ? true : false
            let qty = value.qty != null ? value.qty : 0
            let isQty = value.qty != null ? true : false

            count=$('#tbPartKeluar tbody tr').length + Number(1);
            $("#tbPartKeluar").find('tbody')
              .append($('<tr id="row_part_'+n+'">')
                .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value="'+value.po_id+'"></td>')
                .append('<td><input type="hidden" name="part_out_id[]" value="'+value.part_out_id+'"><input type="text" class="form-control" name="kd_part[]" value="'+value.kd_part+'" readonly></td>')
                .append('<td><input type="hidden" name="part_id[]" value="'+value.part_id+'"><span id="nm_part[]">'+ value.nm_part +'</span></td>')
                .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_material" value="'+qty+'" '+(isQty && 'readonly')+'></td>')
                .append('<td><input type="date" class="form-control" name="tgl_keluar[]" id="tgl_keluar" value="'+tgl_keluar+'" '+(isTgl_keluar && 'readonly')+'></td>')
                .append('<td><input type="text" class="form-control" name="penerima[]" id="penerima" value="'+penerima+'" '+(isPenerima && 'readonly')+'></td>')
                .append('<td>#</td>')
                // .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowMaterial"><i class="fa fa-times"></i></button></td>')
              .append('</tr>')
            );n++
          })
        }
      })
    }

    function getDataMaterialOut(id){
      $.ajax({
        url: '/work-order/material-out/'+id,
        type: "GET",
        data: {
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(res) {
          console.log(res);
          $("#tbMaterialKeluarProgres").find('tbody tr').remove()
          $.each(res, function(key, value){
            count=$('#tbMaterialKeluarProgres tbody tr').length + Number(1);
            $("#tbMaterialKeluarProgres").find('tbody')
              .append($('<tr id="row_material_'+n+'">')
                .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value="'+value.id+'"></td>')
                .append('<td><input type="text" class="form-control text-right" value="'+value.kd_material+'" id="kd_material" readonly></td>')
                .append(`<td style="width: 200px;"><span id="nm_material">${value.nm_material}${!value.tgl_permintaan ? ' <span style="padding: 2px; background: red; font-size: 10px; color: white; border-radius: 100%; font-weight: bold;">baru</span>' : ''}</span></td>`)
                .append('<td width="80px"><input type="text" class="form-control text-right" value="'+value.qty+'" id="qty_material" readonly></td>')
                .append('<td><input type="text" class="form-control" id="tgl_keluar" value="'+value.tgl_keluar+'" readonly></td>')
                .append('<td><input type="text" class="form-control" id="penerima" value="'+value.penerima+'" readonly></td>')
                .append(`<td><input type="checkbox" class="form-control" onclick="return false" ${value.is_diterima && 'checked' }></td>`)
                .append(value.is_diterima ? '#' : '<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowMaterialProgres"><i class="fa fa-times"></i></button></td>')
              .append('</tr>')
            );n++
          })
        }
      })
    }
    
    function getDataSukucadangPart(id){
      $.ajax({
        url: '/work-order/request-sukucadang-part/'+id,
        type: "GET",
        data: {
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(res) {
          // console.log(res);
          // return;
          $("#tbRequestPart").find('tbody tr').remove()
          $.each(res, function(key, value){
            count=$('#tbRequestPart tbody tr').length + Number(1);
            $("#tbRequestPart").find('tbody')
              .append($('<tr id="row_part_'+n+'">')
                .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="part_estimation_id[]" id="part_estimation_id" value="'+value.id+'"/></td>')
                .append(`<td><select class="form-control" id="jenis_pembelian" name="jenis_pembelian[]">
                    <option value="">Select PPN</option>
                    <option value="beli" ${value.jenis_pembelian == "beli" && 'selected'}>Beli</option>
                    <option value="repair" ${value.jenis_pembelian == "repair" && 'selected'}>Repair</option>
                    <option value="rek" ${value.jenis_pembelian == "rek" && 'selected'}>Rek</option>
                    <option value="stock" ${value.jenis_pembelian == "stock" && 'selected'}>Stock</option>
                  </select><input type="hidden" value="${value.id_sukucadang ? value.id_sukucadang : ''}" name="id[]" /></td>`)
                .append('<td><select class="form-control selectSupplier" data-select2-id="'+n+'" name="supplier_id[]" width="100%"></select></td>')
                .append('<td>'+value.kd_part+'</td>')
                .append('<td>'+value.nm_part+'</td>')
                .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" value="'+value.qty+'" readonly></td>')
                .append('<td><input type="text" class="form-control text-right" name="harga_part[]" id="harga_part"value="'+value.price+'" readonly></td>')
                .append('<td><input type="text" class="form-control text-right" name="subTotalPart[]" id="subTotalPart" readonly></td>')
                .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconPart[]" id="disconPart" value="'+value.disc+'" readonly><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscPart" id="afterDiscPart"></td>')
                .append(`<td><select class="form-control" id="ppn" name="ppn[]" onchange="hitungPart3('row_part_${n}')">
                    <option value="0">Select PPN</option>
                    <option value="0" ${value.ppn == 0 && 'selected'}>Non PPN</option>
                    <option value="11" ${value.ppn == 11 && 'selected'}>PPN</option>
                  </select><input type="hidden" id="plusPPNPart" value="0"></td>`)
                .append('<td><input type="text" class="form-control text-right" name="jumlahPart[]" id="jumlahPart" readonly></td>')
              .append('</tr>')
            );
            hitungPart3('row_part_'+n)

            if(value.supplier_id){
              const noSupplier = $("<option selected='selected'></option>").val(value.supplier_id).text(value.supplier)
              $("#row_part_"+n+" .selectSupplier").append(noSupplier).trigger('change')
            }

            selectSupplier()
            n++
          })
        }
      })
    }


    tbFinished()
    function tbFinished(){
      $('#tbFinished').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('finished-orders-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'tgl_spk', name:'tgl_spk'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
           {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
      console.log(data);
          let isPrint = data.selesai_cat && data.selesai_ketok && data.selesai_part && data.selesai_poles && data.selesai_total
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          // $('td', row).eq(5).html("<a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print/"+data["estimation_id"]+"'")+" target='_blank' class='btn btn-info btn-sm mr-2'><i class='fa fa-print'></i> Cetak SPK</a>");
          if(isPrint){
            $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataSpk('work-order/','" + data["id"] + "','form-input') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('work-order/','" + data["id"] + "','" + encodeURI(data["no_estimasi"]) + "','tbWorkOrders()') title='Delete'><i class='fa fa-trash'></i></button><a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print/"+data["estimation_id"]+"'")+" target='_blank' class='btn btn-info btn-sm mr-2'><i class='fa fa-print'></i></a>");
          }else{
            $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataSpk('work-order/','" + data["id"] + "','form-input') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('work-order/','" + data["id"] + "','" + encodeURI(data["no_estimasi"]) + "','tbWorkOrders()') title='Delete'><i class='fa fa-trash'></i></button>");
          }
        }
      });
    }   

    tbGaransi()
    function tbGaransi(){
      $('#tbGaransi').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('finished-orders-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'tgl_spk', name:'tgl_spk'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(5).html("<a "+(data['status'] == 'Pending' ? "" : "href='/work-order/print-garansi/"+data["estimation_id"]+"'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Cetak Surat Puas/Garansi</a>");
        }
      });
    }   

    tbPurchaseOrders()
    function tbPurchaseOrders(){
      $('#tbPurchaseOrders').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('purchase-orders-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_po', name:'no_po'},
          {data:'tgl_po', name:'tgl_po'},
          {data:'supplier', name:'supplier'},
          {data:'jenis_pembelian', name:'jenis_pembelian'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'id', name:'id'},
          {data:'id', name:'id'},
           {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
        // console.log(data);
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          if(myRole == "Finance" || myRole == "Purchasing"){
            $('td', row).eq(7).html(`${data.status == 0 ? '<span>Tolak</span>' : '<span>Setuju</span>'}`);
            $('td', row).eq(8).html(data.status == 0 ? "-" : "<a "+(data['status'] == 'Pending' ? "" : "href='/purchase-order/print-po/"+data["id"]+"'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Cetak PO</a>");
          }else{
            $('td', row).eq(7).html(`<select class="form-control" id="status_edit"
                onchange="editStatusPoSuuplier(${data.id},'${data.status}')">
                <option value="tolak" ${data.status==0 ? "selected" : "" }>Tolak
                </option>
                <option value="setuju" ${data.status==1 ? "selected" : "" }>Setuju
                </option>
              </select>`);
            $('td', row).eq(8).html("<a "+(data['status'] == 'Pending' ? "" : "href='/purchase-order/print-po/"+data["id"]+"'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Cetak PO</a>");
          }
          if(myRole == "Purchasing" || myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
            $('td', row).eq(9).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataPoSupplier('purchase-order/','" + data["id"] + "','form-input_4') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('purchase-order/','" + data["id"] + "','" + encodeURI(data["no_estimasi"]) + "','tbPurchaseOrders()') title='Delete'><i class='fa fa-trash'></i></button>");
          }else{
            $('td', row).eq(9).html("-");
          }
        }
      });
    }  
    
    function editStatusPoSuuplier(id, status){
      $.ajax({
          type: 'POST',
          url: '/gudang/po-supplier/status/edit/'+id,
          data: {
            
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'POST',
            status
          },
          dataType: 'JSON',
          success: function(res){
            switch (res.msg) {
              case "Success Update":
                eval(tbPurchaseOrders())
                Toast.fire({
                  icon: 'success',
                  title: 'Update Status Success',
                });
                break;
            }
          },
          error: function (e) {
            switch (e.responseJSON.msg) {
              case "Failed Update":
                Toast.fire({
                  icon: 'error',
                  title: 'Update Data Failed',
                });
                break;
            }
          },
        });
    }

    function editDataPoSupplier(url,id,form){
      // alert(8)
      $.ajax({
        url: url+id,
        type: "POST",
        data: {
          id: id,
          _method: 'patch',
          _token: '{{ csrf_token() }}'
        },
        dataType: "JSON",
        success: function(e) {
          console.log(e);
          $("#btn-submit").text('UPDATE DATA');
          $('#'+form+ " #key").val(id)
          $('#'+form).show();
          $.each(e.poSupplier,function(key,value){
            $('#'+form+ ' #'+key).val(value)
          })
          const noSpk = $("<option selected='selected'></option>").val(e.poSupplier.estimation_approved_id).text(e.poSupplier.no_po)
          $(".selectNoSpk").append(noSpk).trigger('change')
          const noSupplier = $("<option selected='selected'></option>").val(e.poSupplier.supplier_id).text(e.poSupplier.supplier)
          $(".selectSupplier").append(noSupplier).trigger('change')

          setPoSuppliers(e.poSuppliers)
        }
      });
    }

    function setPoSuppliers(data){
      $('#tbPengajuanPart tbody tr').remove()
      $.each(data, function(key, value){
     count=$('#tbPengajuanPart tbody tr').length + Number(1);
      $("#tbPengajuanPart").find('tbody')
        .append($('<tr id="row_part_'+n+'">')
          .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value="'+value.id+'"></td>')
          .append('<td><select class="form-control part-list select-part-'+n+'" name="part_id[]" data-select2-id="'+n+'" onchange=selectPart("row_part_'+n+'") style="width:100%;"></select></td>')
          .append('<td><small id="nm_part">'+value.nm_part+'</small></td>')
          .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" oninput=hitungPart2("row_part_'+n+'") value="'+value.qty+'"></td>')
          .append('<td><input type="number" class="form-control text-right" value="'+value.price+'" name="harga_part[]" id="harga_part" oninput=hitungPart2("row_part_'+n+'")></td>')
          .append('<td><input type="text" class="form-control text-right" name="subTotalPart[]" id="subTotalPart" readonly></td>')
          .append(`
            <td>
              <select class="form-control" name="plusPPNPart[]" id="plusPPNPart" oninput="hitungPart2('row_part_${n}')">
                <option value="0">Pilih Jenis PPN</option>
                <option value="0" ${value.ppn == 0 && 'selected'}>Non PPN</option>
                <option value="11" ${value.ppn == 11 && 'selected'}>PPN 11%</option>
              </select>
              <input type="hidden" name="afterPPNPart" id="afterPPNPart">
            </td>
          `)
          .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconPart[]" id="disconPart" value="'+value.disc+'" oninput=hitungPart2("row_part_'+n+'")><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscPart" id="afterDiscPart"></td>')
          .append('<td><input type="text" class="form-control text-right" name="jumlahPart[]" id="jumlahPart" readonly></td>')
          .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPart" ><i class="fa fa-times"></i></button></td>')
        .append('</tr>')
      );
      const noPart = $("<option selected='selected'></option>").val(value.part_id).text(value.kd_part)
      $('.select-part-'+n+'').append(noPart).trigger('change')
      hitungPart2('row_part_'+n+'')
      select2Part()
      n++
      })
    }

    // function addRowPoPart(){
    //   count=$('#tbPengajuanPart tbody tr').length + Number(1);
    //   $("#tbPengajuanPart").find('tbody')
    //     .append($('<tr id="row_part_'+n+'">')
    //       .append('<td align="center"><div id="pnum'+n+'">'+ count +'</div><input type="hidden" name="po_id[]" id="po_id" value=""></td>')
    //       .append('<td><select class="form-control part-list" name="part_id[]" data-select2-id="'+n+'" onchange=selectPart("row_part_'+n+'") style="width:100%;"></select></td>')
    //       .append('<td><small id="nm_part"></small></td>')
    //       .append('<td width="80px"><input type="text" class="form-control text-right" name="qty_part[]" id="qty_part" oninput=hitungPart2("row_part_'+n+'")></td>')
    //       .append('<td><input type="text" class="form-control text-right" name="harga_part[]" id="harga_part" oninput=hitungPart2("row_part_'+n+'") readonly></td>')
    //       .append('<td><input type="text" class="form-control text-right" name="subTotalPart[]" id="subTotalPart" readonly></td>')
    //       // .append('<td><input type="text" class="form-control text-right" name="plusPPNMaterial[]" id="plusPPNMaterial"  value="0" oninput=hitungMaterial("row_part_'+n+'")></td>')
    //       .append(`
    //         <td>
    //           <select class="form-control" name="plusPPNPart[]" id="plusPPNPart" oninput="hitungPart2('row_part_${n}')">
    //             <option value="0">Pilih Jenis PPN</option>
    //             <option value="0">Non PPN</option>
    //             <option value="11">PPN 11%</option>
    //           </select>
    //           <input type="hidden" name="afterPPNPart" id="afterPPNPart">
    //         </td>
    //       `)
    //       .append('<td><div class="input-group"><input type="text" class="form-control text-right" name="disconPart[]" id="disconPart" value="0" oninput=hitungPart2("row_part_'+n+'")><div class="input-group-append"><span class="input-group-text">%</span></div></div><input type="hidden" name="afterDiscPart" id="afterDiscPart"></td>')
    //       .append('<td><input type="text" class="form-control text-right" name="jumlahPart[]" id="jumlahPart" readonly></td>')
    //       .append('<td><button type="button" class="btn btn-default text-danger btn-sm" id="deleteRowPart" ><i class="fa fa-times"></i></button></td>')
    //     .append('</tr>')
    //   );n++
    //   select2Part()
    // }

    tbSalvages()
    function tbSalvages(){
      $('#tbSalvages').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('salvages-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'tgl_salvage', name:'tgl_salvage'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          if(myRole == "Marketing-SA" || myRole == "Administrator" || myRole == "Direktur" || myRole ==
          "Manager"){
            $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataSpk('salvage/','" + data["id"] + "','form-input') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('salvage/','" + data["id"] + "','" + encodeURI(data["no_spk"]) + "','tbSalvages()') title='Delete'><i class='fa fa-trash'></i></button><a "+(data['status'] == 'Pending' ? "" : "href='/salvage/print/"+data["id"]+"'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>");
          }else{
            $('td', row).eq(5).html("<a "+(data['status'] == 'Pending' ? "" : "href='/salvage/print/"+data["id"]+"'")+" target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>");
          }
        }
      });
    }   

    tbKwitansiOr()
    function tbKwitansiOr(){
      $('#tbKwitansiOr').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('ownrisk-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'id', name:'id'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          if(data.pembayaran == "Transfer"){
            $('td', row).eq(4).html(`
            <div class="dropdown">
              <p class="dropdown-toggle btn btn-info btn-sm" id="dropdownKwitasOr" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><i class='fa fa-print'></i>
                Kwitansi Ownrisk</p>
              <div class="dropdown-menu" aria-labelledby="dropdownKwitasOr">
                <span class="dropdown-item">Pembayaran melalui:</span>
                <a href='/kwitansi/ownrisk/${data["id"]}?bank=mandiri' target='_blank' class='dropdown-item'><i class='fa fa-print'></i>
                  BANK MANDIRI
                </a>
                <a href='/kwitansi/ownrisk/${data["id"]}?bank=permata' target='_blank' class='dropdown-item'><i class='fa fa-print'></i>
                  BANK PERMATA
                </a>
                <a href='/kwitansi/ownrisk/${data["id"]}?bank=bca' target='_blank' class='dropdown-item'><i class='fa fa-print'></i>
                  BANK BCA
                </a>
              </div>
            </div>
            `);
          }else{
            $('td', row).eq(4).html("<a href='/kwitansi/ownrisk/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><iclass='fa fa-print'></i> Kwitansi Ownrisk</a>");
          }
          if(myRole == "Finance" || myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
            $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataSpk('kwitansi/ownrisk/','" + data["id"] + "','form-input-or') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('kwitansi/ownrisk/','" + data["id"] + "','" + encodeURI(data["no_spk"]) + "','tbKwitansiOr()') title='Delete'><i class='fa fa-trash'></i></button>");
          }else{
            $('td', row).eq(5).html("-");
          }

        }
      });
    }
    
    tbKwitansiDp()
    function tbKwitansiDp(){
      $('#tbKwitansiDp').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('downpayment-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'id', name:'id'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          if(data.pembayaran == "Transfer"){
          $('td', row).eq(4).html(`
          <div class="dropdown">
            <p class="dropdown-toggle btn btn-info btn-sm" id="dropdownKwitasOr" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class='fa fa-print'></i>
              Kwitansi Downpayment</p>
            <div class="dropdown-menu" aria-labelledby="dropdownKwitasOr">
              <span class="dropdown-item">Pembayaran melalui:</span>
              <a href='/kwitansi/downpayment/${data["id"]}?bank=mandiri' target='_blank' class='dropdown-item'><i
                  class='fa fa-print'></i>
                BANK MANDIRI
              </a>
              <a href='/kwitansi/downpayment/${data["id"]}?bank=permata' target='_blank' class='dropdown-item'><i
                  class='fa fa-print'></i>
                BANK PERMATA
              </a>
              <a href='/kwitansi/downpayment/${data["id"]}?bank=bca' target='_blank' class='dropdown-item'><i class='fa fa-print'></i>
                BANK BCA
              </a>
            </div>
          </div>
          `);
          }else{
            $('td', row).eq(4).html("<a href='/kwitansi/downpayment/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Kwitansi Downpayment</a>");
          }
          if(myRole == "Finance" || myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
            $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataSpk('kwitansi/downpayment/','" + data["id"] + "','form-input-dp') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('kwitansi/downpayment/','" + data["id"] + "','" + encodeURI(data["no_spk"]) + "','tbKwitansiDp()') title='Delete'><i class='fa fa-trash'></i></button>");
          }else{
            $('td', row).eq(5).html("-");
          }
        }
      });
    }

    tbKwitansiPelunasan()
    function tbKwitansiPelunasan(){
      $('#tbKwitansiPelunasan').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('pelunasan-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'id', name:'id'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          if(data.pembayaran == "Transfer"){
          $('td', row).eq(4).html(`
          <div class="dropdown">
            <p class="dropdown-toggle btn btn-info btn-sm" id="dropdownKwitasOr" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class='fa fa-print'></i>
              Kwitansi Pelunasan</p>
            <div class="dropdown-menu" aria-labelledby="dropdownKwitasOr">
              <span class="dropdown-item">Pembayaran melalui:</span>
              <a href='/kwitansi/pelunasan/${data["id"]}?bank=mandiri' target='_blank' class='dropdown-item'><i
                  class='fa fa-print'></i>
                BANK MANDIRI
              </a>
              <a href='/kwitansi/pelunasan/${data["id"]}?bank=permata' target='_blank' class='dropdown-item'><i
                  class='fa fa-print'></i>
                BANK PERMATA
              </a>
              <a href='/kwitansi/pelunasan/${data["id"]}?bank=bca' target='_blank' class='dropdown-item'><i
                  class='fa fa-print'></i>
                BANK BCA
              </a>
            </div>
          </div>
          `);
          }else{
              $('td', row).eq(4).html("<a href='/kwitansi/pelunasan/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Kwitansi Pelunasan</a>");
          }
          if(myRole == "Finance" || myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
            $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataSpk('kwitansi/pelunasan/','" + data["id"] + "','form-input-pelunasan') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('kwitansi/pelunasan/','" + data["id"] + "','" + encodeURI(data["no_spk"]) + "','tbKwitansiPelunasan()') title='Delete'><i class='fa fa-trash'></i></button>");
          }else{
            $('td', row).eq(5).html("-");
          }
        }
      });
    }


    tbKwitansiTagihan()
    function tbKwitansiTagihan(){
      $('#tbKwitansiTagihan').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('tagihan-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'id', name:'id'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          if(data.pembayaran == "Transfer"){
          $('td', row).eq(4).html(`
          <div class="dropdown">
            <p class="dropdown-toggle btn btn-info btn-sm" id="dropdownKwitasOr" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class='fa fa-print'></i>
              Kwitansi Tagihan</p>
            <div class="dropdown-menu" aria-labelledby="dropdownKwitasOr">
              <span class="dropdown-item">Pembayaran melalui:</span>
              <a href='/kwitansi/tagihan/${data["id"]}?bank=mandiri' target='_blank' class='dropdown-item'><i
                  class='fa fa-print'></i>
                BANK MANDIRI
              </a>
              <a href='/kwitansi/tagihan/${data["id"]}?bank=permata' target='_blank' class='dropdown-item'><i
                  class='fa fa-print'></i>
                BANK PERMATA
              </a>
              <a href='/kwitansi/tagihan/${data["id"]}?bank=bca' target='_blank' class='dropdown-item'><i
                  class='fa fa-print'></i>
                BANK BCA
              </a>
            </div>
          </div>
          `);
          }else{
              $('td', row).eq(4).html("<a href='/kwitansi/tagihan/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Kwitansi Tagihan</a>");
          }
          if(myRole == "Finance" || myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
            $('td', row).eq(5).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataSpk('kwitansi/tagihan/','" + data["id"] + "','form-input-tagihan') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('kwitansi/tagihan/','" + data["id"] + "','" + encodeURI(data["no_spk"]) + "','tbKwitansiTagihan()') title='Delete'><i class='fa fa-trash'></i></button>");
          }else{
            $('td', row).eq(5).html("-");
          }
        }
      });
    }

    tbInvoices()
    function tbInvoices(){
      $('#tbInvoices').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('pengiriman-invoices-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_invoice', name:'id'},
          {data:'tgl_buat', name:'tgl_buat'},
          {data:'id', name:'id'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          let no_kwitansi = '<div>'
          data.no_kwitansis.map(item => {
            no_kwitansi += `<span><b>-</b> ${item.no_kwitansi}</span></br>`
          })
          no_kwitansi += '</div>'

          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(1).html(no_kwitansi);
          $('td', row).eq(3).html("<a href='/pengiriman-invoice/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Pengiriman Invoice</a>");
          if(myRole == "Finance" || myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
            $('td', row).eq(4).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataInvoice('" + data["no_invoice"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('pengiriman-invoice/','" + data["id"] + "','" + encodeURI(data["no_invoice"]) + "','tbInvoices()') title='Delete'><i class='fa fa-trash'></i></button>");
          }else{
            $('td', row).eq(4).html("-");
          }
        }
      });
    }

    tbPembayaranPiutang()
    function tbPembayaranPiutang(){
      $('#tbPembayaranPiutang').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('pembayaran-piutang-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'nm_asuransi', name:'nm_asuransi'},
          {data:'no_kwitansi', name:'no_kwitansi'},
          {data:'tgl_kwitansi', name:'tgl_kwitansi'},
          {data:'name', name:'name'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'jumlah_kwitansi', name:'jumlah_kwitansi'},
          {data:'jenis_pembayaran', name:'jenis_pembayaran'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          // $('td', row).eq(3).html("<a href='/pengiriman-invoice/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Pengiriman Invoice</a>");
          if(myRole == "Finance" || myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
            if(data["is_print"]){
              $('td', row).eq(8).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataPembayaranPiutang('" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><a href='/pembayaran-piutang/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>");
            }else{
              $('td', row).eq(8).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataPembayaranPiutang('" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button>");
            }
            // $('td', row).eq(8).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataPembayaranPiutang('" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('pembayaran-piutang/','" + data["id"] + "','" + encodeURI(data["no_estimasi_approved"]) + "','tbPembayaranPiutang()') title='Delete'><i class='fa fa-trash'></i></button><a href='/pembayaran-piutang/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>");
          }else{
            $('td', row).eq(8).html(data["is_print"] ? "<a href='/pembayaran-piutang/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i></a>" : '');
          }
        }
      });
    }

    function editDataPembayaranPiutang(id){
        $.ajax({
          type: 'GET',
          url: '/pembayaran-piutang/edit/'+id,
          data: {
            _token: "{{ csrf_token() }}",
          },
          dataType: 'JSON',
          success: function(res){
            console.log({
              type: "pembayaran piutang",
              res
            });
            $("#form_1 #btn-submit").text('UPDATE DATA');
            $("#form_1 #key").val(id)
            $('#form-input').show();
            $(".estimation_approved_id").val(res.estimasi.id)
            const noEstimasiApp = $("<option selected='selected'></option>").val(res.estimasi.id).text(res.estimasi.no_estimasi_approved)
            $("#form_1 .selectNoApproved").append(noEstimasiApp).trigger('change').prop("disabled", true)
            $.each(res.estimasi,function(key,value){
              $('#form_1 #'+key).val(value)
            })

            editDataEstimasiService(res.estimasi.no_estimasi_approved)
            editDataEstimasiPart(res.estimasi.no_estimasi_approved)
            getKwitansiInvoice(res.pembayaran_piutang)

            // $('[name=no_spk]').val(res.no_estimasi_approved)
            // $('#no_po').val(res.no_estimasi_approved)
            // getDataSpkService(res.no_estimasi_approved)
            // if(lastURLSegment == "purchase-order"){
            //   getDataPoPart(res.no_estimasi_approved) 
            // }else if(lastURLSegment == "gudang"){
            //   // console.log(res);
            //   getDataPoPart(res.no_estimasi_approved) 
            //   getDataIncomingPart(res.no_estimasi_approved) 
            //   getDataPartOut(res.no_estimasi_approved) 
            // }else if(lastURLSegment == "salvage"){
            //   getDataSalvagePart2(res.no_estimasi_approved) 
            // }else if(lastURLSegment == "pembayaran-piutang"){
            //   editDataEstimasiService(res.no_estimasi_approved)
            //   editDataEstimasiPart(res.no_estimasi_approved)
            //   getKwitansiInvoice(res.no_estimasi_approved)
            // }else{
            //   getDataSpkPart(res.no_estimasi_approved) 
            // }
          }
        });
    }

    tbMaterials()
    function tbMaterials(){
      $('#tbMaterials').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('materials-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'kd_material', name:'kd_material'},
          {data:'nm_material', name:'nm_material'},
          // {data:'harga_material', name:'harga_material'},
          {data:'stock', name:'stock'},
          {data:'id', name:'id'},
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(4).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editData('material/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('material/','" + data["id"] + "','" + encodeURI(data["nm_material"]) + "','tbMaterials()') title='Delete'><i class='fa fa-trash'></i></button>");
        }
      });
    }
    
    tbPoMaterials()
    function tbPoMaterials(){
      $('#tbPoMaterials').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('po-materials-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_po', name:'no_po'},
          {data:'tgl_po', name:'tgl_po'},
          {data:'name', name:'name'},
          {data:'jenis_pembelian', name:'jenis_pembelian'},
          {data:'id', name:'id'},
          {data:'id', name:'id'},
          {data:'id', name:'id'}
      ],
      "fnCreatedRow": function(row, data, index, aData) {
        console.log(data);
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");

          if(myRole == "Finance" || myRole == "Purchasing"){
            $('td', row).eq(5).html(`${data.status == 0 ? '<span>Tolak</span>' : '<span>Setuju</span>'}`);
            $('td', row).eq(6).html(data.status == 0 ? "-" : "<a href='/gudang/po-material/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> PO BAHAN</a>");
          }else{
            $('td', row).eq(5).html(`<select class="form-control" id="status_edit" onchange="editStatusPoMaterial(${data.id},'${data.status}')">
              <option value="tolak" ${data.status==0 ? "selected" : "" }>Tolak
              </option>
              <option value="setuju" ${data.status==1 ? "selected" : "" }>Setuju
              </option>
            </select>`);
            $('td', row).eq(6).html("<a href='/gudang/po-material/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> PO BAHAN</a>");
          }
          if(myRole == "Purchasing" || myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
            $('td', row).eq(7).html("<button class='btn btn-secondary btn-sm mr-2' onclick=editDataPo('gudang/po-material/','" + data["id"] + "') title='Edit'><i class='fa fa-edit'></i></button><button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('gudang/po-material/','" + data["id"] + "','" + encodeURI(data["no_po"]) + "','tbPoMaterials()') title='Delete'><i class='fa fa-trash'></i></button>");
          }else{
            $('td', row).eq(7).html("-");
          }
        }
      });
    }

    function editStatusPoMaterial(id, status){
      $.ajax({
          type: 'POST',
          url: '/gudang/po-material/status/edit/'+id,
          data: {
            
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'POST',
            status
          },
          dataType: 'JSON',
          success: function(res){
            switch (res.msg) {
              case "Success Update":
                eval(tbPoMaterials())
                Toast.fire({
                  icon: 'success',
                  title: 'Update Status Success',
                });
                break;
            }
          },
          error: function (e) {
            switch (e.responseJSON.msg) {
              case "Failed Update":
                Toast.fire({
                  icon: 'error',
                  title: 'Update Data Failed',
                });
                break;
            }
          },
        });
    }

    tbIncomingMaterials()
    function tbIncomingMaterials(){
      $('#tbIncomingMaterials').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('incoming-materials-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_po', name:'no_po'},
          {data:'no_faktur', name:'no_faktur'},
          {data:'tgl_masuk', name:'tgl_masuk'},
          {data:'nm_material', name:'nm_material'},
          {data:'qty', name:'qty'},
          {data:'id', name:'id'}
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(6).html("<button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('gudang/incoming-material/','" + data["id"] + "','" + encodeURI(data["no_po"]) + "','tbIncomingMaterials()') title='Delete'><i class='fa fa-trash'></i></button>");
        }
      });
    }

    tbIncomingParts()
    function tbIncomingParts(){
      $('#tbIncomingParts').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('incoming-part-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_po', name:'no_po'},
          {data:'no_faktur', name:'no_faktur'},
          {data:'tgl_masuk', name:'tgl_masuk'},
          {data:'nm_part', name:'nm_part'},
          {data:'qty', name:'qty'},
          {data:'id', name:'id'}
      ],
      "fnCreatedRow": function(row, data, index, aData) {
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          $('td', row).eq(6).html("<button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('gudang/incoming-part/','" + data["id"] + "','" + encodeURI(data["no_faktur"]) + "','tbIncomingParts()') title='Delete'><i class='fa fa-trash'></i></button>");
        }
      });
    }

    tbMaterialOuts()
    function tbMaterialOuts(){
      $('#tbMaterialOuts').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('material-out-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'tgl_keluar', name:'tgl_keluar'},
          {data:'nm_material', name:'nm_material'},
          {data:'qty', name:'qty'},
          {data:'penerima', name:'penerima'},
          {data:'id', name:'id'},
          {data:'id', name:'id'}
      ],
      "fnCreatedRow": function(row, data, index, aData) {
        // console.log({row, data, index, aData});
        // console.log(data);
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          // $('td', row).eq(4).html("<a href='/gudang/material-out/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Tanda Terima</a>");
          if(myRole == "Gudang" || myRole == "Administrator" || myRole == "Direktur" || myRole == "Manager"){
            $('td', row).eq(7).html(`<input type="checkbox" class="form-control" onclick="editIsDiterimaMaterialOut(${data.id},${data.is_diterima})" ${data.is_diterima && 'checked'}>`);
          }else{
            $('td', row).eq(7).html(`<input type="checkbox" class="form-control" onclick="return false" ${data.is_diterima && 'checked'}>`);
          }
          $('td', row).eq(8).html("<button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('gudang/material-out/','" + data["id"] + "','" + encodeURI(data["no_spk"]) + "','tbMaterialOuts()') title='Delete'><i class='fa fa-trash'></i></button>");
        }
      });
    }

    function editIsDiterimaMaterialOut(id, is_diterima){
       $.ajax({
          type: 'POST',
          url: '/gudang/material-out/edit-is-diterima/'+id,
          data: {
            id:id,
            _token: "{{ csrf_token() }}",
            _method: 'POST',
            status: is_diterima
          },
          dataType: 'JSON',
          success: function(res){
            console.log(res);
            switch (res.msg) {
              case "Update Success":
                console.log("kesini");
                eval(tbMaterialOuts())
                Toast.fire({
                  icon: 'success',
                  title: 'Update Success',
                });
                break;
            }
          },
          error: function (e) {
            switch (e.responseJSON.msg) {
              case "Failed Update":
                Toast.fire({
                  icon: 'error',
                  title: 'Update Data Failed',
                });
                break;
            }
          },
        });
    }

     tbPartOuts()
    function tbPartOuts(){
      $('#tbPartOuts').DataTable({
      order: [ 1, 'desc' ],
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: '{{ route('part-out-table') }}',
      columns:[
          {data:'id', name:'id'},
          {data:'no_spk', name:'no_spk'},
          {data:'no_polisi', name:'no_polisi'},
          {data:'tgl_keluar', name:'tgl_keluar'},
          {data:'nm_part', name:'nm_part'},
          {data:'qty', name:'qty'},
          {data:'penerima', name:'penerima'},
          {data:'id', name:'id'}
      ],
      "fnCreatedRow": function(row, data, index, aData) {
        console.log(data);
          var no = index + 1
          $('td', row).eq(0).html("<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='customCheckbox[" + no + "]' value='option1'><label for='customCheckbox[" + no + "]' class='custom-control-label'>" + no + "</label></div>");
          //  $('td', row).eq(4).html("<a href='/gudang/part-out/print/"+data["id"]+"' target='_blank' class='btn btn-info btn-sm'><i class='fa fa-print'></i> Tanda Terima</a>");
          $('td', row).eq(7).html("<button class='btn btn-danger btn-sm mr-2' onclick=confirmDelete('gudang/part-out/','" + data["id"] + "','" + encodeURI(data["no_spk"]) + "','tbPartOuts()') title='Delete'><i class='fa fa-trash'></i></button>");
        }
      });
    }
  </script>
  @stack('scripts')
</body>

</html>