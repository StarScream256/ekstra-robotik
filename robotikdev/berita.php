<?php
    $hostname = "localhost";
    $uname = "root";
    $pw = "";
    $dbname = "db_robotik";
    
    $conn = mysqli_connect($hostname, $uname, $pw, $dbname);
    
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    $berita = query("SELECT * FROM tb_berita");
?>

<div class="container">

<?php $i = 1;?>
<?php foreach( $berita as $row ) : ?>

    <div class="card">
      <div class="card__header">
        <!-- <img src="" alt="card__image" class="card__image" width="600"> -->
        <?php echo '<img src="data:image/png;base64,'.base64_encode($row["foto"]).'"/>'; ?>
      </div>
      <div class="card__body">
        <span class="tag tag-blue"><?= $row["kategori"]; ?></span>
        <h4><?= $row["judul"]; ?></h4>
        <p><?= $row["keterangan"]; ?></p>
      </div>
      <div class="card__footer">
        <span class="tag tag-blue"><?= $row["tanggal"]; ?></span>
      </div>
    </div>

    <?php $i++; ?>
     <?php endforeach; ?>

  </div>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap");

*,
*::before,
*::after {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

body {
  font-family: "Quicksand", sans-serif;
  display: grid;
  place-items: center;
  height: 100vh;
  background: #7f7fd5;
  background: linear-gradient(to right, #91eae4, #86a8e7, #7f7fd5);
}

.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  max-width: 1200px;
  margin-block: 2rem;
  gap: 2rem;
}

img {
  max-width: 100%;
  display: block;
  object-fit: cover;
}

.card {
  display: flex;
  flex-direction: column;
  width: clamp(20rem, calc(20rem + 2vw), 22rem);
  overflow: hidden;
  box-shadow: 0 .1rem 1rem rgba(0, 0, 0, 0.1);
  border-radius: 1em;
  background: #ECE9E6;
background: linear-gradient(to right, #FFFFFF, #ECE9E6);

}



.card__body {
  padding: 1rem;
  display: flex;
  flex-direction: column;
  gap: .5rem;
}


.tag {
  align-self: flex-start;
  padding: .25em .75em;
  border-radius: 1em;
  font-size: .75rem;
}

.tag + .tag {
  margin-left: .5em;
}

.tag-blue {
  background: #56CCF2;
background: linear-gradient(to bottom, #2F80ED, #56CCF2);
  color: #fafafa;
}

.tag-red {
  background: #cb2d3e;
background: linear-gradient(to bottom, #ef473a, #cb2d3e);
  color: #fafafa;
}

.card__body h4 {
  font-size: 1.5rem;
  text-transform: capitalize;
}

.card__footer {
  display: flex;
  padding: 1rem;
  margin-top: auto;
}
  </style>