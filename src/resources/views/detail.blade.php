@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<style>
    .detail-mogitate_name {
        margin-top: 100px;
        margin-left: 340px;
    }

    .detail-mogitate_input-image {
        margin-left: 340px;
        margin-top: 15px;
        margin-bottom: 5px;
    }

    .detail-mogitate_label {
        margin-bottom: 10px;
        margin-left: 800px;
    }

    .detail-mogitate_label-description {
        margin-bottom: 10px;
        margin-left: 350px;
    }

    .detail-mogitate_input {
        width: 400px;
        height: 50px;
        margin-top: 10px;
        margin-bottom: 15px;
        border: 2px solid;
        border-color: #e7e7e7;
        border-radius: 5px;
        margin-left: 800px;
        display: flex;
    }

    .detail-mogitate_seasons-option {
        margin-left: 800px;
        margin-top: 15px;
        margin-bottom: 30px;
    }

    .detail-mogitate_seasons-input {
        border-radius: 10px;
        gap: 15px;
        font-size: 15px;
        margin-top: 10px;
    }

    .detail-mogitate_seasons-input-checkbox {
        border-radius: 10px;
        font-size: 15px;
        padding: 8px 12px;
    }

    .detail-mogitate_seasons-text {
        margin-right: 20px;
    }

    .detail-mogitate_textarea {
        width: 850px;
        height: 150px;
        border: 2px solid;
        border-color: #e7e7e7;
        border-radius: 7px;
        margin-top: 10px;
        margin-left: 350px;
        display: flex;
    }

    .detail-mogitate_error-image {
        color: #ff0000;
        font-size: 15px;
        margin-bottom: 10px;
        margin-left: 345px;
    }

    .detail-mogitate_error-description {
        color: #ff0000;
        font-size: 15px;
        margin-bottom: 25px;
        margin-left: 350px;
    }

    .detail-mogitate_error {
        color: #ff0000;
        font-size: 15px;
        margin-bottom: 25px;
        margin-left: 800px;
    }

    .detail-mogitate_button-back {
        background-color: #cccccc;
        color: #000000;
        border: none;
        width: 175px;
        padding: 15px;
        text-align: center;
        font-size: 14px;
        border-radius: 4px;
        margin-right: 10px;
        margin-left: 500px;
        margin-bottom: 20px;
    }

    .detail-mogitate_button-update {
        background-color: #ffd000;
        color: #000000;
        width: 175px;
        padding: 15px;
        text-align: center;
        border: none;
        font-size: 14px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .delete-mogitate_button {
        position: fixed;
        /* 画面右下 */
        right: 24px;
        bottom: 24px;
        background: #fff;
        border: none;
        color: #e53935;
        border-radius: 50%;
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .delete-mogitate_button:hover {
        background: #e53935;
        color: #fff;
    }
</style>
@endsection

@section('content')
<div class="detail-mogitate">
    <div class="detail-mogitate_inner">
        <form class="detail-mogitate_form" action="/products/{{ $product->id }}/update" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="detail-mogitate_name">商品一覧 > {{ $product->name }}</div>
            @if ($product->image)
            <div class="detail-mogitate_image">
                <input type="file" class="detail-mogitate_input-image" name="image" id="image" value="{{ $product->image }}" />
                <img class="detail-mogitate_image-file" id="preview" src="{{ asset('storage/' . $product->image) }}" style="display: flex; width:300px; height:180px; object-fit:cover; margin-left: 330px; margin-bottom: 30px;">
                @endif

                <p class="detail-mogitate_error-image">
                    @error('image')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="detail-mogitate_group">
                <span class="detail-mogitate_label" for="name">商品名</span>
                <input type="text" class="detail-mogitate_input" name="name" id="name" placeholder="商品名を入力" value="{{ $product->name }}" />
                <p class="detail-mogitate_error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="detail-mogitate_group">
                <span class="detail-mogitate_label" for="price">値段</span>
                <input type="text" class="detail-mogitate_input" name="price" id="price" placeholder="値段を入力" value="{{ $product->price }}" />
                <p class="detail-mogitate_error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="detail-mogitate_group">
                <span class="detail-mogitate_label" for="seasons">季節</span>
            </div>
            <div class=" detail-mogitate_seasons-input">
                <div class="detail-mogitate_seasons-option">
                    @php
                    $selectedSeasonIds = $product->seasons->pluck('id')->toArray();
                    @endphp

                    @foreach ($seasons as $season)
                    <label class="detail-mogitate_seasons-label">
                        <input type="checkbox"
                            name="seasons[]"
                            value="{{ $season->id }}"
                            @if(in_array($season->id, $selectedSeasonIds)) checked @endif>
                        <span class="detail-mogitate_seasons-text">{{ $season->name }}</span>
                    </label>
                    @endforeach
                </div>
                <p class="detail-mogitate_error">
                    @error('seasons')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="detail-mogitate_group">
                <label class="detail-mogitate_label-description" for="description">商品説明</label>
                <textarea class="detail-mogitate_textarea" name="description" id="description" placeholder="商品の説明を入力">{{ $product->description }}</textarea>
                <p class="detail-mogitate_error-description">
                    @error('description')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="detail-mogitate_button-group">
                <button type="button" class="detail-mogitate_button-back" onclick="location.href='/products'" value="back-button">戻る</button>
                <button type="submit" class="detail-mogitate_button-update" value="update-button">変更を保存</button>
            </div>
        </form>
        <div class="detail-mogitate_inner">
            <form class="delete-mogitate_form" action="/products/{{ $product->id }}/delete" method="post">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">

                <button type="submit" class="delete-mogitate_button" value="delete-button">
                    <svg
                        viewBox="0 0 24 24"
                        width="20"
                        height="20"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6l-1 14H6L5 6" />
                        <path d="M10 11v6" />
                        <path d="M14 11v6" />
                        <path d="M9 6V4h6v2" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview');
        const reader = new FileReader();

        if (file) {
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
            preview.src = '';
        }
    });
</script>
@endsection