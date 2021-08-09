<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\CommunesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CommunesRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"read:Communes:collection"}},
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"read:Communes:collection"}}
 *           },
 *          "put",
 *          "patch",
 *          "delete"
 *     },
 *     attributes={"pagination_enabled"=false}
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *     "code": "exact",
 *     "nom": "partial",
 *     "codeDepartement": "partial",
 *     "codeRegion": "partial",
 *     "codesPostaux": "partial",
 *     "population": "partial"
 * })
 */
class Communes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:Communes:collection"})
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:Communes:collection"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=3)
     * @Groups({"read:Communes:collection"})
     */
    private $codeDepartement;

    /**
     * @ORM\Column(type="string", length=3)
     * @Groups({"read:Communes:collection"})
     */
    private $codeRegion;

    /**
     * @ORM\Column(type="array")
     * @Groups({"read:Communes:collection"})
     */
    private $codesPostaux = [];

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read:Communes:collection"})
     */
    private $population;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getCodeDepartement(): ?string
    {
        return $this->codeDepartement;
    }

    public function setCodeDepartement(string $codeDepartement): self
    {
        $this->codeDepartement = $codeDepartement;

        return $this;
    }

    public function getCodeRegion(): ?string
    {
        return $this->codeRegion;
    }

    public function setCodeRegion(string $codeRegion): self
    {
        $this->codeRegion = $codeRegion;

        return $this;
    }

    public function getCodesPostaux(): ?array
    {
        return $this->codesPostaux;
    }

    public function setCodesPostaux(array $codesPostaux): self
    {
        $this->codesPostaux = $codesPostaux;

        return $this;
    }

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(int $population): self
    {
        $this->population = $population;

        return $this;
    }
}
