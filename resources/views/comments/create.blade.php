@extends ('layouts.app')

@section ('page_title')
    Guestbook | Add a Comment
@endsection

@section ('page_heading')
    Add a New Comment
@endsection

@section ('content')

<div class="box">

    <form action = "/add/" method="POST">

        <fieldset>

            @csrf

            <div class="field">
                <label class="label">
                    User
                </label>
                <div class="control">
                    <input class="input" type="text" name="name" value="{{ Auth::user () -> name }}" readonly>
                </div>
            </div>

            @error ('name')
            <div class="notification is-warning">
                <p>
                    {{ $message }}
                </p>
            </div>
            @enderror

            <div class="field">
                <label class="label">
                    Comment
                </label>
                <div class="control">
                    <input class="input" type="text" name="comment" placeholder="Enter the Comment" autofocus>
                </div>
            </div>

            @error ('comment')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
            @enderror

            <div class="field">
                <button class="button is-primary" type="submit">Add Comment</button>
            </div>

        </fieldset>
    </form>
</div>

<p>
    <a class="button" href="/">Back</a>
</p>

@endsection
