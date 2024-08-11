@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
    <div class="product-show-container">
        <div class="header-navigation">
            <a href="{{ route('products.index') }}" class="header-link">商品一覧へ</a> > {{ $product->name }}
        </div>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="product-top-section">
                <!-- 商品画像 -->
                <div class="product-image-section">
                    <div class="form-group">
                        <div class="register__file">
                            <label class="file__label">ファイルを選択
                                <input class="file__input" type="file" id="image" name="image">
                            </label>
                            <div class="file__name" id="fileName"></div>
                        </div>
                        <img id="previewImage" src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="image-preview" style="display: block;">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- 商品名、値段、季節 -->
                <div class="product-details-section">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            商品名
                        </label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="商品名を入力" value="{{ old('name', $product->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            値段
                        </label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="値段を入力" value="{{ old('price', $product->price) }}">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div id="seasonLabel" class="form-label">
                            季節
                        </div>
                        <div class="season-select-container" aria-labelledby="seasonLabel">
                            <label class="custom-checkbox">
                                <input name="seasons[]" type="checkbox" value="1">
                                <span class="checkmark"></span>
                                春
                            </label>

                            <label class="custom-checkbox">
                                <input name="seasons[]" type="checkbox" value="2">
                                <span class="checkmark"></span>
                                夏
                            </label>

                            <label class="custom-checkbox">
                                <input name="seasons[]" type="checkbox" value="3">
                                <span class="checkmark"></span>
                                秋
                            </label>

                            <label class="custom-checkbox">
                                <input name="seasons[]" type="checkbox" value="4">
                                <span class="checkmark"></span>
                                冬
                            </label>
                        </div>
                        @error('seasons')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- 商品説明 -->
            <div class="product-description-section">
                <div class="form-group">
                    <label for="description" class="form-label">
                        商品説明
                    </label>
                    <textarea name="description" class="description-textarea" id="description" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <!-- 戻る・更新・削除ボタン -->
            <div class="form-buttons">
                <div class="center-buttons">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
                    <button type="submit" class="btn btn-primary">変更を保存</button>
                </div>
        </form>
            <!-- 削除ボタン -->
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </form>
        </div>
    </div>

<script src="{{ asset('js/file-preview.js') }}"></script>
@endsection
