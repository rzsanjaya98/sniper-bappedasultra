<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?php echo $page_name ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Admin</a></li>
            <li class="breadcrumb-item active"><?php echo $page_name ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $kategori[0]['count']; ?></h3>

              <p><?php echo $kategori[0]['nama_kategori']; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-book"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $kategori[1]['count']; ?><sup style="font-size: 20px"></sup></h3>

              <p><?php echo $kategori[1]['nama_kategori']; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-medkit"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box" style="background-color: purple;">
            <div class="inner" style="color: white;">
              <h3><?php echo $kategori[2]['count']; ?><sup style="font-size: 20px"></sup></h3>

              <p><?php echo $kategori[2]['nama_kategori']; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="#" class="small-box-footer" style="color: white;">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php echo $kategori[3]['count']; ?><sup style="font-size: 20px"></sup></h3>

              <p><?php echo $kategori[3]['nama_kategori']; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-heart"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box" style="background-color: orange;">
            <div class="inner" style="color: white;">
              <h3><?php echo $kategori[4]['count']; ?><sup style="font-size: 20px"></sup></h3>

              <p><?php echo $kategori[4]['nama_kategori']; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer" style="color: white;">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div>

    <!-- ./col -->
    <!-- <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>

          <p>Tidak diterima</p>
        </div>
        <div class="icon">
          <i class="fa fa-hand-paper-o"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div> -->
    <!-- ./col -->
</div>

</section>
<!-- /.content -->
</div>