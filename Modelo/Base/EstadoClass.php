<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c
<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 27/02/2016
 * Time: 14:34
 */
namespace Modelo\Base;
use Modelo\BD;

require_once __DIR__."/../BD/EstadoBD.php";

class  Estado{

    private $id;
    private $tipo;

    /**
     * Estado constructor.
     * @param $id
     * @param $tipo
     */
    public function __construct($id=null, $tipo=null)
    {
        $this->setId($id);
        $this->setTipo($tipo);
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function add(){
        BD\EstadoBD::add($this);
    }
<<<<<<< HEAD
=======
<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 27/02/2016
 * Time: 14:34
 */
namespace Modelo\Base;
use Modelo\BD;

class  Estado{

    private $id;
    private $tipo;

    /**
     * Estado constructor.
     * @param $id
     * @param $tipo
     */
    public function __construct($id=null, $tipo=null)
    {
        $this->setId($id);
        $this->setTipo($tipo);
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function add(){
        BD\EstadoBD::add($this);
    }
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c
}