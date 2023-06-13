<script>
feather.replace()
</script>
<script src="../js/script.js"></script>
<script>
function previewImage() {
    var file = document.getElementById('image').files[0];
    var reader = new FileReader();


    reader.onload = function(e) {
        var previewImage = document.getElementById('preview');
        previewImage.src = e.target.result;
    }

    reader.readAsDataURL(file);

}
</script>
</body>

</html>