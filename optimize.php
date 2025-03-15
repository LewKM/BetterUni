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

// Displaying Ranked Results
$rank = 1;
foreach ($optimasi as $id_ikm => $score) {
    echo "Rank $rank: Course ID $id_ikm - Score: $score\n";
    echo "Course Name: " . $alternatif[$id_ikm][0] . ", Institution: " . $alternatif[$id_ikm][2] . "\n";
    $rank++;
}
?>


<br />

<div class="container-fluid">
  <div class="col-xl-12 col-lg-8">
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-6 col-xl-6">
            <h5 class="mt-2 font-weight text-info"> <b> Alternative Value Capture </b></h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table border="border-left-info" class="display table table-bordered" width="100%" cellspacing="0">
          <thead align="center">
            <tr>
              <th>Courses</th>
              <?php
                  foreach ($kriteria as $key => $value) {
                  echo "<th>".$value[0]."</th>";
                }
                ?>
            </tr>
          </thead>
          <tbody align="center">
            <?php
              foreach ($sample as $key => $value) {
                echo "<tr>";
                echo "<td>".$alternatif[$key][0]."</td>";
              for ($i=1; $i <= count($value) ; $i++) {
                echo "<td>".$value[$i]."</td>";
                }
                echo "</tr>";
              }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="col-xl-12 col-lg-8">
    <div class="card shadow mb-4">
      <div class="card-header bg-info text-white">
        <h5 class="mt-2 font-weight-bold">Creating a NORMALIZATION Matrix</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th>Courses</th>
                <?php foreach ($kriteria as $key => $value): ?>
                  <th><?= htmlspecialchars($value[0]) ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($normal as $key => $value): ?>
                <tr>
                  <td class="font-weight-bold"><?= htmlspecialchars($alternatif[$key][0]) ?></td>
                  <?php for ($i = 1; $i <= count($value); $i++): ?>
                    <td><?= number_format($value[$i], 5) ?></td>
                  <?php endfor; ?>
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
  <div class="col-xl-12 col-lg-8">
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-6 col-xl-6">
            <h5 class="mt-2 font-weight text-info"> <b> Calculation of optimization values </b></h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table border="border-left-info" class="display table table-bordered" width="100%" cellspacing="0">
          <thead align="center">
            <tr>
              <th>Optimized Courses</th>
              <th>Optimization Value</th>
            </tr>
          </thead>
          <tbody align="center">
            <?php
              foreach ($optimasi as $key => $value) {
                echo "<tr>";
                echo "<td>".$alternatif[$key][0]."</td>";
                $angka_format = number_format($value,6);
                echo "<td>" .$angka_format. "</td>";
                echo "</tr>";
              }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="col-xl-12 col-lg-8">
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-6 col-xl-6">
            <h5 class="mt-2 font-weight text-info"> <b> Recommended Courses </b></h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <?php
        arsort($optimasi);
        $index = key($optimasi);
        $hasil_alternatif = $alternatif[$index][0];
        $hasil_optimasi = number_format($optimasi[$index],6);

        echo " The result is an alternative <b><em>".$hasil_alternatif."</em></b> ";
        echo " with value <b><em>".$hasil_optimasi."</em></b> selected to be prioritized to get help";
        echo ""
        ?>
      </div>
    </div>
  </div>
</div>