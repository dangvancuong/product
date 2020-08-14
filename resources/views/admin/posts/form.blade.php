<div class="col-md-12">
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="name">Title *</label>
            <input type="text" class="form-control" name="title" placeholder="Tile" value="{{ old('title', $record->title) }}" required>

            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->

    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('sapo') ? ' has-error' : '' }}">
            <label for="email">Sapo *</label>
            <input type="text" class="form-control" name="sapo" placeholder="Sapo" value="{{ old('sapo', $record->sapo) }}">

            @if ($errors->has('sapo'))
                <span class="help-block">
                    <strong>{{ $errors->first('sapo') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <div class="col-md-4">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('image') ? ' has-error' : '' }}">
            <label for="image">Upload image *</label>

            <input type="file" accept="image/*" onchange="loadFile(event)" name="image">
            <img id="output" src="{{ old('image', $record->image) }}" width="100%"/>

            @if ($errors->has('image'))
                <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content">Content</label>
            <textarea class="form-control tinymce" name="content" value="{{ old('content', $record->content) }}">{{ old('content', $record->content) }}</textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->

</div>

