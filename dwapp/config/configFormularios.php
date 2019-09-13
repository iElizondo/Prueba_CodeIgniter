<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Produntos */
$config['tipoproductos'] = array(
    1 => array(
        'nombre' => 'Servicio',
        'codigo' => 01
    ),
    2 => array(
        'nombre' => 'Producto',
        'codigo' => 01
    )
 );

 $config['tarifas_iva'] = array(
    1 => 'Tarifa 0% (Exento)',
    2 => 'Tarifa reducida 1%',
    3 => 'Tarifa reducida 2%',
    4 => 'Tarifa reducida 4%',
    5 => 'Transitorio 0%',
    6 => 'Transitorio 4%',
    7 => 'Transitorio 8%',
    8 => 'Tarifa general 13%',
 );

 $config['medidas'] = array(
    'Alc'  => 'Alquiler comercial',
    'cm'   => 'Centímetro',
    'h'    => 'Hora',
    'kg'   => 'Kilogramo',
    'L'    => 'Litro',
    'm'    => 'Metro',
    'm²'   => 'Metro cuadrado',
    'm³'   => 'Metro cúbico',
    'ln'   => 'Pulgada',
    'Sp'   => 'Serv. Profesional',
    'Unid' => 'Unidad'
 ); 


/* Menú */
$config['menu'] = array(

    'Registros' => array(
        'icono_categoria'=>'fas fa-file-medical',
        'enlaces'=> array(
            'Servicio' => array(
                'anchor'     => 'Productos',
                'url'        => 'producto',
                'class_icon' => 'fas fa-list'
            ),
            'Clientes' => array(
                'anchor'     => 'Clientes',
                'url'        => 'cliente',
                'class_icon' => 'fas fa-user-friends'
            )
        )
    ),
    'Sistemas' => array(
        'icono_categoria'=>'fas fa-laptop-code',
        'enlaces'=> array(
          'Roles' => array(
              'anchor'     => 'Roles',
              'url'        => 'roles',
              'class_icon' => 'fas fa-exclamation-triangle'
          )
        )
    )
 );
/* Fin configuracion menu */ 

/* ConboBox de provincias, cantones y distritos */

$config['provincias_hc'] = array (
    1 => 'San josé',
    2 => 'Alajuela',
    3 => 'Cartago',
    4 => 'Heredia',
    5 => 'Guanacaste',
    6 => 'Puntarenas',
    7 => 'Limón',
);

