<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'betteruni';
$konek = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($konek->connect_error) {
    die('Connect Error ('.$konek->connect_errno.')'.$konek->connect_error);
}

$sql = 'SELECT * FROM moo_kriteria';
$result = $konek->query($sql);
$kriteria = array();

foreach ($result as $row) {
    $kriteria[$row['id_criteria']] = array($row['kriteria'], $row['type'], $row['bobot']);
}

$sql = 'SELECT * FROM courses';
$result = $konek->query($sql);
$alternatif = array();

foreach ($result as $row) {
    $alternatif[$row['id_alternative']] = array(
        $row['coursename'],
        $row['coursecode'],
        $row['institution'],
        $row['cutoffpoints'],
        $row['clustergroup']
    );
}

$sql = 'SELECT * FROM weights ORDER BY id_alternative, id_criteria';
$result = $konek->query($sql);
$sample = array();

foreach ($result as $row) {
    $sample[$row['id_alternative']][$row['id_criteria']] = $row['weights'];
}

$normal = $sample;
foreach ($kriteria as $id_kriteria => $k) {
    $pembagi = 0;
    foreach ($alternatif as $id_ikm => $a) {
        $pembagi += pow($sample[$id_ikm][$id_kriteria], 2);
    }
    foreach ($alternatif as $id_ikm => $a) {
        $normal[$id_ikm][$id_kriteria] /= sqrt($pembagi);
    }
}

$optimasi = array();
foreach ($alternatif as $id_ikm => $a) {
    $optimasi[$id_ikm] = 0;
    foreach ($kriteria as $id_kriteria => $k) {
        $optimasi[$id_ikm] += $normal[$id_ikm][$id_kriteria] * ($k[1] == 'benefit' ? 1 : -1) * $k[2];
    }
}


?>


<br />


<div class="container-fluid">
  <div class="col-xl-12 col-lg-10 mx-auto">
    <div class="card shadow-lg mb-4 border-0 rounded-lg overflow-hidden">
      <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mt-2 font-weight-bold">
          <i class="fas fa-chart-line me-2"></i>Course Optimization Analysis
        </h5>
        <span class="badge bg-light text-primary">MOORA-Powered</span>
      </div>
      <div class="card-body bg-light">
            <div class="table-responsive">
              <table class="table table-hover border-0 text-start ">
                <thead>
                  <tr class="bg-dark">
                    <th class="rounded-start text-white">
                      <i class="fa fa-graduation-cap me-2"></i> Optimized Courses
                    </th>
                    <th class="text-white">
                      <i class="fa fa-chart-bar me-2"></i> Visual Progress
                    </th>
                    <th class=" text-start rounded-end text-white text-center">
                      <i class="fa fa-calculator me-2"></i> Optimization Score
                    </th>
                  </tr>
                </thead>
                <tbody>
          <?php 
            foreach ($optimasi as $key => $value): 
              // Convert score to percentage (out of 10)
              $scoreOutOf10 = $value;
              $progressPercentage = ($scoreOutOf10 / 10) * 100;

              // Color coding based on score
              if ($scoreOutOf10 >= 7) {
                $progressClass = "bg-success"; // High performance
                $textClass = "text-success";
                $borderColor = "#border-success"; // Green border
              } elseif ($scoreOutOf10 >= 5) {
                $progressClass = "bg-primary"; // Moderate performance
                $textClass = "text-primary";
                $borderColor = "border-primary"; // Blue border
              } elseif ($scoreOutOf10 >= 3) {
                $progressClass = "bg-warning"; // Low performance
                $textClass = "text-warning";
                $borderColor = "#border-warning"; // Yellow border
              } else {
                $progressClass = "bg-danger"; // Poor performance
                $textClass = "text-danger";
                $borderColor = "border-danger"; // Red border
              }
          ?>
          <tr class="border-bottom border-light">
            <!-- Optimized Course -->
            <td class="font-weight-bold text-primary">
    <a href="application.php?id_alternative=<?php echo $key; ?>" class="text-decoration-none text-primary">
        <?php echo $alternatif[$key][0]; ?>
    </a>
</td>


            <!-- Visual Progress Bar -->
            <td>
              <div class="progress shadow-sm position-relative  " 
                style="height: 12px; border: 2px solid <?php echo $borderColor; ?>;">
                <div class="progress-bar <?php echo $progressClass; ?>" 
                  role="progressbar"
                  style="width: <?php echo min(100, $progressPercentage); ?>%; transition: width 0.6s ease-in-out; "
                  aria-valuenow="<?php echo $scoreOutOf10; ?>" 
                  aria-valuemin="0" 
                  aria-valuemax="10">
                </div>
              </div>
            </td>

            <!-- Score Display -->
            <td class="text-center">
              <span class="font-weight-bold <?php echo $textClass; ?>">
                <?php echo number_format($scoreOutOf10, 2); ?>
              </span>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>
