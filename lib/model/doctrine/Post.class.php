<?php

/**
 * Post
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    adehr
 * @subpackage model
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Post extends BasePost {

    public function getUserRealname() {
        return $this->getUser()->getRealname();
    }

    public function getCantComments() {
        $cant = 0;
        foreach ($this->getComments() as $comment) {
            $cant++;
        }
        return $cant;
    }

    public function generateImageFilename($file) {
        $this->setSize(filesize($file->getTempName()));
        $this->setFullMime($file->getType());

        return Stringkit::fixFilename($file->getOriginalName()) . '_' . rand(11111, 99999) . $file->getOriginalExtension();
    }

    public function save(Doctrine_Connection $conn = null) {
        
        $this->createThumbnail('image', $this->getFullMime(), 684, 315);
        $this->createThumbnail('image', $this->getFullMime(), 128, 60);
        $this->createThumbnail('image', $this->getFullMime(), 142, 90);
        $this->createThumbnail('image', $this->getFullMime(), 297, 169);
        
        if ($this->isNew() && sfContext::hasInstance()) {
            $this->setUserId(sfContext::getInstance()->getUser()->getUserId());
            $this->setDatetime(date('Y-m-d H:i:s'));
        }

        if ($this->isNew()) {
            $this->setNewRank();
        }

        if ($this->isColumnModified('content')) {
            $this->setExcerpt(substr(strip_tags($this->getContent()), 0, 1000) . '...');
        }
        
        parent::save($conn);
    }

    public function getFormattedDatetime($format = 'D') {
        return $this->getTable()->getDateTimeFormatter()->format($this->getDatetime(), $format);
    }

    public function getLink() {
        return link_to($this->getTitle(), '@post_show?slug=' . $this->getSlug());
    }

    public function getCategoryName() {
        $result = "";
        foreach ($this->getCategories() as $category) {
            $result = $result . $category->getName() . '<br/>';
        }

        return $result;
    }

    public function getTagName() {
        $result = "";
        foreach ($this->getTags() as $tag) {
            $result = $result . $tag->getName() . '<br/>';
        }

        return $result;
    }

    public function getName() {
        return $this->getTitle();
    }

    public function setNewRank() {
        $rank = $this->getTable()->getNewRank();
        $this->setRank($rank);
    }

    public function getCategoryNameForList() {
        $result = "";
        foreach ($this->getCategories() as $category) {
            $result = $result . $category->getName() . ',';
        }

        return substr($result, 0, 23) . "...";
    }
    
    public function getVideoName() {
        $result = "<ul>";
        foreach ($this->getVideos() as $video) {
            $result = $result ."<li>".$video->getTitle() . '</li>';
        }
        return $result."</ul>";
    }
    
    public function getPhotoName() {
        $result = "<ul>";
        foreach ($this->getPhotos() as $photo) {
            $result = $result . "<li>".$photo->getTitle() . '</li>';
        }
        return $result."</ul>";
    }    

}