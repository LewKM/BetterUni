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

// Sorting and Ranking
arsort($optimasi); // Sorts the $optimasi array in descending order by value

// // Displaying Ranked Results
// $rank = 1;
// foreach ($optimasi as $id_ikm => $score) {
//     echo "Rank $rank: Course ID $id_ikm - Score: $score\n";
//     echo "Course Name: " . $alternatif[$id_ikm][0] . ", Institution: " . $alternatif[$id_ikm][2] . "\n";
//     $rank++;
// }
// ?>


<br />


<div class="container-fluid">
  <div class="col-xl-12 col-lg-10 mx-auto">
    <div class="card shadow-lg mb-4 border-0 rounded-lg overflow-hidden">
      <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mt-2 font-weight-bold">
          <i class="fas fa-chart-line me-2"></i>Course Optimization Analysis
        </h5>
        <span class="badge bg-light text-primary">AI-Powered</span>
      </div>
      <div class="card-body bg-light">
        <div class="table-responsive">
          <table class="table table-hover border-0 text-center">
            <thead>
              <tr class="bg-dark text-white">
                <th class="rounded-start"><i class="fas fa-graduation-cap me-2"></i>Optimized Courses</th>
                <th class="rounded-end"><i class="fas fa-calculator me-2"></i>Optimization Score</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($optimasi as $key => $value): ?>
                <tr class="border-bottom border-light">
                  <td class="font-weight-bold text-primary"> <?php echo $alternatif[$key][0]; ?> </td>
                  <td>
                    <div class="d-flex align-items-center justify-content-center">
                      <div class="progress w-50 me-2" style="height: 8px;">
                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: <?php echo min(100, $value * 100); ?>%" aria-valuenow="<?php echo $value; ?>" aria-valuemin="0" aria-valuemax="1"></div>
                      </div>
                      <span class="text-success font-weight-bold"> <?php echo number_format($value, 6); ?> </span>
                    </div>
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
          
          <div class="optimization-score my-4">
            <div class="d-flex justify-content-center align-items-center">
              <div class="circular-progress me-3">
                <svg width="80" height="80" viewBox="0 0 120 120">
                  <circle cx="60" cy="60" r="54" fill="none" stroke="#e6e6e6" stroke-width="12" />
                  <circle cx="60" cy="60" r="54" fill="none" stroke="#28a745" stroke-width="12" 
                    stroke-dasharray="339.292" stroke-dashoffset="<?php echo 339.292 * (1 - min(1, $optimasi[$index])); ?>" />
                </svg>
                <span class="position-absolute top-50 start-50 translate-middle text-success font-weight-bold">
                  <?php echo number_format($optimasi[$index] * 100, 1); ?>%
                </span>
              </div>
              <div class="score-details text-start">
                <p class="mb-0 text-dark">Optimization Score</p>
                <h5 class="text-danger font-weight-bold"><?php echo $hasil_optimasi; ?></h5>
              </div>
            </div>
          </div>
          
          <p class="lead text-dark">Based on your profile and learning objectives, this course offers the optimal starting point for your educational journey.</p>
          
          <div class="mt-4">
            <a href="#" class="btn btn-gradient-success btn-lg px-4 me-2">
              <i class="fas fa-play-circle me-2"></i>Explore Course
            </a>
            <a href="#" class="btn btn-outline-primary btn-lg px-4">
              <i class="fas fa-info-circle me-2"></i>Course Details
            </a>
          </div>
        </div>
      </div>
      <div class="card-footer bg-white text-center text-muted">
        <small><i class="fas fa-info-circle me-1"></i>Recommendation based on learning pattern analysis and career objective alignment</small>
      </div>
    </div>
  </div>
</div>