$config['cantones_hc'] = array (
  1 => 
  array (
    1 => 'San José',
    2 => 'Escazú',
    3 => 'Desamparados',
    4 => 'Puriscal',
    5 => 'Tarrazú',
    6 => 'Aserrí',
    7 => 'Mora',
    8 => 'Goicochea',
    9 => 'Santa Ana',
    10 => 'Alajuelita',
    11 => 'Vásquez de Coronado',
    12 => 'Acosta',
    13 => 'Tibás',
    14 => 'Moravia',
    15 => 'Montes de Oca',
    16 => 'Turrubares',
    17 => 'Dota',
    18 => 'Curridabat',
    19 => 'Pérez Zeledón',
    20 => 'León Cortes',
  ),
  2 => 
  array (
    1 => 'ALAJUELA',
    2 => 'SAN RAMON',
    3 => 'GRECIA',
    4 => 'SAN MATEO',
    5 => 'ATENAS',
    6 => 'NARANJO',
    7 => 'PALMARES',
    8 => 'POAS',
    9 => 'OROTINA',
    10 => 'SAN CARLOS',
    11 => 'ALFARO RUIZ',
    12 => 'VALVERDE VEGA',
    13 => 'UPALA',
    14 => 'LOS CHILES',
    15 => 'GUATUSO',
    16 => 'RIO CUARTO',
  ),
  3 => 
  array (
    1 => 'CARTAGO',
    2 => 'PARAISO',
    3 => 'LA UNION',
    4 => 'JIMENEZ',
    5 => 'TURRIALBA',
    6 => 'ALVARADO',
    7 => 'OREAMUNO',
    8 => 'EL GUARCO',
  ),
  4 => 
  array (
    1 => 'HEREDIA',
    2 => 'BARVA',
    3 => 'SANTO DOMINGO',
    4 => 'SANTA BARBARA',
    5 => 'SAN RAFAEL',
    6 => 'SAN ISIDRO',
    7 => 'BELEN',
    8 => 'FLORES',
    9 => 'SAN PABLO',
    10 => 'SARAPIQUI',
  ),
  5 => 
  array (
    1 => 'LIBERIA',
    2 => 'NICOYA',
    3 => 'SANTA CRUZ',
    4 => 'BAGACES',
    5 => 'CARRILLO',
    6 => 'CAÑAS',
    7 => 'ABANGARES',
    8 => 'TILARAN',
    9 => 'NANDAYURE',
    10 => 'LA CRUZ',
    11 => 'HOJANCHA',
  ),
  6 => 
  array (
    1 => 'PUNTARENAS',
    2 => 'ESPARZA',
    3 => 'BUENOS AIRES',
    4 => 'MONTES DE ORO',
    5 => 'OSA',
    6 => 'AGUIRRE',
    7 => 'GOLFITO',
    8 => 'COTO BRUS',
    9 => 'PARRITA',
    10 => 'CORREDORES',
    11 => 'GARABITO',
  ),
  7 => 
  array (
    1 => 'LIMON',
    2 => 'POCOCI',
    3 => 'SIQUIRRES',
    4 => 'TALAMANCA',
    5 => 'MATINA',
    6 => 'GUACIMO',
  ),
);

