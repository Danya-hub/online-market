@extends("layouts.app")

@section("content")
    @include("catalog.shared.feature")
    @include("catalog.shared.category.index")
    @include("product.shared.index")
    @include("catalog.shared.brand.index")
@endsection
