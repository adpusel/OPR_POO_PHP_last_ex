trop fun je peux declare les var comme ca !
```php
<?php
class Personnage
{
  private $_id,
          $_degats,
          $_nom;
}
```

je peux faire mes demandes a pdo avec ca :
```sql
SET id= :var
```

la super methode pour hydrate
```php
<?php 
 
 foreach ($argvs as $name => $argv) {
     $method = 'set' . ucfirst($name);
      if (method_exists($this, $method))
        $this->$method($value);
 }
 ?>
```

la class est cool car j'utilise des Constante de elle pour les actions \
comme avec PDO
```php
<?php 
 class Personnage
 {
   private $_degats,
           $_id,
           $_nom;
   
   const CEST_MOI = 1; // Constante renvoyée par la méthode `frapper` si on se frappe soi-même.
   const PERSONNAGE_TUE = 2; // Constante renvoyée par la méthode `frapper` si on a tué le personnage en le frappant.
   const PERSONNAGE_FRAPPE = 3; // Constante renvoyée par la méthode `frapper` si on a bien frappé le personnage.
   
   
   public function __construct(array $donnees)
   {
     $this->hydrate($donnees);
   }
   
   public function frapper(Personnage $perso)
   {
     if ($perso->id() == $this->_id)
     {
       return self::CEST_MOI;
     }
     
 ?>
```

autre truc cool avec les class, je peux recuperer le retour de la function parent
```php
<?php 
 class B extends A
 {
   public function test()
   {
     $retour = parent::test();
     
     echo $retour;
   }
 }
 
 ?>
```
 
#les method magic 
```php
<?php 
 __set    &&  __get // pemete de faire des trucs quand j'accede a nu prop qui n'existe pas ou interdit
 __isset  &&  __unset // est appelée lorsque l'on appelle la fonction isset | unset sur un attribut qui n'existe pas ou auquel on n'a pas accès.
  __call » et « __callStatic » // same shit avec les methods
 ?>
``` 
les quand je serialize un obj comme quand je met des objets dans session j'ai ses deux methodes
```php
<?php 
 class Connexion
 {
   protected $pdo, $serveur, $utilisateur, $motDePasse, $dataBase;
   
   public function __construct($serveur, $utilisateur, $motDePasse, $dataBase)
   {
     $this->serveur = $serveur;
     $this->utilisateur = $utilisateur;
     $this->motDePasse = $motDePasse;
     $this->dataBase = $dataBase;
     
     $this->connexionBDD();
   }
   
   protected function connexionBDD()
   {
     $this->pdo = new PDO('mysql:host='.$this->serveur.';dbname='.$this->dataBase, $this->utilisateur, $this->motDePasse);
   }
   
   public function __sleep()
   {
     return ['serveur', 'utilisateur', 'motDePasse', 'dataBase'];
   }
   
   public function __wakeup()
   {
     $this->connexionBDD();
   }
 }
```

__tostring et __debug info 

je peux parcourir tout ce que j'ai dans de visible dans un objet avec 
```php
<?php 
     foreach ($this as $attribut => $valeur)
     {
       echo '<strong>', $attribut, '</strong> => ', $valeur, '<br />';
     }
     
     // en dehors de la class
     foreach ($classe as $attribut => $valeur)
     {
       echo '<strong>', $attribut, '</strong> => ', $valeur, '<br />';
     }
 ?>
```

bien se rappeller comment les interfaces permettent de faire des objets tres \
portable comme pour le parcour des objets tableaux

finalement je dois tout mettre dans des try catch sinon j'ai des risque de segfault \
il y a des exeption pour touts les cas d'err simple, regarde la doc pour etre sur
```php
<?php 
 
   if (!is_numeric($a) || !is_numeric($b))
   {
     throw new InvalidArgumentException('Les deux paramètres doivent être des nombres');
   }
   
   return $a + $b;
 }
 
 ?>
```

voici comment je fais pour donner des alias au trait
```php
<?php
 
   use HTMLFormater, TextFormater
   {
     HTMLFormater::format insteadof TextFormater;
   }
 
 ?>
```

la methode de la class est toujour plus forte que le trait \
mais le trait est plus fort que la maman

```php
<?php 
 trait MonTrait
 {
   protected $attr = 'Hello !';
   
   public function showAttr()
   {
     echo $this->attr;
   }
 }
 ?>
```
Si un trait implémente une méthode, toute classe utilisant ce trait a la capacité de changer sa \
 visibilité, c'est-à-dire la passer en privé, protégé ou public \
 je peux aussi renomer les mthod et les passer en priver
 
 ```php
<?php 

 trait A
 {
   public function saySomething()
   {
     echo 'Je suis le trait A !';
   }
 }
 
 class MaClasse
 {
   use A
   {
     saySomething as protected sayWhoYouAre;
   }
 }
 
 $o = new MaClasse;
 $o->saySomething(); // Affichera « Je suis le trait A ! ».
 $o->sayWhoYouAre(); // Lèvera une erreur fatale, car l'alias créé est une méthode protégée.
 ?>

<?php
trait A
{
  abstract public function saySomething();
}

abstract class Mere
{
  use A;
}

// Jusque-là, aucune erreur n'est levée.

class Fille extends Mere
{
  // Par contre, une erreur fatale est ici levée, car la méthode saySomething() n'a pas été implémentée.
}

```