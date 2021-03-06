@extends('base')

@section('content')
<style>
    form{
        text-align:center;
    }
    .container-name{
        text-align:center;
        font-size:30px;
        margin:50px auto 10px;
    }
    .container-desc{
        text-align:center;
        color: rgb(15,15,15);
        margin:10px;
        font-size:14px;
    }
    .item-img{
        width: 350px;
        height: 350px;
        background-position: center;
        background-clip: content-box;
        background-repeat: no-repeat;
        background-size: contain;
        margin:5px auto;
    }
    .item-btn{
        padding:10px 50px;
        background-color: rgba(19, 19, 255, 0.842);
        color: white;
        border: 0;
        border-radius:10px;
        cursor:pointer;
    }
    .item-btn:active{
        opacity:0.7;
    }
</style>
<form action="#" method="POST">
    @csrf
    <div class="container-name">{{ $product->name }}</div>
    <div class="container-desc">Price: {{ $product->price }}$</div>
    <div class="item-img" style="background-image: url('{{Storage::url($product->image);}}')"></div>
    <div class="container-desc">{{ $product->description }}</div>
    <button class="item-btn" formaction="{{ route('basketAdd', [$product]) }}">Add to basket</button>
</form>
@endsection