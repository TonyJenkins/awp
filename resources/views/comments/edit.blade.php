@extends ('layouts.app')

@section ('page_title')
    Guestbook | Edit a Comment from {{ $comment -> user -> name }}
@endsection

@section ('page_heading')
    Edit the Comment from {{ $comment -> user -> name }}
@endsection

@section ('content')

<div class="box">

    <form action = "/comment/{{ $comment -> id }}/edit/" method="POST">

        <fieldset>

            @csrf

            <div class="field">
                <label class="label">
                    User:
                </label>
                <div class="control">
                    <input class="input" type="text" name="name" value="{{ $comment -> user -> name }}" readonly>
                </div>
            </div>

            <div class="field">
                <label class="label">
                    Date:
                </label>
                <div class="control">
                    <input class="input" type="text"
                           value="{{ $comment -> updated_at -> format ('l jS F') }} at {{ $comment -> updated_at -> format ('H:i')  }}" readonly>
                </div>
            </div>

            <div class="field">
                <label class="label">
                    Current Likes:
                </label>
                <div class="control">
                    <input class="input" type="text" name="likes" value="{{ $comment -> likes }}" readonly>
                </div>
            </div>

            <div class="field">
                <label class="label">
                    Comment:
                </label>
                <div class="control">
                    <input class="input" type="text" name="comment" value="{{ $comment -> comment }}" autofocus>
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
                <button class="button is-primary" type="submit">Save Changes</button>
            </div>

        </fieldset>
    </form>
</div>

<p>
    <a class="button is-info" href="/">Back</a>
</p>

@endsection
