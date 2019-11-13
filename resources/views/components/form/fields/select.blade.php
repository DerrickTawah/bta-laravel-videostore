<div class="form-group row">
    <label for="{{ $author_id }}" class="col-md-2 col-form-label">{{ __(ucfirst($author_id)) }}</label>
    <div class="col-md-10">
        <select class="col-md-12" id=""{{ $author_id }}" name="{{ $author_id }}" class="form-control @error($author_id) is-invalid @enderror">
            <option value="">Please Choose ...</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}"
                        @if($data && $author->id == $data->author_id) selected @endif>
                    {{ $author }} </option>
            @endforeach
        </select>
        @error($author_id)
        <span class="d-block invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('$author_id') }}</strong>
                                </span>
        @enderror
    </div>
</div>
