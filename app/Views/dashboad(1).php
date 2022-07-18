<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Truck</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
  <link rel="stylesheet" type="text/css" href="/upload/fontawesome-free-6.1.0-web/css/all.css">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dasboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">ProductsIn</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sparestore</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Invoice</a>
        </li>
      </ul>
      <form class="d-flex">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="ms-auto float-end">
      <a href="" class="fa fa-circle-user fa-1x fa-color"> Logout</a>
    </div>
    
  </div>
      </form>
    </div>
  </div>
</div>
</nav>
  
</head>
<body>




	<div class="container">        
    <h3>Dashboard</h3>
	<div class="cards_wrap">
    
    <a href="/Home/additem">
		<div class="card_item">
			<div class="card_inner">
               
                <i class="fa-solid fa-layer-group fa-3x fa-color"></i>
				<div class="role_name">Recieved Goods</div>	
                <!-- <div class="small-box-footer">Reach before 4PM</div>		 -->
			</div>
            
        
		</div>
        
    </a>
    <a href="/Stock/deliveryNote"> 
		<div class="card_item">
			<div class="card_inner">
                
                <i class="fa-solid fa-layer-group fa-3x fa-color"></i>
				<div class="role_name">Invoice</div>	
                			
			</div>
		</div>
    </a>
    <a href="/Stock/invoice"> 
		<div class="card_item">
			<div class="card_inner">
                
                <i class="fa-solid fa-file-invoice fa-3x fa-color"></i>
				<div class="role_name">Register Users</div>				
			</div>
		</div>
    </a>
    <a href="/Home/stock"> 
		<div class="card_item">
			<div class="card_inner">
                
                <i class="fa-solid fa-layer-group fa-3x fa-color"></i>
				<div class="role_name">Reports</div>				
			</div>
		</div>
    </a>
    <a href=""> 
		<div class="card_item">
			<div class="card_inner">
                
                <i class="fa-solid fa-file-invoice fa-3x fa-color"></i>
				<div class="role_name">Store</div>				
			</div>
		</div>
    </a>
    <a href=""> 
		<div class="card_item">
			<div class="card_inner">
                
                <i class="fa-brands fa-readme fa-3x fa-color"></i>
				<div class="role_name">Coupons/Discount</div>				
			</div>
		</div>
    </a>
		
		
	</div>
</div>  

