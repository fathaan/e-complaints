<?= $this -> extend('/admin/layout/template') ?>
<?= $this -> Section('content') ?>

        <!-- ISI KONTEN -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
            <div class="mx-auto">
                <h5 class="card-title fw-semibold">Dashboard</h5>
            </div>
        </nav>
      </header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Chart Pengaduan</h5><p>[Contoh]</p>
                  </div>
                </div>
                <div id="chart"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        var breakup = {
          color: "#adb5bd",
          series: [
            <?= $kategoriData['Iphone'] ?? 0; ?>,
            <?= $kategoriData['Android'] ?? 0; ?>
          ],
          labels: ["Iphone", "Android"],
          chart: {
            width: 180,
            type: "donut",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
          },
          plotOptions: {
            pie: {
              startAngle: 0,
              endAngle: 360,
              donut: {
                size: '75%',
              },
            },
          },
          stroke: {
            show: false,
          },

          dataLabels: {
            enabled: false,
          },

          legend: {
            show: false,
          },
          colors: ["#5D87FF", "#ecf2ff"],

          responsive: [
            {
              breakpoint: 991,
              options: {
                chart: {
                  width: 150,
                },
              },
            },
          ],
          tooltip: {
            theme: "dark",
            fillSeriesColor: false,
          },
        };

        var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
        chart.render();
      </script>

<?= $this -> endSection('') ?>