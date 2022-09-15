$(document).ready(function(){
  $('.carousel').slick({
    autoplay: true, // 自動再生
    autoplaySpeed: 1000, // 自動再生の速さ、単位はミリ秒
    arrows: false, // 左右のナビゲーションを無効にする
    dots: true, // スライド下にドットを表示する
    fade: true, // スライドの切り替えをフェードにする        
  });
});
