<form action="{{route("comment.store")}}" method="POST">
    @csrf
    <input type="hidden" name="code" value="{{ $code }}">
<label for="type">comment :</label>
<input type="text" name="comment" ><br>

<button type="submit">Mettre le commentaire</button>
</form>