<?php

namespace Neurologia\FirstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table(name="persona", indexes={@ORM\Index(name="id_estado_civil", columns={"id_estado_civil"}), @ORM\Index(name="id_tipo_documento", columns={"id_tipo_documento"}), @ORM\Index(name="id_sexo", columns={"id_sexo"})})
 * @ORM\Entity
 */
class Persona
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_persona", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPersona;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255, nullable=true)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_documento", type="string", length=255, nullable=true)
     */
    private $numeroDocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_de_nacimiento", type="date", nullable=true)
     */
    private $fechaDeNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=true)
     */
    private $direccion;

    /**
     * @var \Sexo
     *
     * @ORM\ManyToOne(targetEntity="Neurologia\GenericosBundle\Entity\Sexo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sexo", referencedColumnName="id_sexo")
     * })
     */
    private $idSexo;

    /**
     * @var \EstadoCivil
     *
     * @ORM\ManyToOne(targetEntity="Neurologia\GenericosBundle\Entity\EstadoCivil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado_civil", referencedColumnName="id_estado_civil")
     * })
     */
    private $idEstadoCivil;

    /**
     * @var \TipoDocumento
     *
     * @ORM\ManyToOne(targetEntity="Neurologia\GenericosBundle\Entity\TipoDocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_documento", referencedColumnName="id_tipo_documento")
     * })
     */
    private $idTipoDocumento;



    /**
     * Get idPersona
     *
     * @return integer 
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Persona
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
     * Set apellido
     *
     * @param string $apellido
     * @return Persona
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set numeroDocumento
     *
     * @param string $numeroDocumento
     * @return Persona
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;

        return $this;
    }

    /**
     * Get numeroDocumento
     *
     * @return string 
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Persona
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Persona
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set fechaDeNacimiento
     *
     * @param \DateTime $fechaDeNacimiento
     * @return Persona
     */
    public function setFechaDeNacimiento($fechaDeNacimiento)
    {
        $this->fechaDeNacimiento = $fechaDeNacimiento;

        return $this;
    }

    /**
     * Get fechaDeNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaDeNacimiento()
    {
        return $this->fechaDeNacimiento;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Persona
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set idSexo
     *
     * @param \Neurologia\FirstBundle\Entity\Sexo $idSexo
     * @return Persona
     */
    public function setIdSexo(\Neurologia\FirstBundle\Entity\Sexo $idSexo = null)
    {
        $this->idSexo = $idSexo;

        return $this;
    }

    /**
     * Get idSexo
     *
     * @return \Neurologia\FirstBundle\Entity\Sexo 
     */
    public function getIdSexo()
    {
        return $this->idSexo;
    }

    /**
     * Set idEstadoCivil
     *
     * @param \Neurologia\FirstBundle\Entity\EstadoCivil $idEstadoCivil
     * @return Persona
     */
    public function setIdEstadoCivil(\Neurologia\FirstBundle\Entity\EstadoCivil $idEstadoCivil = null)
    {
        $this->idEstadoCivil = $idEstadoCivil;

        return $this;
    }

    /**
     * Get idEstadoCivil
     *
     * @return \Neurologia\FirstBundle\Entity\EstadoCivil 
     */
    public function getIdEstadoCivil()
    {
        return $this->idEstadoCivil;
    }

    /**
     * Set idTipoDocumento
     *
     * @param \Neurologia\FirstBundle\Entity\TipoDocumento $idTipoDocumento
     * @return Persona
     */
    public function setIdTipoDocumento(\Neurologia\FirstBundle\Entity\TipoDocumento $idTipoDocumento = null)
    {
        $this->idTipoDocumento = $idTipoDocumento;

        return $this;
    }

    /**
     * Get idTipoDocumento
     *
     * @return \Neurologia\FirstBundle\Entity\TipoDocumento 
     */
    public function getIdTipoDocumento()
    {
        return $this->idTipoDocumento;
    }
}