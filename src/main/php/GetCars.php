<?php
    function printCar($marke, $typ){
        include 'conn.php';
        $sql = "SELECT typ, modell, baujahr, hersteller, kommentar, bild, bildendung, felgenzoll, felgenmaterial, sitzheizung, lenkradheizung, schiebedach, farbe, farbematerial, innenraummaterial, sitzmaterial, verbrauch, getriebe, kraftstoff, hubraum, ps, preis 
                FROM auto 
                LEFT JOIN ausstattung ON auto.ASID = ausstattung.ASID 
                LEFT JOIN motor ON auto.MTID = motor.MTID 
                WHERE auto.hersteller = '{$marke}' 
                AND auto.typ = '{$typ}'
                ORDER BY auto.hersteller, auto.typ ASC";
        $abfrage = mysqli_query($conn, $sql);
        ?>
        <section id="<?php echo $typ ?>" >
        <div class="w-screen">
            <p class="text-center text-[50px] dark:text-white"><?php echo $typ ?></p>
        </div>
        <div class="grid grid-cols-2 grid-rows-none md:grid-cols-3 md:grid-rows-none xl:grid-cols-4 xl:grid-rows-none gap-4 justify-items-center">
        <?php
        while ($ausgabe = mysqli_fetch_assoc($abfrage)) {
?>
            <div class="w-44">
                <div>
                    <p class="text-center header-sections"><?php echo $ausgabe['modell'] ?></p>
                </div>
                <div>
                    <img src="data:image/<?php echo $ausgabe['bildendung']?>;charset=utf8;base64,<?php echo ($ausgabe['bild']); ?>"  class="ausstattung-img" alt="audi">
                </div>
                <div class="dark:text-white text-black mt-1">
                    <p class="break-words border-2 dark:border-white border-black">
                    <?php echo $ausgabe['kommentar'] ?>
                    </p>
                </div>
                <div>
                    <ul>
                        <li class="ausstattung">Baujahr: <?php echo $ausgabe['baujahr']; ?></li>
                        <li class="ausstattung">Zoll:            <?php echo $ausgabe['felgenzoll']; ?></li>
                        <li class="ausstattung">Felgen Material: <?php echo $ausgabe['felgenmaterial']; ?></li>
                        <li class="ausstattung">Sitzheizung: <?php echo $ausgabe['sitzheizung']; ?></li>
                        <li class="ausstattung">Lenkradheizung: <?php echo $ausgabe['lenkradheizung']; ?></li>
                        <li class="ausstattung">Schiebedach: <?php echo $ausgabe['schiebedach']; ?></li>
                        <li class="ausstattung">Farbe: <?php echo $ausgabe['farbe']; ?></li>
                        <li class="ausstattung">Farb Material: <?php echo $ausgabe['farbematerial']; ?></li>
                        <li class="ausstattung">Innenraum Material: <?php echo $ausgabe['innenraummaterial']; ?></li>
                        <li class="ausstattung">Sitzmaterial: <?php echo $ausgabe['sitzmaterial']; ?></li>
                        <li class="ausstattung">Verbrauch: <?php echo $ausgabe['verbrauch']; ?></li>
                        <li class="ausstattung">Getriebe: <?php echo $ausgabe['getriebe']; ?></li>
                        <li class="ausstattung">Kraftstoff: <?php echo $ausgabe['kraftstoff']; ?></li>
                        <li class="ausstattung">Hubraum: <?php echo $ausgabe['hubraum']; ?></li>
                        <li class="ausstattung">PS: <?php echo $ausgabe['ps']; ?></li>
                        <li class="ausstattung">Preis: <?php echo $ausgabe['preis']; ?></li>
                    </ul>
                </div>
            </div>
<?php
        }
        ?>
                </div>
    </section>
        <?php
    }
?>
