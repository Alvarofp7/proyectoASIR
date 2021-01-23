 <?php
    class Menu {
      private $enlaces=array();
      private $titulos=array();

      //Función que guarda el enlace y el títutulo
      //dentro cada array.
      public function cargarOpcion($en,$tit)
      {
        $this->enlaces[]=$en;
        $this->titulos[]=$tit;
      }


			 //Método que muestra el menú horizontal
      public function mostrarHorizontal()
      {
        for($f=0;$f<count($this->enlaces);$f++)
        {
          echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
          echo "-";
        }
      }
     

			 //Función que muestra el menú vertical
      public function mostrarVertical()
      {
        for($f=0;$f<count($this->enlaces);$f++)
        {
          echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
          echo "<br>";
        }
      }
    }

		
		 //instanciamos menu1 clintes
    $menu1=new Menu();
    //guardamos cada enlace mediante el método
    //cargarOpcion
    $menu1->cargarOpcion('ingreso.php','ingresar como usuario');
    $menu1->cargarOpcion('alta.php','darse de alta');
		
				 //instanciamos menu2 empresa
    $menu2=new Menu();
    //guardamos cada enlace mediante el método
    //cargarOpcion
    $menu2->cargarOpcion('datos_empresa.php','conocenos');
    $menu2->cargarOpcion('trabajos.php','nuestros trabajos');
		$menu2->cargarOpcion('contacto.php','contactenos');
    

		 //instanciamos menu3 administraccion
    $menu3=new Menu();
    //guardamos cada enlace mediante el método
    //cargarOpcion
    $menu3->cargarOpcion('consulta.php','consultar datos');
    $menu3->cargarOpcion('modificar.php','modificar datos');
		
		//Mostramos los menús
//    $menu1->mostrarVertical();
   echo "<table align='center'>";
        echo "<th>clientes</th>";
        echo "<th>nuestra empresa</th>";
//	echo "<th>Administraccion</th>";
        echo "<tr>";
          echo " <td>";
            $menu1->mostrarVertical();
          echo "</td>";
          echo " <td>";
            $menu2->mostrarVertical();
           echo "</td>";
	// echo " <td>";
          //   $menu3->mostrarVertical();
         //  echo "</td>";
        echo "</tr>";
echo "</table>";

    echo "<hr>";
//    $menu1->mostrarHorizontal();
    ?>
