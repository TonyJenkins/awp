@extends ('layouts.app')

@section ('page_title')
    Guestbook | Comment from {{ $comment -> user -> name }}
@endsection

@section ('page_heading')
    Comment from {{ $comment -> user -> name }}
@endsection

@section ('content')

    <div class="box">
        <table class="table is-striped">
            <tbody>
            <tr>
                <td>Original Name:</td>
                <td>{{ $comment -> user -> name }}</td>
            </tr>

            @if (isset ($comment -> updating_user))
                <tr>
                    <td class="table-row-label">Last Updated By:</td>
                    <td>{{ $comment -> updating_user-> name }}</td>
                </tr>
            @endif

            <tr>
                <td>Date:</td>
                <td>{{ $comment -> updated_at -> format ('l jS F') }}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{ $comment -> comment }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <p>
        <a class="button is-info" href="/">Back</a>
    </p>
@endsection
