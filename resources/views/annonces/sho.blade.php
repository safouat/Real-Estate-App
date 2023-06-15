<html>
    <head>
        <link rel="stylesheet" type="text/css" href="profile.css">
        <script src="https://kit.fontawesome.com/f770f9bca0.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Satisfy&family=Shadows+Into+Light&family=Work+Sans:ital,wght@1,200&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/f770f9bca0.js" crossorigin="anonymous"></script>
    </head>
    <style>
        * {
    margin: 0;
    padding: 0;
    font-family: 'Dancing Script', cursive;
    font-family: 'Satisfy', cursive;
font-family: 'Shadows Into Light', cursive;
font-family: 'Work Sans', sans-serif;
    box-sizing: border-box;
 
}

body {
    background: #e1dddd;
    

}
h1{
  color:#F0F8FF
}
.header1{
    display: flex;
    border-bottom: 1px solid #666666;
    background-image: url("/SerieLaravel/public/photos/42.jpg");
    background-size:1600px; /* Ajuste la taille de l'image pour couvrir tout le corps */
    background-position: center;
    }
.oip{
    width:200px;
    height:200px;
    border-radius: 50%;
    margin-left:2%;
    margin-top:1%;
    margin-bottom:1%;

}
.details{
    margin-left:10%;
    margin-top:3%;
    font-size: 40px;
    font-family: 'Almarai', sans-serif;
}
.detail{
    margin-left: 35%;
    font-size: 20px;
    width:800px;
    color:#F0F8FF;
}
.a{
    margin-right:10px;
}
.ajouter{
    margin-left: 1%;
    margin-top: 1%;
    font-size: 34px;
    padding:5px;
  

    

}
a{
    
    color: #0f0f0f;
    margin-right:90px;
}
.card {
    max-width: 820px;
    height:210px;
    border-radius: 1rem;
    background-color: #F0F8FF;
    padding: 1rem;
    margin-left: 13%;
    margin-top:1%;
    box-shadow: 5px 5px ;
    margin-bottom:2%;
  }
  
  .infos {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    grid-gap: 1rem;
    gap: 1rem;
  }
  
  .image {
    height: 170px;
    width: 900px;
    border-radius: 0.5rem;
    background-color: rgb(255, 255, 255);
    background: linear-gradient(to bottom right, rgb(11, 10, 11), rgb(17, 17, 18));
    transition:0.4s;
  }
  .image:hover {
    transform: translateY(-10%);
    box-shadow: rgba(226, 196, 63, 0.25) 0px 13px 47px -5px, rgba(180, 71, 71, 0.3) 0px 8px 16px -8px;
    transition:0.4s
   }
  
  .info {
    height: 7rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  
  .name {
    font-size: 1.25rem;
    line-height: 1.75rem;
    font-weight: 500;
    color: rgb(0, 0, 0);
  }
  
  .function {
    font-size: 0.75rem;
    line-height: 1rem;
    color: rgba(156, 163, 175, 1);
  }
  
  .stats {
    width: 400px;
    border-radius: 0.5rem;
    background-color: #F0F8FF;
    padding: 0.8rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.75rem;
    line-height: 1rem;
    color: rgba(0, 0, 0, 1);
    margin-top:5%;
    transition:0.4s;
  }
  .stats:hover{
        transform: translateY(-10%);
        box-shadow: rgba(19, 19, 18, 0.25) 0px 13px 47px -5px, rgba(180, 71, 71, 0.3) 0px 8px 16px -8px;
        transition:0.4s;
       
  }
  
  .flex {
    display: flex;
    flex-direction: column;
   

  }
  
  .state-value {
    font-weight: 700;
    color: rgb(118, 36, 194);
  }
  
  .request {
    margin-top: 1.5rem;
    width: 100%;
    border: 1px solid transparent;
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    line-height: 1.5rem;
    transition: all .3s ease;
  }
  
  .request:hover {
    background-color: rgb(118, 36, 194);
    color: #fff;
  }
  
  .icone {
    display: flex;
    justify-content: flex-end; /* Aligner les icônes à droite */
    align-items: center; /* Centrer verticalement les icônes */
    gap: 10px; /* Ajouter un espacement horizontal entre les icônes */
  }
  
  .icone a {
    margin: 0; /* Supprimer toutes les marges autour des icônes */
  }
  

  .learn-more{
    font-size:30px;
  }
  .arrow{
   
    color: #060505;
    border-radius: 90%;
    width:30%;
    height:1%;
    


  }
  .icon.arrow:hover {
    background-color: #000000;
    width:100%;


  }
  .button {
    height: 60px;
    width: 200px;
    background-color: #020202;
    border: 2px solid rgb(182, 128, 128);
    color: #eee;
    transition: .6s;
    font-size: 15px;
    border-radius: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    /* padding: 20px; */
    overflow: hidden;
    margin-left:78%;
  }
  
  .button span {
    transform: translateX(10px);
    transition: .5s;
  }
  
  .svg {
    transform: translateX(5px);
    transition: .6s;
    z-index: 3;
    height: 20px;
    font-size: 25px;
    margin-bottom: 10px;
  }
  
  .button:hover {
    width: 60px;
    
    transform: translateX(50px);
  }
  
  .svg:hover  {
    transform: translateX(5px);
    
  }
  
  .button:hover span {
    transform: translateY(70px);
    font-size: .1rem;
  }
  header {
  
  width: 100%;
  height: 90px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color:#000;
  padding: 0 100px;

}

.hamburger {
  display: none;
}

.logo {
  font-family: 'Dancing Script', cursive;
  font-family: 'Satisfy', cursive;
  font-size:30px;
  color: #fbfbfb;
  padding:0.1px;
  -webkit-animation: text-focus-in 1s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
          animation: text-focus-in 1s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
  

}
/* ----------------------------------------------
* Generated by Animista on 2023-1-28 14:50:50
* Licensed under FreeBSD License.
* See http://animista.net/license for more info. 
* w: http://animista.net, t: @cssanimista
* ---------------------------------------------- */

/**
* ----------------------------------------
* animation text-focus-in
* ----------------------------------------
*/
@-webkit-keyframes logo {
  0% {
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
  100% {
    -webkit-filter: blur(0px);
            filter: blur(0px);
    opacity: 1;
  }
}
@keyframes logo {
  0% {
    -webkit-filter: blur(12px);
            filter: blur(12px);
    opacity: 0;
  }
  100% {
    -webkit-filter: blur(0px);
            filter: blur(0px);
    opacity: 1;
  }
}


nav ul li {

  display: inline-block;
  padding: 0px 18px;
}

nav ul li a {
  color: #fefefe;
  text-decoration: none;
  font-size: 20px;
  display: inline-block;
  border-radius: 23px;
  padding: 10 25px;
  margin: 0 3px;


}
nav ul li a:hover{
  color: black;
  background: #fefefe;

}
nav ul li a.active{
  color: black;
  background: #fefefe;

}
@media only screen and (max-width:1320px){
  header {
      padding:0 50px;
  }
}
@media only screen and(max-width:1100px){
  header {
      padding:0 30px;

  }
}
@media only screen and (max-width:900px){
  .hamburger{
      display:block;
      cursor:pointer;

  }
  .humberger .line{
      width:30px;
      height:3px;
      background: #fefefe;
      margin:6px 0;
  }
}
.dropdow ul li{
    padding:0.1px;
    color: #0b0b0a;
    background-color:aliceblue;
    display:none;
    width:120%;
    
   
   
    
}
.dropdow{
    margin-top:3%;
    margin-left:2%;
    margin-right:17%;
    
    
}
.loader-container{
  width:100%;
  height:100vh;
  background-color: #000000;
  position:fixed;
  
}
.loader{
  margin-left:47%;
  margin-top:18%;
  width:100px;
  height:100px;
  border:5px solid;
  color:#ffffff;
  border-radius:50%;
  border-top-color:transparent;
  animation:loader 1.2s linear infinite;


}
@keyframes loader{
    to{
      transform:rotate(360deg);
    }

  }
  .text{
    margin-left:38%;
    margin-top:4%;
  }
  
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <body>
      <div class="loader-container">
        <div class="loader"></div>
      </div>
      <script>
        $(window).on("load",function(){
          $(".loader-container").fadeOut(1000);

        });
        </script>

      <header>
        <div class="logo"> Immobiler Manager</div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-navbar">
            <ul>
            <li>
                <a href='{{ route('annonces.index') }}' class="active">Home</a>
            </li>
            <li>
                <a href="{{ route('profile.forg') }}">Settings</a>
            </li>
           
            <li>
                <a href="#">About</a>
            </li>
            
            
        
            </li>
            </ul>
        </nav>
       
        <div class="OK">
           
                
                
          <div class="dropdow">
                  
            <img src="/SerieLaravel/public/photos/{{ auth()->user()->image }}" style="width:100%; height:80%;display:center;border-radius:50%;margin-left:70%; "  id="toggleButton" >
          <ul class="dropdow-menu dropdow-menu-dark" aria-labelledby="dropdownMenuButton2">
            
            <li><a class="drop" href="{{route('annonces.noti')}}"><i class="fa-solid fa-handshake"></i></a></li>
            <li><hr class="divider"></li>
            <li><a class="drop" href="{{route('signout')}}"><i class="fa-solid fa-right-from-bracket"></i></a></li>
           
            
          </ul>
        </div>
        <script>
          var toggleButton = document.getElementById("toggleButton");
          var listItems = document.querySelectorAll(".dropdow ul li");
          
          // Parcourir tous les éléments li
          toggleButton.addEventListener("click", function() {
            listItems.forEach(function(item) {
            // Faites quelque chose avec chaque élément li
            if (item.style.display === "none") {
              item.style.display = "block";
            } else {
              item.style.display = "none";
            }
          });
          });
          document.addEventListener("click", function(event) {
            listItems.forEach(function(item) {
              if (!item.contains(event.target) && event.target !== toggleButton) {
                item.style.display = "none";
              }
                    });
            });
          
          
          
          </script>
                
                
           
        </div>
        
        </header>
        
        
            <div class="header1">
                <img src="/SerieLaravel/public/photos/{{ auth()->user()->image }}" class="oip">
                <div class="details">
                    <h1>{{auth()->user()->name}}</h1>
                    <div class="detail"><p><i class="fa-regular fa-envelope a"></i>{{auth()->user()->email}}</p>
                       <p><i class="fa-solid fa-phone a"></i>0649480835</p></div>
                </div>
            </div>
            <a href="{{ route('annonces.create') }}" class="btn btn-warning btn-sm">
            <button class="button">
            
                <i class="fa-light fa-plus svg"></i>
                <span>Ajouter un poste </span>
               
              </button>
            </a>
            @if($safouat->isEmpty())
            <div class="cont">
            <div class="text"><h3>Vous n'avez aucun annonce publié <h3></div>
          </div>
            @endif
            
            


            @foreach($safouat as $a)   

<div class="card">
    
    <div class="infos">
        
        <img src="/SerieLaravel/public/photos/{{ $a->photos()->first()->image }}"  class="image">

        <div class="info">
            
            <p class="icone">
                <a href="{{ route('annonces.show', $a->code) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-eye o"></i></a>
                <a href="{{ route('annonces.edit', $a->code) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen b"></i></a>
                <a href="{{ route('annonces.destroy', $a->code) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-trash c"></i></a>
            </p>
            <div>
                <p class="name">
                    {{$a["name"]}}
                </p>
                <p class="function">
                    {{$a["description"]}}
                </p>
            </div>
            <div class="stats">
                    <p class="flex flex-col">
                        Prix
                        <span class="state-value">
                            {{$a["prix"]}}
                        </span>
                    </p>
                    
                    <p class="flex">
                        Surface
                        <span class="state-value">
                            {{$a["surface"]}}
                        </span>
                    </p>
                    <p class="flex">
                        Adresse
                        <span class="state-value">
                            {{$a["adresse"]}}
                        </span>
                    </p>
                    
            </div>
        </div>
    </div>
    
</div>
@endforeach


