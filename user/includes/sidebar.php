<style>
  .sidebar{
    background-color: #027dc5;
    position: relative;
  }
  .navbar-brand{
    
    font-size:40px;
    font-family: 'Shrikhand', cursive;
  }
  img{
    width: 60px;
    height: 60px;
    margin-right: 10px;
    margin-left: 10px;
  }
  .offcanvas{
    background-color: #e8f8f8;
    font-family: 'Kanit', sans-serif;
  }
  #offcanvasRightLabel{
    font-size: 50px;
    padding: 10px;
  }
  .offcanvas-body{
    font-size:25px;
  }
  .list-group-item{
    background-color: #e8f8f8;
  }
</style>

<nav class="sidebar navbar navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../../assets/images/logo.png">
      DatAqua
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">DatAqua</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="list-group list-group-flush">
          <a href="../dashboard" class="list-group-item list-group-item-action">Dashboard</a>
          <a href="../options/calculations.php" class="list-group-item list-group-item-action">ROI Calculator</a>
          <a href="../options/user-pref.php" class="list-group-item list-group-item-action">User Settings</a>
          <a href="../../logout.php" class="list-group-item list-group-item-action">Logout</a>
        </div>
    </div>
  </div>
</nav>