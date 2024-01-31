const tombolCari = document.querySelector(".tombaol-cari");
const keyword = document.querySelector(".keyword");
const container = document.querySelector(".container");

//event

keyword.addEventListener("keyup", function () {
  //xmlhttp request
  //   const xhr = new XMLHttpRequest();

  //   xhr.onreadystatechange = function () {
  //     if (xhr.readyState == 4 && xhr.status == 200) {
  //       container.innerHTML = xhr.responseText;
  //     }
  //   };
  //   xhr.open("get", "ajax/ajax_cari.php?keyword=" + keyword.value);
  //   xhr.send();

  //cara fetch
  fetch("ajax/ajax_cari.php?keyword=" + keyword.value)
    .then((response) => respnse.text())
    .then((response) => (container.innerHTML = response));
});
