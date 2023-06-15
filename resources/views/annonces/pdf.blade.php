<html>
    <head>
    </head>
    <body>
<div class="bg-light p-4 rounded">
    <h1>Show house</h1>
    <div class="lead">
    </div>

    <div class="container mt-4">

        
     <p>les images des produits</p>
     @foreach($images as $image)
     
     <img src="/SerieLaravel/public/photos/{{$image->image}}" style="width:30%;
      height:30%">
 

 @endforeach

    
   
    @if($resultat)
    <div>
        Name: {{ $resultat->name }}
    </div>
    <!-- ... -->
@else
    <div>
        annonce not found.
    </div>
@endif
<div>
    </div>
        
        <div>
            Description: {{ $resultat->description }}
        </div>
        <div>
           prix: {{ $resultat->prix }}
        </div>
        
        
        <div>
            Surface: {{ $resultat->surface }}
        </div>
        <div>
            adresse: {{ $resultat->adresse}}
        </div>
        
    </div>
</div>
    </body>
</html>

