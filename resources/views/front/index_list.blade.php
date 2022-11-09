<x-guest-layout>
    <div class="row" style="margin-top: 50px">
        <div class="col-md-3">
            <form action="{{route('ecommerce.index_list')}}" method="post">
                @csrf
                <h3>Search</h3>
                <div class="form-group pb-3">
                    <input type="text" name="keyword" class="form-control" value="{{old('keyword',$keyword)}}"
                           placeholder="Search word">
                </div>
                <div class="pb-3">
                    <h3>Price</h3>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="price"
                                   value="price_0_500" {{ isset($selected_price) && $selected_price == 'price_0_500' ? 'checked' : '' }}>
                            0 - 500
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="price"
                                   value="price_501_1500" {{ isset($selected_price) && $selected_price == 'price_501_1500' ? 'checked' : '' }}>
                            501 - 1500
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="price"
                                   value="price_1501_3000" {{ isset($selected_price) && $selected_price == 'price_1501_3000' ? 'checked' : '' }}>
                            1501 - 3000
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="price"
                                   value="price_3001_5000" {{ isset($selected_price) && $selected_price == 'price_3001_5000' ? 'checked' : '' }}>
                            3001 - 5000
                        </label>
                    </div>
                </div>
                <div class="pb-3">
                    <h3>Category</h3>
                    @foreach($categories as $category)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input"
                                       {{isset($selected_category)&&$selected_category==$category->id?'checked':'' }} name="category"
                                       value="{{$category->id}}">{{$category->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="pb-3">
                    <h3>Tags</h3>
                    @foreach($tags as $tag)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                       name="tag[]"
                                       {{isset($selected_tags) && in_array($tag->id,$selected_tags)?'checked':''}}
                                       value="{{$tag->id}}">{{$tag->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group pb-3">
                    <button type="submit" class="btn btn-primary btn-block bg-primary">Search</button>
                    <a href="{{route('ecommerce.index_list')}}" class="btn btn-danger btn-block mt-2">reset</a>
                </div>
            </form>
        </div>
        <div class="col-9">
            <a href="{{route('ecommerce.create')}}" class="btn btn-primary mb-3 mt-3">Add Product</a>
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>
                                @foreach($product->tags as $tag)
                                    <span class="badge badge-primary">{{$tag->name}}</span>
                                @endforeach
                            </td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="{{route('ecommerce.edit',$product->id)}}" class="btn btn-success">Edit</a>
                                <a href="javascript:void(0)"
                                   onclick="if (confirm('Are you sure?')){document.getElementById('delete-{{$product->id}}').submit();}else{return false;}"
                                   class="btn btn-danger">Delete</a>
                                <form action="{{route('ecommerce.destroy',$product->id)}}" method="post"
                                      id="delete-{{$product->id}}" style="display: none">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->appends(request()->except('_token'))->links() }}
        </div>

    </div>

    </div>

</x-guest-layout>








