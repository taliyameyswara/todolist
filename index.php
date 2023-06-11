<?php
  include 'koneksi.php';

  $query = "SELECT *FROM tugas_taliya;";
  $sql = mysqli_query($conn, $query);
  $no = 0;
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

    <!-- Tambah Data Start -->
    <section class="tambah_data">
      <div class="container col-md-6 mt-4">
        <div class="card me-3 ms-3">
          <div class="card-body">
          <form method="POST" action="proses.php"">
            <div class="d-flex flex-row align-items-center">
              <input
                required
                type="text"
                class="form-control"
                id="nama_tugas"
                name="nama_tugas"
                data-bs-toggle="tooltip"
                data-bs-placement="bottom"
                data-bs-title="Tambahkan tugas"
                data-bs-custom-class="custom-tooltip"
              />
              <label for="tugas" class="tugas">Tambah tugas</label>
              <input
                required
                type="date"
                id="deadline"
                name="deadline"
                class="form-control"
                data-toggle="tooltip"
                data-placement="bottom"
                title="Deadline"
                style="width: 3em"
              />
              <button
                value="add"
                type="submit"
                name="add"
                data-toggle="tooltip"
                data-placement="bottom"
                title="Add"
                class="edit"
              >
                <i class="fas fa-plus"></i>
              </button>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Tambah Data End -->

    <!-- Table Start -->
    <section class="table">
      <div class="container col-md-6 mt-5">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table
                class="table table-hover table align-middle"
                style="text-align: center"
              >
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tugas</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  while($result = mysqli_fetch_assoc($sql)){
                ?>
                  <tr>
                    <th scope="row"><?php echo ++$no;?>.</th>
                    <td><?php echo $result['nama_tugas'];?></td>
                    <td><?php echo $result['deadline'];?></td>
                    <td>
                      <!-- edit -->
                      <a
                        href="edit.php?edit=<?php echo $result['id_tugas'];?>"
                        name="edit";
                        type="button"
                        class="btn btn-success edit"
                        ><i class="fa fa-pencil"></i
                      ></a>
                      <!-- delete -->
                      <a href=proses.php?hapus=<?php echo $result['id_tugas'];?> type="button" class="btn btn-danger delete">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
                }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </form>
    </section>
    <!-- Table End -->
  </body>
</html>
