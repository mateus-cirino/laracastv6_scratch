@extends ('layout')

@section ('head')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@endsection

@section ('content')

<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <h1>Create a new Article</h1>
            <form method="POST" action="/articles">

                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                </div>

                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <input type="text" name="excerpt" class="form-control" id="excerpt" placeholder="Enter excerpt">
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <input type="text" name="body" class="form-control" id="body" placeholder="Enter body">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
