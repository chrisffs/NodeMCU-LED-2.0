<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">
  </head>
  <body>
    <div class="bg-dark p-3">
      <h1 class="display-4 text-center text-white">GROUP 5:</h1>
      <h3 class="display-6 text-center text-white">GET REQUEST(Turn LED On/Off)</h3>
    </div>
    <div class="container">   
      <div class="d-flex justify-content-center">
        <div class="py-3 mx-3">
            <div class="mx-auto led"></div>
            <form action="update.php" method="post" id="LED_ON1">
                <input class="led_1" type="hidden" name="status" value="1"/>
                <input type="hidden" name="id" value="1"/>    
            </form>
            <form action="update.php" method="post" id="LED_OFF1">
              <input type="hidden" name="status" value="0"/>
              <input type="hidden" name="id" value="1"/> 
            </form>
            <div>
                <button class="buttonON fw-bold px-2 " id="btn1" name= "subject" type="submit" form="LED_ON1" value="SubmitLEDON1" ><i class="fa-solid fa-power-off"></i></button>
                <button class="buttonOFF fw-bold px-2 " name= "subject" type="submit" form="LED_OFF1" value="SubmitLEDOFF"><i class="fa-solid fa-power-off"></i></button>
            </div>
        </div>
        <div class="py-3 mx-3">
            <div class="mx-auto led"></div>
            <form action="update.php" method="post" id="LED_ON2">
                <input class="led_2" type="hidden" name="status" value="1"/>
                <input type="hidden" name="id" value="2"/>
            </form>
            <form action="update.php" method="post" id="LED_OFF2">
              <input type="hidden" name="status" value="0"/>
              <input type="hidden" name="id" value="2"/> 
            </form>
            <div>
                <button class="buttonON fw-bold px-2 " id="btn2" name= "subject" type="submit" form="LED_ON2" value="SubmitLEDON2" ><i class="fa-solid fa-power-off"></i></button>
                <button class="buttonOFF fw-bold px-2 " name= "subject" type="submit" form="LED_OFF2" value="SubmitLEDOFF"><i class="fa-solid fa-power-off"></i></button>
            </div>
        </div>
        <div class="py-3 mx-3">
            <div class="mx-auto  led"></div>
            <form action="update.php" method="post" id="LED_ON3">
                <input class="led_3" type="hidden" name="status" value="1"/>
                <input type="hidden" name="id" value="3"/>
            </form>
            <form action="update.php" method="post" id="LED_OFF3">
              <input type="hidden" name="status" value="0"/>
              <input type="hidden" name="id" value="3"/> 
            </form>
            <div>
                <button class="buttonON fw-bold px-2 " id="btn3" name= "subject" type="submit" form="LED_ON3" value="SubmitLEDON3" ><i class="fa-solid fa-power-off"></i></button>
                <button class="buttonOFF fw-bold px-2 " name= "subject" type="submit" form="LED_OFF3" value="SubmitLEDOFF"><i class="fa-solid fa-power-off"></i></button>
            </div>
        </div>
      </div>
    </div>
<script src="js/jquery.min.js"></script>
<script>
$(document).ready(function () {
  bulb();
});
function bulb() {
  {
    $.post("getleddata.php",
    function(data){
      var led_stat = [];

      for (var i in data) {
        led_stat.push(data[i].status);
      }
      console.log(led_stat);
      for (let i = 0; i < led_stat.length; i++) {
        if (led_stat[i] == 1) {
            if (i == 0) {
              $('.led').eq(i).addClass("green");
            } else if (i == 1) {
              $('.led').eq(i).addClass("orange");
            } else if (i == 2) {
              $('.led').eq(i).addClass("red");
            }
        } else if (led_stat[i] == 0) {
            $('.led').eq(i).addClass("off");
        }
      }
    })
  }
}
</script>
  </body>
</html>