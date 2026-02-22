@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<style>
    .products-main-layout {
        display: flex;
        gap: 30px;
        padding: 20px;
    }

    .products-mogitate {
        font-size: 20px;
        font-weight: bold;
        color: #000000;
    }

    .products-mogitate_heading {
        font-size: 25px;
        font-weight: bold;
        margin-left: 20px;
    }

    .products-mogitate-button {
        display: flex;
        justify-content: flex-end;
        width: 100%;
    }

    .products-mogitate-button-register {
        background-color: #ffa600;
        color: #000000;
        width: 115px;
        height: 45px;
        border: none;
        padding: 8px 12px;
        font-size: 14px;
        margin-right: 40px;
        margin-top: 35px;
        border-radius: 4px;
    }

    .products-mogitate_inner {
        width: 20%;
    }

    .products-mogitate_form {
        margin-left: 10px;
        margin-bottom: 20px;
        margin-top: 20px;
        margin-left: 20px;
    }

    .products-mogitate_search-input {
        width: 250px;
        height: 45px;
        padding: 8px;
        border: 1px solid #cccccc;
        border-radius: 30px;
        display: flex;
        justify-content: flex-start;
    }

    .products-mogitate_search-button {
        background-color: #ffd000;
        color: #000000;
        border: none;
        text-align: center;
        width: 250px;
        height: 45px;
        padding: 8px 12px;
        font-size: 14px;
        margin-top: 10px;
        border-radius: 6px;
    }

    .products-mogitate_search-price {
        font-weight: bold;
        margin-top: 20px;
    }

    .products-mogitate_search-price_label {
        margin-right: 10px;
        margin-bottom: 5px;
        font-size: 18px;
        display: flex;
    }

    .products-mogitate_search-price-select {
        padding: 8px;
        border: 1px solid #cccccc;
        border-radius: 2px;
        width: 250px;
        height: 45px;
    }

    .sort-modal {
        margin-top: 8px;
        margin-left: 19px;
        padding: 8px 12px;
        background: #ffffff;
        border: 2px solid #ffd000;
        display: flex;
        align-items: center;
        gap: 8px;
        width: fit-content;
        font-size: 14px;
        display: none;
        border-radius: 20px;
    }

    .sort-close {
        background: none;
        border: none;
        font-size: 16px;
        cursor: pointer;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px 0px;
        margin-top: 10px;
    }

    .product-container {
        display: flex;
        flex-direction: column;
        background: none;
        border: none;
    }

    .product-name-price {

        flex-direction: row;
        font-size: 23px;
        color: #000000;
        margin-top: 10px;
        text-align: center;
    }

    .detail-product-button {
        background: none;
        text-decoration: none;
        background-color: #ffffff;
        box-shadow: 2px 1px 1px;
        width: 350px;
        height: 295px;
        border-radius: 5px;
        border: none;
        text-align: center;
        margin-left: 30px;
    }

    .product-image {
        width: 344px;
        height: 248px;
        object-fit: cover;
        margin: 0 auto;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    svg.w-5.h-5 {
        width: 30px;
        height: 30px;
    }
</style>
@endsection

@section('content')
<div class="products-mogitate-button">
    <button type="button" class="products-mogitate-button-register" onclick="location.href='/products/register'" value="register-button" />+商品を追加</button>
</div>

<div class="products-main-layout">
    <div class="products-mogitate">
        <h1 class="products-mogitate_heading">商品一覧</h1>

        <form class="products-mogitate_form" action="/products/search" method="get">
            @csrf
            <div class="products-mogitate_search">
                <input type="search" class="products-mogitate_search-input" name="search" placeholder="商品名で検索" value="{{ request('search') }}" />
                <button type="submit" class="products-mogitate_search-button" onclick="location.href='/products/search'">検索</button>
            </div>
            <div class="products-mogitate_search-price">
                <label class="products-mogitate_search-price_label" for="search-price">価格順で表示</label>
                <select class="products-mogitate_search-price-select" name="sort" onchange="this.form.submit()">
                    <option value="">価格で並び替え</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>高い順に表示</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>低い順に表示</option>
                </select>
            </div>
        </form>
        <div id="sort-modal" class="sort-modal">
            <span id="sort-text"></span>
            <button id="sort-close" class="sort-close">✕</button>
        </div>
    </div>

    <div class="products-grid">
        @foreach ($products as $product)
        <form action="/products/detail/{{ $product->id }}" method="get" enctype="multipart/form-data">
            @csrf
            <button class="detail-product-button" type="submit">
                <div class="product-container">
                    <div class="products-image">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像" class="product-image">
                    </div>
                    <div class="products-info">
                        <div class="product-name-price">
                            {{ $product->name . '　　¥'. $product->price  }}
                        </div>
                    </div>
                </div>
            </button>
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="hidden" name="image" value="{{ $product->image }}">
            <input type="hidden" name="description" value="{{ $product->description }}">
            @foreach ($product->seasons as $season)
            <input type="hidden" name="seasons" value="{{ $season->id }}">
            @endforeach
        </form>
        @endforeach
        {{ $products->appends(request()->query())->links() }}
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const modal = document.getElementById('sort-modal');
        const text = document.getElementById('sort-text');
        const close = document.getElementById('sort-close');

        // ① ページ遷移後、sort が指定されていたらモーダルを表示
        @if(request('sort') === 'asc')
        modal.style.display = 'flex';
        text.textContent = '低い順に表示';
        @elseif(request('sort') === 'desc')
        modal.style.display = 'flex';
        text.textContent = '高い順に表示';
        @endif

        close.addEventListener('click', function() 
       { 
        const params = new URLSearchParams(window.location.search); 
        // sort を削除（並び替え解除） 
        params.delete('sort'); 
        // 新しいURLを作成 
        const newUrl = window.location.pathname + '?' + params.toString(); 
        // ページ遷移 
        window.location.href = newUrl; 
       });
    });
</script>
@endsection