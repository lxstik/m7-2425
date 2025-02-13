Analitza els 4 fragments de codi i fes una correcció en cas que hi hagi errors

    - Codi 1:

class Llibre{
    public string $titol;
    public int $pagines;

    function __construct(string $titol, string $pagines){
        $this->titol = $titol;
        $this->pagines = $pag;
    }
}

$llibre = new Llibre("Harry Potter", "350");
echo $llibre->pagines;


*Respuesta: hay un error, ya que variable págines es un int pero en el constructor se define como un string, tambien en la parte de creacion de Llibre, el numero "350" se define como si fuera un string, aparte dentro del constructor $this->pagines = $pag es incorrecto ya que enviamos una variable $pagines, y no entiende que es $pag*


    - Codi2:

class Cotxe{
    public $marca;

    function construct($marca){
        $this->marca = $marca;
    }
}

$cotxe = new Cotxe("Toyota");
echo $cotxe->marca;

*Respuesta: En este código hay un error en la parte del constructor, ya que se define como __construct($marca) en vez de construct($marca)*


    - Codi3:

class Calculadora {
    public function sumar($a, $b){
        return $this->a + $this->b;
    }
}

$calc = new Calculadora();
echo $calc->sumar(3,5);

*Respuesta: aquí hay un error en el metodo de sumar, intenta acceder a "$this->a" y "$this->b" pero no son los atributos de la clase, así que yo utilizaría "$a" y "$b" directamente*


    - Codi4

class Persona{
    public $nom;
    function __construct($nom){
        nom = $nom;
    }
}

$p = new Persona("Anna");
echo $p->nom;

*Respuesta: en este codigo el error esta en la asignación dentro del constructor, en vez de "nom = $nom" tendría que estar "$this->nom = $nom"*