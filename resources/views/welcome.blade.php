<!DOCTYPE html>
<html>
<style>
body, html {
  height: 100%
}

.bgimg {
  /* Background image */
  background-image: url('https://www.bigcommerce.com/blog/wp-content/uploads/2018/02/ecommerce-hero.jpg');
  /* Full-screen */
  height: 100%;
  /* Center the background image */
  background-position: center;
  /* Scale and zoom in the image */
  background-size: cover;
  /* Add position: relative to enable absolutely positioned elements inside the image (place text) */
  position: relative;
  /* Add a white text color to all elements inside the .bgimg container */
  color: brown;
  font-weight: 800;
  /* Add a font */
  font-family: "Courier New", Courier, monospace;
  /* Set the font-size to 25 pixels */
  font-size: 35px;
}

/* Position text in the top-left corner */
.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

/* Position text in the bottom-left corner */
.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

/* Position text in the middle */
.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

/* Style the <hr> element */
hr {
  margin: auto;
  width: 40%;
}
</style>
<body>
<div class="bgimg">
  <div class="topleft">
    <p>Healthbute</p>
  </div>
  <div class="middle">
    <h1>COMING SOON</h1>
    <hr>
    <p id="demo"></p>
    <form action="{{url('comming_soon')}}" method="POST">
        @csrf
        <input type="text" name="check" placeholder="Auth code" style="padding:10px;background:white;">
    </form>
  </div>
  <div class="bottomleft">
    <p>Everything is one place</p>
  </div>
</div>
<script>
var countDownDate = new Date("Jan 5, 2020 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;
  console.log(distance);
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);

</script>
</body>
</html>
