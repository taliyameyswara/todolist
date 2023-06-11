<?php
 include 'koneksi.php';
$nama_tugas='';
$deadline = '';

if(isset($_GET['edit'])){
   $id = $_GET['edit'];

   $query = "SELECT * FROM  tugas_taliya WHERE id_tugas = '$id';";
   $sql = mysqli_query($conn,$query);

   $result = mysqli_fetch_assoc($sql);

   $nama_tugas = $result['nama_tugas'];
   $deadline = $result['deadline'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="To do list Website" />
    <meta name="author" content="Taliya Meyswara" />
    <title>ToDoList</title>
    <!-- CSS File Link -->
    <link rel="stylesheet" href="style.css" />
    <!-- Font awesome link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    <!-- Fonts Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <!-- CSS Bootstrap Link -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <!-- JS Bootstrap Link -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    >
      //   $(document).ready(function(){
      //   $('[data-toggle="tooltip"]').tooltip();
      // });
    </script>
  </head>
  <body style="background-color: #3aafa9">
    <!-- Judul Start -->
    <section class="judul">
      <div class="container mt-5">
        <p class="h1 text-center mt-3 pb-3 text-dark">
          ToDoList
          <i class="fas fa-list-check fa-xs ms-1"></i>
        </p>
      </div>
    </section>
    <!-- Judul End -->

    <!-- Edit Data Start -->
    <section class="edit_data">
      <div class="container col-md-6 mt-4">
        <div class="card me-3 ms-3">
          <div class="card-body">
            <div class="card-header p-3">Edit Tugas</div>
            <div class="card-body p-4">
              <!-- Start Form -->
              <form method="POST" action="proses.php">
              <input type="hidden" value="<?php echo $id;?>" name="id_tugas">
                <div class="mb-3">
                  <label class="form-label">Tugas</label>
                  <input type="text" class="form-control" value="<?php echo $nama_tugas;?>" name="nama_tugas"/>
                </div>
                <div class="mb-3">
                  <label class="form-label">Deadline</label>
                  <input type="date" class="form-control" value="<?php echo $deadline;?>" name="deadline" />
                </div>
                <!-- proses -->
                <?php
              if (isset($_GET['edit'])) {
              ?>
                <button
                  type="submit"
                  class="btn btn-success mt-3 simpan"
                  name="edit"
                  value="edit"
                >
                  <i class="fa fa-floppy-disk"></i>
                </button>
                <?php
              }
              ?>
                <a
                  href="index.php"
                  type="button"
                  class="btn btn-success mt-3 simpan"
                >
                  <i class="fa fa-reply"></i>
                </a>
              </form>
              <!-- End Form -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Edit Data End -->
  </body>
</html>
