@extends('base')

@section('content')
<style>
    .container-name{
        text-align:center;
        font-size:30px;
        margin:10px;
    }
    .container-desc{
        text-align:center;
        font-size:14px;
        color: rgb(15, 15, 15);
        margin:10px;
    }
    .input-place{
        display:flex; 
        justify-content:space-between;
        width: 350px;
        margin:10px auto;
    }
    .form-label{
        font-weight:bold;
    }
    .form-input{
        width:200px;
        height:20px;
    }
    form{
        text-align:center;
    }
    .form-btn{
        margin:20px auto;
        font-size:16px;
        padding:3px 50px;
        background-color:rgb(34,187,51);
        border-radius:5px;
        border-color:rgb(34,187,51);
        cursor: pointer;
        color:white;
    }
</style>

    <div class="container-name">Confirm your order</div>
    <div class="container-desc">Total cost of order: {{ $order->totalCost() }}$</div>
    <div class="container-desc">Put your name and number, to connect with you:</div>
    <form action="{{ route('orderConfirm') }}" method="POST">
        @csrf
        <div class="input-place">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" placeholder="your name..." class="form-input">
        </div>
        <div class="input-place">
            <label for="number" class="form-label">Your number:</label>
            <input type="text" name="number" id="number" placeholder="your number..." class="form-input">
        </div>
        @guest
        <div class="input-place">
            <label for="number" class="form-label">Your email:</label>
            <input type="text" name="email" id="email" placeholder="your email..." class="form-input">
        </div>
        @endguest
        <button class="form-btn">Confirm</button>
    </form>
@endsection    