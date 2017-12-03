<?php
class Person
{
	private $FName;
	private $LName;
	private $address;
	private $eAdd;
	
	public function GetFirstName() {
		return $this->FName; 
	}

	public function GetLastName() {
		return $this->LName;
	}

	public function SetFirstName($fn) {
		$this->FName=$fn;
	}

	public function SetLastName($ln) {
		$this->LName=$ln;
	}
		
	public function GetAdd() {
		return $this->address;
	}

	public function SetAdd($a) {
		$this->address=$a;
	}
	
	public function GetEmail()
	{
		return $this->eAdd;
	}
	
	public function SetEmail($e) {
		$this->eAdd=$e;
	}
	
	public function Display();

		
}
}
class Item
{
	protected $Name;
	protected $price;
	protected $dateEntry;
	protected $dateMod;
	
	public function GetName() {
		return $this->Name; 
	}

	public function GetPrice() {
		return $this->price;
	}

	public function SetName($n) {
		$this->Name=$n;
	}

	public function SetPrice($p) {
		$this->price=$p;
	}
		
	public function GetEnt() {
		return $this->dateEntry;
	}

	public function SetEnt($de) {
		$this->dateEntry=$de;
	}
	
	public function GetMod()
	{
		return $this->dateMod;
	}
	
	public function SetMod($dm) {
		$this->dateMod=$dm;
	}
}

class Cars extends Item
{
	private $doors;
	private $horsePower;
	
	public function GetDoor() {
		return $this->doors; 
	}

	public function GetHorse() {
		return $this->horsePower;
	}
	
	public function SetDoor($d) {
		$this->doors=$d;
	}
	
	public function SetHorse($p) {
		$this->horsePower=$p;
	}
}

class Phones extends Item
{
	private $OS;
	private $size;
	public function GetOS() {
		return $this->OS; 
	}

	public function GetSize() {
		return $this->size;
	}
	public function SetOS($os) {
		$this->OS=$os;
	}
	public function SetSize($size) {
		$this->size=$size;
	}
}
?>