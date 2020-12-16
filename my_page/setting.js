<script type="text/javascript"> 
function click_img() {
    var result = confirm("실행하시겠어요 ?");
        
    if(result)
    {
        document.write("<h1> 실행합니다. </h1>")
    }
    
    else
    {
        document.write("<h1> 실행하지 않습니다. </h1>")
    }
}

var img = document.getElementsByClassName('setting'); 
for (var x = 0; x < img.length; x++) { 
    img.item(x).onclick= setting_img(); 
} 
</script>

