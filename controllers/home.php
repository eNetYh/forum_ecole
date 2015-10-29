<?php
class home extends Controller{


    /*
    ** Pages
    */
    public function index(){
      if(!isset($_SESSION['id'])){
        if(!empty($_POST['login'])){
          if(isset($_POST['cookie'])){$cookie = $_POST['cookie'];}else{$cookie = null;}
          $this->connect($_POST['login'],$_POST['pass'],$cookie);
        }else{
            $this->render('index'); //Rend la vue
        }

      }
      else{
        $this->render('homepage');
      }
    }

    public function homepage(){
      if(isset($_SESSION['id'])){
        if(isset($_POST['titre']))
        {
          $this->loadModel('Article');
          $this->loadManager('ArticleManager');

          $this->Article->setIdA($this->ArticleManager->getLastId() + 1);
          $this->Article->setTitre($_POST['titre']);
          $this->Article->setTexte($_POST['texte']);
          $this->Article->setImage($_FILES['img']);
          $this->Article->move_picture();
          $this->ArticleManager->addArticle($this->Article);

          $this->render('homepage');
        }
        else
        {
          $this->render('homepage');
        }
      }
    }

    public function consultpage(){
      if(isset($_SESSION['id'])){
        $this->loadModel('Article');
        $this->loadManager('ArticleManager');
        if(isset($_POST['rech']))
        {
          $d['articles'] = $this->ArticleManager->getByRech($_POST['rech']);
        }
        else
        {
          $d['articles'] = $this->ArticleManager->getAll();
        }
        $this->set($d);
        $this->render('consultpage');
      }
    }

    public function savepage(){
        if(isset($_SESSION['id'])){
          $this->render('savepage');
        }
    }

    public function detailsarticle(){
      if(isset($_SESSION['id'])){
        $this->loadModel('Article');
        $this->loadManager('ArticleManager');
        $d['article'] = $this->ArticleManager->getById($_GET['idA']);
        $this->set($d);
        $this->render('detailsarticle');
      }
    }



    /*
    ** METHODS
    */
    public function connect($login, $pass, $cookie){
        $this->loadModel('User'); //Charge le model user
        $this->loadManager('UserManager'); //Charge le manager userManager

        $this->User->setLogin($login); //Renseigne l'attribut login dans l'objet user
    	  $this->User->setPass($pass); //Renseigne l'attribut pass dans l'ojet user

        $user = $this->UserManager->isUserExist($this->User);
        /* Créer une variable user
         * si elle est rempli l'utilisateur existe
         * si la variable est nulle l'utilisateur n'existe pas
        */

    	if( $user != null )
    	{
        $_SESSION['id'] = $user->getId();
        if($cookie != null)
        {
          setcookie('gestarticle_login',$_POST['login'],(time()+3600*3600),'/',null,false,true);
        }
    		$this->render('homepage');
    	}
    	else
    	{
    		$this->render('index');
    	}
    }


    public function deleteArticle(){
      if(isset($_SESSION['id'])){
        $idA = $_POST['idA'];
        $this->loadModel('Article');
        $this->loadManager('ArticleManager');
        $article = $this->ArticleManager->getById($idA);
        $this->ArticleManager->deleteArticle($idA);
        unlink(ROOT.'views/lib/img/articles/article-'.$idA.'.'.$article->getExtensionImage());
      }
    }

    public function getArticles(){
      if(isset($_SESSION['id'])){
        $this->loadModel('Article');
        $this->loadManager('ArticleManager');
        $articles = $this->ArticleManager->getAll();
        $tab = array();
        $i = 0 ;
        foreach ($articles as $article) {
          $tab[$i]['idA'] = $article->getIdA();
          $tab[$i]['titre'] = $article->getTitre();
          $tab[$i]['texte'] = $article->getTexte();
          $i++;
        }
        echo json_encode($tab);
      }
    }


}
?>
