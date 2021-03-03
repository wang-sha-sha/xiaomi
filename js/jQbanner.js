//定义图片数组
let imgArr = ["img/banner0.jpg", "img/banner1.webp","img/banner2.webp", "img/banner3.webp","img/banner4.webp"];
let img_0 = $("#img_0");
let img_1 = $("#img_1");
let img_2 = $("#img_2");
let img_3 = $("#img_3");
let img_4 = $("#img_4");

//初始化状态
let currentIndex = 0;
img_0.attr("src", imgArr[0]);
img_1.attr("src", imgArr[1]);
img_2.attr("src", imgArr[2]);
img_3.attr("src", imgArr[3]);
img_4.attr("src", imgArr[4]);
img_0.show();
img_1.hide();
img_2.hide();
img_3.hide();
img_4.hide();

let time = setInterval(function () {
    currentIndex++;
    changeImg();
}, 2000);

// 设置圆点的数量和位置
for (let i = 0; i < imgArr.length; i++) {
    $(".dot").append("<span></span>");
}
//初始化圆点颜色
$(".dot span:first").css({backgroundColor: "orange"});
$(".dot span:not(:eq(0))").css({backgroundColor: "white"});

// 鼠标悬停和离开时
$(".banner-img").hover(function (){
    $("#btnPrev,#btnNext").show();
    clearInterval(time);
},function (){
    $("#btnPrev,#btnNext").hide();
    time = setInterval(function () {
        currentIndex++;
        changeImg();
    }, 2000);
});

// 改变图片和点的颜色
function changeImg() {
    // 当滚动结束后改变图片显示
    // img_3.attr("src", imgArr[currentIndex - 1 % imgArr.length]);
    // img_4.attr("src", imgArr[(currentIndex - 2) % imgArr.length]);
    img_0.attr("src", imgArr[currentIndex% imgArr.length]);
    // img_1.attr("src", imgArr[currentIndex + 1 % imgArr.length]);
    // img_2.attr("src", imgArr[(currentIndex + 2) % imgArr.length]);

    // 改变圆点的颜色
    $(".dot span:eq(" + (currentIndex % imgArr.length) + ")").css({backgroundColor: "orange"});
    // 将其他的圆点颜色还原成白色
    $(".dot span:not(:eq(" + (currentIndex % imgArr.length) + "))").css({backgroundColor: "white"});
}

// 上一张图片
$("#btnPrev").click(function (){
    if(currentIndex === 0){
        currentIndex = imgArr.length-1;
    }else{
        currentIndex--;
    }
    changeImg();
});
// 下一张图片
$("#btnNext").click(function (){
    currentIndex++;
    changeImg();
});
