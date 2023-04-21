<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wetter Illighausen</title>
    <link rel="stylesheet" href="./Style/style.css" />
    <link rel="stylesheet" href="./Style/reset.css" />
    <link rel="stylesheet" href="./Style/Switch.css" />
</head>

<body>
    <!-- Header -->
    <nav class="navbar">
        <a class="navbar-left" href="./">Home</a>

        <div class="navbar-right">
            <div class="navbar-right-text">
                <a class="navbar-right-text-a" href="./Altnau.php">Altnau</a>
                <a class="navbar-right-text-a" href="./Illighausen.php">Illighausen</a>
            </div>
            <!-- Switch-->
            <label class="switch navbar-switch">
                <input onclick="changeColorMode()" type="checkbox" checked />
                <span class="slider round"></span>
            </label>
            <div class="navbar-logo">
                <a href="#">
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="icon"
                            d="M28 24.6044L15.6978 12.3022L28 0L40.3022 12.3022L28 24.6044ZM43.6978 40.3022L31.3956 28L43.6978 15.6978L56 28L43.6978 40.3022ZM12.3022 40.3022L0 28L12.3022 15.6978L24.6044 28L12.3022 40.3022ZM28 56L15.6978 43.6978L28 31.3956L40.3022 43.6978L28 56Z"
                            fill="#DDDDDD" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content-->
    <main>
        <h1 class="title">Aktuelles Wetter</h1>

        <!-- Picture Column -->
        <div class="Column-Img">
            <img src="./Images/rain.png" alt="Regen" />
            <img src="./Images/wolkig.png" alt="Wolkig" />
        </div>

        <!-- Button Column -->
        <div class="Column-Button">
            <a href="./Illighausen.html">Illighausen</a>
            <a href="./Altnau.php">Altnau</a>
        </div>

        <!-- Text Column-->
        <div class="Column-Full">
            <h3>Projektidee:</h3>
            <br />
            <p>
                Wir wollen eine oder zwei Wetterstationen mit Sensoren bauen, die
                Daten auslesen kann und in einer Datenbank speichern kann. Als
                Benutzerschnittstelle werden wir eine Webseite mit einem Webserver
                hosten, die die ausgelesenen Daten grafisch darstellen kann. Am Ende
                des Projektes werden wir eine Wetterstation mit verschiedenen Sensoren
                haben, die automatisch die gesammelten Messwerte auf die Datenbank
                schreibt. Wir werden als Vorlage eine
                <a class="inner-link" href="https://www.aeq-web.com/arduino-wetterstation/"
                    target="_blank">Anleitung</a>
                von aeq-web nehmen.

                <br /><br />

                Wir werden zwei Wetterstationen bauen, damit die Daten von zwei
                Standorten ausgelesen werden können. Dies würde uns ermöglichen, das
                wir Beide die Wetterstation weiter nutzen können.
            </p>

            <br />

            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis ex,
                nostrum est illum id non voluptatibus sit? Illum necessitatibus nihil
                accusantium dolorum, esse, earum quia alias eum et aliquid fugit
                dignissimos dolore adipisci officiis temporibus rerum nulla, ipsum
                ducimus iste perferendis recusandae repellendus reprehenderit soluta.
                Expedita nam iure minus optio doloribus odio dolorum assumenda
                ducimus, laborum nobis quisquam aperiam recusandae ut dolorem, ipsum
                vel perspiciatis laboriosam amet modi. Animi aliquid doloremque facere
                cupiditate dolore, quod tenetur iure minus laudantium ipsum qui nihil
                ipsam maiores obcaecati dolor placeat ea voluptates deleniti
                accusantium eveniet hic tempora. Cupiditate, sunt magni? Doloremque
                corporis repellat error ratione quisquam illo explicabo, accusantium
                distinctio voluptates assumenda quas eum, aliquam eveniet pariatur
                veniam sit, alias amet nobis tempora aliquid? Incidunt debitis esse ab
                nobis deserunt. Ipsum error sapiente perspiciatis distinctio maiores?
                Facilis nesciunt ipsum ipsa assumenda deleniti consequatur dolorem ab,
                porro eveniet officiis voluptatem corrupti doloribus, placeat
                voluptatibus vitae inventore iure asperiores earum. Asperiores
                repudiandae maiores consequuntur, corporis reprehenderit quam vel
                distinctio sapiente, maxime culpa, vero incidunt tempora similique!
                Qui ab fuga minima hic. Neque iste incidunt impedit obcaecati tempora
                dicta! Ad iusto quos a harum voluptatem necessitatibus non enim.
                Cupiditate iste debitis voluptas doloremque porro totam dolor.
            </p>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>
            &copy 2023
            <a href="https://github.com/Severinboegli" target="_blank" class="inner-link">Severin Bögli</a>
            & Timo Schreiber
        </p>
    </footer>

    <script type="text/javascript" src="./Javascript/main.js"></script>
</body>

</html>