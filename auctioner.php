<?php

require_once("config.php");

if(isset($_POST['auctioner'])){

    // filter data yang diinputkan
    $id_auctioner = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $no_ktp = filter_input(INPUT_POST, 'noKTP', FILTER_SANITIZE_STRING);
    $nama_lengkap = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $emailAuctioner = filter_input(INPUT_POST, 'email_auctioner', FILTER_VALIDATE_EMAIL);
    $adress_auctioner = filter_input(INPUT_POST, 'alamat_auctioner', FILTER_SANITIZE_STRING);
    $phone_number = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING);
   
    $no_ATM = filter_input(INPUT_POST, 'noATM', FILTER_SANITIZE_STRING);
    
    
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    


    // menyiapkan query
    $sql = "INSERT INTO auctioner (ID_AUCTIONER, NO_KTP, NAMA_AUCTIONER,EMAIL_AUCTIONER, ALAMAT_AUCTIONER, NO_HP_AUCTIONER, NO_ATM_AUCTIONER, PASSWORD_AUCTIONER) 
            VALUES (:username, :noKTP, :fullname, :email_auctioner, :alamat_auctioner, :phoneNumber, :noATM, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $id_auctioner,
        ":noKTP" => $no_ktp,
        ":fullname" => $nama_lengkap,
        ":email_auctioner" => $emailAuctioner,
        ":alamat_auctioner" => $adress_auctioner,
        ":phoneNumber" => $phone_number,
        ":noATM" => $no_ATM,
        ":password" =>$password
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login

    if($saved) header("Location: login_bidder.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   

    
    <style>

body {
    color: #fff;
    background: url('lelang.png');
    background-size: cover;     /* Tambahkan baris berikut */
}
.register{
    
    margin-top: 3%;
    padding: 3%;

    
}
.register-left{
    text-align: center;
    color:#000000;
    margin-top: 2%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>
</head>
<body>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search Thread" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php?page=home">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=about">About</a>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action Figure</a>
                        <a class="dropdown-item" href="#">Vape</a>
                        <a class="dropdown-item" href="#">Rare Item</a>
                        <a class="dropdown-item" href="#">limited Item</a>
                        <a class="dropdown-item" href="#">Kendaraan</a>
                        <a class="dropdown-item" href="#">Vape</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=register">Contact</a>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Register
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?page=register">Bidders</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">auctioner</a>
                    </div>
                </li>
          </ul>
        </div>

      </div>
    </nav>
    

<form action="" method="POST">
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from earning your own money!</p>
                        <input type="submit" name="" value="Login"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="register.php" role="tab" aria-controls="home" aria-selected="true">BIDDER</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="auctioner.php" role="tab" aria-controls="profile" aria-selected="false">AUCTIONER</a>
                            </li>
                        </ul>
                       
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Apply as a Hirer</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="username"class="form-control" placeholder="Username*" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="noKTP" class="form-control" placeholder="no KTP *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="fullname" class="form-control" placeholder="Full Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email_auctioner" class="form-control" placeholder="Email *" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="alamat_auctioner" class="form-control" placeholder="Adress *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phoneNumber" maxlength="12" minlength="11" class="form-control" placeholder="Phone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="noATM" class="form-control" placeholder="no ATM *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="`password *" value="" />
                                        </div>
                                        <input type="submit" name="auctioner" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</form>

</body>
</html>
