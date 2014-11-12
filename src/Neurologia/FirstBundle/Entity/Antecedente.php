<?php

namespace Neurologia\FirstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Antecedente
 *
 * @ORM\Table(name="antecedente", indexes={@ORM\Index(name="id_historia_clinica", columns={"id_historia_clinica"}), @ORM\Index(name="id_tipo_antecedente", columns={"id_tipo_antecedente"})})
 * @ORM\Entity
 */
class Antecedente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_antecedente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAntecedente;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @var \TipoAntecedente
     *
     * @ORM\ManyToOne(targetEntity="Neurologia\GenericosBundle\Entity\TipoAntecedente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_antecedente", referencedColumnName="id_tipo_antecedente")
     * })
     */
    private $idTipoAntecedente;

    /**
     * @var \HistoriaClinica
     *
     * @ORM\ManyToOne(targetEntity="HistoriaClinica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_historia_clinica", referencedColumnName="id_paciente")
     * })
     */
    private $idHistoriaClinica;



    /**
     * Get idAntecedente
     *
     * @return integer 
     */
    public function getIdAntecedente()
    {
        return $this->idAntecedente;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Antecedente
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
     * Set idTipoAntecedente
     *
     * @param \Neurologia\FirstBundle\Entity\TipoAntecedente $idTipoAntecedente
     * @return Antecedente
     */
    public function setIdTipoAntecedente(\Neurologia\FirstBundle\Entity\TipoAntecedente $idTipoAntecedente = null)
    {
        $this->idTipoAntecedente = $idTipoAntecedente;

        return $this;
    }

    /**
     * Get idTipoAntecedente
     *
     * @return \Neurologia\FirstBundle\Entity\TipoAntecedente 
     */
    public function getIdTipoAntecedente()
    {
        return $this->idTipoAntecedente;
    }

    /**
     * Set idHistoriaClinica
     *
     * @param \Neurologia\FirstBundle\Entity\HistoriaClinica $idHistoriaClinica
     * @return Antecedente
     */
    public function setIdHistoriaClinica(\Neurologia\FirstBundle\Entity\HistoriaClinica $idHistoriaClinica = null)
    {
        $this->idHistoriaClinica = $idHistoriaClinica;

        return $this;
    }

    /**
     * Get idHistoriaClinica
     *
     * @return \Neurologia\FirstBundle\Entity\HistoriaClinica 
     */
    public function getIdHistoriaClinica()
    {
        return $this->idHistoriaClinica;
    }
}