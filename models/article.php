<?php
class Article extends Model
{
  private $idA;
  private $titre;
  private $texte;
  private $image;
  private $extensionImage;

  //METHODS

  /*
  ** L'ID de l'article doit etre defini obligatoirement en variable de classe * !!
  */
  public function move_picture()
  {
      $extension = strtolower(substr($this->image['name'],-3));
      $this->setExtensionImage($extension);
      $old = $this->image['tmp_name'];
      $new = ROOT.'views/lib/img/articles/article-'.$this->idA.'.'.$extension;
      move_uploaded_file($old,$new);
  }



    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getIdA()
    {
        return $this->idA;
    }

    /**
     * Set the value of Id
     *
     * @param mixed idA
     *
     * @return self
     */
    public function setIdA($idA)
    {
        $this->idA = $idA;

        return $this;
    }

    /**
     * Get the value of Titre
     *
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of Titre
     *
     * @param mixed titre
     *
     * @return self
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of Texte
     *
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set the value of Texte
     *
     * @param mixed texte
     *
     * @return self
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }


    /**
     * Get the value of Image
     *
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of Image
     *
     * @param mixed image
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }


    /**
     * Get the value of Extension Image
     *
     * @return mixed
     */
    public function getExtensionImage()
    {
        return $this->extensionImage;
    }

    /**
     * Set the value of Extension Image
     *
     * @param mixed extensionImage
     *
     * @return self
     */
    public function setExtensionImage($extensionImage)
    {
        $this->extensionImage = $extensionImage;

        return $this;
    }

}
