<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="DBoard/css/nucleo-icons.css" rel="stylesheet" />
  <link href="DBoard/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="DBoard/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="DBoard/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

     <div class="container-fluid py-12" id="reports-section">

<ul class="nav nav-tabs" id="myTab" role="tablist">

  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="my-cards-tab" data-bs-toggle="tab" data-bs-target="#my-cards" type="button" role="tab" aria-controls="My Cards" aria-selected="true">My Cards</button>
  </li>

  <li class="nav-item" role="presentation">
    <button class="nav-link" id="my-debits-tab" data-bs-toggle="tab" data-bs-target="#my-debits" type="button" role="tab" aria-controls="My Debits" aria-selected="false">My Debits</button>
  </li>

</ul>

<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="my-cards" role="tabpanel" aria-labelledby="my-cards-tab">
        @include("reports.forms.cards")
  </div>

  <div class="tab-pane fade" id="my-debits" role="tabpanel" aria-labelledby="my-debits--tab">
        @include("reports.forms.debits")

  </div>
</div>

     <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>

              </div>
            </div>

          </div>
        </div>
      </footer>

  <!--   Core JS Files   -->
  <script src="../DBoard/js/core/popper.min.js"></script>
  <script src="../DBoard/js/core/bootstrap.min.js"></script>
  <script src="../DBoard/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../DBoard/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../DBoard/js/plugins/chartjs.min.js"></script>

    </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://unpkg.com/vue@3.2.4/dist/vue.global.js"></script>

 <script type="text/javascript">
    const reportsSection = {
        data () {
            return {
                cards: {
                        start_date: '',
                        end_date: '',
                        custom_amount_operator: '=',
                        custom_amount: '',
                        custom_dates: false,
                        amount: 'all',
                        dates: ''
                    },
                debits: {
                        start_date: '',
                        end_date: '',
                        custom_amount_operator: '=',
                        custom_amount: '',
                        custom_dates: false,
                        amount: 'all',
                        dates: ''
                    },
                users: []
            };
        },
        methods: {
           initiateDatePicker (id) {
                let that = this;
                if(id == "cards" && this.cards.custom_dates){
                   $(function() {
                      $('#cards-dates').daterangepicker({
                        opens: 'left'
                      }, function(start, end, label) {
                        that.cards.start_date = start.format('YYYY-MM-DD');
                        that.cards.end_date = end.format('YYYY-MM-DD');
                      });
                    });
                } else if(id == "debits" && this.debits.custom_dates){
                   $(function() {
                      $('#debits-dates').daterangepicker({
                        opens: 'left'
                      }, function(start, end, label) {
                        that.debits.start_date = start.format('YYYY-MM-DD');
                        that.debits.end_date = end.format('YYYY-MM-DD');
                      });
                    });
                }
           }
        }
    };
    var app = Vue.createApp(reportsSection).mount("#reports-section");
</script>
</x-app-layout>
