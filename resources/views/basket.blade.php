@extends('base', ['file' => 'basket'])

@section('content')
<style>
    .container-name{
        font-size:30px;
        margin-top:50px;
        text-align:center;
    }
    .container-desc{
        text-align:center;
        margin:10px auto;
    }
    .grid-table-head{
        display:grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        font-weight:bold;
        padding:10px;
        border-bottom:2px solid lightgrey;
    }
    .grid-table-body{
        display:grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        padding:10px;
        border-top:1px solid lightgrey;
        border-bottom:1px solid lightgrey;
        background-color:rgb(240, 240, 240);
    }
    .item-img{
        width:40px;
        height:40px;
        background-size: contain;
        background-position:center;
        background-clip: content-box;
        background-repeat: no-repeat;
    }
    .count{
        background-color:rgb(150,150,150);
        color:white;
        border-radius:50%;
        padding:2px 5px;
        font-size:13px;
    }
    .count-dec{
        cursor: pointer;
        margin-left:10px;
        background-color:rgb(187,33,36);
        color:white;
        padding:3px 8px;
        border-top-left-radius:5px;
        border-bottom-left-radius:5px;
        margin-top:auto;margin-bottom:auto;
        border-color:rgb(187,33,36);
    }
    .count-inc{
        cursor: pointer;
        background-color:rgb(34,187,51);
        color:white;
        padding:3px 7px;
        border-top-right-radius:5px;
        border-bottom-right-radius:5px;
        border-color:rgb(34,187,51);
        margin-top:auto;margin-bottom:auto;
    }
    .count-dec:active, .count-inc:active{
        opacity:0.5;
    }
    .grid-table-foot{
        display:grid;
        grid-template-columns: 4fr 1fr;
        padding:10px;
    }
    .order-button{
        margin-top:20px;
        float:right;
        padding:2px 50px;
        font-size:18px;
        background-color:rgb(34,187,51);
        border-radius:5px;
        border-color:rgb(34,187,51);
        cursor: pointer;
        color:white;
    }
    .toItem{
        text-decoration:none;
        color:inherit;
    }
    .toItem:hover{
        text-decoration:underline;
        color:blue;
    }
</style>
@isset($order)
<form action="#" method="GET"> @csrf
    <div class="container-name">Basket</div>
    <div class="container-desc">Ordering</div>
    <div class="grid-table-head">
        <div>Name</div>
        <div>Count</div>
        <div>Price</div>
        <div>Cost</div>
    </div>
    @foreach($order->products as $product)
    <div class="grid-table-body">
        <div style="display:flex;">
            <div class="item-img" style="background-image: url('{{Storage::url($product->image);}}')"></div>
            <div style="margin-top:auto;margin-bottom:auto;"><a href="{{ route('product', $product->code) }}" class="toItem">{{ $product->name }}</a></div>
        </div>
        <div style="display:flex;">
            <div style="display:flex;flex-direction:column;justify-content:center;">
                <div class="count">{{ $product->pivot->count }}</div>
            </div>
            <button class="count-dec" formaction="{{ route('basketRmv', $product->id) }}" formmethod="post">-</button>
            <button class="count-inc" formaction="{{ route('basketAdd', $product->id) }}" formmethod="post">+</button>
        </div>
        <div style="margin-top:auto;margin-bottom:auto;">{{ $product->price }}$</div>
        <div style="margin-top:auto;margin-bottom:auto;">{{ $product->getCost() }}$</div>
    </div>
    @endforeach
    <div class="grid-table-foot">
        <div>Total cost</div>
        <div>{{ $order->totalCost() }}$</div>
    </div>
    <button class="order-button" formaction="/ordering">
        Order
    </button>
</form>
@endisset
@if(!$order)
    <div class="container-name">Emtpy basket</div>
    <div class="container-desc">Choose something...</div>
@endif
@endsection