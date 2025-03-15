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
    <div class="card shadow-lg mb-4 border-info">
      <div class="card-header bg-info text-white">
        <h5 class="mt-2 font-weight-bold">Calculation of Optimization Values</h5>
      </div>
      <div class="card-body">
        <table class="table table-hover table-bordered text-center">
          <thead class="thead-dark">
            <tr>
              <th>Optimized Courses</th>
              <th>Optimization Value</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($optimasi as $key => $value): ?>
              <tr>
                <td class="font-weight-bold"> <?php echo $alternatif[$key][0]; ?> </td>
                <td class="text-success font-weight-bold"> <?php echo number_format($value, 6); ?> </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="col-xl-12 col-lg-10 mx-auto">
    <div class="card shadow-lg border-success">
      <div class="card-header bg-success text-white">
        <h5 class="mt-2 font-weight-bold">Recommended Course</h5>
      </div>
      <div class="card-body text-center">
        <?php
          arsort($optimasi);
          $index = key($optimasi);
          $hasil_alternatif = $alternatif[$index][0];
          $hasil_optimasi = number_format($optimasi[$index], 6);
        ?>
        <h4 class="text-primary font-weight-bold">✨ Best Course to Start: <span class="text-success"> <?php echo $hasil_alternatif; ?> </span></h4>
        <p class="lead text-dark">This course has the highest optimization value of <b class="text-danger"> <?php echo $hasil_optimasi; ?> </b>, making it the top recommendation for you to begin your learning journey.</p>
        <a href="#" class="btn btn-outline-success btn-lg">Explore Course</a>
      </div>
    </div>
  </div>
</div>