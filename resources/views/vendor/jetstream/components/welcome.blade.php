<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../DBoard/img/apple-icon.png">
  <link rel="icon" type="image/png" href="DBoard/img/favicon.png">
  <title>
    Vartafrica Admin Dashboard 
  </title>
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
</head>

<body class="g-sidenav-show  bg-gray-100">

        
    <div class="container-fluid py-4" >
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Balance</p>
                    <h5 class="font-weight-bolder mb-0">
                    UGX{{ number_format(auth()->user()->balance) }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Used Cards</p>
                    <h5 class="font-weight-bolder mb-0">
                    UGX{{ number_format(App\Models\Card::where(["is_used" => true, 'used_by' => Auth::id()])->sum('amount')) }} 
                      ({{ number_format(App\Models\Card::where(["is_used" => true, 'used_by' =>  Auth::id()])->count()) }})
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Deductions</p>
                    <h5 class="font-weight-bolder mb-0">
                    UGX{{ number_format(App\Models\UserDebit::where("user_id", auth()->user()->id)->sum('amount')) }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      
        
        <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Enter Scratch Card Number</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-6 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <img class="w-10 me-3 mb-0" src="DBoard/img/pincode.png" alt="logo">
                        <div class="mb-0" style="width: 50%;">
                          <input type="text" id="card_number" placeholder="Enter pin here" maxlength="19" style="text-transform:uppercase; width: 100% !important;"></div>
                          <button class="btn btn-primary mb-0 ml-3" id="charge-card">Charge</button>
                      </div>
                      <div class="alert mt-2" id="card-status" style="display:none;"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>





      </div>
      <div class="row my-4">
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>My Scratched Cards (10)</h6>
                </div>
                
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Serial</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach(App\Models\Card::select("amount", "used_at", "serial")->where(["is_used" => true, "used_by" => auth()->id()])->orderBy("used_at", "DESC")->take(10)->get() as $card)
                    <tr>
                      <td>
                        <div class="avatar-group mt-2">
                          <a>{{ implode("-", str_split($card->serial, 4)) }}</a>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> {{ $card->used_at }} </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> UGX {{ number_format($card->amount) }} </span>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-6 text-end">
                      <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Report</a>
                    </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>My Latest Debits (10)</h6>
                </div>
                
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(App\Models\UserDebit::select("user_debits.amount", "user_debits.created_at")->where("user_debits.user_id", auth()->user()->id)->orderBy("user_debits.created_at", "DESC")->take(10)->get() as $debit)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> {{ $debit->created_at }} </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> UGX {{ number_format($debit->amount) }} </span>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-6 text-end">
                      <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Report</a>
                    </div>
          </div>
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
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="../DBoard/js/core/popper.min.js"></script>
  <script src="../DBoard/js/core/bootstrap.min.js"></script>
  <script src="../DBoard/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../DBoard/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../DBoard/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../DBoard/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
          <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
          </script>
    <script type="text/javascript">
      $('#card_number').keyup(function() {
        var card_value = $(this).val().split("-").join(""); // remove hyphens
        if (card_value.length > 0) {
          card_value = card_value.match(new RegExp('.{1,4}', 'g')).join("-");
        }
        $(this).val(card_value);
      });

      $("#charge-card").on("click", function () {
        $("#card-status").removeClass("alert-danger").removeClass("alert-success").text("").hide();
        var card = $('#card_number').val().split("-").join("");
        if(card.length < 16){
          $("#card-status").addClass("alert-danger").text("Card length must be 16 alphabetical").show();
        } else {
          $.ajax({
                url: "{{ route("user.charge_card") }}",
                type: 'post',
                data: {serial: card},
                success: function(data) {
                   if (data.success == false)
                       $("#card-status").addClass("alert-danger").text(data.message).show();
                   $("#card-status").addClass("alert-success").text(data.message).show();
                   setTimeout(function(){
                       window.location.reload(1);
                    }, 3000);
                }
          });
        }
      });
    </script>
</body>

</html>