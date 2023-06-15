<html>

<head>
    <title>signIn-signUp</title>
    <link rel="stylesheet" type="text/css" href="form.css">
    <script src="https://kit.fontawesome.com/f770f9bca0.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Satisfy&family=Shadows+Into+Light&family=Work+Sans:ital,wght@1,200&display=swap"
        rel="stylesheet">
        <style>
            *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
   
   
}
body,input{
   
    
    font-family:'poppins',sans-serif;
  

}
.container{
    position:relative;
    width:100%;
    min-height: 100vh;
    background-color: #f4f4f4;
    overflow:hidden

}
.container::before{
    content: '';
    position: absolute;
    width: 2000px;
    height: 2000px;
    border-radius: 50%;
    background:#080808;
    transform: translateY(-50%);
    top:-10%;
    right: 48%;
   
}

.form-container{
    position: absolute;
    width:100%;
    height:100%;
    top:0;
    left:0;  
}
.signin-signup{
    position: absolute;
    top: 50%;
    left:75%;
    transform: translate(-50%,-50%);
    width:50%;
    display: grid;
    grid-template-columns: 1fr;
    z-index: 6;
    transition: .9s .4s ease-in-out;
   
   
}
form{
    display:flex;
    align-items: center;
    justify-content: center;
    flex-direction:column;
    grid-column: 1 / 2;
    grid-row: 1 / 2;
    padding: 0 5rem;
    overflow:hidden ;
   
}
.sign-up-form{
    z-index: 1;
    opacity: 0;
}
.sign-in-form{
    z-index: 2;

}
.title{
    font-size:2.2rem;
    color:rgb(39, 38, 38);
    margin-bottom: 10px;
}
.input-field{
    max-width:300px;
    height:55px;
    background-color: #212020;
    width: 100%;
    margin:10px 0;
    border-radius: 55px;
    display: grid;
    grid-template-columns: 15% 85%;
    padding: 0 .4rem;
}
.input-field i{
    text-align: center;
    line-height: 55px;
    color: #acacac;
    font-size: 1.1rem;
}
.input-field input {
    background: none;
    outline: none;
    border: none;
    line-height: 1;
    font-weight: 600;
    font-size: 1.1rem;
    color:rgb(255, 255, 255);
}
.btn{
    width:150px;
    height:49px;
    border: none;
    outline:none;
    border-radius: 49px;
    background-color: #202122;
    color: #fff;
    text-transform: uppercase;
    margin:10px 0;
    transition: .5s;
}
.btn:hover{
    background-color: #080808;

}
.social-text{
    padding: .7rem 0;
    font-size: 1rem;
}
.social-media{
    display: flex;
    justify-content: center;
}
.social-icon{
    height: 46px;
    width:46px;
    border:1px solid #333;
    margin:0 0.45rem;
    display:flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color:#333;
    font-size: 1.1rem;
    border-radius: 50%;
}
.social-icon:hover{
    color: #170074;
    border-color:#060505 ;

}
.panel-container{
    position:absolute;
    width:100%;
    height:100%;
    top:0;
    left:0;
    display: grid;
    grid-template-columns: repeat(2,1fr);

}
.panel{
    
    
    justify-content: space-around;
    text-align: center;
}
.left-panel{
    pointer-events: all;
    padding:3rem 12% 2rem 17%;
}
.right-panel{
    pointer-events: none;
    padding:3rem 17% 2rem 12%;
   
}
.panel .content{
    color:#fff;
    transition:.9s .6s ease-in-out;
 
}
.panel h3{
    font-weight: 600;
    line-height: 1;
    font-size: 1.5rem;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
}
.panel p{
    padding: 0.7rem 0;
    font-size: 2rem;
    font-family: 'Dancing Script', cursive;
}
.image{
    width: 120%;
    margin-right: 1% 100% 2%;
    padding:0%;
    transition: 1.1s ease-in-out;
    transition-delay: 0.4s;
   
    
}
.btn.transparent{
    width: 110px;
    height: 41px;
    border:1px solid #fff;
    background: none;
    font-weight: 600;
    font-size:0.8rem;
    
}
.btn.transparent:hover{
    background-color: #080808;
}

.right-panel .content, .right-panel .image{
    transform:translateX(800px);

}
.container.sign-up-mode:before {
    transform: translate(100%, -50%);
    transform:translate(100%, 70%);
        right: 62%;
    transition: .9s;
}

.container.sign-up-mode .left-panel .image,
.container.sign-up-mode .left-panel .content {
  transform: translateX(-800px);
  transition: .9s;
}

.container.sign-up-mode form.sign-up-form {
    opacity: 1;
    z-index: 2;
}
.container.sign-up-mode form.sign-in-form {
    opacity: 0;
    z-index: 1;
}
.container.sign-up-mode .right-panel .image,
.container.sign-up-mode .right-panel .content {
  transform: translateX(0%);

 
}

.container.sign-up-mode .left-panel {
    pointer-events: none;
}
  
.container.sign-up-mode .right-panel {
    pointer-events: all;
}

.container.sign-up-mode .signin-signup {
    left: 25%;
}
.o1{
    color: #060505;
}
.o2{
    width: 110px;
    height: 41px;
    border:2px solid rgb(2, 2, 2);
    background: none;
    font-weight: 600;
    font-size:0.8rem;
    border-radius: 48px;
    background-color: #212020;
    color: white;

    
}
.o2:hover{
    background-color:#333;
    
}
.custom-alert {
        background-color: #f2f2f2;
        border: 1px solid #ccc;
        max-width: 400px;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
        font-weight: bold;
        color: rgb(0, 0, 0);
        margin-left:19%;
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
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <body>
      <div class="loader-container">
        <div class="loader"></div>
      </div>
      <script>
        $(window).on("load",function(){
          $(".loader-container").fadeOut(2000);

        });
        </script>
    <div class="container">
        <div class="form-container">
            <div class="signin-signup">
                @if(session('success'))
                <div class="custom-alert"  id="custom-alert">
                    {{ session('success') }}
                </div>
            @endif
            <script>
                // Attendre 3 secondes (3000 millisecondes) avant de fermer l'alerte
                setTimeout(function() {
                    var alert = document.getElementById('custom-alert');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 2000);
            </script>
                <form action="{{ route('login.custom') }}" class="sign-in-form" method="post">
                    @csrf
                    <h2 class="title">Sign-in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text"  name="email" placeholder="email">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <input type="submit"  name="login" value="login" class="btn solid">
                  
                    



                </form>

                <form action="{{ route('register.custom') }}" class="sign-up-form" method="post">
                    @csrf
                    <h2 class="title">Sign-up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name"   placeholder="name">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" placeholder="email">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <input type="submit" name="register" value="Sign up" class="btn solid">
                    
                   



                </form>

               
            </div>
          
        <div class="panel-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Are you New ?</h3>
                    <p>Welcome to  this Immobiler Manager</p>
                    <button class="btn transparent" id="sign-up-btn">Sign-Up</button>
               

                </div>
                <img src="/SerieLaravel/public/photos/100.svg" class="image" alt="">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <p class="o1">Welcome to  this Immobiler Manager</p>
                    <button class="o2" id="sign-in-btn">Sign-In</button>
               

                </div>
                <img src="/SerieLaravel/public/photos/100.svg" class="image" alt="">
            </div>

        </div>


    </div>





    <script>
        const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
        </script>


</body>

</html>