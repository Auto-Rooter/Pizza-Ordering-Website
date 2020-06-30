@extends('layout')

@section('content')
    <form action="{{ url('/confirm') }}" method="post" enctype="multipart/form-data">
    @csrf
    
        <div class="form-group text-left">
           <b><label >Your Total Cost (Delivery Fee included):   </label> </b>
           <b> <span> {{ session('totalp') ." " }}$ / {{ currency(session('totalp'), 'USD', 'EUR') }} </span>  </b>
        </div>


        <div class="form-group text-left">
            <label for="phonenumber">Phone Number</label>
            <input type="phonenumber" id="phonenumber" name="phonenumber" class="form-control" placeholder="Enter your Phone number" required>
        </div>
        

        <div class="form-group text-left">
            <label For="fullname">Full Name</label>
            <div class="FullName" id="fullname">
                <input type="name" class="form-control firstName mr-3" name="firstName" placeholder="First Name" required/>
                <input type="name" class="form-control LastName mr-3" name="lastName" placeholder="Last Name" required/>
            </div>
        </div>

        <div class="form-group text-left">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Email" required>
        </div>


        <div class="form-group text-left">
            <label for="address">Address</label>
            <input type="address" name="address" class="form-control" placeholder="Enter your home address (floor, door number)" required>
        </div>

        <div class="form-group text-left">
            <label for="payment">Payment Type :</label>

            <div class="radio" name="cash">
                 <label><input type="radio" name="payment" value="1" checked>  Cash</label>
            </div>

            <div class="radio" name="card">
                 <label><input type="radio" name="payment" value="0" >  Card</label>
            </div>

        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection