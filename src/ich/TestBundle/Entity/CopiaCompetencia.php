<?php

namespace ich\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CopiaCompetencia
 *
 * @ORM\Table(name="copia_competencia")
 * @ORM\Entity(repositoryClass="ich\TestBundle\Repository\CompetenciaRepository")
 */
class CopiaCompetencia
{
		
    /**
     * @ORM\OneToMany(targetEntity="ich\TestBundle\Entity\CopiaFactor", mappedBy="copiaCompetencia", cascade={"persist", "remove"})
     */
    protected $copiaFactores;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Cuestionario", inversedBy="copiaCompetencias")
     * @ORM\JoinColumn(name="cuestionario_id", referencedColumnName="id",nullable=false, onDelete="CASCADE")
     */
    protected $cuestionario;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="codigo", type="string", length=10)
     */
    private $codigo;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="nombre", type="string", length=30)
     */
    private $nombre;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="descripcion", type="string", length=150)
     */
    private $descripcion;

    /**
     * @var int
     * @Assert\NotBlank()
     * @ORM\Column(name="ponderacion", type="integer")
     */
    private $ponderacion;
    
    /**
     * @var float
     * @ORM\Column(name="puntajeObtenido", type="float", nullable=true)
     */
    private $puntajeObtenido;
    
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->copiaFactores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return CopiaCompetencia
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }


   /**
     * Set cuestionario
     *
     * @param \ich\TestBundle\Entity\Cuestionario $cuestionario
     * @return CopiaCompetencia
     */
    public function setCuestionario(\ich\TestBundle\Entity\Cuestionario $cuestionario)
    {
        $this->cuestionario = $cuestionario;

        return $this;
    }

    /**
     * Get cuestionario
     *
     * @return \ich\TestBundle\Entity\Cuestionario 
     */
    public function getCuestionario()
    {
        return $this->cuestionario;
    }


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return CopiaCompetencia
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return CopiaCompetencia
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set ponderacion
     *
     * @param integer $ponderacion
     * @return CopiaCompetencia
     */
    public function setPonderacion($ponderacion)
    {
        $this->ponderacion = $ponderacion;

        return $this;
    }

    /**
     * Get ponderacion
     *
     * @return integer 
     */
    public function getPonderacion()
    {
        return $this->ponderacion;
    }

    /**
     * Set puntajeObtenido
     *
     * @param integer $puntajeObtenido
     * @return CopiaCompetencia
     */
    public function setPuntajeObtenido($puntajeObtenido)
    {
        $this->puntajeObtenido = $puntajeObtenido;

        return $this;
    }

    /**
     * Get puntajeObtenido
     *
     * @return integer 
     */
    public function getPuntajeObtenido()
    {
        return $this->puntajeObtenido;
    }

    /**
     * Add copiaFactores
     *
     * @param \ich\TestBundle\Entity\CopiaFactor $copiaFactores
     * @return CopiaCompetencia
     */
    public function addCopiaFactore(\ich\TestBundle\Entity\CopiaFactor $copiaFactores)
    {
        $this->copiaFactores[] = $copiaFactores;

        return $this;
    }

    /**
     * Remove copiaFactores
     *
     * @param \ich\TestBundle\Entity\CopiaFactor $copiaFactores
     */
    public function removeCopiaFactore(\ich\TestBundle\Entity\CopiaFactor $copiaFactores)
    {
        $this->copiaFactores->removeElement($copiaFactores);
    }

    /**
     * Get copiaFactores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCopiaFactores()
    {
        return $this->copiaFactores;
    }
}
