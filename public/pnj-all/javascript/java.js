// var slideIndex = 0;
// showSlides();

// function showSlides() {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   var dots = document.getElementsByClassName("dot-icon");
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   slideIndex++;
//   if (slideIndex > slides.length) {
//     slideIndex = 1;
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" dot-background-color", "");
//   }
//   slides[slideIndex - 1].style.display = "block";
//   dots[slideIndex - 1].className += " dot-background-color";
//   setTimeout(showSlides, 10000); // Change image every 10 seconds
// }



// function plusDivs(n) {
//   showDivs((slideIndex += n));
// }

// function currentDiv(n) {
//   showDivs((slideIndex = n));
// }

// function showDivs(n) {
//   var i;
//   var x = document.getElementsByClassName("mySlides");
//   var dots = document.getElementsByClassName("dot-icon");
//   if (n > x.length) {
//     slideIndex = 1;
//   }
//   if (n < 1) {
//     slideIndex = x.length;
//   }
//   for (i = 0; i < x.length; i++) {
//     x[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" dot-background-color", "");
//   }
//   x[slideIndex - 1].style.display = "block";
//   dots[slideIndex - 1].className += " dot-background-color";
// }

function modeLight() {
  var container = document.getElementById("light-mode");
  var dataTheme = container.getAttribute("data-theme");

  if (dataTheme === "dark") {
    container.setAttribute("data-theme", "light");
  } else {
    container.setAttribute("data-theme", "dark");
  }
}

$("body").on("click", "#upload-slide", function () {
  var urliframe = $("#url-iframe").val();
  var urlimg1 = $("#url-img1").val();
  var urlimg2 = $("#url-img2").val();
  $("#slide-iframe").html(urliframe);
  $("#slide-img1").html(
    '<img id="slide-img1"  src="' + urlimg1 + '" alt=""></img>'
  );
  $("#slide-img2").html(
    '<img id="slide-img2"  src="' + urlimg2 + '" alt=""></img>'
  );
  $("#show-upload").show();
  $("#upload").hide();
});
$("body").on("click", ".edit-logo", function () {
  $(".img-logo").html('<span>URL LOGO</span><input id="url-logo">');
  $(".title-logo").html('<input id="span-logo">');
  $(".edit-logo").hide();
  var btncheck =
    '<button id="update-logo"><i class="fas fa-check"></i></button>';
  $(".logo").prepend(btncheck);
});
$("body").on("click", "#update-logo", function () {
  var urllogo = $("#url-logo").val();
  var spanlogo = $("#span-logo").val();
  $(".img-logo").html(
    '<img class="image-logo" src="' + urllogo + '" alt=""></img>'
  );
  $(".title-logo").html(spanlogo);
});
$("body").on("click", "#show-upload", function () {
  $("#upload").show();
  $("#show-upload").hide();
});

function showTime() {
  var date = new Date();
  var h = date.getHours(); // 0 - 23
  var m = date.getMinutes(); // 0 - 59
  var s = date.getSeconds(); // 0 - 59
  var month = date.getUTCMonth() + 1; //months from 1-12
  var day = date.getUTCDate();
  var year = date.getUTCFullYear();
  var newdate = day + "/" + month + "/" + year;
  // var session = "Sáng";

  // if (h == 0) {
  //   h = 12;
  // }

  // if (h > 12) {
  //   h = h - 12;
  //   session = "Chiều";
  // }

  h = h < 10 ? "0" + h : h;
  m = m < 10 ? "0" + m : m;
  s = s < 10 ? "0" + s : s;

  var time = h + ":" + m + ":" + s;
  document.getElementById("MyClockDisplay").innerText = time;
  document.getElementById("MyClockDisplay").textContent = time;
  document.getElementById("getDate").innerHTML = newdate;

  setTimeout(showTime, 1000);
}

showTime();
console.log(showTime);
