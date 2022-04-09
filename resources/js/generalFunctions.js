

// inizio gestione della conferma di eliminazione
// reaources/views/admin/posts/index
// reaources/views/admin/categories/index
// reaources/views/admin/tag/index

    const buttons_delete = document.getElementsByClassName("mJS_conferma");

    for(let i = 0; i < buttons_delete.length; i++){
        buttons_delete[i].addEventListener("click", function(event){

            if(!confirm("Confermi di voler eliminare?")){
                event.preventDefault();
            }

        })
    }

// fine gestione della conferma di eliminazione

// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------

// inizio gestione mostra/nascondi password 
// resources/views/auth

    // inizio per password

        const hiddenPassword = document.querySelector(".mJS_password_hidden");
        const showedPassword = document.querySelector(".mJS_password_showed");
        const inputTypePassword = document.getElementById("password");
    

        //visualizzo l'icona per mostrare/nascondere la password solo se la input contiene qualcosa
            inputTypePassword.addEventListener("input", function(e){
                if(inputTypePassword.value.length > 0){
                    hiddenPassword.classList.replace("d-none","d-block");
                }else{
                    hiddenPassword.classList.replace("d-block","d-none");
                }
            });

        //funzioni di listen per le icone di nascondi/mostra password
            hiddenPassword.addEventListener("click", function(event){
                hiddenPassword.classList.replace("d-block","d-none");
                showedPassword.classList.replace("d-none", "d-block");
                inputTypePassword.type="text";
            })

            showedPassword.addEventListener("click", function(event){
                hiddenPassword.classList.replace("d-none","d-block");
                showedPassword.classList.replace("d-block", "d-none");
                inputTypePassword.type="password";
            })
            // fine per password

            // inizio per password confirm
                const hiddenPasswordConfirm = document.querySelector(".mJS_password_confirm_hidden");
                const showedPasswordConfirm = document.querySelector(".mJS_password_confirm_showed");
                const inputTypePasswordConfirm = document.getElementById("password-confirm");
            
            
                // visualizzo l'icona per mostrare/nascondere la password solo se la input contiene qualcosa
                    inputTypePasswordConfirm.addEventListener("input", function(e){
                        if(inputTypePasswordConfirm.value.length > 0){
                            hiddenPasswordConfirm.classList.replace("d-none","d-block");
                        }else{
                            hiddenPasswordConfirm.classList.replace("d-block","d-none");
                        }
                    });
            
                // funzioni di listen per le icone di nascondi/mostra password
                    hiddenPasswordConfirm.addEventListener("click", function(event){
                        hiddenPasswordConfirm.classList.replace("d-block","d-none");
                        showedPasswordConfirm.classList.replace("d-none", "d-block");
                        inputTypePasswordConfirm.type="text";
                    })
            
                    showedPasswordConfirm.addEventListener("click", function(event){
                        hiddenPasswordConfirm.classList.replace("d-none","d-block");
                        showedPasswordConfirm.classList.replace("d-block", "d-none");
                        inputTypePasswordConfirm.type="password";
                    })
    // fine per password confirm
        


// fine gestione mostra/nascondi password