$config['distritos_hc'] = array (
  1 => 
  array (
    1 => 
    array (
      1 => 'Carmen',
      2 => 'Merced',
      3 => 'Hospital',
      4 => 'Catedral',
      5 => 'Zapote',
      6 => 'San Francisco de Dos Ríos',
      7 => 'Uruca',
      8 => 'Mata Redonda',
      9 => 'Pavas',
      10 => 'Hatillo',
      11 => 'San Sebástian',
    ),
    2 => 
    array (
      1 => 'Escazú',
      2 => 'San Antonio',
      3 => 'San Rafael',
    ),
    3 => 
    array (
      1 => 'Desamparados',
      2 => 'San Miguel',
      3 => 'San Juan de Dios',
      4 => 'San Rafaél Arriba',
      5 => 'San Antonio',
      6 => 'Frailes',
      7 => 'Patarra',
      8 => 'San Cristóbal',
      9 => 'Rosario',
      10 => 'Damas',
      11 => 'San Rafaél Abajo',
      12 => 'Gravilias',
      13 => 'Los Guido',
    ),
    4 => 
    array (
      1 => 'Santiago',
      2 => 'Mercedes Sur',
      3 => 'Barbacoas',
      4 => 'Grifo Alto',
      5 => 'San Rafaél',
      6 => 'Candelarita',
      7 => 'Desamparaditos',
      8 => 'San Antonio',
      9 => 'Chires',
    ),
    5 => 
    array (
      1 => 'San Marcos',
      2 => 'San Lorenzo',
      3 => 'San Carlos',
    ),
    6 => 
    array (
      1 => 'Aserrí',
      2 => 'Tarbaca',
      3 => 'Vuelta del Jorco',
      4 => 'San Gabriel',
      5 => 'Legua',
      6 => 'Monterrey',
      7 => 'Salitrillos',
    ),
    7 => 
    array (
      1 => 'Mora',
      2 => 'Guayabo',
      3 => 'Tabarcia',
      4 => 'Piedras Negras',
      5 => 'Picagres',
      6 => 'Jaris',
      7 => 'Quitirrisi',
    ),
    8 => 
    array (
      1 => 'Guadalupe',
      2 => 'San Francisco',
      3 => 'Calle Blancos',
      4 => 'Mata de Platano',
      5 => 'Ipis',
      6 => 'Rancho Redondo',
      7 => 'Purral',
    ),
    9 => 
    array (
      1 => 'Santa Ana',
      2 => 'Salitral',
      3 => 'Pozos',
      4 => 'Uruca',
      5 => 'Piedades',
      6 => 'Piedades',
    ),
    10 => 
    array (
      1 => 'Alajuelita',
      2 => 'San Josecito',
      3 => 'San Antonio',
      4 => 'Concepción',
      5 => 'San Felipe',
    ),
    11 => 
    array (
      1 => 'San Isidro',
      2 => 'San Rafaél',
      3 => 'Dulce Nombre de Jesús',
      4 => 'Patalillo',
      5 => 'Cascajal',
    ),
    12 => 
    array (
      1 => 'San Ignacio',
      2 => 'Guaitil',
      3 => 'Palmichal',
      4 => 'Cangrejal',
      5 => 'Sabanillas',
    ),
    13 => 
    array (
      1 => 'San Juan',
      2 => 'Cinco Esquinas',
      3 => 'Anselmo Llorente',
      4 => 'León XIII',
      5 => 'Colima',
    ),
    14 => 
    array (
      1 => 'San Vicente',
      2 => 'San Jerónimo',
      3 => 'Trinidad',
    ),
    15 => 
    array (
      1 => 'San Pedro',
      2 => 'Sabanilla',
      3 => 'Betania',
      4 => 'San Rafaél',
    ),
    16 => 
    array (
      1 => 'San Pablo',
      2 => 'San Pedro',
      3 => 'San Juan de Mata',
      4 => 'San Luis',
      5 => 'Carara',
    ),
    17 => 
    array (
      1 => 'Santa María',
      2 => 'Jardín',
      3 => 'Copey',
    ),
    18 => 
    array (
      1 => 'Curridabat',
      2 => 'Granadilla',
      3 => 'Sánchez',
      4 => 'Tirrases',
    ),
    19 => 
    array (
      1 => 'San Isidro de El General',
      2 => 'General',
      3 => 'Daniel Flores',
      4 => 'Rivas',
      5 => 'San Pedro',
      6 => 'Platanares',
      7 => 'Pejibaye',
      8 => 'Cajón',
      9 => 'Barú',
      10 => 'Río Nuevo',
      11 => 'Páramo',
      12 => 'La Amistad',
    ),
    20 => 
    array (
      1 => 'San Pablo',
      2 => 'San Andrés',
      3 => 'Llano Bonito',
      4 => 'San Isidro',
      5 => 'Santa Cruz',
      6 => 'San Antonio',
    ),
  ),
  2 => 
  array (
    1 => 
    array (
      1 => 'ALAJUELA',
      2 => 'SAN JOSE',
      3 => 'CARRIZAL',
      4 => 'SAN ANTONIO',
      5 => 'GUACIMA',
      6 => 'SAN ISIDRO',
      7 => 'SABANILLA',
      8 => 'SAN RAFAEL',
      9 => 'RIO SEGUNDO',
      10 => 'DESAMPARADOS',
      11 => 'TURRUCARES',
      12 => 'TAMBOR',
      13 => 'GARITA',
      14 => 'SAN MIGUEL DE SARAPIQUI',
    ),
    2 => 
    array (
      1 => 'SAN RAMON',
      2 => 'SANTIAGO',
      3 => 'SAN JUAN',
      4 => 'PIEDADES NORTE',
      5 => 'PIEDADES SUR',
      6 => 'SAN RAFAEL',
      7 => 'SAN ISIDRO',
      8 => 'ANGELES',
      9 => 'ALFARO',
      10 => 'VOLIO',
      11 => 'CONCEPCION',
      12 => 'ZAPOTAL',
      13 => 'SAN ISIDRO DE PEÑAS BLANCAS',
      14 => 'SAN LORENZO',
    ),
    3 => 
    array (
      1 => 'GRECIA',
      2 => 'SAN ISIDRO',
      3 => 'SAN JOSE',
      4 => 'SAN ROQUE',
      5 => 'TACARES',
      6 => 'PUENTE DE PIEDRA',
      7 => 'BOLIVAR',
    ),
    4 => 
    array (
      1 => 'SAN MATEO',
      2 => 'DESMONTE',
      3 => 'JESUS MARIA',
      4 => 'LABRADOR',
    ),
    5 => 
    array (
      1 => 'ATENAS',
      2 => 'JESUS',
      3 => 'MERCEDES',
      4 => 'SAN ISIDRO',
      5 => 'CONCEPCION',
      6 => 'SAN JOSE',
      7 => 'SANTA EULALIA',
      8 => 'ESCOBAL',
    ),
    6 => 
    array (
      1 => 'NARANJO',
      2 => 'SAN MIGUEL',
      3 => 'SAN JOSE',
      4 => 'CIRRI SUR',
      5 => 'SAN JERONIMO',
      6 => 'SAN JUAN',
      7 => 'ROSARIO',
      8 => 'PALMITOS',
    ),
    7 => 
    array (
      1 => 'PALMARES',
      2 => 'ZARAGOZA',
      3 => 'BUENOS AIRES',
      4 => 'SANTIAGO',
      5 => 'CANDELARIA',
      6 => 'ESQUIPULAS',
      7 => 'GRANJA',
    ),
    8 => 
    array (
      1 => 'SAN PEDRO',
      2 => 'SAN JUAN',
      3 => 'SAN RAFAEL',
      4 => 'CARRILLOS',
      5 => 'SABANA REDONDA',
    ),
    9 => 
    array (
      1 => 'OROTINA',
      2 => 'MASTATE',
      3 => 'HACIENDA VIEJA',
      4 => 'COYOLAR',
      5 => 'CEIBA',
    ),
    10 => 
    array (
      1 => 'QUESADA',
      2 => 'FLORENCIA',
      3 => 'BUENAVISTA',
      4 => 'AGUAS ZARCAS',
      5 => 'VENECIA',
      6 => 'PITAL',
      7 => 'FORTUNA',
      8 => 'TIGRA',
      9 => 'PALMERA',
      10 => 'VENADO',
      11 => 'CUTRIS',
      12 => 'MONTERREY',
      13 => 'POCOSOL',
    ),
    11 => 
    array (
      1 => 'ZARCERO',
      2 => 'LAGUNA',
      3 => 'TAPEZCO',
      4 => 'GUADALUPE',
      5 => 'PALMIRA',
      6 => 'ZAPOTE',
      7 => 'BRISAS',
    ),
    12 => 
    array (
      1 => 'SARCHI NORTE',
      2 => 'SARCHI SUR',
      3 => 'TORO AMARILLO',
      4 => 'SAN PEDRO',
      5 => 'RODRIGUEZ',
    ),
    13 => 
    array (
      1 => 'UPALA',
      2 => 'AGUAS CLARAS',
      3 => 'SAN JOSE O PIZOTE',
      4 => 'BIJAGUA',
      5 => 'DELICIAS',
      6 => 'DOS RIOS',
      7 => 'YOLILLAL',
      8 => 'CANALETE',
    ),
    14 => 
    array (
      1 => 'LOS CHILES',
      2 => 'CAÑO NEGRO',
      3 => 'EL AMPARO',
      4 => 'SAN JORGE',
    ),
    15 => 
    array (
      1 => 'SAN RAFAEL',
      2 => 'BUENA VISTA',
      3 => 'COTE',
      4 => 'KATIRA',
    ),
    16 => 
    array (
      1 => 'RIO CUARTO',
    ),
  ),
  3 => 
  array (
    1 => 
    array (
      1 => 'ORIENTAL (Ciudad de Cartago parte)',
      2 => 'OCCIDENTAL (Ciudad de Cartago parte)',
      3 => 'CARMEN',
      4 => 'SAN NICOLAS',
      5 => 'AGUACALIENTE o SAN FRANCISCO',
      6 => 'GUADALUPE',
      7 => 'CORRALILLO',
      8 => 'TIERRA BLANCA',
      9 => 'DULCE NOMBRE',
      10 => 'LLANO GRANDE',
      11 => 'QUEBRADILLA',
    ),
    2 => 
    array (
      1 => 'PARAISO',
      2 => 'SANTIAGO',
      3 => 'OROSI',
      4 => 'CACHI',
      5 => 'LLANOS DE SANTA LUCIA',
    ),
    3 => 
    array (
      1 => 'TRES RIOS',
      2 => 'SAN DIEGO',
      3 => 'SAN JUAN',
      4 => 'SAN RAFAEL',
      5 => 'CONCEPCION',
      6 => 'DULCE NOMBRE',
      7 => 'SAN RAMON',
      8 => 'RIO AZUL',
    ),
    4 => 
    array (
      1 => 'JUAN VIÑAS',
      2 => 'TUCURRIQUE',
      3 => 'PEJIBAYE',
    ),
    5 => 
    array (
      1 => 'TURRIALBA',
      2 => 'LA SUIZA',
      3 => 'PERALTA',
      4 => 'SANTA CRUZ',
      5 => 'SANTA TERESITA',
      6 => 'PAVONES',
      7 => 'TUIS',
      8 => 'TAYUTIC',
      9 => 'SANTA ROSA',
      10 => 'TRES EQUIS',
      11 => 'ISABEL',
      12 => 'CHIRRIPO',
    ),
    6 => 
    array (
      1 => 'PACAYAS',
      2 => 'CERVANTES',
      3 => 'CAPELLADES',
    ),
    7 => 
    array (
      1 => 'SAN RAFAEL',
      2 => 'COT',
      3 => 'POTRERO CERRADO',
      4 => 'CIPRESES',
      5 => 'SANTA ROSA',
    ),
    8 => 
    array (
      1 => 'TEJAR',
      2 => 'SAN ISIDRO',
      3 => 'TOBOSI',
      4 => 'PATIO DE AGUA',
    ),
  ),
  4 => 
  array (
    1 => 
    array (
      1 => 'HEREDIA',
      2 => 'MERCEDES',
      3 => 'SAN FRANCISCO',
      4 => 'ULLOA O BARREAL',
      5 => 'VARA BLANCA',
    ),
    2 => 
    array (
      1 => 'BARVA',
      2 => 'SAN PEDRO',
      3 => 'SAN PABLO',
      4 => 'SAN ROQUE',
      5 => 'SANTA LUCIA',
      6 => 'SAN JOSE DE LA MONTAÑA',
    ),
    3 => 
    array (
      1 => 'SANTO DOMINGO',
      2 => 'SAN VICENTE',
      3 => 'SAN MIGUEL',
      4 => 'PARACITO',
      5 => 'SANTO TOMAS',
      6 => 'SANTA ROSA',
      7 => 'TURES',
      8 => 'PARA',
    ),
    4 => 
    array (
      1 => 'SANTA BARBARA',
      2 => 'SAN PEDRO',
      3 => 'SAN JUAN',
      4 => 'JESUS',
      5 => 'SANTO DOMINGO',
      6 => 'PURABA',
    ),
    5 => 
    array (
      1 => 'SAN RAFAEL',
      2 => 'SAN JOSECITO',
      3 => 'SANTIAGO',
      4 => 'ANGELES',
      5 => 'CONCEPCION',
    ),
    6 => 
    array (
      1 => 'SAN ISIDRO',
      2 => 'SAN JOSE',
      3 => 'CONCEPCION',
      4 => 'SAN FRANCISO',
    ),
    7 => 
    array (
      1 => 'SAN ANTONIO',
      2 => 'RIVERA',
      3 => 'ASUNCION',
    ),
    8 => 
    array (
      1 => 'SAN JOAQUIN',
      2 => 'BARRANTES',
      3 => 'LLORENTE',
    ),
    9 => 
    array (
      1 => 'SAN PABLO',
      2 => 'RINCON DE SABANILLA',
    ),
    10 => 
    array (
      1 => 'PUERTO VIEJO SARAPIQUI',
      2 => 'LA VIRGEN',
      3 => 'HORQUETAS',
      4 => 'LLANURAS DEL GASPAR',
      5 => 'CUREÑA',
    ),
  ),
  5 => 
  array (
    1 => 
    array (
      1 => 'LIBERIA',
      2 => 'CAÑAS DULCES',
      3 => 'MAYORGA',
      4 => 'NACASCOLO',
      5 => 'CURUBANDE',
    ),
    2 => 
    array (
      1 => 'NICOYA',
      2 => 'MANSION',
      3 => 'SAN ANTONIO',
      4 => 'QUEBRADA HONDA',
      5 => 'SAMARA',
      6 => 'NOSARA',
      7 => 'BELEN DE NOSARITA',
    ),
    3 => 
    array (
      1 => 'SANTA CRUZ',
      2 => 'BOLSON',
      3 => 'VEINTISIETE DE ABRIL',
      4 => 'TEMPATE',
      5 => 'CARTAGENA',
      6 => 'CUAJINIQUIL',
      7 => 'DIRIA',
      8 => 'CABO VELAS',
      9 => 'TAMARINDO',
    ),
    4 => 
    array (
      1 => 'BAGACES',
      2 => 'FORTUNA',
      3 => 'MOGOTE',
      4 => 'RIO NARANJO',
    ),
    5 => 
    array (
      1 => 'FILADELFIA',
      2 => 'PALMIRA',
      3 => 'SARDINAL',
      4 => 'BELEN',
    ),
    6 => 
    array (
      1 => 'CAÑAS',
      2 => 'PALMIRA',
      3 => 'SAN MIGUEL',
      4 => 'BEBEDERO',
      5 => 'POROZAL',
    ),
    7 => 
    array (
      1 => 'JUNTAS',
      2 => 'SIERRA',
      3 => 'SAN JUAN',
      4 => 'COLORADO',
    ),
    8 => 
    array (
      1 => 'TILARAN',
      2 => 'QUEBRADA GRANDE',
      3 => 'TRONADORA',
      4 => 'SANTA ROSA',
      5 => 'LIBANO',
      6 => 'TIERRAS MORENAS',
      7 => 'ARENAL',
    ),
    9 => 
    array (
      1 => 'CARMONA',
      2 => 'SANTA RITA',
      3 => 'ZAPOTAL',
      4 => 'SAN PABLO',
      5 => 'PROVENIR',
      6 => 'BEJUCO',
    ),
    10 => 
    array (
      1 => 'LA CRUZ',
      2 => 'SANTA CECILIA',
      3 => 'GARITA',
      4 => 'SANTA ELENA',
    ),
    11 => 
    array (
      1 => 'HOJANCHA',
      2 => 'MONTE ROMO',
      3 => 'PUERTO CARRILLO',
      4 => 'HUACAS',
    ),
  ),
  6 => 
  array (
    1 => 
    array (
      1 => 'PUNTARENAS',
      2 => 'PITAHAYA',
      3 => 'CHOMES',
      4 => 'LEPANTO',
      5 => 'PAQUERA',
      6 => 'MANZANILLO',
      7 => 'GUACIMAL',
      8 => 'BARRANCA',
      9 => 'MONTE VERDE',
      10 => 'ISLA DEL COCO',
      11 => 'COBANO',
      12 => 'CHACARITA',
      13 => 'CHIRA',
      14 => 'ACAPULCO',
      15 => 'EL ROBLE',
      16 => 'ARANCIBIA',
    ),
    2 => 
    array (
      1 => 'ESPIRITU SANTO',
      2 => 'SAN JUAN GRANDE',
      3 => 'MACACONA',
      4 => 'SAN RAFAEL',
      5 => 'SAN JERONIMO',
      6 => 'CALDERA',
    ),
    3 => 
    array (
      1 => 'BUENOS AIRES',
      2 => 'VOLCAN',
      3 => 'POTRERO GRANDE',
      4 => 'BORUCA',
      5 => 'PILAS',
      6 => 'COLINAS',
      7 => 'CHANGUENA',
      8 => 'BIOLLEY',
      9 => 'BRUNKA',
    ),
    4 => 
    array (
      1 => 'MIRAMAR',
      2 => 'UNION',
      3 => 'SAN ISIDRO',
    ),
    5 => 
    array (
      1 => 'PUERTO CORTES',
      2 => 'PALMAR',
      3 => 'SIERPE',
      4 => 'BAHIA BALLENA',
      5 => 'PIEDRAS BLANCAS',
      6 => 'BAHÍA DRAKE',
    ),
    6 => 
    array (
      1 => 'QUEPOS',
      2 => 'SAVEGRE',
      3 => 'NARANJITO',
    ),
    7 => 
    array (
      1 => 'GOLFITO',
      2 => 'PUERTO JIMENEZ',
      3 => 'GUAYCARA',
      4 => 'PAVON',
    ),
    8 => 
    array (
      1 => 'SAN VITO',
      2 => 'SABALITO',
      3 => 'AGUABUENA',
      4 => 'LIMONCITO',
      5 => 'PITTIER',
      6 => 'GUTIERREZ BRAUN',
    ),
    9 => 
    array (
      1 => 'PARRITA',
    ),
    10 => 
    array (
      1 => 'CORREDOR',
      2 => 'LA CUESTA',
      3 => 'CANOAS',
      4 => 'LAUREL',
    ),
    11 => 
    array (
      1 => 'JACO',
      2 => 'TARCOLES',
    ),
  ),
  7 => 
  array (
    1 => 
    array (
      1 => 'LIMON',
      2 => 'VALLE LA ESTRELLA',
      3 => 'RIO BLANCO',
      4 => 'MATAMA',
    ),
    2 => 
    array (
      1 => 'GUAPILES',
      2 => 'JIMENEZ',
      3 => 'RITA',
      4 => 'ROXANA',
      5 => 'CARIARI',
      6 => 'COLORADO',
      7 => 'LA COLONIA',
    ),
    3 => 
    array (
      1 => 'SIQUIRRES',
      2 => 'PACUARITO',
      3 => 'FLORIDA',
      4 => 'GERMANIA',
      5 => 'CAIRO',
      6 => 'ALEGRIA',
    ),
    4 => 
    array (
      1 => 'BRATSI',
      2 => 'SIXAOLA',
      3 => 'CAHUITA',
      4 => 'TELIRE',
    ),
    5 => 
    array (
      1 => 'MATINA',
      2 => 'BATAAN',
      3 => 'CARANDI',
    ),
    6 => 
    array (
      1 => 'GUACIMO',
      2 => 'MERCEDES',
      3 => 'POCORA',
      4 => 'RIO JIMENEZ',
      5 => 'DUCARI',
    ),
  ),
);

/* Fin ConboBox Provincias, cantones y distritos */

/* Tipo de identificación */
$config['identificacion'] = array(
    '01' => 'Cédula Física',
    '02' => 'Cédula Jurídica',
    '03' => 'DIMEX',
    '04' => 'NITE'
 );

 /* Fin tipo de identificación */