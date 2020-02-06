@extends ('layouts.app')

@section ('page_title')
    Guestbook
@endsection

@section ('page_heading')
    Guestbook Comments
@endsection

@section ('content')

    <div class="container main-table">
        <div class="box">

            @if (count ($comments) > 0)
                <table class="table is-striped is-hoverable">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Likes</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($comments as $c)

                        <tr>
                            <td>{{ $c -> user -> name }}</td>
                            <td>{{ $c -> comment }}</td>
                            <td>{{ $c -> updated_at -> format ('D jS F') }}</td>
                            <td>{{ $c -> likes }}</td>
                            <td>
                                <a class="button"
                                   href="/comment/{{ $c -> id }}/">
                                    <ion-icon name="eye"></ion-icon>
                                </a>
                            </td>
                            <td>
                                <a class="button"
                                   href="/comment/{{ $c -> id }}/edit/">
                                    <ion-icon name="create"></ion-icon>
                                </a>
                            </td>
                            <td>
                                <a class="button"
                                   href="/comment/{{ $c -> id }}/delete/">
                                    <ion-icon name="trash"></ion-icon>
                                </a>
                            </td>
                            <td><a class="button"
                                   href="/comment/{{ $c -> id }}/like/"><ion-icon name="thumbs-up"></ion-icon>
                                </a>
                            </td>
                            <td><a class="button"
                                   href="/comment/{{ $c -> id }}/dislike/"><ion-icon name="thumbs-down"></ion-icon>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

                {{ $comments -> links () }}

            @else
                <div class="notification is-info">
                    <p>
                        The Guestbook is empty. Why not add a comment?
                    </p>
                </div>
            @endif
        </div>

        <div class="box">
            <a class="button is-primary" href="/add/">Add a Comment</a>
        </div>

    </div>

@endsection

