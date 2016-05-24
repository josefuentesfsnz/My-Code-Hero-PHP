<?php
    class Carro 
    {
        var $color;
        var $numero_puertas;
        var $marca;
        var $gasolina;

        function llenarTanque($gasolina_nueva)
        {
            $this->gasolina = $this->gasolina + $gasolina_nueva;
        }

        function acelerar()
        {
            $this->gasolina = $this->gasolina - 1;
            return 'Gasolina restante: '.$this->gasolina;
        }
    }
    $carro = new Carro(); // Instanciamos la clase Carro
    $carro->color = 'Rojo'; // Llenamos algunas de las propiedades
    $carro->marca = 'Honda';
    $carro->numero_puertas = 4;
    $carro->llenarTanque(10); // utilizamos los metodos
    echo $carro->acelerar();
    $carro->acelerar();
    $carro->acelerar();
