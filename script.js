console.log("je suis dans le truc pour crer le comper");

const connexion1 = document.getElementById("login_form");


const creer_compte = document.getElementById("inscription_form");

const mdp_perdu = document.getElementById("mdp_perdu");


const btn_deconnexion = document.getElementById("logout");


const var_mail = document.getElementById("message_bienvenue");




const ticketForm = document.getElementById("ticket_form");

const projetForm = document.getElementById("projetForm");






// if (localStorage.getItem("email_stocke") == null && window.location.pathname != "/login.html") {
//     window.location.href = "login.html";
// }
            // document.getElementById("message_bienvenue").textContent="Bonjour" + var_mail;

//test pour voir ce que j'ai dans mon form//
// console.log(connexion1);

if (connexion1){

    connexion1.addEventListener("submit",function(event){
    

        event.preventDefault();

        document.getElementById("email_error").classList.add("titanic");
        document.getElementById("password_error").classList.add("titanic");
        document.getElementById("password_len_error").classList.add("titanic");


        document.getElementById("email").style.border = "1px solid rgba(255,255,255,0.2)";
        document.getElementById("password").style.border = "1px solid rgba(255,255,255,0.2)";

        const valeur_email = document.getElementById("email").value;
        const valeur_password = document.getElementById("password").value;
        let erreur_conexion = false;

        if (valeur_email ==""){
            document.getElementById("email").style.border = "2px solid red";
            erreur_conexion = true;
            document.getElementById("email_error").classList.remove("titanic");
        }
        
        if (valeur_password ==""){
            
            document.getElementById("password").style.border = "2px solid red";
            document.getElementById("password_error").classList.remove("titanic");    
            erreur_conexion = true;
        } else if (valeur_password.length < 8) {
            // Cas 2 : Le champ est rempli mais fait moins de 8 caractères
            document.getElementById("password").style.border = "2px solid red";
            document.getElementById("password_len_error").classList.remove("titanic");
            erreur_conexion = true;
        }
        
        if (erreur_conexion == false){
            document.getElementById("email").style.border = "1px solid rgba(255,255,255,0.2)";
            document.getElementById("password").style.border = "1px solid rgba(255,255,255,0.2)";
            console.log("connexion1 réussie");

            //test pour stocker localement l'email//
            localStorage.setItem("email_stocke",valeur_email);

            // const var_mail = localStorage.getItem("email_stocke");
            // document.getElementById("message_bienvenue").textContent="Bonjour" + var_mail;


            // window.location.href = "dash_colab.html";

            connexion1.submit();

        }


        console.log(valeur_email);
        console.log(valeur_password);
        console.log("okayyyy");
    });

}

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//


if (creer_compte){

    
    creer_compte.addEventListener("submit",function(event2){

    

        // event2.preventDefault();


        document.getElementById("email_error2").classList.add("titanic");
        document.getElementById("password_error2").classList.add("titanic");
        document.getElementById("password_len_error2").classList.add("titanic");
        document.getElementById("password2_error2").classList.add("titanic");

        // --- LE GRAND NETTOYAGE ---
        // On remet les bordures à la normale (gris transparent) pour tout le monde
        document.getElementById("email").style.border = "1px solid rgba(255,255,255,0.2)";
        document.getElementById("password").style.border = "1px solid rgba(255,255,255,0.2)";
        document.getElementById("confirm_password").style.border = "1px solid rgba(255,255,255,0.2)";
        let erreur = false;

        
  

        const valeur_email2 = document.getElementById("email").value;
        const valeur_password2 = document.getElementById("password").value;
        const valeur_conf_password = document.getElementById("confirm_password").value;

        console.log("valeur_email2 :::", valeur_email2,"|","|")

        if (valeur_email2 =="") {
            document.getElementById("email").style.border = "2px solid red";
            erreur = true;
            document.getElementById("email_error2").classList.remove("titanic");
            
        }

        if (valeur_password2 =="") {
            document.getElementById("password").style.border = "2px solid red";
            erreur = true;
            document.getElementById("password_error2").classList.remove("titanic");
        } else if (valeur_password2.length < 8) {

            document.getElementById("password").style.border = "2px solid red";
            document.getElementById("password_len_error2").classList.remove("titanic");
            erreur = true;
        }
        

        if (valeur_conf_password =="") {
            document.getElementById("confirm_password").style.border = "2px solid red";
            erreur = true;
            document.getElementById("password2_error2").classList.remove("titanic");
        } else if (valeur_password2 !== valeur_conf_password) {
            document.getElementById("password").style.border = "2px solid red";
            document.getElementById("confirm_password").style.border = "2px solid red";
            document.getElementById("password2_error2").classList.remove("titanic");
            erreur = true;
            // window.location.href = "login.html";
        }



        // if (erreur==false){
        //     console.log("connexion1 réussie");
        //     document.getElementById("email").style.border = "1px solid rgba(255,255,255,0.2)";
        //     document.getElementById("password").style.border = "1px solid rgba(255,255,255,0.2)";
        //     document.getElementById("confirm_password").style.border = "1px solid rgba(255,255,255,0.2)";
        //     }   

        // if(valeur_password2 != valeur_conf_password){

        //     document.getElementById("password").style.border = "2px solid red";    
        //     document.getElementById("confirm_password").style.border = "2px solid red";  
        //      document.getElementById("password_len_error2").classList.remove("titanic");

            
        // }


        if (erreur === true) {
            event2.preventDefault();
        }   

        if (erreur==false){
            console.log("connexion1 réussie");


            if (erreur === false) {
            //     console.log("Inscription réussie !");

            //     const container = document.querySelector(".container");

                
            //     container.innerHTML = `
            //         <form id="login_form">
            //             <h1><p>Bienvenue</p></h1>
            //             <input type="email" placeholder="Email" id="email">
            //             <div id="email_error" class="error-text titanic">L'adresse email est obligatoire.</div><br>
            //             <input type="password" placeholder="Mot de passe" id="password">
            //             <div id="password_error" class="error-text titanic">Le mot de passe est obligatoire.</div><br>
            //             <input type="submit" value="Connexion"><br>
            //             <a href="mdp_perdu.html">Mot de passe oublié</a><br>
            //             <a href="inscription.html">Créer un compte</a>
            //         </form>
            //     `;
            // }


            document.getElementById("email").style.border = "1px solid rgba(255,255,255,0.2)";
            document.getElementById("password").style.border = "1px solid rgba(255,255,255,0.2)";
            document.getElementById("confirm_password").style.border = "1px solid rgba(255,255,255,0.2)";

            
            }   
            
        }

        
        console.log(valeur_email2);
        console.log(valeur_password2);
        console.log("okayyyy");
    });

}

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//


