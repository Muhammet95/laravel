@extends('base', ['file' => 'index'])

@section('content')
<style>
    .container-name{
        margin: 50px 0 10px;
        font-size: 40px;
        text-align: center;
    }
    .products{
        display: flex;
        flex-wrap: wrap;
    }
    .item{
        width: 230px;
        margin: 10px 15px;
        border: 1px solid lightgrey;
        border-radius: 7px;
        text-align: center;
    }
    .item-img{
        margin: 5px auto;
        width: 200px;
        height: 200px;
        background-position: center;
        background-clip: content-box;
        background-repeat: no-repeat;
        background-size: contain;
    }
    .item-name{
        font-size: 25px;
        margin: 5px auto;
    }
    .item-price{
        margin: 5px auto;
    }
    button{
        width: 75px;
        height: 30px;
        margin: 5px auto;
        border:1px solid lightgrey;
        border-radius: 5px;
        cursor: pointer;
    }
    button:active{
        opacity: 0.5;
    }
    .to-basket{
        background-color: rgba(19, 19, 255, 0.842);
        color: white;
        border: 0;
    }
    .about{
        background-color: white;
        color: rgb(15,15,15);
    }
    nav{
        margin:20px auto;
        width:200px;
        display:flex;
        justify-content:space-around;
        text-align:center;
    }
    nav a{
        background:rgba(19, 19, 255, 0.842);
        color:white;
        border-radius:5px;
        width:80px;
        padding:2px;
    }
    nav span{
        background:lightgrey;
        color:rgb(15,15,15);
        border-radius:5px;
        width:80px;
        padding:2px;
    }
</style>
<form action="#" method="GET"> @csrf
    <div class="container-name">All products</div>
    <div class="products">
        @foreach($products as $product)
            @include('card')
        @endforeach
        
    </div>
    {{ $products->links() }}
</form>
@endsection