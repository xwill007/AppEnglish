
<?php
 session_start();

 require 'database.php';

 if (isset($_SESSION['user_id'])) {
   $records = $conn->prepare('SELECT id,name,email,password FROM users WHERE id = :id');
   $records->bindParam(':id', $_SESSION['user_id']);
   $records->execute();
   $results = $records->fetch(PDO::FETCH_ASSOC);

   $user = null;

   $user = $results;
    
    //global $nombre;
   $nombre = $user['name'];
    
 } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>VR360</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-event-set-component@5/dist/aframe-event-set-component.min.js"></script>
    <script src="https://unpkg.com/aframe-layout-component@5.3.0/dist/aframe-layout-component.min.js"></script>
    <script src="https://unpkg.com/aframe-template-component@3.2.1/dist/aframe-template-component.min.js"></script>
    <script src="https://unpkg.com/aframe-proxy-event-component@2.1.0/dist/aframe-proxy-event-component.min.js"></script>
    
    <!-- Image link template to be reused. -->
    <script id="link" type="text/html">
      <a-entity class="link"
        geometry="primitive: plane; height: 1; width: 1"
        material="shader: flat; src: ${thumb}"
        event-set__mouseenter="scale: 1.2 1.2 1"
        event-set__mouseleave="scale: 1 1 1"
        event-set__click="_target: #image-360; _delay: 300; material.src: ${src}"
        proxy-event="event: click; to: #image-360; as: fade"
        sound="on: click; src: #click-sound">
    </a-entity>
    </script>

    <script src="js/change-site.js"></script>

    <script>
      AFRAME.registerComponent('play-pause',{
        init: function(){
          var myVideo = document.querySelector('#video_1');
          var videoControls = document.querySelector('#videoControls');
          
          this.el.addEventListener('click',function(){
            if(myVideo.paused){
              myVideo.play();
              videoControls.setAttribute('src','#pause')
            }else{
              myVideo.pause();
              videoControls.setAttribute('src','#play')
            }

          });

        }
      });
    </script>

    <script>
      AFRAME.registerComponent('rename',{
        init: function(){
          var nombre_usuario= document.querySelector("#nombre_usuario");
          var nombre= "<?php echo $nombre; ?>";
          nombre_usuario.setAttribute('value',nombre);
          //nombre_usuario.setAttribute('color','red');
          console.log("nombre :" + nombre);
          //mostra nombre ne consola para verificar/////////////////////////////////////////////
          //var mySky = document.querySelector("#image-360");
          //mySky.setAttribute("src",data.img);
        }
      });
   </script>

</head>

<body>
<?php if(!empty($user)): ?>  
  <a-scene>

    <a-assets>
        <img id="city" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/city.jpg">
        <img id="city-thumb" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/thumb-city.jpg">
        <img id="cubes" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/cubes.jpg">
        <img id="cubes-thumb" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/thumb-cubes.jpg">
        <img id="sechelt" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/sechelt.jpg">
        <img id="sechelt-thumb" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/thumb-sechelt.jpg">
        <audio id="click-sound" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/audio/click.ogg"></audio>
        

        <video id="fondo_universo" src="video/video_fondo.mp4" autoPlay="true" rotation="90 0 0"></video>
        <video id="video_1" src="video/it wasnt me.mp4" autoPlay="true"></video>
        <img id="play" src="imagenes/play.png">
        <img id="pause" src="imagenes/pause.png">
        <text id="nombre" color="grey" value="<?php $user['name']; ?>" >

      </a-assets>

      <!--360 Fondo cielo -->
      <a-sky id="image-360" radius="10" src="#fondo_universo" loop="true"
             animation__fade="property: components.material.material.color; type: color; from: #FFF; to: #000; dur: 300; startEvents: fade"
             animation__fadeback="property: components.material.material.color; type: color; from: #000; to: #FFF; dur: 300; startEvents: animationcomplete__fade"
             >
      </a-sky>

      <!-- Camera + cursor. -------------------------------------------------------------->
      <a-entity camera look-controls>   
        <a-cursor  
            id="cursor"
            color="grey"
            animation__click="property: scale; startEvents: click; from: 0.1 0.1 0.1; to: 1 1 1; dur: 150"
            animation__fusing="property: fusing; startEvents: fusing; from: 1 1 1; to: 0.1 0.1 0.1; dur: 1500"
            event-set__mouseenter="_event: mouseenter; color: springgreen"
            event-set__mouseleave="_event: mouseleave; color: grey"
            raycaster="objects: .link">
        </a-cursor>
          <!-- Imagn estatica. ------------------------------------------------------------------>
          <a-plane id="estaticos" position="-1.45 0.75 -1" width="0.4" height="0.15" color="black" opacity="0">
            <a-text id="nombre_usuario" color="white" width="1.2" position="-0.19 0.05 0" rename></a-text>
          </a-plane>
      </a-entity>
     
      <!-- Image links. ------------------------------------------------------------------>
      <a-entity id="links" layout="type: line; margin: 1.5" position="-1.5 -3 -4">
        <a-entity template="src: #link" data-src="#cubes" data-thumb="#cubes-thumb"></a-entity>
        <a-entity template="src: #link" data-src="#city" data-thumb="#city-thumb"></a-entity>
        <a-entity template="src: #link" data-src="#sechelt" data-thumb="#sechelt-thumb"></a-entity>
      </a-entity>

        <!-- link Salir ------------------------------------------------------------------>
      <a-plane id="salir_x" position="0 1 -1" color="black" width="0.15" height="0.1" class="link" change-site="/AppEnglish/inicio.php">
        <a-text id="Textsalir_x" value="Exit" color="white" width="1.5" position="-0.07 0 0"></a-text>
      </a-plane>

        <!-- tablero. ------------------------------------------------------------------>
      <a-plane id="tablero" position="0 0.5 -3" color="grey" width="7.4" height="4.2">
        <a-video src="#video_1" width="7" height="4" position="0 0 0.1" autoplay="true">
          <a-image id="videoControls" src="#pause" position="0 -1.6 0.5" scale="0.2 0.2 1" class="link" color="black" play-pause> </a-image>
        </a-video>
      </a-plane>

    </a-scene>

<?php endif; ?>
<?php if(empty($user)): ?>
      <h1>Por favor inicie sesion</h1>
      <a href="login.php">Ingresar</a> or
      <a href="signup.php">Registrarse</a>
  <?php endif; ?>
</body>
</html>