</div>

    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="col-xl-12 col-lg-10 mx-auto">
    <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
      <div class="card-header bg-gradient-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mt-2 font-weight-bold">
          <i class="fas fa-award me-2"></i>Your Personalized Recommendation
        </h5>
        <span class="badge bg-white text-success">Top Pick</span>
      </div>
      <div class="card-body text-center bg-light">
        <?php
          arsort($optimasi);
          $index = key($optimasi);
          $hasil_alternatif = $alternatif[$index][0];
          $hasil_optimasi = number_format($optimasi[$index], 6);
        ?>
        <div class="recommendation-container p-4">
          <div class="recommendation-badge mb-3">
            <span class="badge bg-primary text-white p-2"><i class="fas fa-robot me-1"></i>AI Recommendation</span>
          </div>
          
          <h4 class="text-primary font-weight-bold">
            <i class="fas fa-star text-warning me-2"></i>Optimal Course Match: 
            <span class="text-gradient-success"> <?php echo $hasil_alternatif; ?> </span>
          </h4>
          
          <?php 
          // Convert the score out of 10 to a percentage
          $scorePercentage = min(100, ($optimasi[$index] / 10) * 100);

          // Adjust the stroke-dashoffset for circular progress (360 is the full circle)
          $strokeOffset = 360 * (1 - ($scorePercentage / 100));
          ?>

          <div class="optimization-score my-4">
            <div class="row align-items-center text-center justify-content-center">
              <!-- Column for Circular Progress -->
              <div class="col-md-4 col-sm-12 d-flex justify-content-center">
                <div class="circular-progress position-relative">
                  <svg width="100" height="100" viewBox="0 0 120 120">
                    <!-- Background Circle -->
                    <circle cx="60" cy="60" r="57.3" fill="none" stroke="#e6e6e6" stroke-width="12" />
                    
                    <!-- Progress Circle -->
                    <circle cx="60" cy="60" r="54" fill="none" stroke="#28a745" stroke-width="12"
                      stroke-dasharray="339.292" 
                      stroke-dashoffset="<?php echo $strokeOffset; ?>" 
                      stroke-linecap="round"
                      style="transition: stroke-dashoffset 0.6s ease-in-out;" />
                  </svg>
              </div>

              <!-- Column for Score Details -->
              <div class="col-md-8 col-sm-12 text-md-start text-center mt-3 mt-md-0">
                <p class="mb-1 text-muted fw-semibold">Optimization Score</p>
                <h5 class="text-danger fw-bold"><?php echo number_format($optimasi[$index], 2); ?> / 10</h5>
              </div>
            </div>
          </div>

          <p class="lead text-dark">Based on your profile and learning objectives, this course offers the optimal starting point for your educational journey.</p>
          
          <!-- <div class="mt-4 text-center">
              <a href="opcourse.php?id_alternative=<?= $id_alternative; ?>" class="btn btn-gradient-success btn-lg px-5">
                  <i class="fa fa-play-circle me-2"></i> Explore Course Details
              </a>
          </div> -->

        </div>
      </div>
      <div class="card-footer bg-white text-center text-muted">
        <small><i class="fa fa-info-circle me-1"></i>Recommendation based on learning pattern analysis and career objective alignment</small>
      </div>
    </div>
  </div>
</div>

<style>
.bg-gradient-success {
  background: linear-gradient(45deg, #11998e, #38ef7d);
}

.bg-dark {
  background: #212529 !important;
}

.progress {
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 10px;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.progress-bar {
  transition: width 1s ease-in-out;
  border-radius: 10px;
  position: relative;
  overflow: hidden;
}

.progress-bar::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(
    90deg,
    rgba(255, 255, 255, 0) 25%,
    rgba(255, 255, 255, 0.15) 50%,
    rgba(255, 255, 255, 0) 75%
  );
  animation: shine 1.5s infinite;
}

@keyframes shine {
  0% {
    left: -100%;
  }
  100% {
    left: 100%;
  }
}

.table {
  border-collapse: separate;
  border-spacing: 0;
}

.table th, .table td {
  padding: 1rem;
  vertical-align: middle;
}

.rounded-start {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
}

.rounded-end {
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
}
</style>