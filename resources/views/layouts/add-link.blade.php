<div class="card">
    <div class="card-header">
        <h3>Contribute a link</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="/community">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="Channel">Channel:</label>
                <select class="form-control @error('channel_id') is-invalid @enderror" name="channel_id">
                    <option selected disabled>Pick a Channel...</option>
                    @foreach ($channels as $channel)

                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>

                        {{ $channel->title }}
                    </option>
                    @endforeach
                </select>
                @error('channel_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group"></div>
            <label for="title">Title:</label>

            <input value="{{old('title')}}" type="text" class="form-control @error('title') is-invalid @else is valid @enderror" id="title" name="title" placeholder="What is the title of your article?">
            <div class="form-group">
                <label for="link">Link:</label>
                <input value="{{old('link')}}" type="text" class="form-control @error('link') is-invalid @else is valid @enderror" id="link" name="link" placeholder="What is the URL?">

            </div>

            <div class="form-group card-footer">
                <button class="btn btn-primary">Contribute Link</button>
            </div>
    </div>

    </form>
</div>