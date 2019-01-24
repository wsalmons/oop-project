<?php
/**
 * Class creating and populating information for an author.
 *
 * @author Wyatt Salmons <wyattsalmons@gmail.com>
 */

class Author {
	/**
	 * the id for this author, this is the primary key
	 */
	private $authorId;
	/**
	 * the author Url
	 */
	private $authorAvatarUrl;
	/**
	 * the author activation token
	 */
	private $authorActivationToken;
	/**
	 *the author email address
	 */
	private $authorEmail;
	/**
	 * the author hash
	 */
	private $authorHash;
	/**
	 * the author username
	 */
	private $authorUsername;

	/**
	 * accessor method for authorId
	 *
	 * @return int value of profile id
	 */
	public function getAuthorId() {
		return($this->authorId);
	}

	/**
	 * mutator method for authorId
	 *
	 * @param int $newAuthorId new value of author id
	 * @throws UnexpectedValueException if $newAuthorId is not an integer
	 */
	public function setAuthorId($newAuthorId) {
		// verify the author id is valid
		$newAuthorId = filter_var($newAuthorId, FILTER_VALIDATE_INT);
		if($newAuthorId === false) {
			throw(new UnexpectedValueException("author id is not a valid integer"));
		}

		// convert and store the author id
		$this->authorId = intval($newAuthorId);
	}

	/**
	 *accessor method for author avatar URL
	 *
	 * @return int value of profile id
	 */
	public function getAuthorAvatarUrl() {
		return($this->authorAvatarUrl);
	}

	/**
	 * mutator method for author avatar URL
	 *
	 * @param string $newAuthorAvatarUrl value of author avatar url
	 * @throws UnexpectedValueException if $newAuthorAvatarUrl is not valid
	 */

	public function setAuthorAvatarUrl($newAuthorAvatarUrl) {
		// verify author avatar url is valid
		$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_STRING);
		if($newAuthorAvatarUrl === false) {
			throw(new UnexpectedValueException("author avatar url is not a valid string"));
		}
	}

	/**
	 * accessor method for author activation token
	 */
	public function getAuthorActivationToken() {
		return($this->authorActivationToken);
	}

	/**
	 * mutator method for author activation token
	 *
	 * @param string $newAuthorActivationToken value of author activation token
	 * @throws UnexpectedValueException if $newAuthorActivationToken is not valid
	 */
	public function setAuthorActivationToken($newAuthorActivationToken) {
		// verify Author Activation Token is valid
		$newAuthorActivationToken = filter_var($newAuthorActivationToken, FILTER_SANITIZE_STRING);
		if($newAuthorActivationToken === false) {
			throw(new UnexpectedValueException("author activation token is not a valid string"));
		}
	}
	/**
	 * accessor method for author email
	 */
	public function getAuthorEmail () {
		return($this->authorEmail);
	}

	/**
	 * mutator method for author email
	 *
	 * @param string $newAuthorEmail value of author email
	 * @throws UnexpectedValueException if $newAuthorEmail is not valid
	 */

	public function setAuthorEmail($newAuthorEmail) {
		//verify Author Email is valid
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_SANITIZE_STRING);
		if($newAuthorEmail === false) {
			throw(new UnexpectedValueException("author email is not a valid string"));
		}
	}

	/**
	 * accessor for author hash
	 */

	public function getAuthorHash() {
		return($item->authorHash);
	}

	/**
	 * mutator for  author hash
	 *
	 * @param string $newAuthorHash value of Author Hash
	 *
	 */
}
?>

