@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<style>
    .register-mogitate_form {
        text-align: center;

    }

    .register-mogitate {
        border-radius: 8px;
        padding: 35px 15px;
        margin: 0 auto;
    }

    .register-mogitate_heading {
        font-size: 25px;
        font-weight: bold;
        text-align: center;
        margin-right: 850px;
        margin-bottom: 50px;
    }

    .register-mogitate_input {
        width: 850px;
        height: 50px;
        margin-top: 10px;
        margin-bottom: 30px;
        border: 2px solid;
        border-color: #e7e7e7;
        border-radius: 5px;
        margin-left: 250px;
        display: flex;
    }

    .register-mogitate_seasons-option {
        margin-right: 730px;
        margin-top: 15px;
        margin-bottom: 30px;
    }

    .register-mogitate_seasons-input {
        border-radius: 10px;
        gap: 15px;
        font-size: 15px;
        margin-top: 10px;
    }

    .register-mogitate_seasons-input-checkbox {
        border-radius: 10px;
        font-size: 15px;
        padding: 8px 12px;
    }

    .register-mogitate_input-image {
        margin-right: 650px;
        margin-top: 15px;
        margin-bottom: 35px;
    }

    .register-mogitate_textarea {
        width: 850px;
        ;
        height: 150px;
        border: 2px solid;
        border-color: #e7e7e7;
        border-radius: 7px;
        margin-top: 10px;
        margin-left: 250px;
        display: flex;
    }

    .register-mogitate_group {
        font-size: 15px;
        margin-top: 10px;
        text-align: center;
    }

    .register-mogitate_label {
        margin-bottom: 10px;
        margin-right: 10px;
    }

    .register-mogitate_seasons-text {
        margin-right: 20px;
    }

    .register-mogitate_required {
        color: #ffffff;
        background-color: #ff0000;
        width: 50px;
        margin-bottom: 15px;
        margin-right: 830px;
        border-radius: 4px;
        padding: 1px 8px;
        margin-left: 0px;
    }

    .register-mogitate_required-name {
        color: #ffffff;
        background-color: #ff0000;
        margin-bottom: 15px;
        border-radius: 4px;
        padding: 1px 8px;
        margin-right: 850px;
    }

    .register-mogitate_required-price {
        color: #ffffff;
        background-color: #ff0000;
        margin-bottom: 15px;
        border-radius: 4px;
        padding: 1px 8px;
        margin-right: 865px;
    }

    .register-mogitate_required-seasons {
        color: #ffffff;
        background-color: #ff0000;
        width: 50px;
        margin-bottom: 15px;
        margin-right: 5px;
        border-radius: 4px;
        padding: 1px 8px;
        margin-left: 0px;
    }

    .register-mogitate_select-label {
        font-size: 15px;
        color: #ff0000;
        align-items: center;
        margin-bottom: 15px;
        margin-left: 5px;
        margin-right: 770px;
    }

    .register-mogitate_error {
        color: #ff0000;
        font-size: 15px;
        margin-bottom: 25px;
        margin-right: 750px;
    }

    .register-mogitate_button-inner {
        margin-top: 30px;
        text-align: center;
    }

    .register-mogitate_back-button {
        background-color: #cccccc;
        color: #000000;
        border: none;
        width: 175px;
        padding: 15px;
        text-align: center;
        font-size: 14px;
        border-radius: 4px;
        margin-right: 10px;
    }

    .register-mogitate_submit-button {
        background-color: #ffd000;
        color: #000000;
        width: 175px;
        padding: 15px;
        text-align: center;
        border: none;
        font-size: 14px;
        border-radius: 4px;
    }
</style>
@endsection

@section('content')
<div class="register-mogitate">
    <h1 class="register-mogitate_heading">商品登録</h1>
    <div class="register-mogitate_inner">
        <form class="register-mogitate_form" action="/products" method="post" enctype="multipart/form-data">
            @csrf
            <div class="register-mogitate_group">
                <span class="register-mogitate_label" for="name">商品名</span>
                <span class="register-mogitate_required-name">必須</span>
                <input type="text" class="register-mogitate_input" name="name" id="name" placeholder="商品名を入力" value="{{ old('name') }}" />
                <p class="register-mogitate_error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-mogitate_group">
                <span class="register-mogitate_label" for="price">値段</span>
                <span class="register-mogitate_required-price">必須</span>
                <input type="text" class="register-mogitate_input" name="price" id="price" placeholder="値段を入力" value="{{ old('price') }}" />
                <p class="register-mogitate_error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-mogitate_group">
                <span class="register-mogitate_label" for="image">商品画像</span>
                <span class="register-mogitate_required">必須</span>
                <div class="register-mogitate_input-image">
                    <input type="file" name="image" id="image" value="{{ old('image') }}" />
                    <div style="margin-top: 10px;">
                        <img src="" alt="" id="preview" style="display: none; max-width:500px; max-height:500px; margin-bottom:10px; padding: 5px; margin-left: 240px;">
                    </div>
                </div>
                <p class="register-mogitate_error">
                    @error('image')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-mogitate_group">
                <span class="register-mogitate_label" for="seasons">季節</span>
                <span class="register-mogitate_required-seasons">必須</span>
                <span class="register-mogitate_select-label">複数選択可</span>
            </div>
            <div class=" register-mogitate_seasons-input">
                <div class="register-mogitate_seasons-option">
                    <input type="checkbox" class="register-mogitate_seasons-input-checkbox" name="seasons[]" id="spring" value="1" />
                    <label class="register-mogitate_seasons-text">春</label>

                    <input type="checkbox" class="register-mogitate_seasons-input-checkbox" name="seasons[]" id="summer" value="2" />
                    <label class="register-mogitate_seasons-text">夏</label>

                    <input type="checkbox" class="register-mogitate_seasons-input-checkbox" name="seasons[]" id="autumn" value="3" />
                    <label class="register-mogitate_seasons-text">秋</label>

                    <input type="checkbox" class="register-mogitate_seasons-input-checkbox" name="seasons[]" id="winter" value="4" />
                    <label class="register-mogitate_seasons-text">冬</label>
                </div>
                <p class="register-mogitate_error">
                    @error('seasons')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-mogitate_group">
                <label class="register-mogitate_label" for="description">商品説明</label>
                <label class="register-mogitate_required">必須</label>
                <textarea class="register-mogitate_textarea" name="description" id="description" placeholder="商品の説明を入力"></textarea>
                <p class=" register-mogitate_error">
                    @error('description')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-mogitate_button-inner">
                <button type="button" class="register-mogitate_back-button" name="back" onclick="location.href='/products'" value="戻る">戻る</button>
                <button type="submit" class="register-mogitate_submit-button" name="submit" onclick="location.href='/products'" value="登録">登録</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview');
        const reader = new FileReader();

        if(file) {
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