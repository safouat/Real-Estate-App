<form method="post" action="{{route('password.update')}}">
    @csrf
<label>Email:</label>
<input type="text" name="email" ><br>
<label>password:</label>
<input type="text" name="password" ><br>

<button type="submit">Send</button>
</form>