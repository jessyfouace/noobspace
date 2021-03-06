<?php
class ActualityManager
{
    private $_bdd;

    public function __construct(PDO $bdd)
    {
        $this->setBdd($bdd);
    }

    public function getActus()
    {
        $arrayActus = [];
        $query = $this->getBdd()->prepare('SELECT * FROM actu ORDER BY id DESC');
        $query->execute();
        $actus = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($actus as $key => $actu) {
            $arrayActus[] = new Actuality($actu);
        }

        return $arrayActus;
    }

    public function getActuById(int $id)
    {
        $actuality = [];
        $query = $this->getBdd()->prepare('SELECT * FROM actu WHERE id = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        $actus = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($actus as $actu) {
            $actuality[] = new Actuality($actu);
        }

        return $actuality;
    }

    public function getCommentary()
    {
        $arrayCommentary = [];
        $query = $this->getBdd()->prepare('SELECT * FROM actucomments ORDER BY id DESC');
        $query->execute();
        $comments = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($comments as $comment) {
            $arrayCommentary[] = new Commentary($comment);
        }

        return $arrayCommentary;
    }

    public function getCommentaryByActuId(int $id)
    {
        $arrayCommentary = [];
        $query = $this->getBdd()->prepare('SELECT * FROM actucomments WHERE idActu = :id ORDER BY id DESC');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        $comments = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($comments as $comment) {
            $arrayCommentary[] = new Commentary($comment);
        }

        return $arrayCommentary;
    }

    public function removeCommentaryByActuId(int $id)
    {
        $arrayCommentary;
        $query = $this->getBdd()->prepare('SELECT * FROM actucomments WHERE id = :id ORDER BY id DESC');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        $comments = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($comments as $comment) {
            $arrayCommentary = new Commentary($comment);
        }

        return $arrayCommentary;
    }

    public function getSpecialGame($game)
    {
        $arrayActus = [];
        $query = $this->getBdd()->prepare('SELECT * FROM actu WHERE game = :game ORDER BY id DESC');
        $query->bindValue(':game', $game, PDO::PARAM_STR);
        $query->execute();
        $actus = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($actus as $actu) {
            $arrayActus[] = new Actuality($actu);
        }

        return $arrayActus;
    }

    public function addCommentary(Commentary $commentary)
    {
        $query = $this->getBdd()->prepare('INSERT INTO actucomments(nameCommentary, commentary, idActu) VALUES(:nameCommentary, :commentary, :idActu)');
        $query->bindValue(':nameCommentary', $commentary->getNameCommentary(), PDO::PARAM_STR);
        $query->bindValue(':commentary', $commentary->getCommentary(), PDO::PARAM_STR);
        $query->bindValue(':idActu', $commentary->getIdActu(), PDO::PARAM_INT);
        $query->execute();
    }

    public function removeCommentary(Commentary $commentary)
    {
        $query = $this->getBdd()->prepare('DELETE FROM actucomments WHERE id = :id');
        $query->bindValue(':id', $commentary->getId(), PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Get the value of _bdd
     */
    public function getBdd()
    {
        return $this->_bdd;
    }

    /**
     * Set the value of _bdd
     *
     * @return  self
     */
    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;

        return $this;
    }
}
