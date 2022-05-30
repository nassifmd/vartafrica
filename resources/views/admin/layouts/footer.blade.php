<footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © {{ date("Y") }}
              </div>
            </div>

          </div>
        </div>
</footer>
</main>
  <!--   Core JS Files   -->
  <script src="{{ asset("DBoard/js/core/popper.min.js") }}"></script>
  <script src="{{ asset("DBoard/js/core/bootstrap.min.js") }}"></script>
  <script src="{{ asset("DBoard/js/plugins/perfect-scrollbar.min.js") }}"></script>
  <script src="{{ asset("DBoard/js/plugins/smooth-scrollbar.min.js") }}"></script>
 <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset("DBoard/js/soft-ui-dashboard.min.js?v=1.0.3") }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
  </script>
  @if($loadVUE ?? false)
    <script src="https://unpkg.com/vue@3.2.4/dist/vue.global.js"></script>
  @endif
  @if($loadAxios ?? false)
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  @endif
  @if($loadDataTable ?? false)
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
  @endif
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @yield("js")