if (mdp_perdu){


    mdp_perdu.addEventListener("submit",function(event3){

        event3.preventDefault();

        document.getElementById("email_error2").classList.add("titanic");

        document.getElementById("mail_perdu").style.border = "1px solid rgba(255,255,255,0.2)";
        
        let erreur_perdue = false;


        
        const valeur_mail_perdu = document.getElementById("mail_perdu").value;
        

        if(valeur_mail_perdu==""){
             document.getElementById("mail_perdu").style.border = "2px solid red";
            erreur_perdue = true;
            document.getElementById("email_error2").classList.remove("titanic");

        }

        


        if (erreur_perdue==false){
            console.log(" Réinitialisation de mdp réussie");
            document.getElementById("mail_perdu").style.border = "1px solid rgba(255,255,255,0.2)";
            window.location.href = "login.html";
            }   
    })
}



//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

if (btn_deconnexion){

    btn_deconnexion.addEventListener("click",function(event4){
        localStorage.removeItem("email_stocke");
        console.log(email_stocke);


    })
}
if (var_mail){

    var_mail.textContent = "Bonjour, Bienvenue " + localStorage.getItem("email_stocke");
    // localStorage.getItem("email_stocke")="Bonjour" + var_mail.textContent;

    // document.getElementById("message_bienvenue").textContent="Bonjour" + var_mail;
    
}




//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//






if (ticketForm) {
    ticketForm.addEventListener("submit", function(event) {


        // --- LE NETTOYAGE 🧼 ---
        // On cache les erreurs précédentes et on remet les bordures normales
        document.getElementById("title_error").classList.add("titanic");
        document.getElementById("description_error").classList.add("titanic");
        document.getElementById("project_error").classList.add("titanic");


        
        document.getElementById("title").style.border = "1px solid rgba(255,255,255,0.2)";
        document.getElementById("description").style.border = "1px solid rgba(255,255,255,0.2)";
        document.getElementById("project").style.border = "1px solid rgba(255,255,255,0.2)";


        // --- RÉCUPÉRATION DES VALEURS 📥 ---
        const title = document.getElementById("title").value;
        const project = document.getElementById("project").value;
        const description = document.getElementById("description").value;
        let erreur = false;

        // --- LA VÉRIFICATION 🔍 ---
        
        // 1. Cas spécial : Tout est vide (Alerte navigateur) ⚠️
        if (title == "" && description == "" && project =="") {
            alert("Oups ! Il semble que vous ayez oublié de remplir le formulaire. 😅");
            erreur = true;
        } 
        // 2. Sinon, on vérifie chaque champ individuellement
        else {
            if (title == "") {
                document.getElementById("title").style.border = "2px solid red";
                document.getElementById("title_error").classList.remove("titanic");
                erreur = true;
            }
            
            if (description == "") {
                document.getElementById("description").style.border = "2px solid red";
                document.getElementById("description_error").classList.remove("titanic");
                erreur = true;
            }
            if (project==""){
                document.getElementById("project").style.border = "2px solid red";
                document.getElementById("project_error").classList.remove("titanic");
                erreur = true;

            }
        }

        if (erreur === true){
            event.preventDefault();
        }

        if (erreur === false) {
            console.log("Ticket créé avec succès ! ");

        }
    });
}





