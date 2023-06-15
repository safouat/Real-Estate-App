<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        /* Styles CSS pour le tableau de bord */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333333;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100px; 
    margin-top: 17%;

        }
        
        h1 {
            color: #333333;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        p {
            margin-bottom: 20px;
            text-align: center;
        }
        
        .error-message {
            color: #b30805;
            font-size: 18px;
            font-weight: bold;
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
        <p class="error-message">Je suis désolé, mais vous ne pouvez pas y accéder. Vous n'êtes pas administrateur.</p>
    </div>
</body>
</html>
