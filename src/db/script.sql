DROP DATABASE IF EXISTS Autohaus;

DROP USER IF EXISTS Autohaus;

CREATE DATABASE Autohaus;

USE Autohaus;

CREATE USER 'Autohaus'@'%' IDENTIFIED BY 'vbewyfpigq';

GRANT ALL PRIVILEGES ON Autohaus.* TO 'Autohaus'@'%';

CREATE TABLE benutzer(
    email VARCHAR(120) NOT NULL,
    passwort LONGTEXT NOT NULL,
    name VARCHAR(60) NOT NULL,
    vorname VARCHAR(60) NOT NULL,
    isAdmin boolean NOT NULL,

    PRIMARY KEY (email)
);

CREATE TABLE logs(
    LogID INT AUTO_INCREMENT,
    email VARCHAR(120) NULL,
    aktivitaet ENUM("geloescht", "editiert", "erstellt", "login", "reload") NOT NULL,
    wo ENUM("Auto", "Motor", "Ausstattung", "Main", "Login", "Benutzer") NULL,
    art ENUM("erfolgreich", "fehlgeschlagen", "abbruch") NULL,
    datumzeit DATETIME NOT NULL,
    ID VARCHAR(120) NULL,
    modell VARCHAR(120) NULL,
    error boolean null,
    art_error ENUM("SQL", "Zero") NULL,
    
    PRIMARY KEY (LogID),
    FOREIGN KEY (email) REFERENCES benutzer(email)
);

CREATE TABLE ausstattung(
    ASID INT AUTO_INCREMENT,
    felgenzoll INT NOT NULL,
    felgenmaterial ENUM("Aluminium", "Stahl", "Carbon", "Magnesium", "Silizium", "Mangan") NOT NULL,
    sitzheizung BOOLEAN NOT NULL,
    lenkradheizung BOOLEAN NOT NULL,
    schiebedach BOOLEAN NOT NULL,
    farbe VARCHAR(20) NOT NULL,
    farbematerial ENUM("Matt", "Glanz", "Perleffekt") NOT NULL,
    innenraummaterial ENUM("Carbon", "Alkantara", "Holz", "Plastik") NOT NULL,
    sitzmaterial ENUM("Stoff", "Leder", "Alkantara") NOT NULL,

    PRIMARY KEY (ASID)
);

CREATE TABLE motor(
    MTID INT AUTO_INCREMENT,
    verbrauch DECIMAL(4,1) NOT NULL,
    getriebe ENUM("Manuell", "Automatik", "Halb-Automatik") NOT NULL,
    kraftstoff ENUM("Diesel", "Benzin", "Strom", "Gas") NOT NULL,
    hubraum INT NOT NULL,
    ps INT NOT NULL,

    PRIMARY KEY (MTID)
);

CREATE TABLE hersteller(
    name VARCHAR(40) NOT NULL,
    bild LONGBLOB NULL,

    PRIMARY KEY(name)
);

CREATE TABLE auto(
    ATID INT AUTO_INCREMENT,
    typ ENUM("Kombi", "Coupe", "Sportwagen", "Limo", "SUV", "Cabrio") NOT NULL,
    modell varchar(120) NOT NULL,
    baujahr YEAR NOT NULL,
    hersteller VARCHAR(40) NOT NULL,
    kommentar TEXT,
    ASID INT NOT NULL,
    MTID INT NOT NULL,
    preis DECIMAL(9,2) NOT NULL,
    bild LONGBLOB NULL,
    bildendung VARCHAR(10) NULL,

    PRIMARY KEY (ATID),
    FOREIGN KEY (hersteller) REFERENCES hersteller(name),
    FOREIGN KEY (ASID) REFERENCES ausstattung(ASID),
    FOREIGN KEY (MTID) REFERENCES motor(MTID)
);

INSERT INTO hersteller (name, bild) VALUES 
("BMW", NULL),
("Mercedes", NULL),
("VW", NULL),
("Audi", NULL),
("Opel", NULL),
("Nissan", NULL),
("Porsche", NULL),
("Lamborghini", NULL),
("Smart", NULL),
("Ferrari", NULL),
("Toyota", NULL),
("Tesla", NULL);

INSERT INTO benutzer (email, passwort, name, vorname, isAdmin) VALUES
("admin", "7360712892824196687521745519054839085350128576811889068488579689103788595432037146814305307800227205315269523349366745558317869196600265142736183919064635858769264718889613498442583763995271627236862344350993450847320151530337934028777261150255862461396470516217925506496390049745662325812626289624534353290254709423774400400739371233125302569475911889087078225296930031870154372098511853424132232771442935989557388256849672861656925157463979917831794687506275278813320127768751833614207960173157536315384447631920554835469789265830735274743536004466870036650331800452578405967806852537515622247156639720515933671538", "admin", "admin", 1);