$(document).ready(function() {
    /*MODAL BOX*/
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    //var btn = $("#myBTN");
    var btn = document.getElementById("myBTN");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks the button, open the modal 
    if (btn != null) {
        btn.addEventListener("click", openModal);
    }

    function openModal() {
        document.getElementById('cards').style.display = "none"; // hide
        document.getElementById('menu').style.display = "none"; // hide
        modal.style.display = "block";
    }
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
            document.getElementById('cards').style.display = "block"; // visible
            document.getElementById('menu').style.display = "block"; // visible
            modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        /*window.onclick = function(event) {
                if (event.target == modal) {
                    document.getElementById('cards').style.display = "block"; // visible
                    document.getElementById('menu').style.display = "block"; // visible
                    modal.style.display = "none";
                }
            }*/
        /*Cartas*/
    var zindex = 10;

    $("div.card").click(function(e) {
        e.preventDefault();

        var isShowing = false;

        if ($(this).hasClass("show")) {
            isShowing = true
        }

        $(".talla_zapatilla").click(function() {
            return false;
        });
        if ($("div.cards").hasClass("showing")) {
            // a card is already in view
            $("div.card.show")
                .removeClass("show");

            if (isShowing) {
                // this card was showing - reset the grid
                $("div.cards")
                    .removeClass("showing");
            } else {
                // this card isn't showing - get in with it
                $(this)
                    .css({ zIndex: zindex })
                    .addClass("show");
            }

            zindex++;

        } else {
            // no cards in view
            $("div.cards")
                .addClass("showing");
            $(this)
                .css({ zIndex: zindex })
                .addClass("show");

            zindex++;
        }

    });
});