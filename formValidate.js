<script type="text/javascript">
function clean(e){        
var textField = document.getElementById(e);
var regex = /[^a-z 0-9?!.,]/gi;
if (textField.value.search(regex) > - 1){
document.getElementById('status').innerHTML = "nieprawidłowy login";
}else {
document.getElementById('status').innerHTML = "ok";
}
textField.value = textField.value.replace(regex,"");
}
</script>


