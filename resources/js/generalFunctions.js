

// inizio gestione della conferma di eliminazione

    const buttons_delete = document.getElementsByClassName("mJS_conferma");

    for(let i = 0; i < buttons_delete.length; i++){
        buttons_delete[i].addEventListener("click", function(event){

            if(!confirm("Confermi di voler eliminare?")){
                event.preventDefault();
            }

        })
    }

// fine gestione della conferma di eliminazione