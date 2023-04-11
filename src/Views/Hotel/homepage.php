<?php
ob_start();
?>

<section class="homepage">
    <div id="bubble-wrapper"></div>
    <style>
        #bubble-wrapper {
            z-index: -1;
            height: 100%;
            width: 100%;

            position: fixed;
            bottom: 0px;

            overflow: hidden;
            /* pointer-events: none; */
        }

        .bubble {
            z-index: -1;

            height: max(300px, 30vw);
            width: max(300px, 30vw);

            background-color: #3f90d3;
            border-radius: 100%;

            position: absolute;
            left: 50%;
            top: 100%;

            animation: wave 2s ease-in-out infinite;
        }

        @keyframes wave {

            from,
            to {
                transform: translate(-50%, 0%);
            }

            50% {
                transform: translate(-50%, -20%);
            }
        }
    </style>
    <!-- PAGE D'INSCRIPTION DU CLIENT -->
    <h2>Que voulez-vous consulter ?</h2>
    <div id="formulaire">
        <form action="/client/inscription/" method="post">
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
            <input type="text" name="nom" id="nom" placeholder="Nom">
            <input type="email" name="email" id="email" placeholder="Exemple.exemple@exmpl.fr">

            <!-- <select name="chambre" id="select">
                <option value="chambre">Chambre</option>
                <option value="Spa">Spa</option>
                <option value="Retaurant">Retaurant</option>
                <option value="Salle">Salle</option>
            </select> -->
            <button type="submit">Yep</button>
        </form>
    </div>
    <script>
        const wrapper = document.getElementById("bubble-wrapper");

        const animateBubble = (x) => {
            const bubble = document.createElement("div");

            bubble.className = "bubble";

            bubble.style.left = `${x}px`;

            wrapper.appendChild(bubble);

            setTimeout(() => wrapper.removeChild(bubble), 2000);
        };

        window.onmousemove = (e) => animateBubble(e.clientX);
    </script>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
