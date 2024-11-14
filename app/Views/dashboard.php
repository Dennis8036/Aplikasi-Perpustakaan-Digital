                
        
         
            <div class="col-md-12 grid-margin">


<div class="row">
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Total Buku</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-4 order-md-1 order-xl-0"><?= $total_buku; ?></h3>
                    <i class="ti-book icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
            </div>
        </div>
    </div>


            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">TOTAL Koleksi BUku</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $total_koleksi; ?></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Kategori</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $total_kategori; ?></h3>
                    <i class="ti-menu-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Ulasan</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $total_ulasan; ?></h3>
                    <i class="ti-comment icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  
                </div>
              </div>
            </div>
          </div>


          <div class="row">


           <div class="col-md-6 grid-margin stretch-card">
  <div class="card border-bottom-0">
    <div class="card-body pb-0">
      <p class="card-title">Aktivitas Pengguna</p>
      <p class="text-muted font-weight-light">Statistik ini memberikan gambaran mengenai aktivitas pengguna di aplikasi, termasuk jumlah transaksi, buku yang dipinjam, dan feedback yang diterima.</p>
      <div class="d-flex flex-wrap mb-5">
        <div class="mr-5 mt-3">
          <p class="text-muted">Buku Dipinjam</p>
          <h3><?= $total_dipinjam ?></h3> <!-- Ganti dengan data real -->
        </div>
        <div class="mr-5 mt-3">
          <p class="text-muted">Pengguna Baru</p>
          <h3><?= $total_user; ?></h3> <!-- Ganti dengan data real -->
        </div>
        <div class="mr-5 mt-3">
          <p class="text-muted">Buku Ditambahkan</p>
          <h3><?= $total_buku; ?></h3> <!-- Ganti dengan data real -->
        </div>
        <div class="mt-3">
          <p class="text-muted">Feedback Diterima</p>
          <h3><?= $total_ulasan; ?></h3> <!-- Ganti dengan data real -->
        </div> 
      </div>
    </div>
    <canvas id="order-chart" class="w-100"></canvas>
  </div>
</div>

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Pengguna Teraktif</p>
            <p class="text-muted font-weight-light">Statistik ini menunjukkan pengguna yang paling banyak melakukan peminjaman buku dalam periode tertentu.</p>
            
            <div class="table-responsive mt-4">
                <table class="table table-bordered">
                     <thead class="thead-light">
                        <tr>
                            <th>Username</th>
                            <th>Total Peminjaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengguna_teraktif as $pengguna): ?>
                            <tr>
                                <td><?= $pengguna->username ?></td>  <!-- Ganti dengan username -->
                                <td><?= $pengguna->total_peminjaman ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


