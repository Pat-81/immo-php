<?php

class Logement
{
    private int     $id_logement;
    private string  $titre;
    private string  $adresse;
    private string $ville;
    private string $cp;
    private int $surface;
    private int $prix;
    private string $type;

    public function __construct($id_logement, $titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type)
    {
        $this->id_logement = $id_logement;
        $this->titre = $titre;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->cp = $cp;
        $this->surface = $surface;
        $this->prix = $prix;
        $this->photo = $photo;
        $this->type = $type;
    }

    /**
     * Get the value of id_logement
     */
    public function getId_logement()
    {
        return $this->id_logement;
    }

    /**
     * Set the value of id_logement
     *
     * @return  self
     */
    public function setId_logement($id_logement)
    {
        $this->id_logement = $id_logement;
        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * Get the value of nbPlayers
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of nbPlayers
     *
     * @return  self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of cp
     */ 
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @return  self
     */ 
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of surface
     */ 
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Set the value of surface
     *
     * @return  self
     */ 
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

        /**
         * Get the value of type
         */ 
        public function getType()
        {
                return $this->type;
        }

        /**
         * Set the value of type
         *
         * @return  self
         */ 
        public function setType($type)
        {
                $this->type = $type;

                return $this;
        }
}
