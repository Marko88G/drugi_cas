<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//Definicija klase

class Osoba
{
    //atributi
    public $ime;
    public $prezime;
    //metode
    public function __construct($ime, $prezime)
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
    }
    public function pozdrav()
    {
        echo "Moje ime je {$this->ime}, prezivam se {$this->prezime}.";
    }
}

// Ucenik nasledjuje Osobu
class Ucenik extends Osoba
{
    public function poruka()
    {
        echo " Ja sam ucenik!";
    }
}

//kreiranje objekta klase Ucenik
$ucenik = new Ucenik("Ivana", "Dimitrijevic");
// poziv metoda
$ucenik->pozdrav();
$ucenik->poruka();

// diskusija sta su staticne metode i atributi
// sta je $this, self::, parent:: i kako se pozivaju staticne metode i atributi

// Abstrakna klasa
abstract class Auto
{
    public $ime;
    public function __construct($ime)
    {
        $this->ime = $ime;
    }
    abstract public function predstaviSe(): string;
}

class Audi extends Auto
{

    public function predstaviSe(): string
    {
        return "Nemacki kvalitet! Ja sam $this->ime!";
    }
}


echo "<br><br><br>";
$audi = new audi("Audi");
echo $audi->predstaviSe();
echo "<br><br><br>";


// Definicija interfejsa
interface Zivotinja
{
    public function ispustiZvuk();
}

// klase implementiraju interfejs
class Macka implements Zivotinja
{
    public function ispustiZvuk()
    {
        echo " Mnjau! ";
    }
}

class Pas implements Zivotinja
{
    public function ispustiZvuk()
    {
        echo " Av-av! ";
    }
}

class Mis implements Zivotinja
{
    public function ispustiZvuk()
    {
        echo " Ciju! ";
    }
}

// kreiramo listu zivotinja
$macka = new Macka();
$pas = new Pas();
$mis = new Mis();
$zivotinje = array($macka, $pas, $mis);

// Neka zivotinje ispuste zvuk
foreach ($zivotinje as $zivotinja) {
    $zivotinja->ispustiZvuk();
}

// definicija trait-a
trait poruka1 {
  public function por1() {
    echo "OOP je zabavno! ";
  }
}

trait poruka2 {
  public function por2() {
    echo "Na ovaj nacin sprecili smo dupliranje koda!";
  }
}

class Dobrodosli {
  use poruka1;
}

class Dobrodosli2 {
  use poruka1, poruka2;
}
echo "<br><br><br>";
$obj = new Dobrodosli();
$obj->por1();
echo "<br>";

$obj2 = new Dobrodosli2();
$obj2->por1();
$obj2->por2();
?>