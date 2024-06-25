<script>
    $(document).ready(() => {
      const photoInp = $("#formFile");
      const holderDiv = $(".holder");
      const deselectBtn = $("#deselectBtn");

      photoInp.change(function (e) {
        const imgURL = URL.createObjectURL(e.target.files[0]);
        console.log(imgURL);
        $("#imgPreview").attr("src", imgURL);
        holderDiv.show();
      });

      deselectBtn.click(() => {
        $("#imgPreview").attr("src", "#");
        photoInp.val("");
        holderDiv.hide();
      });
    });
  </script>
