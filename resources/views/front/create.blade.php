<x-guest-layout>
    <div class="row" style="margin-top: 50px">
        <div class="col-12">
            <form action="{{route('ecommerce.create')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">
                        Name
                    </label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">
                        Description
                    </label>
                    <textarea type="text" name="description" id="description"
                              class="form-control"> {{old('description')}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">
                        Price
                    </label>
                    <input type="number" name="price" id="price" class="form-control" value="{{old('price')}}">
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Categories</label>
                    @foreach($categories as $cat)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="category_id" class="form-check-input"
                                       value="{{$cat->id}}"{{old('category_id')==$cat->id?'checked':''}}>
                                {{$cat->name}}
                            </label>
                        </div>
                    @endforeach
                    @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    @foreach($tags as $tag)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="tags[]" class="form-check-input"
                                       value="{{$tag->id}}"{{is_array(old('tags'))&&in_array($tag->id,old('$tags'))?'checked':''}}>
                                {{$tag->name}}
                            </label>
                        </div>
                    @endforeach
                    @error('tags')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">
                        Image URL
                    </label>
                    <input type="text" name="image" id="image" class="form-control" value="{{old('image')}}">
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group pb-3">
                    <button type="submit" class="btn btn-primary btn-block bg-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>
