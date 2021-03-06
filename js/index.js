//windows scroll
$(window).scroll(() => {
  var width = $(window).width()

  if ($(document).scrollTop() > 1000 && $("#modalPlanos").attr("displayed") === "false") {
    if(width < 680){
      $(this).hide();
      return
    }
    $('#modalPlanos').modal('show');
    $("#modalPlanos").attr("displayed", "true");
  }
});

//Home js
$(document).ready(() => {
  var play = document.querySelector('.modal-play');
  var close = document.querySelector('.modal-close');

  // play.onclick = toggle;
  // close.onclick = toggle;

  function toggle() {
    var trailer = document.querySelector('.trailer');

    trailer.classList.toggle('active');
  }
});
  function insertMovie(id) {
  	let modal = document.querySelector(`.movie${id}`); //pegando cada modal com id

    $.post( "../controller/get.php", { ver_mais: "1", id_movie: `${id}` } ) //ajax com jquery
    .done( response => {
    	let movieInfo = JSON.parse(response);
      modal.innerHTML = `
      	<div class="modal-content">
          <div class="header-modal">
            <a href="/" class="logo-modal"><h3>${movieInfo[0].nome}</h3></a>
            <button type="button" data-dismiss="modal"><img src="../assets/toggle.png" alt=""></button>
          </div>
          <div class="banner-modal">
           	<img src="http://localhost:3000/filmes/poster/${movieInfo[0].banner}" alt="">
            <div class="main-modal">
            	<h2></h2>
            	<p>${movieInfo[0].sinopse}</p>
            	<p>diretor: ${movieInfo[0].diretor}</p>
              <a href="#" class="modal-play"><img src="../assets/play.png" alt="">Ver o Trailer</a>
            </div>
          </div>
        </div>`;
    }).fail(err => {
      console.log( "error" + err );
    });
  }
