<?php 
include_once '../database/koneksi.php';
include_once '../templates/header.php';


?>

<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:100%;">
                <strong>  <h2 style="text-transform: uppercase; text-align:center;">E - Raport </h2>
                </strong>
				</div>
              </div>
              </div>


<div class="container mt-5">
    <div class="row">
      <div class="col-md">
        <div class="card" style="width: 18rem;">
          <div class="card-body" style="text-align:center;">
            <h5 class="card-title text-center">Kelas X</h5>
            <p class="card-text ">Pilih Semester :</p>
            <div class="d-grid gap-2 col-6 mx-auto" style="width:100%;">
            <a href="raport.php?semester=ganjil" class="btn btn-success">Ganjil</a>
            <a href="raport.php?semester=genap" class="btn btn-success">Genap</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="card" style="width: 18rem;">
          <div class="card-body" style="text-align:center;">
          <h5 class="card-title text-center">Kelas XI</h5>
            <p class="card-text ">Pilih Semester :</p>
            <div class="d-grid gap-2 col-6 mx-auto" style="width:100%;">
            <a href="raport.php?semester=ganjil" class="btn btn-success">Ganjil</a>
            <a href="raport.php?semester=genap" class="btn btn-success">Genap</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="card" style="width: 18rem;">
          <div class="card-body" style="text-align:center;">
          <h5 class="card-title text-center">Kelas XII</h5>
            <p class="card-text ">Pilih Semester :</p>
            <div class="d-grid gap-2 col-6 mx-auto" style="width:100%;">
            <a href="raport.php?semester=ganjil" class="btn btn-success">Ganjil</a>
            <a href="raport.php?semester=genap" class="btn btn-success">Genap</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>      

<div class="container mt-3">
  <p style="color: red; text-transform: capitalize;">*) klik sesuai dengan kelas dan semestermu saat ini </p>
</div>
<?php include_once '../templates/footer.php';?>