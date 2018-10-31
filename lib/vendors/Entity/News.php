<?php

namespace Entity;

use \OCFram\Entity;

/**
 * Class News
 *
 * @package Entity
 */
class News extends Entity
{
  /**
   * @var
   */
  /**
   * @var
   */
  /**
   * @var
   */
  /**
   * @var
   */
  /**
   * @var
   */
  protected $auteur,
	$titre,
	$contenu,
	$dateAjout,
	$dateModif;

  /**
   *
   */
  const AUTEUR_INVALIDE = 1;
  /**
   *
   */
  const TITRE_INVALIDE = 2;
  /**
   *
   */
  const CONTENU_INVALIDE = 3;

  /**
   * @return bool
   */
  public function isValid()
  {
	return !(empty($this->auteur) || empty($this->titre) ||
	  empty($this->contenu));
  }


  // SETTERS //

  /**
   * @param $auteur
   */
  public function setAuteur($auteur)
  {
	if (!is_string($auteur) || empty($auteur))
	{
	  $this->erreurs[] = self::AUTEUR_INVALIDE;
	}

	$this->auteur = $auteur;
  }

  /**
   * @param $titre
   */
  public function setTitre($titre)
  {
	if (!is_string($titre) || empty($titre))
	{
	  $this->erreurs[] = self::TITRE_INVALIDE;
	}

	$this->titre = $titre;
  }

  /**
   * @param $contenu
   */
  public function setContenu($contenu)
  {
	if (!is_string($contenu) || empty($contenu))
	{
	  $this->erreurs[] = self::CONTENU_INVALIDE;
	}

	$this->contenu = $contenu;
  }

  /**
   * @param \DateTime $dateAjout
   */
  public function setDateAjout(\DateTime $dateAjout)
  {
	$this->dateAjout = $dateAjout;
  }

  /**
   * @param \DateTime $dateModif
   */
  public function setDateModif(\DateTime $dateModif)
  {
	$this->dateModif = $dateModif;
  }

  // GETTERS //

  /**
   * @return mixed
   */
  public function auteur()
  {
	return $this->auteur;
  }

  /**
   * @return mixed
   */
  public function titre()
  {
	return $this->titre;
  }

  /**
   * @return mixed
   */
  public function contenu()
  {
	return $this->contenu;
  }

  /**
   * @return mixed
   */
  public function dateAjout()
  {
	return $this->dateAjout;
  }

  /**
   * @return mixed
   */
  public function dateModif()
  {
	return $this->dateModif;
  }
}