//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//





if (projetForm){

    projetForm.addEventListener("submit", function(event){



        document.getElementById("nom_error").classList.add("titanic");
        document.getElementById("client_error").classList.add("titanic");
        document.getElementById("date_error").classList.add("titanic");
        document.getElementById("Budget_error").classList.add("titanic");
        document.getElementById("description_error").classList.add("titanic");



        document.getElementById("nom").style.border = "1px solid rgba(255,255,255,0.2)";
        document.getElementById("client").style.border = "1px solid rgba(255,255,255,0.2)";
        document.getElementById("date").style.border = "1px solid rgba(255,255,255,0.2)";
        document.getElementById("budget").style.border = "1px solid rgba(255,255,255,0.2)";
        document.getElementById("description").style.border = "1px solid rgba(255,255,255,0.2)";


        
        // --- RÉCUPÉRATION DES VALEURS 📥 ---
        const nom = document.getElementById("nom").value;
        const client = document.getElementById("client").value;
        const date = document.getElementById("date").value;
        const budget = document.getElementById("budget").value;
        const description = document.getElementById("description").value;
        let erreur = false;



        // 1. Cas spécial : Tout est vide (Alerte navigateur) ⚠️
        if (nom == "" && client == "" && date == "" && budget == "" && description == "") {
            alert("Vous avez mal rempli le formulaire !!!!");
            erreur = true;
        }
        // 2. Sinon, on vérifie chaque champ individuellement
        else {
            if (nom == "") {
                document.getElementById("nom").style.border = "2px solid red";
                document.getElementById("nom_error").classList.remove("titanic");
                erreur = true;
            }

            if (client == "") {
                document.getElementById("client").style.border = "2px solid red";
                document.getElementById("client_error").classList.remove("titanic");
                erreur = true;
            }
            if (date == "") {
                document.getElementById("date").style.border = "2px solid red";
                document.getElementById("date_error").classList.remove("titanic");
                erreur = true;
            }

            if (budget == "") {
                document.getElementById("budget").style.border = "2px solid red";
                document.getElementById("Budget_error").classList.remove("titanic");
                erreur = true;
                console.log("eh oh le budget là nan mais oh");
            }
            if (description==""){
                document.getElementById("description").style.border = "2px solid red";
                document.getElementById("description_error").classList.remove("titanic");

            }
        }
        if (erreur === true) {
            event.preventDefault();
        }

        if (erreur === false) {
            console.log("Ticket créé avec succès ! ");
            //  window.location.href = "ticket_colab.html";
        }

    });

}





//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//

//----------------------------------------------------//


const boutonsFiltre = document.querySelectorAll(".filter-btn");

if (boutonsFiltre.length > 0) {
    
    boutonsFiltre.forEach(function(bouton) {
        
        bouton.addEventListener("click", function() {
            // 1. Gérer le design : on enlève la classe "active" partout, et on la met sur le bouton cliqué
            boutonsFiltre.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            // 2. Savoir sur quel bouton on a cliqué ("tous" ou "à traiter")
            const texteBouton = this.textContent.trim().toLowerCase();
            
            // 3. Récupérer toutes les lignes du tableau (dans le tbody)
            const lignes = document.querySelectorAll("tbody tr");

            // 4. On vérifie chaque ligne une par une
            lignes.forEach(function(ligne) {
                // Le statut se trouve dans la 7ème colonne (index 6 car on compte à partir de 0)
                const celluleStatut = ligne.querySelectorAll("td")[6];
                
                if (celluleStatut) {
                    // On récupère le texte du statut (ex: "Terminé", "En cours"...)
                    const statutActuel = celluleStatut.textContent.trim().toLowerCase();
                    
                    if (texteBouton === "tous") {
                        // Si on clique sur "Tous", on affiche tout le monde
                        ligne.style.display = ""; 
                        
                    } else if (texteBouton === "à traiter") {
                        // Si on clique sur "À traiter", on cache uniquement ceux qui sont terminés
                        if (statutActuel.includes("termin")) {
                            ligne.style.display = "none"; // On cache la ligne
                        } else {
                            ligne.style.display = ""; // On garde la ligne
                        }
                    }
                }
            });
        });
    });
}