<html>
<head> 
<title> safouat</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Shadows+Into+Light&family=Work+Sans:ital,wght@1,200&display=swap" rel="stylesheet">



</head>
<body>
    <a href="{{route('login')}}">Signin</a>
<div class="container">
   
    <form method="get" action="{{ route('annonces.search') }}">
    @csrf
    @method('POST')
    <input type="text" name="query" placeholder="search">
    <button type="submit" >search</button>
     </form>
   
    <table>
        <tr id="items">
            <th>code</th>
            <th>name</th>
            <th>description</th>
            <th>prix</th>
            <th>adresse</th>
            <th>surface</th>
            <th>view</th>
        </tr>
            
    @foreach($allo as $a)   
    <tr>
        <td> {{$a["code"]}}</td>
        <td> {{$a["name"]}}</td>
        <td> {{$a["description"]}}</td>
        <td> {{$a["prix"]}}</td>
        <td> {{$a["adresse"]}}</td>
        <td> {{$a["surface"]}}</td>
        <td><a href="{{ route('annonces.show', $a->code) }}" class="btn btn-warning btn-sm">Show</a></td>
        <td><a href="{{ route('annonces.RDV') }}" class="btn btn-warning btn-sm">faire un RDV</a></td>
        
       
    @endforeach
</tr>
</table>
    

</div>
    <script src="https://kit.fontawesome.com/f770f9bca0.js" crossorigin="anonymous"></script>
   


</body>
</html>