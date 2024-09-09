<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string|null $nonce
 * @property \Cake\I18n\DateTime|null $nonce_expiry
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'email' => true,
        'password' => true,
        'first_name' => true,
        'last_name' => true,
        'nonce' => true,
        'nonce_expiry' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];

     /**
     * Hashing password for User entity
     *
     * @param string $password Password field
     * @return string|null hashed password
     * @see \App\Model\Entity\User::$password
     */
    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }

        return $password;
    }


}
