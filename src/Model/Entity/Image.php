<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 *
 * @property int $id
 * @property string $file
 * @property string $file_dir
 * @property \Cake\I18n\Time $created
 */
class Image extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

     /**
     * Returns the full path of a file
     */
    protected function _getFullFilePath(){
        return WWW_ROOT . 'uploads' . DS .'images'. DS .'file' . DS . $this->file_dir . DS . $this->file;
    }

    /**
     * Returns the relative path of a file
     */
    protected function _getRelFilePath(){
        return DS .'uploads' . DS .'images'. DS .'file' . DS . $this->file_dir . DS . $this->file;
    }

    /**
     * Returns the full path of the containing directory of a file
     */
    protected function _getDirPath(){
        return WWW_ROOT . 'uploads' . DS .'images'. DS .'file' .DS . $this->file_dir;
    }

    /**
     * Returns the relative path of the containing directory of a file
     */
    protected function _getRelDirPath(){
        return 'uploads' . DS .'images'. DS .'file' . DS . $this->file_dir;
    }
}
