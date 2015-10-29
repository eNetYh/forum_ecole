<?php
class ArticleManager extends Manager{


public function getAll(){
    $array = $this->get('*','article');
    $result = array();
    $i = 0 ;
    foreach ($array as $value) {
      $article = new Article();
      $article->hydrate($value);
      $result[$i] = $article;
      $i++;
    }
    return $result;
}

public function getById($idA){
    $array = $this->find('*','article',array('idA'=>$idA),'AND','=');
    $article = new Article();
    $article->hydrate($array[0]);
    return $article;
}

public function getByRech($term){
    $fields = array(
      'texte '=> "'%".$term."%'",
      'titre' => "'%".$term."%'"
    );
    $array = $this->find('*','article',$fields,' OR ',' LIKE ');
    $result = array();
    $i = 0 ;
    foreach ($array as $value) {
      $article = new Article();
      $article->hydrate($value);
      $result[$i] = $article;
      $i++;
    }
    return $result;
}

public function deleteArticle($idA){
    $dbc = $this->dbConnect();
    $query = 'DELETE FROM article WHERE idA = :idA';
    $req = $dbc->prepare($query);
    $req->execute(array('idA' => $idA));
    $req->closeCursor();
    $dbc = null;
}

public function addArticle($article){
  $dbc = $this->dbConnect();
  $query = "INSERT INTO article VALUES(:idA, :titre, :texte, :ext)";
  $req = $dbc->prepare($query);
  $array = array(
    'idA' => $article->getIdA(),
    'titre' => $article->getTitre(),
    'texte' => $article->getTexte(),
    'ext' => $article->getExtensionImage()
  );
  $req->execute($array);
  $req->closeCursor();
  $dbc = null;
}

public function getLastId(){
  $fields = array(
    " idA "=>" (SELECT COALESCE(max(idA), 0) FROM article)"
  );
  $result = $this->find(' idA ',' article ',$fields,' OR ',' = ');
  if(!empty($result[0][0]) || isset($result[0][0])){
      return $result[0][0];
  }
  else{
      return 0;
  }
}

}
