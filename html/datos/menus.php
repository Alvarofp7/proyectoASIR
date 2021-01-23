
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
          echo "\___/";
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
     
    //instanciamos menu1
    $menu1=new Menu();
    //guardamos cada enlace mediante el método
    //cargarOpcion
    $menu1->cargarOpcion('datos/oficina/menu_oficina.php','Oficina y almacen');
    $menu1->cargarOpcion('datos/riego/riego.php','riego');
    $menu1->cargarOpcion('datos/rc/menu_rc.php','RC');

 //instanciamos menu2
    $menu2=new Menu();
    //guardamos cada enlace mediante el método
    //cargarOpcion
    $menu2->cargarOpcion('datos/pruebas/sueldo.php','prueba sueldo');
    $menu2->cargarOpcion('datos/pruebas/prueba_conexion.php','prueba_conexion.php');
    $menu2->cargarOpcion('datos/pruebas/conexion2.php','conexion2');
    $menu2->cargarOpcion('datos/pruebas/conexion3.php','conexion3');
    $menu2->cargarOpcion('datos/pruebas/conexion4.php','conexio4');
    $menu2->cargarOpcion('datos/pruebas/pasar_variables.php', 'pasar variables');
    $menu2->cargarOpcion('datos/pruebas/addnew.php','prueba insercion datos');
    $menu2->cargarOpcion('datos/pruebas/sesion1.php','sesion1');
    //mostramos los menús
//    $menu1->mostrarVertical();
   echo "<table>";
//	echo "<th>";
//		echo "< a href'datos/oficina/menu_oficina.php'>oficina</a>";
//	echo "</th>";
	echo "<th>proyectos</th>";
	echo "<th>pruebas</th>";
	echo "<tr>";
	  echo " <td>";
	  $menu1->mostrarVertical();
	  echo "</td>";

	  echo " <td>";
	  $menu2->mostrarVertical();
	  echo "</td>";

 
	echo "</tr>";
   echo "</table>";
    echo "<hr>";
//    $menu1->mostrarHorizontal();
    ?>
    
