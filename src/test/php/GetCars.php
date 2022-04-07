<?php
    function printCar($marke){
        include 'conn.php';
        $sql = "SELECT ATID, typ, modell, baujahr, kommentar, felgenzoll, felgenmaterial, sitzheizung, lenkradheizung, schiebedach, farbe, farbematerial, innenraummaterial, sitzmaterial, verbrauch, getriebe, kraftstoff, hubraum, ps, preis FROM auto WHERE hersteller = {$marke} JOIN ausstattung ON auto.ASID = ausstattung.ASID JOIN motor ON auto.MTID = motor.MTID ORDER BY auto.hersteller, auto.typ ASC";
        $abfrage = mysqli_query($conn, $sql);
        while ($ausgabe = mysqli_fetch_assoc($abfrage)) {
?>
            <div class="w-44">
                <div>
                    <p class="text-center header-sections"><?php $ausgabe['modell'] ?></p>
                </div>
                <div>
                    <img src="./resources/none.svg" class="ausstattung-img" alt="audi">
                </div>
                <div>
                    <ul>
                        <li class="ausstattung"><?php echo $ausgabe['baujahr']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['felgenzoll']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['felgenmaterial']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['sitzheizung']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['lenkradheizung']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['schiebedach']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['farbe']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['farbematerial']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['innenraummaterial']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['sitzmaterial']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['verbrauch']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['getriebe']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['kraftstoff']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['hubraum']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['ps']; ?></li>
                        <li class="ausstattung"><?php echo $ausgabe['preis']; ?></li>
                    </ul>
                </div>
                <div>
                    <p>
                        <?php echo $ausgabe['kommentar']; ?>
                    </p>
                </div>
            </div>
<?php
        }
    }
?>