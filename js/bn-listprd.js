var index = 1;
changeImage = function(){
    var imgs = ["../image/banner7.jpg","../image/banner8.jpg","../image/banner9.jpg"];
    document.getElementById('img').src = imgs[index];
    index++;
    if (index ==3){
        index = 0;
    }
}
setInterval(changeImage,4000);
//bars
function toggleDropdown(event) {
    var dropdownContent = document.getElementById("dropdownContent");
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
      event.stopPropagation(); // Ngăn chặn sự kiện click từ việc lan truyền xuống các phần tử con
    }
  }
    // back header slow
  document.addEventListener("click", function(event) {
    var dropdownContent = document.getElementById("dropdownContent");
    if (!dropdownContent.contains(event.target)) {
      dropdownContent.style.display = "none";
    }
  });
  document.addEventListener('DOMContentLoaded', function() {
    var backLink = document.querySelector('.bar-back');
    backLink.addEventListener('click', function(e) {
      e.preventDefault();
      scrollToTop(1000); // Đặt thời gian chuyển động (1000ms) tại đây
    });
  
    function scrollToTop(duration) {
      var start = window.pageYOffset;
      var startTime = 'now' in window.performance ? performance.now() : new Date().getTime();
  
      function scroll() {
        var currentTime = 'now' in window.performance ? performance.now() : new Date().getTime();
        var time = Math.min(1, (currentTime - startTime) / duration);
        var distance = start - start * time;
  
        window.scrollTo(0, distance);
  
        if (time < 1) {
          requestAnimationFrame(scroll);
        }
      }
  
      scroll();
    }
  });