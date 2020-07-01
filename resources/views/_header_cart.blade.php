<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" >
	    <div class="container">
		      <a class="navbar-brand" href={{url('/')}} style="color:#FFF176"><span class="flaticon-pizza-1 mr-1" style="color:#FFF176"></span>Pizza<br><small>Delicous</small></a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="oi oi-menu"></span> Menu
		      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href={{url('/')}} class="nav-link">Home</a></li>
	          <li class="nav-item"><a href={{url('/')}} class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href={{url('/')}} class="nav-link">Services</a></li>
	          <li class="nav-item"><a href={{url('/')}} class="nav-link">About</a></li>
			  <li class="nav-item" id="cont" >
                @include('cartView')
              </li>
			  
	        </ul>
          </div>
          
		</div>
</nav>
    <!-- END nav -->
