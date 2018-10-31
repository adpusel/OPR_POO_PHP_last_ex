<?php

namespace OCFram;

class Page extends ApplicationComponent
{
  protected $contentFile;
  protected $vars = [];

  // j'inporte les var pour la vu
  public function addVar($var, $value)
  {
	if (!is_string($var) || is_numeric($var) || empty($var))
	{
	  throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractères non nulle');
	}

	$this->vars[$var] = $value;
  }

  /**
   * @return false|string
   */
  public function getGeneratedPage()
  {
	// c'est ce qui contient le template
	var_dump($this->contentFile);
    if (!file_exists($this->contentFile))
	{
	  throw new \RuntimeException('La vue spécifiée n\'existe pas');
	}

	// cest pour ca que les var herite de AppConponent, ca me fais comme une globale
	$user = $this->app->user();


	// comme le teto de grafik art quand je stoke mes var
	extract($this->vars);

	// je genere ma vue avec les var deja extraite
	ob_start();
	/** @noinspection PhpIncludeInspection */
	require $this->contentFile;
	$content = ob_get_clean();

	// je recommence pour mettre dans le layout
	ob_start();
		require __DIR__ . '/../../App/' . $this->app->name() .
	  '/Templates/layout.php';
	return ob_get_clean();
  }

  public function setContentFile($contentFile)
  {
	if (!is_string($contentFile) || empty($contentFile))
	{
	  throw new \InvalidArgumentException('La vue spécifiée est invalide');
	}

	$this->contentFile = $contentFile;
  }
}
