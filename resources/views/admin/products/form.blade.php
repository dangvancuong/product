<div class="col-md-7">
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name *</label>
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name', $record->name) }}" required>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->

    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('price') ? ' has-error' : '' }}">
            <label for="price">Price *</label>
            <input type="price" class="form-control" name="price" placeholder="price" value="{{ old('price', $record->price) }}" required>

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5 {{ $errors->has('size') ? ' has-error' : '' }}">
            <label>Category *</label>
            <div>
                <select class="form-control" name="category_id">
                    <option value="">Chọn category</option>
                    @foreach($record->category as $cate)
                    <option value="{{$cate->id}}"
                        @if ($cate->id == old('category_id', $record->category_id))
                            selected="selected"
                        @endif >{{$cate->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>

            <!-- /.form-group -->
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5 {{ $errors->has('size') ? ' has-error' : '' }}">
            <label>Size *</label>
            <div>
                <select class="form-control" name="size">
                    <option value="">Chọn size</option>
                    <option value="1"
                        @if (1 == old('size', $record->size))
                            selected="selected"
                        @endif >S</option>
                    <option value="2"
                        @if (2 == old('size', $record->size))
                            selected="selected"
                        @endif >M</option>
                    <option value="3"
                        @if (3 == old('size', $record->size))
                            selected="selected"
                        @endif >L</option>
                    <option value="4"
                        @if (4 == old('size', $record->size))
                            selected="selected"
                        @endif >XL</option>
                    <option value="5"
                        @if (5 == old('size', $record->size))
                            selected="selected"
                        @endif >XXL</option>
                </select>

                @if ($errors->has('size'))
                    <span class="help-block">
                        <strong>{{ $errors->first('size') }}</strong>
                    </span>
                @endif
            </div>

            <!-- /.form-group -->
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('note') ? ' has-error' : '' }}">
            <label for="note">note *</label>
            <textarea type="text" class="form-control" name="note" placeholder="note">{{ old('note', $record->note) }}</textarea>

            @if ($errors->has('note'))
                <span class="help-block">
                    <strong>{{ $errors->first('note') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
</div>
<!-- /.col-md-5 -->
