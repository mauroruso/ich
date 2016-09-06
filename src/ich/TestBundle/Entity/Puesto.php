<?php

namespace ich\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Puesto
 *
 * @ORM\Table(name="puesto")
 * @ORM\Entity(repositoryClass="ich\TestBundle\Repository\PuestoRepository")
 */
class Puesto
{

     /**
     * @ORM\OneToMany(targetEntity="ich\TestBundle\Entity\Puesto_Competencia", mappedBy="puestoId")
     */
    protected $competencias;

    /**
     * @ORM\OneToOne(targetEntity="ich\TestBundle\Entity\Auditoria", inversedBy="puesto") 
     * @ORM\JoinColumn(name="eliminado",referencedColumnName="id", nullable=true)
     */
    protected $auditoriaId;

    /**
     * @ORM\ManyToOne(targetEntity="ich\TestBundle\Entity\Empresa",inversedBy="puestos")
     * @ORM\JoinColumn(name="empresa_id",referencedColumnName="id", nullable=false)
     */
    protected $empresaId;


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
     *
     * @ORM\Column(name="codigo", type="string", length=10, unique=true)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=30)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=150)
     */
    private $descripcion;

   

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
     * @return Puesto
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
     * Set nombre
     *
     * @param string $nombre
     * @return Puesto
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
     * @return Puesto
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
     * Set auditoriaId
     *
     * @param \ich\TestBundle\Entity\Auditoria $auditoriaId
     * @return Puesto
     */
    public function setAuditoriaId(\ich\TestBundle\Entity\Auditoria $auditoriaId = null)
    {
        $this->auditoriaId = $auditoriaId;

        return $this;
    }

    /**
     * Get auditoriaId
     *
     * @return \ich\TestBundle\Entity\Auditoria
     */
    public function getAuditoriaId()
    {
        return $this->auditoriaId;
    }

    /**
     * Add competencias
     *
     * @param \ich\TestBundle\Entity\Competencia $competencias
     * @return Puesto
     */
    public function addCompetencia(\ich\TestBundle\Entity\Competencia $competencias)
    {
        $this->competencias[] = $competencias;

        return $this;
    }

    /**
     * Remove competencias
     *
     * @param \ich\TestBundle\Entity\Competencia $competencias
     */
    public function removeCompetencia(\ich\TestBundle\Entity\Competencia $competencias)
    {
        $this->competencias->removeElement($competencias);
    }

    /**
     * Get competencias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompetencias()
    {
        return $this->competencias;
    }


/**
     * Set empresaId
     *
     * @param \ich\TestBundle\Entity\Empresa $empresaId
     * @return Puesto
     */
    public function setEmpresaId(\ich\TestBundle\Entity\Empresa $empresaId = null)
    {
        $this->empresaId = $empresaId;

        return $this;
    }

    /**
     * Get empresaId
     *
     * @return \ich\TestBundle\Entity\Empresa
     */
    public function getEmpresaId()
    {
        return $this->empresaId;
    }

}
