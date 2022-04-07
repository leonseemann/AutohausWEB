<?php
    function printCar($marke){
        include 'conn.php';
        //$sql = "SELECT  modell, baujahr, kommentar, preis FROM auto LEFT JOIN ausstattung ON 'ausstattung.ASID' = 'auto.ASID' WHERE auto.hersteller = '{$marke}'";
        $sql = "SELECT typ, modell, baujahr, hersteller, kommentar, bild, bildendung, felgenzoll, felgenmaterial, sitzheizung, lenkradheizung, schiebedach, farbe, farbematerial, innenraummaterial, sitzmaterial, verbrauch, getriebe, kraftstoff, hubraum, ps, preis 
                FROM auto 
                LEFT JOIN ausstattung ON auto.ASID = ausstattung.ASID 
                LEFT JOIN motor ON auto.MTID = motor.MTID 
                WHERE auto.hersteller = '{$marke}' 
                ORDER BY auto.hersteller, auto.typ ASC";
        $abfrage = mysqli_query($conn, $sql);
        while ($ausgabe = mysqli_fetch_assoc($abfrage)) {
?>
            <div class="w-44">
                <div>
                    <p class="text-center header-sections"><?php echo $ausgabe['modell'] ?></p>
                </div>
                <div>
                    <img src="data:image/<?php echo $ausgabe['bildendung']?>;charset=utf8;base64,<?php echo base64_encode($ausgabe['bild']); ?>"  class="ausstattung-img" alt="audi">
                </div>
                <div class="text-white">
                    <p class="bg-red-400 break-words">
                    <?php echo $ausgabe['kommentar'] ?>
                    </p>
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
            </div>
<?php
        }
    }
?>