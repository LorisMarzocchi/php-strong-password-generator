<!-- Descrizione

Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale

Milestone 3 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.*/ -->




<?php
include_once __DIR__ . '/function.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-strong-password-generator</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" defer></script>
</head>

<body>
    <div class="container containerBig">
        <div class="text-center">

            <h1 style="color: #808B99;">Strong Password Generator</h1>
            <h2 style="color: white;">Genera una password sicura</h2>
        </div>

        <div class="alert <?php echo !($includeLetters || $includeNumbers || $includeSymbols) || $length <= 0 ? '' : 'd-none'; ?>">
            Nessun Parametro valido inserito
        </div>

        <form action="" method=" GET" class="w-75 m-auto d-flex justify-content-between">
            <div class="mt-4 btn_control">
                <div class="d-flex flex-column">

                    <label for="exampleInputEmail1" class="form-label">Lunghezza Password:</label>
                    <label for="flexRadioDefault1" class="mt-2"> Consenti ripetizioni di uno o più caratteri: </label>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-3">Submit</button>
                    <a class="btn btn-secondary resetBtn" href="/php-strong-password-generator">Annulla</a>
                </div>

            </div>
            <div class="mt-4 ">

                <div>
                    <input input type="number" name="str_leng" id="str_leng" value="<?php echo $length; ?>" max="20">

                </div>

                <!-- radio -->
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="repeatChar" id="repeatChar" value="true">
                    <label class="form-check-label" for="repeatChar">
                        Si
                    </label>
                </div>
                <div class="form-check mt-2">

                    <input class="form-check-input" type="radio" name="repeatChar" id="norepeat" value="false" checked>
                    <label class="form-check-label" for="norepeat">
                        No
                    </label>
                </div>

                <!-- check -->

                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="checkLetters" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        Lettere
                    </label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="checkNumbers" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Numeri
                    </label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="checkSimbols" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        Simboli
                    </label>
                </div>
            </div>

        </form>

    </div>
    <div>


        <p class="mt-4" style="font-size: 2rem; color: white;">La tua Password è: <?php echo $password; ?></p>
    </div>
</body>

</html>