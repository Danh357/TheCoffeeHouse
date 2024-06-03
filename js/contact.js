var index = 1;
changeImage = function(){
    var imgs = ["../image/banner11.jpg","../image/banner12.jpg","../image/banner13.jpg"];
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
  
  document.addEventListener("click", function(event) {
    var dropdownContent = document.getElementById("dropdownContent");
    if (!dropdownContent.contains(event.target)) {
      dropdownContent.style.display = "none";
    }
  });
  