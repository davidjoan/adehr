<?php

/**
 * PostTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PostTable extends DoctrineTable
{
  const
    STATUS_PUBLISHED       = 'PU',
    STATUS_PENDING         = 'PE';

  
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Post');
    }  
  protected static
    $status                = array
                             (
                               self::STATUS_PUBLISHED => 'Publicado',
                               self::STATUS_PENDING   => 'Pendiente',
                             );
                             
  public function getStatuss()
  {
    return self::$status;
  }
  
  public function updateQueryForList(DoctrineQuery $q)
  {
    $q->innerJoin('p.User u');
  }
  
  public function findOneBySlug($slug)
  {
    $q = $this->createAliasQuery()
         ->innerJoin('p.PostIndex pi')
         ->where('p.slug = ?', $slug);
         
    return $q->fetchOne();
  }
  
  public function getQueryForLastPosts($limit)
  {
    $q = $this->createAliasQuery()
         ->leftJoin('p.Categories c')
         ->where('p.status = ?', self::STATUS_PUBLISHED)
         ->orderBy('p.datetime DESC')
         ->limit($limit);
         
    return $q;
  }
  
  public function findLastPosts($limit = 10)
  {
    return $this->getQueryForLastPosts($limit)->execute();
  }
  
  public function findLastPostsByCategorySlug($category_slug, $limit = 5)
  {
    $q = $this->getQueryForLastPosts($limit)->
         andWhere('c.slug = ?', $category_slug);
         
    return $q->execute();
  }
  public function getImageDir()
  {
    return sfConfig::get('app_post_dir');
  }
  
  public function getImagePath()
  {
    return sfConfig::get('app_post_path');
  }
  
  public function getNewRank()
  {
  	 $q = $this->createQuery('a')
  	           ->addSelect('MAX(rank)');
  	           
  	 $dato = $q->execute()->getFirst()->toArray();
  	 return $dato['MAX']+1;
  	 
  }  
  
  public function findByTitleLike($name, $limit = 20)
  {
    $q = $this->createAliasQuery('p')
         ->where('LOWER(p.title) LIKE ?', '%'.Stringkit::strtolower($name).'%')
         ->limit($limit);
    
    return $q->execute();
  }
  
  public function getQueryForTenPrincipalPosts()
  {
    $q = $this->createAliasQuery()
         ->leftJoin('p.Categories c')
         ->where('p.status = ?', self::STATUS_PUBLISHED)
         ->orderBy('p.rank ASC')
         ->limit(10);
         
    return $q->execute();
  }  
  
  public function findByCategorySlug($slug)
  {
    $q = $this->createAliasQuery()
         ->leftJoin('p.Categories c')
         ->where('p.status = ?', self::STATUS_PUBLISHED)
         ->andWhere('c.slug = ?', $slug)
         ->orderBy('p.rank ASC')
         ->limit(100);
         
    return $q->execute();
  }  
  
  public function findByTagSlug($slug)
  {
    $q = $this->createAliasQuery()
         ->leftJoin('p.Tags t')
         ->where('p.status = ?', self::STATUS_PUBLISHED)
         ->andWhere('t.slug = ?', $slug)
         ->orderBy('p.rank ASC')
         ->limit(100);
         
    return $q->execute();
  }
  
  
  public function getPostOnlyWithVideos()
  {
      
        $query = DoctrineQuery::create()
             ->select('COUNT(pv.post_id)')
             ->from('PostVideo pv')
             ->where('pv.post_id = p.id');   
            
    $q = $this->createAliasQuery()
         ->leftJoin('p.Categories c')
         ->where('p.status = ?', self::STATUS_PUBLISHED)
         ->andWhere('('.$query->getDql().') > 0')
		 ->andWhere('p.image <> ?', '')
         ->orderBy('p.datetime DESC')
         ->limit(20);
    
         
    return $q->execute();
  }
  
  public function getPostOnlyWithPhotos()
  {
      
    $query = DoctrineQuery::create()
             ->select('COUNT(pp.post_id)')
             ->from('PostPhoto pp')
             ->where('pp.post_id = p.id');     
            
    $q = $this->createAliasQuery()
         ->leftJoin('p.Categories c')
         ->where('p.status = ?', self::STATUS_PUBLISHED)
         ->andWhere('('.$query->getDql().') > 0')
		 ->andWhere('p.image <> ?', '')
         ->orderBy('p.datetime DESC')
         ->limit(20);
         
    return $q->execute();
  }  
  
  public function getOldPosts()
  {   
    $q = $this->createAliasQuery()
         ->leftJoin('p.Categories c')
         ->where('p.status = ?', self::STATUS_PUBLISHED)
         ->orderBy('p.datetime ASC')
         ->limit(20);
         
    return $q->execute();
  }    
}