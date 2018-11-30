var sex;

function Sclick(){
  $(".find").slideToggle("slow");
}


function Bclick(){
  // console.log("kk");
  var isShow=$(".biaobai").is(":visible");
  if(isShow==1){
  // {console.log("kkk");
  $(".biaobai").hide("fast",back());
}
  else{
    $(".biaobai").show("fast");
  }
}


function back(){
  var isShow=$(".page").is(":visible");
  if(isShow==1){
    console.log(isShow);
  $(".page").hide("fast",Bclick());}
  else
  {
    $(".page").show("fast");
  }
}

function Gclick(){
$(".long").slideToggle("slow");
}

function changepic() {

  $("pic").css("display", "none");

  var reads = new FileReader();

  f = document.getElementById('file').files[0];

  reads.readAsDataURL(f);

  reads.onload = function(e) {
  
    document.getElementById('img3').src = this.result;
  
    $("#img3").css("display", "block");};
 }

function check1(){
  sex = '男';
}

function check2(){

  sex = '女';
}

function female(){
  return 0;
}

$(function(){
    $(".on").click(function(e){
      e.preventDefault();
      console.log($(".name").val());
      if(!$(".name").val()){
        alert('请输入昵称');
        return false;
      }
      if (!$(".mainput").val()) {
        alert('请输入内容');
        return false;
      }
      if (!sex){
        alert('请选择性别');
        return false;
      }else{
        $("form").submit();
      }
      });
});

function jump(){
  window.location.href="index.html";
}