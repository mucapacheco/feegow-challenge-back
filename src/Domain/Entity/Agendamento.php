<?php

namespace Domain\Entity;

/**
 * Agendamento
 */
class Agendamento
{
    /**
     * @var int
     */
    private $specialty_id;

    /**
     * @var int
     */
    private $professional_id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var int
     */
    private $source_id ;

    /**
     * @var int
     */
    private $id;


    /**
     * Set specialtyId.
     *
     * @param int $specialtyId
     *
     * @return Agendamento
     */
    public function setSpecialtyId($specialtyId)
    {
        $this->specialty_id = $specialtyId;

        return $this;
    }

    /**
     * Get specialtyId.
     *
     * @return int
     */
    public function getSpecialtyId()
    {
        return $this->specialty_id;
    }

    /**
     * Set professionalId.
     *
     * @param int $professionalId
     *
     * @return Agendamento
     */
    public function setProfessionalId($professionalId)
    {
        $this->professional_id = $professionalId;

        return $this;
    }

    /**
     * Get professionalId.
     *
     * @return int
     */
    public function getProfessionalId()
    {
        return $this->professional_id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Agendamento
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set cpf.
     *
     * @param string $cpf
     *
     * @return Agendamento
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf.
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set sourceId.
     *
     * @param int $sourceId
     *
     * @return Agendamento
     */
    public function setSourceId($sourceId)
    {
        $this->source_id  = $sourceId;

        return $this;
    }

    /**
     * Get sourceId.
     *
     * @return int
     */
    public function getSourceId()
    {
        return $this->source_id ;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
