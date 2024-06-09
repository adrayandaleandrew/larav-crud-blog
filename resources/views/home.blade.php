<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @auth
    <p>Congrats you are logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log Out</button>
    </form>
    <div style="border: 3px solid black;">
        <h2>Create a new post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="post title">
            <textarea name="body"  cols="30" rows="10" placeholder="body content...."></textarea>
            <button>Save Post</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>All Posts</h2>
        @foreach ($posts as $item)
            <div style="background-color: gray; padding:10px; margin:10px ">
                <h3>{{$item['title']}} by {{$item->user->name}}</h3>
                {{$item['body']}}
                <p>
                    <a href="/edit-post/{{$item->id}}">Edit</a>
                </p>

                <form action="/delete-post/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>DELETE</button>
                </form>
            </div>
        @endforeach
    </div>

    @else

    {{-- This is for Register --}}
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" id="" placeholder="name">
            <input type="text" name="email" id="" placeholder="email">
            <input type="password" name="password" id="" placeholder="password">
            <button>Register</button>
        </form>
    </div>


    {{-- This is for Login  --}}
    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginName" id="" placeholder="name">
            <input type="password" name="loginPassword" id="" placeholder="password">
            <button>Login</button>
        </form>
    </div>
    @endauth


     
</body>
</html>