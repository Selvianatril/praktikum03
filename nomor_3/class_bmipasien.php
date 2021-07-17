<?php
    class bmi_passien{
        public $nama;
        public $umur;
        public $jeniskelamin;
        public $berat;
        public $tinggi;
        function __construct($nama, $umur, $jeniskelamin, $berat, $tinggi)
        {
            $this->nama = $nama;
            $this->umur = $umur;
            $this->jeniskelamin = $jeniskelamin;
            $this->berat = $berat;
            $this->tinggi = $tinggi;
        }

        function hasilBMI(){
            return $this->berat/(pow(($this->tinggi/100),2));
        }

        function statusBMI(){
            if($this->hasilBMI()<18.5){
                return "Kekurangan";
            }elseif($this->hasilBMI()<25&&$this->hasilBMI()>=18.5){
                return "Ideal";
            }elseif($this->hasilBMI()<30&&$this->hasilBMI()>=25){
                return "Kelebihan";
            }else{
                return "Kegemukan";
            }
        }
    }